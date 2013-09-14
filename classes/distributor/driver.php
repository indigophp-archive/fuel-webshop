<?php

namespace Webshop;

abstract class Distributor_Driver
{
	/**
	* Driver config
	* @var array
	*/
	protected $config = array();

	/**
	 * Model_Distributor instance
	 * @var Model_Distributor
	 */
	protected $model;

	/**
	* Driver constructor
	*
	* @param array $config driver config
	*/
	public function __construct(Model_Distributor $model, array $config = array())
	{
		$this->config = $config;
		$this->model = $model;
		$this->model->set('last_update', time())->save();
	}

	/**
	* Get a driver config setting.
	*
	* @param string $key the config key
	* @param mixed  $default the default value
	* @return mixed the config setting value
	*/
	public function get_config($key, $default = null)
	{
		return \Arr::get($this->config, $key, $default);
	}

	/**
	* Set a driver config setting.
	*
	* @param string $key the config key
	* @param mixed $value the new config value
	* @return object $this for chaining
	*/
	public function set_config($key, $value)
	{
		\Arr::set($this->config, $key, $value);

		return $this;
	}

	public function download($file = 'price', $cached = false)
	{
		if ($cached === true && $this->get_config('cache.enabled', true) === true)
		{
			try
			{
				//Log: Returning file from cache
				return \Cache::get($this->get_config('cache.prefix', 'distributor') . '.' . $this->model->slug . '.' . $file);
			}
			catch (\CacheNotFoundException $e)
			{
				// Log: cached mode is selected, but the cache doesn't exist
			}
		}

		$result = $this->_download($file);

		if ($result)
		{
			//Log: download successful
			if ($this->get_config('cache.enabled', true) === true)
			{
				$cache = \Cache::forge($this->get_config('cache.prefix', 'distributor') . '.' . $this->model->slug . '.' . $file, $this->get_config('cache'));
				$cache->set($result, $this->get_config('config.expiration'));
			}
			return $result;
		}
		else
		{
			//Log: download failed
			throw new DistributorException("Download failed");
		}
	}

	public function update($cached = false)
	{
		$products = $this->_update($cached);

		$columns = array(
			'temporal_start',
			'temporal_end',
			'external_id',
			'price_list_id',
			'name',
			'price',
		);

		$ucount = 0;
		$acount = 0;
		$rcount = 0;
		$ncount = 0;
		$insert = \DB::insert(Model_Price::table(), $columns);

		$query = Model_Price::query()->where('price_list_id', $this->model->price_list_id);

		$price = \DB::select('external_id', 'price', 'name', 'available', 'warranty')
				->from(Model_Price::table())
				->where('price_list_id', $this->model->price_list_id)
				->execute()
				->as_array('external_id');


		foreach ($products as $id => $product)
		{
			//Check if product already exists
			if (\Arr::get($price, $id) !== null)
			{

			}
			else
			{
				\Arr::set($product, 'price_list_id', $this->model->price_list_id);
				$model = \Model::forge($product);
				$model->save();
			}


			if (\Arr::get($price, $id) !== \Arr::get($product, 'price'))
			{
				$model = Model_Price::query()
					->where('external_id', $id)
					->where('price_list_id', $this->model->price_list_id)
					->get_one();

				$model->price = \Arr::get($product, 'price');
				$model->available = 1;
				$model->save();
				$ucount++;
				unset($price[$id]);
			}
			elseif (\Arr::get($price, $id) !== null)
			{
				$ncount++;
				unset($price[$id]);
			}
			else
			{
				\Arr::set($product, array(
					'price_list_id' => $this->model->price_list_id,
					'external_id'   => $id,
					'temporal_start'    => time(),
					'temporal_end'    => Model_Price::temporal_property('max_timestamp')
				));
				$insert = $insert->values(\Arr::filter_keys($product, $columns));
				$acount++;
			}
		}

		if ($acount > 0) {
			$insert->execute();
		}

		$rcount = \DB::update(Model_Price::table())
				->value("price", 0)
				->where("updated_at", '<', $this->model->last_update)
				->where('price_list_id', '=', $this->model->price_list_id);
		if (count($price) > 0) {
			$rcount = $rcount->where("external_id", "IN", array_keys($price));
		}
		$rcount = $rcount->execute();

		//Log: $store->name . ' frissítése sikeres', $ucount . ' termék ára frissítve<br />' . $acount . ' termék hozzáadva<br />' . $rcount . ' termék elfogyott<br />' . $ncount . ' termék ára változatlan'
	}

	/**
	 * Update price and availability
	 * @param  boolean $cached  Update from already downloaded files
	 * @return boolean          All products has been processed
	 */
	public function change($cached = false)
	{
		$products = $this->_change($cached);

		$count = array(0);
		$available = array()

		//Create query
		$query = Model_Price::query()->where('price_list_id', $this->model->price_list_id);

		foreach ($products as $id => $product)
		{
			//Check if product has a price change, or just became (un)available
			if (\Arr::get($product, 'price') !== null)
			{
				$count[0] += $query
					->set(array(
						'price'      => \Arr::get($product, 'price'),
						'available'  => \Arr::get($product, 'available', 1),
						'updated_at' => time()
					))
					->where('external_id', $id)
					->update();
			}
			else
			{
				$available[\Arr::get($product, 'available', 1)][] = $id;
			}
		}

		//Update availability information
		foreach ($available as $key => $value) {
			if (count($value) > 0)
			{
				$count[$key + 1] = $query
					->set(array(
						'available'  => $key
						'updated_at' => time()
					))
					->where('external_id', 'IN', $value)
					->update();
			}
		}

		//Log: $store->name . ' frissítése sikeres', $count[0] . ' termék ára frissítve<br />' . $count[2] . ' termék lett ismét elérhető<br />' . $count[1] . ' termék elfogyott<br />'
		//All product has been processed
		return array_sum($count) == count($products)
	}

	abstract protected function _download($file);
	abstract protected function _update($cached = false);
}