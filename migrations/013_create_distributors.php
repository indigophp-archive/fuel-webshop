<?php

namespace Fuel\Migrations;

class Create_distributors
{

	public function up()
	{
		\DBUtil::create_table('distributors', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'price_list_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'name' => array('constraint' => 128, 'type' => 'varchar'),
			'slug' => array('constraint' => 128, 'type' => 'varchar'),
			'url' => array('constraint' => 2083, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('distributors');
	}

}
