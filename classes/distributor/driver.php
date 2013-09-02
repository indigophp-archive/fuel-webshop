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

	public function download()
	{
		$path = $this->get_config('tmp') . DS . $this->model->slug . DS;

		if ( ! is_dir($path)) {
			mkdir($path, 0755, true);
		}
	}

	public function update()
	{
		# code...
	}
}