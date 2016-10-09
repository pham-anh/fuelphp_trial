<?php

namespace Fuel\Migrations;

class Create_payment_orders
{
	public function up()
	{
		\DBUtil::create_table('payment_orders', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'beneficiary' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'amount' => array('type' => 'double'),
			'amnt_in_words' => array('constraint' => 255, 'type' => 'varchar'),
			'details' => array('constraint' => 255, 'type' => 'varchar'),
			'deadline' => array('constraint' => 11, 'type' => 'int'),
			'payment_request' => array('constraint' => 255, 'type' => 'varchar'),
			'status' => array('type' => 'tinyint'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('payment_orders');
	}
}