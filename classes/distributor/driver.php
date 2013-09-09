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
	 * Request object
	 * @var Request
	 */
	protected $request;

	/**
	 * Response object
	 * @var Response
	 */
	protected $response;

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

	public function download($file = 'price', $return = true)
	{
		$result = $this->_download($file);

		if ($result)
		{
			if ($this->get_config('save', true) === true)
			{
				$path = $this->get_config('tmp') . DS . $this->model->slug . DS;

				if ( ! is_dir($path)) {
					mkdir($path, 0755, true);
				}
				file_put_contents($path . $file, $result);
			}
			return $return === true ? $result : true;
		}
		else
		{
			return false;
		}
	}

	public function update($cached = false)
	{
		$products = $this->_update($cached);
	}

	abstract public function download($file);
	abstract protected function _update($cached = false);
}