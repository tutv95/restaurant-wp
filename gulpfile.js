// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var livereload = require('gulp-livereload');
var minifyCss = require('gulp-minify-css');

// Compile Our Sass
gulp.task('sass', function () {
	return gulp.src('assets/sass/style.scss')
		.pipe(sass())
		.pipe(gulp.dest(''))
		.pipe(livereload());
});

// Watch Files For Changes
gulp.task('watch', function () {
	livereload.listen();
	//gulp.watch('assets/js/*.js', ['scripts']);
	gulp.watch(['assets/sass/**/*'], ['sass']);
});

// Default Task
//gulp.task('default', ['sass', 'scripts', 'watch']);
gulp.task('default', ['sass', 'watch']);