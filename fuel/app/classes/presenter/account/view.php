<?php

/**
 * The account view presenter.
 *
 * @package  app
 * @extends  Presenter
 */
class Presenter_Account_View extends Presenter
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
		$this->content = View::forge('account/view', array('account' => Model_Account::find_by_pk(Request::active()->param('id'))));
	}

}