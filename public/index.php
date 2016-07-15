<?php

// Composer auto-loader
require __DIR__ . '/../vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Task List</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/css/main.css" />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<script src="js/angular.min.js"></script>
		<script src="js/app.js"></script>
		<div ng-app="taskList" class="container"/>
		<header>
			<h1>Task List</h1>
		</header>
			<div ng-controller="TasksController as tasksController">
				<ul class="list-group">
					<li class="list-group-item" ng-repeat="task in tasksController.tasks">
						<h1>{{ task.title }}</h1>
						<p>{{ task.description }}</p>
					</li>
				</ul> 
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>

