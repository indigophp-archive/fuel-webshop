<?php

namespace Webshop;

class Model_Order_Product extends \Orm\Model_Soft
{

	protected static $_belongs_to = array(
		'order',
		'product'
	);

	protected static $_observers = array(
		'Orm\\Observer_Self' => array(
			'events' => array('after_load')
		),
	);

	protected static $_properties = array(
		'id',
		'order_id',
		'product_id',
		'name',
		'quantity',
		'price',
		'subtotal',
		'deleted_at',
	);

	protected static $_soft_delete = array(
		'mysql_timestamp' => false,
	);

	protected static $_table_name = 'order_products';

	public function _event_after_load()
	{
		//$this->product = \Model_Product::find_revision($this->product_id, $this->order->created_at);
	}

	public static function _init()
	{
		static::$_belongs_to['product']['conditions']['where'][] = array('temporal_start', '<=', \DB::expr(\DB::quote_identifier('created_at')));
		static::$_belongs_to['product']['conditions']['where'][] = array('temporal_end', '>', \DB::expr(\DB::quote_identifier('created_at')));
	}

}
