<?php

namespace Fuel\Migrations;

class Create_prices
{
	public function up()
	{
		\DBUtil::create_table('prices', array(
			'id'            => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'product_id'    => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'price_list_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'external_id'   => array('constraint' => 128, 'type' => 'varchar'),
			'available'     => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),
			'price'         => array('type' => 'decimal', 'constraint' => '15, 4'),
			'name'          => array('constraint' => 1024, 'type' => 'varchar'),
			'warranty'      => array('constraint' => 11, 'type' => 'int'),
			'enabled'       => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),
			'created_at'    => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at'    => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'deleted_at'    => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('prices');
	}
}