<?php

/**
 * The payment order view presenter
 *
 * @package app
 * @extends Presenter
 */
class Presenter_Payment_Order_View extends Presenter
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
		$this->content = View::forge('payment/order/view', array('payment_order' => Model_Payment_Order::find_by_pk(Request::active()->param('id'))));
	}

}