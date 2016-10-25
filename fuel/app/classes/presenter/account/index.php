<?php

/**
 * The account index presenter.
 *
 * @package  app
 * @extends  Presenter
 */
class Presenter_Account_Index extends Presenter
{

	/**
	 * Prepare the view data, keeping this in here helps clean up
	 * the controller.
	 *
	 * @return void
	 */
	public function view()
	{
		$this->title = 'Accounts';
		$this->content = View::forge('account/index', array('accounts' => Model_Account::find_all()));
	}

}