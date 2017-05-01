<?php
class Controller_Project extends Controller_Template
{

	public function action_index()
	{
		$data['projects'] = Model_Project::find('all');
		$this->template->title = "Projects";
		$this->template->content = View::forge('project/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('project');

		if ( ! $data['project'] = Model_Project::find($id))
		{
			Session::set_flash('error', 'Could not find project #'.$id);
			Response::redirect('project');
		}

		// checking first if we recieved a POST request
		if (Input::method() == 'POST')
		{
			// getting the task name. if empty, dispplay an
			// error, otherwise we attempt to create the new task
			$task_name = Input::post('task_name', '');
			if($task_name == '')
			{
				//setting the flash session variable named
				// error. Reminder: this var is displayed in
				// the template using Session::get_flash
				Session::set_flash(
					'error',
					'The task name is empty!'
				);
			}
			else
			{
				$task = Model_Task::forge();
				$task->name = $task_name;
				$task->status = 0;
				$task->rank = 0; // temporary
				$data['project']->tasks[] = $task;
				$data['project']->save();

				// when the task has been saved, we direct
				// the browser to the same webpage. This
				// prevent the form from being submitted again
				// if the user refreshes the webpage
				Response::redirect('project/view/'.$id);
			}
		}

		$this->template->title = "Project";
		$this->template->content = View::forge('project/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Project::validate('create');

			if ($val->run())
			{
				$project = Model_Project::forge(array(
					'name' => Input::post('name'),
				));

				if ($project and $project->save())
				{
					Session::set_flash('success', 'Added project #'.$project->id.'.');

					Response::redirect('project');
				}

				else
				{
					Session::set_flash('error', 'Could not save project.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Projects";
		$this->template->content = View::forge('project/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('project');

		if ( ! $project = Model_Project::find($id))
		{
			Session::set_flash('error', 'Could not find project #'.$id);
			Response::redirect('project');
		}

		$val = Model_Project::validate('edit');

		if ($val->run())
		{
			$project->name = Input::post('name');

			if ($project->save())
			{
				Session::set_flash('success', 'Updated project #' . $id);

				Response::redirect('project');
			}

			else
			{
				Session::set_flash('error', 'Could not update project #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$project->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('project', $project, false);
		}

		$this->template->title = "Projects";
		$this->template->content = View::forge('project/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('project');

		if ($project = Model_Project::find($id))
		{
			$project->delete();

			Session::set_flash('success', 'Deleted project #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete project #'.$id);
		}

		Response::redirect('project');

	}

	public function action_change_task_status()
	{
		if (Input::is_ajax())
		{
			$task = Model_Task::find(intval(Input::post('task_id')));
			$task->status = intval(Input::post('new_status'));
			$task->save();
		}
		return false;

	}

}
