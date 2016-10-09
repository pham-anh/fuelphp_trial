<?php

namespace Fuel\Migrations;

class Create_accounts
{
	public function up()
	{
		\DBUtil::create_table('accounts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'account_name' => array('constraint' => 255, 'type' => 'varchar'),
			'account_no' => array('constraint' => 255, 'type' => 'varchar'),
			'bank' => array('constraint' => 255, 'type' => 'varchar'),
			'province' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));

		\DBUtil::create_index('accounts', 'account_no', '', 'unique');
	}

	public function down()
	{
		\DBUtil::drop_table('accounts');
	}
}