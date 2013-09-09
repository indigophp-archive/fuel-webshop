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
				return \Cache::get($this->get_config('cache.prefix', true) . $this->model->slug . $file);
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
				$cache = \Cache::forge($this->get_config('cache.prefix', true) . $this->model->slug . $file, $this->get_config('cache'));
				$cache->set($result, $this->get_config('config.expiration'));
			}
			return $result;
		}
		else
		{
			//Log: download failed
			return false;
		}
	}

	public function update($cached = false)
	{
		$products = $this->_update($cached);
	}

	abstract protected function _download($file);
	abstract protected function _update($cached = false);
}