<?php

namespace Faylite\TaskList\RequestHandlers;

use Faylite\TaskList\Router\RequestHandler;

class TasksListRequestHandler implements RequestHandler
{
	public function handle($requestMethod, $params)
	{
		// If an invalid request method was used, return 405 and die
		if ($requestMethod != 'GET') {
			header('HTTP/1.0 405 Method Not Allowed');
			echo '405 Method Not Allowed';
			die();
		}
		else $this->get();
	}

	public function get()
	{
		require ROOT_DIR . '/resources/templates/home.template.php';
	}
}
