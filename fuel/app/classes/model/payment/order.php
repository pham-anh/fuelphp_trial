<?php
class Model_Payment_Order extends Model_Crud
{
	protected static $_table_name = 'payment_orders';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('beneficiary', 'Beneficiary', 'required|valid_string[numeric]');
		$val->add_field('amount', 'Amount', 'required');
		$val->add_field('amnt_in_words', 'Amnt In Words', 'required|max_length[255]');
		$val->add_field('details', 'Details', 'required|max_length[255]');
		$val->add_field('payment_request', 'Payment Request', 'required|max_length[255]');
		$val->add_field('status', 'Status', 'required');

		return $val;
	}

}
