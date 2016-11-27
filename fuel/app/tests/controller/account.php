<?php

/**
 * @group App
 */
class Test_Controller_Account extends TestCase
{

	public function test_action_create_returns_presenter()
	{
		$response = Request::forge('account/create')->execute()->response();

		$presenter = get_class($response->body());
		$this->assertEquals('Presenter_Account_Create', $presenter);
	}

	public function test_create_with_get_returns_empty_form()
	{
		$url = 'http://localhost/payment_system/public/account/create';
		$curl = Request::forge($url, 'curl');
		$curl->set_method('GET');
		$curl->execute();
		$res_info = $curl->response_info();
		
		//has a form		
		$form = preg_match_all('/(<form)/', $res_info['response']);
		$this->assertEquals(1, $form);

		//has 4 input fields
		$input_fields = preg_match_all("/(<input)*(class=)*(form-control)/", $res_info['response']);
		$this->assertEquals(4, $input_fields);

		//check the form empty
		$empty_fields1 = preg_match_all('/(<input)*(value="")/', $res_info['response']);
		$empty_fields2 = preg_match_all("/(<input)*(value='')/", $res_info['response']);
		$this->assertEquals(4, $empty_fields1 + $empty_fields2);

		//has 4 placeholders
		$placeholders = preg_match_all('/(<input)*(placeholder=)/', $res_info['response']);
		$this->assertEquals(4, $placeholders);

		//has a link to account index (cancel button)
		$expected_link = '/(localhost\/payment_system\/public\/account\/index)/';
		$cancel_link = preg_match_all($expected_link, $res_info['response']);
		$this->assertEquals(1, $cancel_link);
	}

	public function test_create_with_post_if_succeed_then_redirect()
	{
		$url = 'http://localhost/payment_system/public/account/create';
		$curl = Request::forge($url, 'curl');
		$curl->set_method('POST');

		$account_no = rand(1000000000, 9999999999);
		$params = array(
			'account_name' => 'ASDFGHJK',
			'account_no' => "$account_no",
			'bank' => 'QWERT BANK',
			'province' => 'HO CHI MINH');

		$curl->set_params(array('form-data' => $params));
		$curl->execute();

		$res_info = $curl->response_info();
		$redirect = 'http://localhost/payment_system/public/account/index';
		$this->assertEquals($res_info['url'], $redirect);

		//clean up test data
		DB::delete('accounts')->where('account_no', '=', $account_no)->execute();
	}

}