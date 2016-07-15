<?php

// Composer auto-loader
require __DIR__ . '/../vendor/autoload.php';

$request = explode('/', $_SERVER['REQUEST_URI']);

if ($request[1] == 'request')
{
	$json = '{"tasks": [
		{ "title": "Task #1", "description": "YAY, it finally works :D" },
		{ "title": "Task #2", "description": "Task description....." },
		{ "title": "Task #3", "description": "Task description....." },
		{ "title": "Task #4", "description": "Task description....." },
		{ "title": "Task #5", "description": "Task description....." },
		{ "title": "Task #6", "description": "Task description....." },
		{ "title": "Task #7", "description": "Task description....." },
		{ "title": "Task #8", "description": "Task description....." },
		{ "title": "Task #9", "description": "Task description....." },
		{ "title": "Task #10", "description": "Task description....." },
		{ "title": "Task #11", "description": "Task description....." },
		{ "title": "Task #12", "description": "Task description....." },
		{ "title": "Task #13", "description": "Task description....." },
		{ "title": "Task #14", "description": "Task description....." },
		{ "title": "Task #15", "description": "Task description....." }
	]}';
	echo $json;
}
else
{
	require __DIR__ . '/../resources/templates/home.template.php';
}
