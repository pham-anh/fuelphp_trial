<?php

/**
 * The payment order edit presenter
 *
 * @package app
 * @extends Presenter
 */
class Presenter_Payment_Order_Edit extends Presenter
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

		$view = View::forge('payment/order/edit');
		$view->set_global(array('payment_order' => Model_Payment_Order::find_by_pk(Request::active()->param('id'))));
		$this->content = $view;
	}

}