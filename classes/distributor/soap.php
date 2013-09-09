<?php

namespace Webshop;

abstract class Distributor_Soap extends Distributor_Request
{
	protected function request($url, array $options = array())
	{
		$options['driver'] = 'soap';
		$options['trace'] = true;
		return parent::request($url, $options);
	}

	protected function function($name, $params = array())
	{
		return $this->request->set_function($name)->add_param($params);
	}
}