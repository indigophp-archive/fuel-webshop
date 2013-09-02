<?php

class Model_Distributor_Meta extends \Orm\Model
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
		'distributor_id',
		'key',
		'value',
		'created_at',
		'updated_at',
	);

	protected static $_table_name = 'distributor_meta';

}
