<?php

namespace Fuel\Migrations;

class Create_orders
{

	public function up()
	{
		\DBUtil::create_table('orders', array(
			'id'                  => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'user_id'             => array('constraint' => 11, 'type' => 'int', 'unsigned' => true, 'null' => true),
			'shipping_address_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true, 'null' => true),
			'payment_address_id'  => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'order_status_id'     => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'order_shipping_id'   => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'order_payment_id'    => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'first_name'          => array('constraint' => 255, 'type' => 'varchar'),
			'last_name'           => array('constraint' => 255, 'type' => 'varchar'),
			'email'               => array('constraint' => 320, 'type' => 'varchar'),
			'phone'               => array('constraint' => 255, 'type' => 'varchar'),
			'note'                => array('type' => 'text', 'null' => true),
			'created_at'          => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at'          => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'deleted_at'          => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('orders');
	}

}
