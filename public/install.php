<?php

// Composer auto-loader
require __DIR__ . '/../vendor/autoload.php';

$iniData = array(
	'Database' => array(
		'username' => 'user',
		'password' => 'password',
		'database' => 'tasks_db',
		'host' => 'localhost'
	)
);

$iniWriter = new Piwik\Ini\IniWriter();
$iniWriter->writeToFile('../config.ini', $iniData);
