<?php

// Composer auto-loader
require __DIR__ . '/../vendor/autoload.php';

// Create a constant for the root directory
define('ROOT_DIR', __DIR__ . '/../');

use Faylite\TaskList\App;

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

$app = new App();

$app->get('/', [ Faylite\TaskList\Controllers\HomeController::class, 'index' ]);

$app->map('/api/v1/tasks', function() {
	(new Faylite\TaskList\Api\TasksApi())->handle();
}, ['GET', 'POST']);

$app->run();
