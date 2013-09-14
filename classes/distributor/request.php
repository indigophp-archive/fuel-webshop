<?php

namespace Webshop;

abstract class Distributor_Request extends Distributor_Driver
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
			return $this->response->status == 200 ? true : false;
		}
		catch (\RequestException $e)
		{
			throw new DistributorException($e->getMessage());
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