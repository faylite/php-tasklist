'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var bower = require('gulp-bower');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var reanme = require('gulp-rename');

// Runs other tasks
gulp.task('default', ['sass', 'bower', 'icons', 'bootstrap', 'angular']);

// Compiles sass in the assets directory into css and puts it in the public css directory
gulp.task('sass', function() {
	return gulp.src('./resources/assets/sass/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest('./public/css'));
});

// Watches the sass directory and calls the sass task when there were changes
gulp.task('sass:watch', function () {
	gulp.watch('./sass/**/*.scss', ['sass']);
});

// Watches the js directory
gulp.task('scripts', function() {
	return gulp.src('./resources/assets/js/*.js')
		.pipe(concat('app.js'))
		.pipe(gulp.dest('./public/js'))
		.pipe(rename('app.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('./public/js'));
});

// Runs bower install
gulp.task('bower', function() {
	return bower()
		.pipe(gulp.dest('./bower_components'));
});

// Setup fontawesome
gulp.task('icons', function() {
	return gulp.src('./bower_components/font-awesome/fonts/**.*')
		.pipe(gulp.dest('./public/fonts'));
});

// Setup bootstrap
gulp.task('bootstrap', ['bootstrap:css', 'bootstrap:js', 'bootstrap:icons']);

// Bootstrap CSS
gulp.task('bootstrap:css', function() {
	var assets = './bower_components/bootstrap-sass/assets/';
	return gulp.src('./bower_components/bootstrap/dist/css/bootstrap.min.css')
		.pipe(gulp.dest('./public/css'));
});

// Bootstrap JS
gulp.task('bootstrap:js', function() {
	return gulp.src('./bower_components/bootstrap/dist/js/bootstrap.min.js')
		.pipe(gulp.dest('./public/js'));
});

// Bootstrap icons
gulp.task('bootstrap:icons', function() {
	return gulp.src('./bower_components/bootstrap/dist/fonts/**.*')
		.pipe(gulp.dest('./public/fonts'));
});

// Angular setup
gulp.task('angular', function() {
	return gulp.src('./bower_components/angular/angular.min.js')
		.pipe(gulp.dest('./public/js'));
});
