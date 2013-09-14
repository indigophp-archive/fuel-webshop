<?php

namespace Webshop;

class Model_Distributor extends \Orm\Model
{
	protected static $_eav = array(
		'meta' => array(
			'attribute' => 'key',
			'value'     => 'value',
		),
	);

	protected static $_has_many = array(
		'meta' => array(
			'model_to'       => 'Model_Distributor_Meta',
			'cascade_delete' => true,
		),
	);

	protected static $_has_one = array(
		'price_list' => array(
			'cascade_delete' => true,
		),
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

	protected static $_properties = array(
		'id',
		'price_list_id',
		'name',
		'slug',
		'url',
		'email',
		'enabled' => array(
			'default' => 1
		),
		'created_at',
		'updated_at',
	);

	protected static $_table_name = 'distributors';
}
