<?php

namespace Fuel\Migrations;

class Create_distributor_meta
{

	public function up()
	{
		\DBUtil::create_table('distributor_meta', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'distributor_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'key' => array('constraint' => 255, 'type' => 'varchar'),
			'value' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('distributor_meta');
	}

}
