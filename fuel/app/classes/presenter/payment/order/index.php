<?php

/* * 
 * The payment order index presenter.
 * 
 * @package app
 * @extends Presenter
 */

class Presenter_Payment_Order_Index extends Presenter
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

		$this->content = View::forge('payment/order/index', array('payment_orders' => Model_Payment_Order::find_all()));
	}

}