<?php

namespace Faylite\TaskList;

use Faylite\TaskList\Router;

use Faylite\TaskList\Exceptions\RouteNotFoundException;
use Faylite\TaskList\Exceptions\MethodNotAllowedException;

class App {
	protected $router;

	protected $response;

	public function __construct()
	{
		$this->router = new Router();
		$this->response = new Response();
	}
	
	/**
	 * Adds a new route that accepts GET requests
	 */
	public function get($uri, $handler)
	{
		$this->router->addRoute($uri, $handler, ['GET']);
	}

	/**
	 * Adds a new route that accepts POST requests
	 */
	public function post($uri, $handler)
	{
		$this->router->addRoute($uri, $handler, ['POST']);
	}

	/**
	 * Adds a new route that accepts methods specified in the array
	 */
	public function map($uri, $handler, array $methods = ['GET'])
	{
		$this->router->addRoute($uri, $handler, $methods);
	}
	
	/**
	 * "Runs" the app by checking the uri and calling methods for the path
	 */
	public function run()
	{
		$this->router->setPath(isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/');

		try {
			$response = $this->router->getResponse();
		} catch (RouteNotFoundException $e) {
			// TODO: Better 404
			echo '404 Page Not Found';
			die();
		} catch (MethodNotAllowedException $e) {
			// TODO: Better 405
			echo '405 Method not allowed';
			die();
		}

		return $this->respond($this->process($response));
	}

	public function process($callable)
	{
		// If the callable is an array
		if (is_array($callable)) {
			// Check if the entry at index 0 is an object, if not instantiate it. 
			if (!is_object($callable[0])) {
				$callable[0] = new $callable[0];
			}
			return call_user_func($callable, $this->response);
		}
		return $callable($this->response);
	}

	public function respond($response)
	{
		if (!$response instanceof Response) {
			echo $response;
			return;
		}

		// Set the response header
		header(sprintf(
			'HTTP/%s %s %s',
			'1.1',
			$this->response->getStatusCode(),
			''
		));	

		echo $response->getBody();
	}
}
