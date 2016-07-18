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
		<header>
			<nav>
				<div class="nav-wrapper green darken-1">
					<a href="#" class="brand-logo center">Task List</a>
				</div>
			</nav>
		</header>
		<main>
			<div class="container"/>
				<div class="row" ng-controller="TasksController as tasksController">
					<div class="col s12" ng-repeat="task in tasks">
						<div class="card" ng-if="task.status != 'done'">
							<div class="card-content flow-text">
								<span class="card-title">{{ task.title }}</span>
								<p>{{ task.description }}</p>
							</div>
							<div class="card-action green">
								<a href="" class="white-text waves-effect btn-flat activator">Edit</a>
								<a href="" class="white-text waves-effect waves-red btn-flat" ng-click="deleteTask(task.task_id)">Delete</a>
								<a href="" class="white-text waves-effect btn-flat right" ng-click="markDone(task.task_id)">Done</a>
							</div>
							<div class="card-reveal">
								<span class="card-title activator">{{ task.title }}<i class="material-icons right">close</i></span>
								<p>Form goes here</p>
							</div>
						</div>
					</div>
					<div class="col s12" ng-repeat="task in tasks">
						<div class="card" ng-if="task.status == 'done'">
							<div class="card-content flow-text">
								<span class="card-title"><strike>{{ task.title }}</strike></span>
								<p><strike>{{ task.description }}</strike></p>
							</div>
							<div class="card-action green darken-2">
								<a href="" class="white-text waves-effect waves-red btn-flat" ng-click="deleteTask(task.task_id)">Delete</a>
							</div>
							<div class="card-reveal">
								<span class="card-title activator">{{ task.title }}<i class="material-icons right">close</i></span>
								<p>Form goes here</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="fixed-action-btn modal-trigger" href="#newtaskmodal" style="bottom: 45px; right: 24px;">
				<a class="btn-floating btn-large red">
					<i class="large material-icons">add</i>
				</a>
			</div>
			<div id="newtaskmodal" class="modal" ng-controller="NewTaskController">
				<div class="modal-content">
					<div class="row">
						<form class="col s12">
							<div class="row">
								<div class="input-field col s12">
									<input id="title" ng-model="title" type="text" length="50">
									<label for="title">Title</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea id="description" ng-model="description" class="materialize-textarea"></textarea>
									<label for="description">Description</label>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<a ng-click="createTask()" class=" modal-action modal-close waves-effect waves-green btn-flat">Create</a>
					<a ng-click="" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
				</div>
			</div>
		</main>
		<footer class="page-footer green darken-2">
			<div class="container">
			</div>
			<div class="footer-copyright">
				<div class="container">
					&copy 2016 Faylite
					<a class="grey-text text-lighten-4 right" href="https://github.com/faylite">Github</a>
				</div>
			</div>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="/js/materialize.min.js"></script>
		<script>
		$(document).ready(function() {
			$('.modal-trigger').leanModal();
			$('ui.tabs').tabs();
		});
		</script>
	</body>
</html>
