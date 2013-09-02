<?php

namespace Webshop;

class Model_Zone extends \Orm\Model
{

	protected static $_belongs_to = array(
		'country'
	);

	protected static $_has_many = array(
		'address'
	);

	protected static $_properties = array(
		'id',
		'country_id',
		'code',
		'name',
		'enabled' => array(
			'default' => 1
		),
	);

	protected static $_table_name = 'zones';

}
