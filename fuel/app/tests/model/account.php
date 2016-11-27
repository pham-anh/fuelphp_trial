<?php

/**
 * @group App
 */
class Test_Model_Account extends TestCase
{

	public function test_create_succeeds_with_valid_data()
	{
		$count = Model_Account::count();
		$data1 = array(
			'account_name' => 'Công ty TNHH 123',
			'account_no' => '789654123yux01',
			'bank' => 'Vietcombank',
			'province' => 'Hồ Chí Minh',
		);
		$data2 = array(
			'account_name' => 'Công ty TNHH 123',
			'account_no' => '789654123yux02',
			'bank' => 'Vietcombank',
			'province' => 'Hồ Chí Minh',
		);

		//create an account with a typical data
		$account1 = Model_Account::forge($data1);
		$account1->save();
		$updated_count1 = Model_Account::count();
		$last_record1 = Model_Account::find_by_pk($account1->id)->to_array();

		$this->assertEquals($count + 1, $updated_count1);
		$this->assertSame(
			array($data1['account_name'], $data1['account_no'], $data1['bank'], $data1['province']), array($last_record1['account_name'], $last_record1['account_no'], $last_record1['bank'], $last_record1['province'])
		);

		//create an account with only account_no different from existing accounts
		$account2 = Model_Account::forge($data2);
		$account2->save();
		$updated_count2 = Model_Account::count();
		$last_record2 = Model_Account::find_by_pk($account2->id)->to_array();

		$this->assertEquals($updated_count1 + 1, $updated_count2);
		$this->assertSame(
			array($data2['account_name'], $data2['account_no'], $data2['bank'], $data2['province']), array($last_record2['account_name'], $last_record2['account_no'], $last_record2['bank'], $last_record2['province'])
		);

		//clean up test data
		$account1->delete();
		$account2->delete();
	}

	public function test_create_fails_with_duplicate_account_number()
	{
		$data1 = array(
			'account_name' => 'Công ty TNHH 123',
			'account_no' => "789654123yux",
			'bank' => 'Vietcombank',
			'province' => 'Hồ Chí Minh',
		);
		$account1 = Model_Account::forge($data1);
		$account1->save();
		$updated_count1 = Model_Account::count();

		$data2 = array(
			'account_name' => 'Công ty TNHH 123456',
			'account_no' => "$data1[account_no]",
			'bank' => 'Á Châu',
			'province' => 'Hà Nội',
		);

		$account2 = Model_Account::forge($data2);
		try
		{
			$account2->save();
		}
		catch (Exception $ex)
		{
			print 'Cannot save $account2';
		}

		$updated_count2 = Model_Account::count();
		$this->assertEquals($updated_count1, $updated_count2);
		$this->expectOutputString('Cannot save $account2');

		//clean up test data
		$account1->delete();
		try
		{
			$account2->delete();
		}
		catch (Exception $ex)
		{

		}
	}

}