<?php

namespace Fuel\Migrations;

class Create_order_histories
{

	public function up()
	{
		\DBUtil::create_table('order_histories', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'order_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'order_status_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'notify' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),
			'comment' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('order_histories');
	}

}
