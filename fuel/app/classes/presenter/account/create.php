<?php

/**
 * The account create presenter.
 *
 * @package  app
 * @extends  Presenter
 */
class Presenter_Account_Create extends Presenter
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
		$this->subtitle = 'New Account';
		$this->content = View::forge('account/create');
	}

}