<?php

namespace Webshop;

class Model_Product extends \Orm\Model_Temporal
{

	protected static $_belongs_to = array(
		'category',
		'manufacturer',
		//'type',
	);

	protected static $_eav = array(
		'meta' => array(
			'attribute' => 'key',
			'value'     => 'value',
		)
	);

	protected static $_has_many = array(
		'meta' => array(
			'model_to'       => 'Model_Product_Meta',
			'cascade_save'   => true,
			'cascade_delete' => true,
		),
		'order_product'
	);

	protected static $_observers = array(
		'Orm\\Observer_Slug' => array(
			'events' => array('before_insert'),
			'source' => 'name',
		),
	);

	protected static $_properties = array(
		'id',
		'temporal_start',
		'temporal_end',
		'category_id',
		'manufacturer_id',
		'type_id',
		'tax_class_id',
		'name',
		'slug',
		'description',
		'price',
		'enabled' => array(
			'default' => 1
		),
	);

	protected static $_table_name = 'products';

}
