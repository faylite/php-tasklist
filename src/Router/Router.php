<?php

namespace Faylite\TaskList\Router;

class Router
{
	private $routes = [];

	public function addRoute($route)
	{
		$this->routes[] = $route;
	}

	public function execute()
	{
		$url = $this->getPage();
		$query = $this->getQuery();

		$match = false;

		foreach($this->routes as $key => $route)
		{
			if ($route->validPath($url))
			{
				$match = true;
				$route->execute($query);
				break;
			}
		}
		if ($match == false) {
			header('HTTP/1.1 404 Not Found');
			echo '404 Page Not Found';
			die();
		}
	}

	protected function getPage()
	{
		return (isset($_GET['page'])) 
			? filter_var(rtrim($_GET['page'], '/'), FILTER_SANITIZE_URL)
			: '';
	}

	protected function getQuery()
	{
		// Explode query into single parameters
		$query = (explode('&', $_SERVER['QUERY_STRING']));
		foreach($query as $key => $p)
		{
			$query[$key] = explode('=', $p);
		}
		return $query;
	}
}
