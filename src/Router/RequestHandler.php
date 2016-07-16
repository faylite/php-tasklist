<?php

namespace Faylite\TaskList\Router;

/**
 * An interface that's used to handle requests to a route
 */
interface RequestHandler
{
	/**
	 * Called when a route needs to handle an request
	 *
	 * @string 	The request method that will be used
	 * @array 	Multidimensional array with the parameters from the request
	 */
	public function handle($requestMethod, $param);
}
