<?php

// Home page
$app->get('/', 'HomeController:index')->setName('home');

/**
 * API v1
 */
$app->group('/api/v1', function() {
	/**
	 * Tasks API
	 */
	// Get tasks
	$this->get('/tasks', 'TasksApi:get');

	// Create task
	$this->post('/tasks/create', 'TasksApi:post');

	// Update task
	$this->post('/tasks/{id:[0-9]+}', 'TasksApi:update');
	
	// Mark task as done
	$this->put('/tasks/{id:[0-9]+}/done', 'TasksApi:markDone');

	// Delete task
	$this->delete('/tasks/{id:[0-9]+}', 'TasksApi:delete');
});
