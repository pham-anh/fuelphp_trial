<?php

/**
 * The account edit presenter.
 *
 * @package  app
 * @extends  Presenter
 */
class Presenter_Account_Edit extends Presenter
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

		$view = View::forge('account/edit');
		$view->set_global(array('account' => Model_Account::find_by_pk(Request::active()->param('id'))));
		$this->content = $view;
	}

}