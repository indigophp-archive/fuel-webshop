<?php

namespace Fuel\Migrations;

class Create_price_lists
{
	public function up()
	{
		\DBUtil::create_table('price_lists', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'slug' => array('type' => 'varchar', 'constraint' => 255),
			'enabled' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('price_lists');
	}
}