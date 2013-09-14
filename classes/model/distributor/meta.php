<?php

namespace Webshop;

class Model_Distributor_Meta extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'distributor_id',
		'key',
		'value',
	);

	protected static $_table_name = 'distributor_meta';
}
