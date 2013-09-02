<?php

namespace Fuel\Migrations;

class Create_countries
{

	public function up()
	{
		\DBUtil::create_table('countries', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 128, 'type' => 'varchar'),
			'iso_code_2' => array('constraint' => 2, 'type' => 'varchar'),
			'iso_code_3' => array('constraint' => 3, 'type' => 'varchar'),
			'lang_code' => array('constraint' => 3, 'type' => 'varchar'),
			'address_format' => array('type' => 'text'),
			'postal_code_required' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),
			'enabled' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('countries');
	}

}
