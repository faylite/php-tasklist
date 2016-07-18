'use strict';

var gulp = require('gulp'),
	sass = require('gulp-sass'),
	bower = require('gulp-bower'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify'),
	rename = require('gulp-rename'),
	pump = require('pump');

// Runs other tasks
gulp.task('default', ['sass', 'bower', 'icons', 'materialize', 'angular', 'scripts']);

// Compiles sass in the assets directory into css and puts it in the public css directory
gulp.task('sass', function() {
	return gulp.src('./resources/assets/sass/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest('./public/css'));
});

// Watches the sass directory and calls the sass task when there were changes
gulp.task('sass:watch', function () {
	gulp.watch(['./resources/assets/sass/**/*.scss', './resources/assets/sass/*.scss'], ['sass']);
});

// Concats all the js in the the js directory
gulp.task('scripts', function() {
	return gulp.src(['./resources/assets/js/*.js', './resources/assets/js/**/*.js'])
		.pipe(concat('app.js'))
		.pipe(gulp.dest('./public/js'));
});

// Copies dev scripts into public js directory
gulp.task('scripts:dev', function() {
	return gulp.src(['./resources/assets/js/*.js', './resources/assets/js/**/*.js'])
		.pipe(gulp.dest('./public/js'));
});

// Watches the scripts directory for changes and calls scripts:dev on change
gulp.task('scripts:watch', function() {
	gulp.watch(['./resources/assets/js/**/*.js', './resources/assets/js/**/*.js'], ['scripts:dev']);
});

gulp.task('watch', ['sass:watch', 'scripts:watch']);

// Runs bower install
gulp.task('bower', function() {
	return bower()
		.pipe(gulp.dest('./bower_components'));
});

// Setup fontawesome
gulp.task('icons', ['icons:fonts', 'icons:css']);

// Setup fontawesome fonts
gulp.task('icons:fonts', function() {
	return gulp.src('./bower_components/font-awesome/fonts/**.*')
		.pipe(gulp.dest('./public/fonts'));
});

// Setup fontawesome css
gulp.task('icons:css', function() {
	return gulp.src('./bower_components/font-awesome/css/**.*')
		.pipe(gulp.dest('./public/css'));
});

// Materialize 
gulp.task('materialize', function() {
	return gulp.src('./bower_components/Materialize/dist/**/*')
		.pipe(gulp.dest('./public'));
});

// Angular setup
gulp.task('angular', function() {
	return gulp.src('./bower_components/angular/angular.min.js')
		.pipe(gulp.dest('./public/js'));
});
