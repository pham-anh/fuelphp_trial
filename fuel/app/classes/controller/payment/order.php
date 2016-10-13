<?php
class Controller_Payment_Order extends Controller_Template
{

	public function action_index()
	{
		$data['payment_orders'] = Model_Payment_Order::find_all();
		$this->template->title = "Payment_orders";
		$this->template->content = View::forge('payment/order/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('payment/order');

		$data['payment_order'] = Model_Payment_Order::find_by_pk($id);

		$this->template->title = "Payment_order";
		$this->template->content = View::forge('payment/order/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Payment_Order::validate('create');

			if ($val->run())
			{
				$payment_order = Model_Payment_Order::forge(array(
					'beneficiary' => Input::post('beneficiary'),
					'amount' => Input::post('amount'),
					'amnt_in_words' => Input::post('amnt_in_words'),
					'details' => Input::post('details'),
					'deadline' => Input::post('deadline'),
					'payment_request' => Input::post('payment_request'),
					'status' => Input::post('status'),
				));

				if ($payment_order and $payment_order->save())
				{
					Session::set_flash('success', 'Added payment_order #'.$payment_order->id.'.');
					Response::redirect('payment/order');
				}
				else
				{
					Session::set_flash('error', 'Could not save payment_order.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Payment_Orders";
		$this->template->content = View::forge('payment/order/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('payment/order');

		$payment_order = Model_Payment_Order::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Payment_Order::validate('edit');

			if ($val->run())
			{
				$payment_order->beneficiary = Input::post('beneficiary');
				$payment_order->amount = Input::post('amount');
				$payment_order->amnt_in_words = Input::post('amnt_in_words');
				$payment_order->details = Input::post('details');
				$payment_order->deadline = Input::post('deadline');
				$payment_order->payment_request = Input::post('payment_request');
				$payment_order->status = Input::post('status');

				if ($payment_order->save())
				{
					Session::set_flash('success', 'Updated payment_order #'.$id);
					Response::redirect('payment/order');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('payment_order', $payment_order, false);
		$this->template->title = "Payment_orders";
		$this->template->content = View::forge('payment/order/edit');

	}

	public function action_delete($id = null)
	{
		if ($payment_order = Model_Payment_Order::find_one_by_id($id))
		{
			$payment_order->delete();

			Session::set_flash('success', 'Deleted payment_order #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete payment_order #'.$id);
		}

		Response::redirect('payment/order');

	}

}
