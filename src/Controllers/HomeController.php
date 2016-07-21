<?php

namespace Faylite\TaskList\Controllers;

class HomeController
{
	public function index($response)
	{
		require ROOT_DIR . '/resources/templates/home.template.php';
	}
}
