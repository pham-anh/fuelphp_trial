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

	public function test_create_with_get_returns_empty_form_test_with_goutte()
	{
		$client = new Goutte\Client();
		$response = $client->request('GET', 'http://localhost/payment_system/public/account/create');

		//has a form
		$this->assertCount(1, $response->filter('form'));

		//check the form empty
		$this->assertEquals('', $response->filter('form input[name=account_name]')->attr('value'));
		$this->assertEquals('', $response->filter('form input[name=account_no]')->attr('value'));
		$this->assertEquals('', $response->filter('form input[name=bank]')->attr('value'));
		$this->assertEquals('', $response->filter('form input[name=province]')->attr('value'));

		//has 4 input fields
		$this->assertCount(4, $response->filter('form input.form-control'));

		//has 4 placeholders
		$this->assertCount(4, $response->filter('form input[placeholder]'));

		//has 1 submit button
		$this->assertCount(1, $response->filter('form input[name=submit]'));

		//cancel button is linked to account List
		$cancel_link = $response->selectLink('Cancel')->link();
		$cancel_uri = $cancel_link->getUri();
		$this->assertEquals('http://localhost/payment_system/public/account/index', $cancel_uri);
	}

	public function test_create_with_get_returns_empty_form()
	{
		//$client = new Goutte\Client();
		//$response = $client->request('GET', 'http://localhost/payment_system/public/account/create');

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

		//cancel button is linked to account index
		$account_index_url = 'http://localhost/payment_system/public/account/index';
		$cancel_link = preg_match_all('/(<a)*(href="$account_index_url")*(Cancel)/', $res_info['response']);
		$this->assertEquals(1, $cancel_link);
	}

	public function test_create_with_post_if_succeed_then_redirect()
	{
		$url = 'http://localhost/payment_system/public/account/create';
		$curl = Request::forge($url, 'curl');
		$curl->set_method('POST');

		$params = array(
			'account_name' => 'ASDFGHJK',
			'account_no' => '012389rd687',
			'bank' => 'QWERT BANK',
			'province' => 'HO CHI MINH');
		$curl->set_params(array('form-data' => $params));
		$curl->execute();
		$res_info = $curl->response_info();

		$redirect = 'http://localhost/payment_system/public/account/index';


		$this->assertEquals($res_info['url'], $redirect);
	}

}