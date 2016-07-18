var app = angular.module('taskList', []);

app.controller('TasksController', function($scope, $http, $timeout) {
	// Gets the list of tasks from the server
	$scope.updateList = function() {
		$http({
			method: 'GET', url: '/api/v1/tasks/'
		}).then(function successCallback(response) {
			$scope.tasks = response.data;
		});
	};
	// Update the list on load
	$scope.updateList();
	
	// Deletes the task with the requested ID
	$scope.deleteTask = function(taskID) {
		Materialize.toast('Task deleted!', 4000);
		$scope.updateList();
	};
	
	// Updates a task with the new specified title and description
	$scope.editTask = function(taskTitle, taskDescription) {
		Materialize.toast('Task updated!', 4000);
		$scope.updateList();
	};
	
	// Marks a task as done
	$scope.markDone = function(taskID) {
		Materialize.toast('Task marked as done!', 4000);
		$scope.updateList();
	}
});
