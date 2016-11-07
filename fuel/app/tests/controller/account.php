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

}