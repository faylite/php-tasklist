<?php

$app->get('/', 'HomeController:index')->setName('home');

/**
 * API v1
 */
$app->group('/api/v1', function() {
	/**
	 * Tasks API
	 */
	$this->get('/tasks', 'TasksApi:handle');
});
