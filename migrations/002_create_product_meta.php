<?php

namespace Fuel\Migrations;

class Create_product_meta
{

	public function up()
	{
		\DBUtil::create_table('product_meta', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'temporal_start' => array('constraint' => 11, 'type' => 'int'),
			'temporal_end' => array('constraint' => 11, 'type' => 'int'),
			'product_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'key' => array('type' => 'varchar', 'constraint' => 255),
			'value' => array('type' => 'text'),

		), array('id', 'temporal_start', 'temporal_end'));
	}

	public function down()
	{
		\DBUtil::drop_table('product_meta');
	}

}
