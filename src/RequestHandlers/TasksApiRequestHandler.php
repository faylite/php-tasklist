<?php

namespace Faylite\TaskList\RequestHandlers;

use Faylite\TaskList\Router\RequestHandler;

class TasksApiRequestHandler implements  RequestHandler
{
	public function handle($requestMethod, $params)
	{
		// If an invalid request method was used, return 405 and die
		if ($_SERVER['REQUEST_METHOD'] != 'GET') {
			header('HTTP/1.0 405 Method Not Allowed');
			die();
		}
		else $this->get();
	}

	public function get()
	{
		$tasksModel = new \Faylite\TaskList\Models\TasksModel();
		header('Content-Type: application/json');
		echo $tasksModel->getData(null);
	}
}
