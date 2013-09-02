<?php

namespace Webshop;

class Model_Category extends \Orm\Model_Nestedset
{

	protected static $_has_many = array(
		'product'
	);

	protected static $_observers = array(
		'Orm\\Observer_Slug' => array(
			'events' => array('before_insert'),
			'source' => 'name',
		),
	);

	protected static $_properties = array(
		'id',
		'left_id',
		'right_id',
		'tree_id',
		'name',
		'slug',
		'description',
		'margin',
		'enabled' => array(
			'default' => 1
		),
	);

	protected static $_table_name = 'categories';

	protected static $_tree = array(
		'left_field'     => 'left_id',
		'right_field'    => 'right_id',
		'tree_field'     => 'tree_id',
		'title_field'    => 'name',
	);

}
