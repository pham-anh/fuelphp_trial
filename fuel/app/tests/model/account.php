<?php

/**
 * @group App
 */
class Test_Model_Account extends TestCase
{

	public function test_create_success()
	{
		$count = count(Model_Account::find_all());
		$account_no = rand(111111111, 999999999);

		$data = array(
			'account_name' => 'XYZ',
			'account_no' => "$account_no",
			'bank' => 'sssssssss',
			'province' => 'eeeeeeeeeeee',
		);

		$account = Model_Account::forge($data);

		$account->save();

		$update_count = count(Model_Account::find_all());
		$last_record = Model_Account::find_by_pk($account->id)->to_array();


		$this->assertEquals($count + 1, $update_count);
		$this->assertEquals($data['account_name'], $last_record['account_name']);
		$this->assertEquals($data['account_no'], $last_record['account_no']);
		$this->assertEquals($data['bank'], $last_record['bank']);
		$this->assertEquals($data['province'], $last_record['province']);

		return $account->id;
	}

}