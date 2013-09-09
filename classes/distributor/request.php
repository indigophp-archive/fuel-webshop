<?php

namespace Webshop;

abstract class Distributor_Request
{
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
	 * Create Request object
	 * @param  string $url     Resource URL
	 * @param  array  $options Array of options (must include driver)
	 * @return $this           Returns this for method chaining
	 */
	protected function request($url, array $options = array())
	{
		empty($options['driver']) && $options['driver'] = 'curl';
		$this->request = \Request::forge($url, $options);
		return $this;
	}


	protected function execute()
	{
		try
		{
			$this->response = $this->request->execute()->response();
			return $this->reponse->status == 200 ? true : false;
		} catch (Exception $e)
		{
			return false;
		}
	}

	protected function _download($file = 'price')
	{
		if ($this->execute() == true)
		{
			return $this->response->body;
		}
		return false;
	}
}