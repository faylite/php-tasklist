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
		$json = '{"tasks": [
		{ "title": "Task #1", "description": "YAY, it finally works :D" },
		{ "title": "Task #2", "description": "Task description....." },
		{ "title": "Task #3", "description": "Task description....." },
		{ "title": "Task #4", "description": "Task description....." },
		{ "title": "Task #5", "description": "Task description....." },
		{ "title": "Task #6", "description": "Task description....." },
		{ "title": "Task #7", "description": "Task description....." },
		{ "title": "Task #8", "description": "Task description....." },
		{ "title": "Task #9", "description": "Task description....." },
		{ "title": "Task #10", "description": "Task description....." },
		{ "title": "Task #11", "description": "Task description....." },
		{ "title": "Task #12", "description": "Task description....." },
		{ "title": "Task #13", "description": "Task description....." },
		{ "title": "Task #14", "description": "Task description....." },
		{ "title": "Task #15", "description": "Task description....." }
		]}';
		header('Content-Type: application/json');
		echo $json;
	}
}
