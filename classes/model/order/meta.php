<?php

namespace Webshop;

class Model_Order_Meta extends \Orm\Model_Soft
{

	protected static $_belongs_to = array(
		'order'
	);

	protected static $_properties = array(
		'id',
		'order_id',
		'key',
		'value',
		'deleted_at',
	);

	protected static $_soft_delete = array(
		'mysql_timestamp' => false,
	);

	protected static $_table_name = 'order_meta';

}
