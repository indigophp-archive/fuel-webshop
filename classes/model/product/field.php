<?php

namespace Webshop;

class Model_Product_Field extends \Orm\Model
{

	protected static $_properties = array(
		'id',
		'key',
		'name',
		'description',
		'required',
		'order',
		'enabled' => array(
			'default' => 1
		),
	);

	protected static $_table_name = 'product_fields';
}
