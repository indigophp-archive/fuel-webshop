<?php

class Model_Country extends \Orm\Model
{

	protected static $_has_many = array(
		'address'
	);

	protected static $_properties = array(
		'id',
		'name',
		'iso_code_2',
		'iso_code_3',
		'lang_code',
		'address_format',
		'postal_code_required' => array(
			'default' => 1
		),
		'enabled' => array(
			'default' => 1
		),
	);

	protected static $_table_name = 'countries';

}
