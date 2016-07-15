var app = angular.module('taskList', []);

app.controller('TasksController', function($scope, $http, $timeout) {
	var updateList = function() {
		$http({
			method: 'GET', url: '/request'
		}).then(function successCallback(response) {
			$scope.tasks = response.data.tasks;

			// Check for changes
			$timeout(updateList, 5000);
		});
	};
	updateList();
});
