<?php

namespace Faylite\TaskList\Controllers;

class Controller
{
	protected $container;

	public function __construct($container)
	{
		$this->container = $container;
	}

	public function __get($property)
	{
		// Hack!
		// Uses magic getter to get property of container if it exists
		if($this->container->{$property}) {
			return $this->container->{$property};
		}
	}
}
