<?php

namespace Webshop;

class Model_Order extends \Orm\Model_Soft
{
	protected static $_belongs_to = array(
		'shipping_address' => array(
			'key_from' => 'shipping_address_id',
			'key_to'   => 'id',
			'model_to' => 'Model_Address'
		),
	);

	protected static $_eav = array(
		'meta' => array(
			'attribute' => 'key',
			'value'     => 'value',
		),
	);

	protected static $_has_many = array(
		'meta' => array(
			'model_to'       => 'Model_Order_Meta',
			'cascade_save'   => true,
			'cascade_delete' => true,
		),
		'order_product',
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
		'Orm\\Observer_Self' => array(
			'events' => array('after_load')
		),
	);

	protected static $_properties = array(
		'id',
		'user_id',
		'shipping_address_id',
		'payment_address_id',
		'order_status_id',
		'order_shipping_id',
		'order_payment_id',
		'first_name',
		'last_name',
		'email',
		'phone',
		'note',
		'created_at',
		'updated_at',
		'deleted_at',
	);

	protected static $_table_name = 'orders';

	public function _event_after_load()
	{

	}
}
