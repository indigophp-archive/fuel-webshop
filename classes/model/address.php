<?php

namespace Webshop;

class Model_Address extends \Orm\Model_Temporal
{

	protected static $_belongs_to = array(
		'country',
		'user',
		'zone'
	);

	protected static $_properties = array(
		'id',
		'temporal_start',
		'temporal_end',
		'user_id',
		'country_id',
		'zone_id',
		'first_name',
		'last_name',
		'company',
		'postal_code',
		'city',
		'address_1',
		'address_2',
		'enabled' => array(
			'default' => 1
		),
	);

	protected static $_table_name = 'addresses';

}
