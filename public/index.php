<?php

// Composer auto-loader
require __DIR__ . '/../vendor/autoload.php';

// Create a constant for the root directory
define('ROOT_DIR', __DIR__ . '/../');

use Faylite\TaskList\Router\Router;
use Faylite\TaskList\Router\Route;

// Initilize a ini file reader
$iniReader = new Piwik\Ini\IniReader();
// Read ini file into $config array
$config = $iniReader->readFile('../config.ini');
// Store database config in a new array for ease of access
$db = $config['Database'];

/*
// Remove ? get parameters from request url, use query variable for that
$request = strstr($_SERVER['REQUEST_URI'], '?', true);
// Trim trailing slashes
$request = trim($request, '/');
// Sanitize url
$request = filter_var($request, FILTER_SANITIZE_URL);
// Explode url into array
$request = explode('/', $request);
 */

$router = new Router();
$router->addRoute(new Route('GET', '', 'TasksList'));
$router->addRoute(new Route('GET', 'api/v1/tasks', 'TasksApi'));
$router->execute();
