var app = angular.module('taskList', []);

app.controller('TasksController', function($scope, $http) {
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
		$http({
			method: 'POST',
			url: '/api/v1/tasks/',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			data: $.param({ action: 'delete', id: taskID })
		}).then(function successCallback(response) {
			Materialize.toast('Task deleted!', 4000);
			$scope.updateList();
		});
	};
	
	// Updates a task with the new specified title and description
	$scope.editTask = function(taskTitle, taskDescription) {
		$http({
			method: 'POST',
			url: '/api/v1/tasks/',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			data: $.param({ action: 'update', title: taskTitle, description: taskDescription })
		}).then(function successCallback(response) {
			Materialize.toast('Task updated!', 4000);
			$scope.updateList();
		});
	};
	
	// Marks a task as done
	$scope.markDone = function(taskID) {
		Materialize.toast('Task marked as done!', 4000);
		$scope.updateList();
	}
	
	// Listener for update event from other controllers
	$scope.$on('update', function(event, args) { $scope.updateList(); });
});

// Controller for the new task creation form
app.controller('NewTaskController', function($scope, $rootScope, $http) {
	$scope.title;
	$scope.description;
	
	$scope.createTask = function() {
		$http({
			method: 'POST',
			url: '/api/v1/tasks/',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			data: $.param({ action: 'create', title: $scope.title, description: $scope.description })
		}).then(function successCallback(response) {
			Materialize.toast('Created new task', 4000);
			// Notify other controllers to update the list
			$rootScope.$broadcast('update', null);
		});
	};
});
