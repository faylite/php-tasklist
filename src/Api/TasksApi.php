<?php

namespace Faylite\TaskList\Api;

use Faylite\TaskList\Router\RequestHandler;
use Faylite\TaskList\Models\TasksModel;

class TasksApi
{
	public function handle()
	{
		// Switch request method to use correct response
		switch ($_SERVER['REQUEST_METHOD'])
		{
		case 'GET':
			$this->get();
			break;
		case 'POST':
			if (isset($_POST['action']))
			{
				if ($_POST['action'] == 'delete')
					$this->delete();
				elseif ($_POST['action'] == 'create')
					$this->post();
				elseif ($_POST['action'] == 'update')
					$this->put();
				elseif ($_POST['action'] == 'done')
					$this->markDone();
				else {
					header('HTTP/1.1 400 Bad Request');
					die();
				}
			}
			else {
				header('HTTP/1.1 400 Bad Request');
				die();
			}
			break;
		}
	}

	public function get()
	{
		$tasksModel = new TasksModel();
		header('Content-Type: application/json');
		echo $tasksModel->getData(null);
	}

	public function post()
	{
		$tasksModel = new TasksModel();
		$data = array(
			'title' => $_POST['title'],
			'description' => $_POST['description'],
			'status' => 'todo'
		);
		$tasksModel->postData($data);
	}

	public function markDone()
	{
		$tasksModel = new TasksModel();
		$tasksModel->markDone($_POST['id']);
	}

	public function delete()
	{
		$tasksModel = new TasksModel();
		$tasksModel->deleteData($_POST['id']);
	}

	public function put()
	{
		$tasksModel = new TasksModel();
		$data = array(
			'id' => $_POST['id'],
			'title' => $_POST['title'],
			'description' => $_POST['description']
		);
		$tasksModel->putData($data);
	}
}
