<?php

namespace Fuel\Migrations;

class Create_addresses
{

	public function up()
	{
		\DBUtil::create_table('addresses', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'temporal_start' => array('constraint' => 11, 'type' => 'int'),
			'temporal_end' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'country_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'zone_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'first_name' => array('constraint' => 255, 'type' => 'varchar'),
			'last_name' => array('constraint' => 255, 'type' => 'varchar'),
			'company' => array('constraint' => 255, 'type' => 'varchar'),
			'postal_code' => array('constraint' => 10, 'type' => 'varchar'),
			'city' => array('constraint' => 255, 'type' => 'varchar'),
			'address_1' => array('constraint' => 255, 'type' => 'varchar'),
			'address_2' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'enabled' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),

		), array('id', 'temporal_start', 'temporal_end'));
	}

	public function down()
	{
		\DBUtil::drop_table('addresses');
	}

}
