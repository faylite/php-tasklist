<?php

namespace Faylite\TaskList;

class Router 
{
	/**
	 * The current path accessed by the client
	 */
	protected $path;
	
	/**
	 * The routes that the application has
	 */
	protected $routes = [];
	
	/**
	 * The request methods each route allows
	 */
	protected $methods = [];
	
	/**
	 * Sets the current path accessed by the client
	 */
	public function setPath($path = '/')
	{
		$this->path = $path;
	}
	
	/**
	 * Adds a new route to the routes array that allows the methods specified
	 */
	public function addRoute($uri, $handler, array $methods = ['GET'])
	{
		$this->routes[$uri] = $handler;
		$this->methods[$uri] = $methods;
	}
	
	/**
	 * Returns the response for the requested uri
	 */
	public function getResponse()
	{
		// Check if the route is set or else throw not found exception
		if (!isset($this->routes[$this->path])) {
			throw new RouteNotFoundException;
		}
		
		// Check if the request method is in the array of allowed methods for the
		// requested path
		if (!in_array($_SERVER['REQUEST_METHOD'], $this->methods[$this->path])) {
			throw new MethodNotAllowedException;
		}
		
		// Return the route at the request path
		return $this->routes[$this->path];
	}
}
