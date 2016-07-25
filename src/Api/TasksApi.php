<?php

namespace Faylite\TaskList\Api;

use Faylite\TaskList\Router\RequestHandler;
use Faylite\TaskList\Models\TasksModel;

class TasksApi
{
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

	public function markDone($request, $response)
	{
		$tasksModel = new TasksModel();
		$tasksModel->markDone($request->getAttribute('id'));
	}

	public function delete($request, $response)
	{
		$tasksModel = new TasksModel();
		$tasksModel->deleteData($request->getAttribute('id'));
	}

	public function update()
	{
		$tasksModel = new TasksModel();
		$data = array(
			'id' => $response->getAttribute('id'),
			'title' => $_POST['title'],
			'description' => $_POST['description']
		);
		$tasksModel->putData($data);
	}
}
