<?php

namespace Webshop;

class Model_Price extends \Orm\Model_Soft
{
	protected static $_belongs_to = array(
		'product',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events'          => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events'          => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_properties = array(
		'id',
		'product_id',
		'price_list_id',
		'external_id',
		'price',
		'external_id',
		'available' => array(
			'default' => 1
		),
		'name',
		'warranty',
		'enabled' => array(
			'default' => 1
		),
		'created_at',
		'updated_at',
		'deleted_at',
	);

	protected static $_soft_delete = array(
		'mysql_timestamp' => false,
	);

	protected static $_table_name = 'prices';
}
