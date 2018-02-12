'use strict';

var gulp = require('gulp'),
	browserSync = require('browser-sync').create(),
	reload = browserSync.reload,
	gulpLoadPlugins = require('gulp-load-plugins'),
	manifest = require('gulp-manifest'),
	pug = require('gulp-pug'),
	sass = require('gulp-sass'),
	concat = require('gulp-concat'),
	cssmin = require('gulp-cssmin'),
	runSequence = require('run-sequence'),
	iconfont = require('gulp-iconfont'),
	consolidate = require('gulp-consolidate'),
	imagemin = require('gulp-imagemin'),
	runTimestamp = Math.round(Date.now() / 1000),
	swPrecache = require('sw-precache'),
	jeditor = require("gulp-json-editor"),
	uglify = require('gulp-uglify'),
	concat = require('gulp-concat'),
	clean = require('gulp-clean');

var $ = gulpLoadPlugins();
/*
 	SASS
 */

gulp.task('sass', function () {
	return gulp.src('./assets/src/scss/**/*.scss')
		.pipe(sass({
			indentType: "tab",
			indentWidth: "1",
			outputStyle: "expanded"
		}).on('error', sass.logError))
		.pipe(gulp.dest('./assets/css/'))
		.pipe(browserSync.stream());
});

/*
	IMAGES
*/
gulp.task("images", function () {
	return gulp.src('./assets/src/images/**/*')
		.pipe($.imagemin([
		imagemin.jpegtran({
				progressive: true
			}),
		imagemin.optipng({
				optimizationLevel: 5
			}),
		imagemin.svgo({
				plugins: [{
					removeViewBox: true
				}]
			}),
	], {
			verbose: true
		}))
		.pipe(gulp.dest('./assets/images/'))
		.pipe(browserSync.stream());
});

/*
	WEBFONTS
*/
gulp.task('icons', function () {
	return gulp.src('./assets/src/svg/*.svg')
		.pipe(iconfont({
			fontName: 'icons',
			prependUnicode: true,
			normalize: true,
			fontHeight: 1001,
			formats: ['woff', 'woff2', 'ttf'],
			timestamp: runTimestamp,
		}))
		.on('glyphs', function (glyphs, options) {
			gulp.src('./assets/src/svg/icons.scss')
				.pipe(consolidate('lodash', {
					glyphs: glyphs,
					fontName: 'icons',
					fontPath: '../fonts/',
					className: 'icon'
				}))
				.pipe(gulp.dest('./assets/src/scss/'));
		})
		.pipe(gulp.dest('./assets/fonts/'))
		.pipe(browserSync.stream());
});

/*
	SCRIPTS
 */
gulp.task('scripts', function () {
	return gulp.src('./assets/src/js/**/*.js')
		.pipe(gulp.dest('./assets/js/'))
		.pipe(browserSync.stream());
});

/*
	COPY FONTS
*/
/*gulp.task( 'fonts', function(){
	return gulp.src('./src/resources/fonts/*.*')
		.pipe( gulp.dest('./dist/resources/fonts/') )
		.pipe( browserSync.stream() );
});*/
/*
 	BORRAR CARPETAS
 */
gulp.task('clean', function () {
	return gulp.src(['./assets/css/', './assets/js', '.assets/webfonts/'], {
			read: false
		})
		.pipe(clean())
		.pipe(browserSync.stream());
});

/*
	BROWSER-SYNC
*/

gulp.task('browsersync', function () {
	//Iniciamos el server
	browserSync.init({
		injectChanges: true,
		proxy: "localhost/wp"

	});
	//Generamos el watch
	gulp.watch('./assets/src/scss/**/*.scss', ['sass']);
	gulp.watch('./assets/src/svg/*.svg', ['icons', 'sass']);
	gulp.watch('./assets/src/scripts/**/*.*', ['scripts']);
});

gulp.task('default', function () {
	runSequence('icons', 'sass', 'scripts', 'browsersync');
});
