<?php

namespace Webshop;

class DistributorException extends \FuelException {}

class Distributor
{

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
		\Config::load('distributor', true);
	}

	/**
	 * Distributor driver forge.
	 *
	 * @param	string			$distributor		Distributor id or friendly name
	 * @param	array			$config		Extra config array
	 * @return  Distributor instance
	 */
	public static function forge($distributor, $config = array())
	{

		$model = \Model_Distributor::query();

		if (is_int($distributor)
		{
			$model = $model->where('id', $distributor)->get();
		}
		elseif (is_string($distributor))
		{
			$model = $model->where('slug', $distributor)->get();
		}
		elseif ($distributor instanceof Model_Distributor)
		{
			$model = $distributor;
		}
		else
		{
			throw new DistributorException('Invalid Distributor!');
		}

		$config = \Arr::merge(static::$_defaults, \Config::get('distributor', array()), $config);

		$driver = ucfirst(strtolower(isset($model->driver) ? $model->driver : $model->slug);

		$class = '\Webshop\Distributor_' . $driver;

		if( ! class_exists($class, true))
		{
			throw new \FuelException('Could not find Distributor driver: ' . $driver);
		}

		$driver = new $class($model, $config);

		return $driver;
	}
}
