<?php

namespace Faylite\TaskList\Models;

/**
 * And interface for the models
 */
interface Model
{
	/**
	 * Gets the data requested in the $data array and returns array with data
	 */
	public function getData($data);

	/**
	 * Puts/Updates the data requested in the $data array
	 */
	public function putData($data);

	/**
	 * Deletes the data requested in the $data array
	 */
	public function deleteData($data);

	/**
	 * Posts/Creates the data requested in the $data array
	 */
	public function postData($data);
}
