<?php

namespace Webshop;

class WebshopException extends \FuelException {}

class Webshop
{

	/**
	 * loaded instance
	 */
	protected static $_instance = null;

	/**
	 * array of loaded instances
	 */
	protected static $_instances = array();

	/**
	 * Default config
	 * @var array
	 */
	protected static $_defaults = array();

	/**
	 * Init
	 */
	public static function _init()
	{
		\Config::load('webshop', true);
	}

	/**
	 * Webshop driver forge.
	 *
	 * @param	string			$instance		Instance name
	 * @param	array			$config		Extra config array
	 * @return  Webshop instance
	 */
	public static function forge($instance = 'default', $config = array())
	{
		! is_array($config) && $config = array('driver' => $config);

		$config = \Arr::merge(static::$_defaults, \Config::get('webshop', array()), $config);

		$class = '\Webshop\Webshop_' . ucfirst($config['driver']);

		if( ! class_exists($class, true))
		{
			throw new \FuelException('Could not find Webshop driver: ' . $config['driver']);
		}

		$driver = $class($config);

		static::$_instances[$instance] = $driver;

		return $driver;
	}

	/**
	 * Return a specific driver, or the default instance (is created if necessary)
	 *
	 * @param   string  $instance
	 * @return  Webshop instance
	 */
	public static function instance($instance = null)
	{
		if ($instance !== null)
		{
			if ( ! array_key_exists($instance, static::$_instances))
			{
				return false;
			}

			return static::$_instances[$instance];
		}

		if (static::$_instance === null)
		{
			static::$_instance = static::forge();
		}

		return static::$_instance;
	}


}