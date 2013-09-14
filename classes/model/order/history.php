<?php

namespace Webshop;

class Model_Order_History extends \Orm\Model_Soft
{

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_properties = array(
		'id',
		'order_id',
		'order_status_id',
		'notify' => array(
			'default' => 1
		),
		'comment',
		'created_at',
		'deleted_at',
	);

	protected static $_soft_delete = array(
		'mysql_timestamp' => false,
	)

	protected static $_table_name = 'order_histories';

}
