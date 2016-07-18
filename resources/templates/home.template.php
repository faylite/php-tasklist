<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>Task List</title>

		<link rel="stylesheet" type="text/css" href="/css/materialize.min.css" media="screen,projection" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="/css/main.css" />
	</head>
	<body ng-app="taskList">
		<script src="js/angular.min.js"></script>
		<script src="js/app.js"></script>
		<div class="container"/>
			<header>
				<h1>Task List</h1>
			</header>
			<div class="row" ng-controller="TasksController as tasksController">
				<div class="col s12" ng-repeat="task in tasks">
					<div class="card">
						<div class="card-content">
							<span class="card-title">{{ task.title }}</span>
							<p>{{ task.description }}</p>
						</div>
						<div class="card-action green">
							<a href="" class="white-text activator">Edit</a>
							<a href="" class="white-text" ng-click="deleteTask(task.task_id)">Delete</a>
							<a href="" class="white-text right" ng-click="markDone(task.task_id)">Done</a>
						</div>
						<div class="card-reveal">
							<span class="card-title activator">{{ task.title }}<i class="material-icons right">close</i></span>
							<p>Form goes here</p>
						</div>
					</div>
				</div>
			</div>
			<div class="fixed-action-btn" style="bottom: 45px; right; 24px;">
				<a class="btn-floating btn-large red">
					<i class="material-icons">add</i>
				</a>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="/js/materialize.min.js"></script>
	</body>
</html>
