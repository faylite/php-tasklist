<?php

namespace Faylite\TaskList\Router;

class Route
{
	/**
	 * The path to this route
	 */
	protected $path;
	
	/**
	 * The request method this route accepts
	 */
	protected $requestMethod;
	
	/**
	 * The handler that this route uses when triggered
	 */
	protected $handler;
	
	/**
	 * Constructor for the route
	 *
	 * $requestMethods 	The method accepted by this route
	 * $path 			The path for this route
	 * $handler 		The handler that gets called when this route is triggered
	 */
	public function __construct($requestMethod, $path, $handler)
	{
		$this->path = $path;
		$this->requestMethod = $requestMethod;
		$handler = 'Faylite\\TaskList\\RequestHandlers\\' . $handler . 'RequestHandler';
		$this->handler = new $handler();
	}
	
	/**
	 * The method that gets called when this route is accessed
	 */
	public function execute($query = [])
	{
		if (isset($this->handler)) {
			$this->handler->handle($_SERVER['REQUEST_METHOD'], $query);
		}
	}
	
	/**
	 * Returns true if the path matches the requested url
	 */
	public function validPath($pagePath)
	{
		return ($pagePath == $this->path);
	}
}
