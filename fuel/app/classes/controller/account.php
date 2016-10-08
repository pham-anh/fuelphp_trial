<?php
class Controller_Account extends Controller_Template
{

	public function action_index()
	{
		$data['accounts'] = Model_Account::find_all();
		$this->template->title = "Accounts";
		$this->template->content = View::forge('account/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('account');

		$data['account'] = Model_Account::find_by_pk($id);

		$this->template->title = "Account";
		$this->template->content = View::forge('account/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Account::validate('create');

			if ($val->run())
			{
				$account = Model_Account::forge(array(
					'account_name' => Input::post('account_name'),
					'account_no' => Input::post('account_no'),
					'bank' => Input::post('bank'),
					'province' => Input::post('province'),
				));

				if ($account and $account->save())
				{
					Session::set_flash('success', 'Added account #'.$account->id.'.');
					Response::redirect('account');
				}
				else
				{
					Session::set_flash('error', 'Could not save account.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Accounts";
		$this->template->content = View::forge('account/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('account');

		$account = Model_Account::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Account::validate('edit');

			if ($val->run())
			{
				$account->account_name = Input::post('account_name');
				$account->account_no = Input::post('account_no');
				$account->bank = Input::post('bank');
				$account->province = Input::post('province');

				if ($account->save())
				{
					Session::set_flash('success', 'Updated account #'.$id);
					Response::redirect('account');
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

		$this->template->set_global('account', $account, false);
		$this->template->title = "Accounts";
		$this->template->content = View::forge('account/edit');

	}

	public function action_delete($id = null)
	{
		if ($account = Model_Account::find_one_by_id($id))
		{
			$account->delete();

			Session::set_flash('success', 'Deleted account #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete account #'.$id);
		}

		Response::redirect('account');

	}

}
