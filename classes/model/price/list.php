<?php

namespace Webshop;

class Model_Price_List extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'slug',
		'enabled' => array(
			'default' => 1
		),
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
		'Orm\\Observer_Slug' => array(
			'events' => array('before_insert'),
			'source' => 'name',
		),
	);
	protected static $_table_name = 'price_lists';

}
