<?php

namespace Webshop;

abstract class Distributor_Curl extends Distributor_Request
{
	protected function request($url, array $options = array())
	{
		$options['driver'] = 'curl';
		$return = parent::request($url, $options);
		$this->request->add_param(array(
			$this->model->user_field => $this->model->user,
			$this->model->pass_field => $this->model->pass
		));

		return $return;
	}

	protected function _download($file)
	{
		return true;
	}
}