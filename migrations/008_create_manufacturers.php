<?php

namespace Fuel\Migrations;

class Create_manufacturers
{

	public function up()
	{
		\DBUtil::create_table('manufacturers', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 64, 'type' => 'varchar'),
			'image' => array('constraint' => 2083, 'type' => 'varchar'),
			'sort' => array('constraint' => 5, 'type' => 'int'),
			'enabled' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('manufacturers');
	}

}
