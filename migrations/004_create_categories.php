<?php

namespace Fuel\Migrations;

class Create_categories
{

	public function up()
	{
		\DBUtil::create_table('categories', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'left_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'right_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'tree_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'slug' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'margin' => array('constraint' => '5, 2', 'type' => 'decimal'),
			'enabled' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('categories');
	}

}
