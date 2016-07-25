<?php

namespace Faylite\TaskList\Controllers;

class HomeController extends Controller
{
	public function index($request, $response)
	{
		require ROOT_DIR . '/resources/templates/home.template.php';
	}
}
