<?php

/**
 * The payment order create presenter.
 *
 * @package app
 * @extends Presenter
 */
class Presenter_Payment_Order_Create extends Presenter
{

	/**
	 * Prepare the view data, keeping this in here helps clean up
	 * the controller.
	 *
	 * @return void
	 */
	public function view()
	{
		$this->title = 'Payment Orders';
		$this->content = View::forge('payment/order/create');
	}

}