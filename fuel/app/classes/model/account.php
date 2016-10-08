<?php
class Model_Account extends Model_Crud
{
	protected static $_table_name = 'accounts';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('account_name', 'Account Name', 'required|max_length[255]');
		$val->add_field('account_no', 'Account No', 'required|max_length[255]');
		$val->add_field('bank', 'Bank', 'required|max_length[255]');
		$val->add_field('province', 'Province', 'required|max_length[255]');

		return $val;
	}

}
