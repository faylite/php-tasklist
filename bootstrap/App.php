<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

// Initilize a ini file reader
$iniReader = new Piwik\Ini\IniReader();
// Read ini file into $config array
$config = $iniReader->readFile('../config.ini');
// Store database config in a new array for ease of access
$db = $config['Database'];

/**
 * Create new Slim app
 */
$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => $config['Config']['error_reporting'],
		'db' => [
			'driver'   => isset($db['driver'])    ? $db['driver']   : 'mysql',
			'host'     => isset($db['host'])      ? $db['host']     : 'localhost',
			'database' => isset($db['database'])  ? $db['database'] : 'default',
			'username' => isset($db['username'])  ? $db['username'] : 'root',
			'password' => isset($db['password'])  ? $db['password'] : '',
			'charset'  => isset($db['charset'])   ? $db['charset']  : 'utf8',
			'collation'=> isset($db['collation']) ? $db['collation']: 'utf8_unicode_ci',
			'prefix'   => isset($db['prefix'])    ? $db['prefix']   : '',
		]
	],
]);

/**
 * Get the container
 */
$container = $app->getContainer();

/**
 * Add controllers to container
 */
$container['HomeController'] = function($container) {
	return new \Faylite\TaskList\Controllers\HomeController($container);
};

require __DIR__ . '/../src/routes.php';
