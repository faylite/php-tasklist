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

		return (!empty($rows)) ? json_encode($rows) : '';
	}

	/**
	 * Puts/Updates the data requested in the $data array
	 */
	public function putData($data)
	{
		// Create a new DB connection
		$db = $GLOBALS['db'];
		$connection = new \mysqli($db['host'], $db['username'], $db['password'], $db['database']);

		// Prepare statement
		$statement = $connection->prepare('UPDATE tasks SET title=?, description=? WHERE task_id=?');
		// Bind parameters
		$statement->bind_Param('ssi', $data['title'], $data['description'], $data['id']);

		// Execute statement
		$statement->execute();
			
		// Close the connection
		$statement->close();
		$connection->close();
	}

	/**
	 * Deletes the task with the requested id
	 */
	public function deleteData($id)
	{
		// Create a new DB connection
		$db = $GLOBALS['db'];
		$connection = new \mysqli($db['host'], $db['username'], $db['password'], $db['database']);
		
		// Prepare statement
		$statement = $connection->prepare('DELETE FROM tasks WHERE task_id=?');
		// Bind parameters
		$statement->bind_Param('i', $id);
		
		// Execute statement
		$statement->execute();
			
		// Close the connection
		$statement->close();
		$connection->close();
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
		$statement = $connection->prepare('INSERT INTO tasks (title, description) VALUES (?, ?)');
		// Bind parameters
		$statement->bind_Param('ss', $data['title'], $data['description']);
		
		// Execute statement
		$statement->execute();
			
		// Close the connection
		$statement->close();
		$connection->close();
	}
}
