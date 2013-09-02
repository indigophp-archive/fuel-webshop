<?php

namespace Fuel\Migrations;

class Create_product_fields
{

	public function up()
	{
		\DBUtil::create_table('product_fields', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'key' => array('constraint' => 255, 'type' => 'varchar'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'required' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 0),
			'order' => array('constraint' => 11, 'type' => 'int'),
			'enabled' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('product_fields');
	}

}
