<?php

/**
 * GetApi.php
 *
 * Used for classes that returns data to http requests
 */
namespace Faylite\TaskList\Api;

interface ApiRequestHandler
{
	public function get($getVars);

	public function post($postVars);

	public function put($putVars);

	public function delete($deleteVars);
}
