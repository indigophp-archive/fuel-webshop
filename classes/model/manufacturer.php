<?php

namespace Webshop;

class Model_Manufacturer extends \Orm\Model
{

	protected static $_has_many = array(
		'product'
	);

	protected static $_properties = array(
		'id',
		'name',
		'image',
		'sort',
		'enabled' => array(
			'default' => 1
		),
	);

	protected static $_table_name = 'manufacturers';

}
