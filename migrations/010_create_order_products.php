<?php

namespace Fuel\Migrations;

class Create_order_products
{

	public function up()
	{
		\DBUtil::create_table('order_products', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'order_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'product_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'quantity' => array('constraint' => 11, 'type' => 'int'),
			'price' => array('constraint' => '15, 4', 'type' => 'decimal'),
			'subtotal' => array('constraint' => '15, 4', 'type' => 'decimal'),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('order_products');
	}

}
