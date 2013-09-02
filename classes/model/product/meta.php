<?php

namespace Webshop;

class Model_Product_Meta extends \Orm\Model_Temporal
{

	protected static $_belongs_to = array(
		'product'
	);

	protected static $_properties = array(
		'id',
		'temporal_start',
		'temporal_end',
		'product_id',
		'key',
		'value',
	);

	protected static $_table_name = 'product_meta';

}
