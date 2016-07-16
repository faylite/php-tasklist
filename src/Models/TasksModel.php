<?php

namespace Faylite\TaskList\Models;

class TasksModel implements Model
{
	/**
	 * Gets the data requested in the $data array and returns array with data
	 */
	public function getData($data)
	{
		$db = $GLOBALS['db'];
		$connection = new \mysqli($db['host'], $db['username'], $db['password'], $db['database']);
		
		// Create the table if it doesn't exist
		$connection->query(file_get_contents(ROOT_DIR . 'resources/sql/create_tasks_table.sql'));
		// Select all the tasks
		$result = $connection->query('SELECT * FROM tasks');
		
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$rows[] = $row;
		}

		$connection->close();

		return (!empty($rows)) ? json_encode($rows) : 'No Tasks';
	}

	/**
	 * Puts/Updates the data requested in the $data array
	 */
	public function putData($data)
	{
		
	}

	/**
	 * Deletes the data requested in the $data array
	 */
	public function deleteData($data)
	{
		
	}

	/**
	 * Posts/Creates the data requested in the $data array
	 */
	public function postData($data)
	{
		// Create a new DB connection
		$db = $GLOBALS['db'];
		$connection = new \mysqli($db['host'], $db['username'], $db['password'], $db['database']);
		
		// Prepare statement
		$statement = $connection->prepare('INSERT INTO tasks (title, description) VALUES (:title, :description)');
		// Bind parameters
		$statement->bindParam(':title', $data['title']);
		$statement->bindParam(':description', $data['description']);
		
		// Execute statement
		$statement->execute();
			
		// Close the connection
		$statement->close();
	}
}
