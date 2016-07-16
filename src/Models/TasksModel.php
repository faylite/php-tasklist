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
		/*
		return '{"tasks": [
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
	]}';*/
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
