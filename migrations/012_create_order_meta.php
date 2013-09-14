<?php

namespace Fuel\Migrations;

class Create_order_meta
{

	public function up()
	{
		\DBUtil::create_table('order_meta', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'order_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'key' => array('constraint' => 255, 'type' => 'varchar'),
			'value' => array('type' => 'text'),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('order_meta');
	}

}
