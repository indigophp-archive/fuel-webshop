<?php

class Model_Distributor extends \Orm\Model
{

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_properties = array(
		'id',
		'price_list_id',
		'name',
		'slug',
		'url',
		'created_at',
		'updated_at',
	);

	protected static $_table_name = 'distributors';

}
