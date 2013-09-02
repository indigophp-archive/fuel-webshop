<?php

namespace Fuel\Migrations;

class Create_zones
{

	public function up()
	{
		\DBUtil::create_table('zones', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'country_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'code' => array('constraint' => 32, 'type' => 'varchar'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'enabled' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('zones');
	}

}
