var gulp = require("gulp"),
	browserSync = require('browser-sync').create(),
	reload = browserSync.reload(),
	concat = require("gulp-concat"),
	cssmin = require("gulp-cssmin"),
	uglify = require("gulp-uglify"),
	iconfont = require("gulp-iconfont"),
	iconfontCss = require("gulp-iconfont-css"),
	iconfontTemplate = require("gulp-iconfont-template"),
	imagemin = require('gulp-imagemin'),
	rename = require("gulp-rename"),
	runSequence = require("run-sequence"),
	sass = require("gulp-sass"),
	del = require("del");

/*
 	SASS
 */

gulp.task('sass', function (done) {
	return gulp.src('/assets/scss/**/*.scss')
		.pipe(sass({
			indentType: "tab",
			indentWidth: "1",
			outputStyle: "expanded"
		}).on('error', sass.logError))
		.pipe(gulp.dest('assets/css/'))
		.pipe(browserSync.stream());
});

/*
	IMAGES
*/
gulp.task("images", function () {
	return gulp.src('./assets/src/images/**/*')
		.pipe(imagemin([
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
		.pipe(gulp.dest('./assets/images/**/*'))
		.pipe(browserSync.stream());
});

/*
	WEBFONTS
*/
var fontName = 'icon';

gulp.task('webfonts', function () {
	return gulp.src('/assets/svg/*.svg')
		.pipe(iconfontTemplate({
			fontName: fontName,
			targetPath: '/assets/css/icon.html',
			fontPath: '../'
		}))
		.pipe(iconfontCss({
			fontName: fontName,
			targetPath: '/assets/css/icon.css',
			fontPath: '../'
		}))
		.pipe(iconfont({
			fontName: fontName,
			formats: ['svg', 'ttf', 'eot', 'woff', 'woff2'],
			normalize: true,
			fontHeight: 1001
		}))
		.pipe(gulp.dest('/assets/webfonts'))
		.pipe(browserSync.stream());
});

/*
	SCRIPTS
 */
gulp.task('scripts', function () {
	return gulp.src('/assets/src/js/**/*')
		.pipe(gulp.dest('/assets/js/'))
		.pipe(browserSync.stream());
});

/*
 	BORRAR CARPETAS
 */
gulp.task('clean', function () {
	return gulp.src(['/assets/**', '!/asssets/src', '!/assets/lib'], {
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
	gulp.watch('/assets/src/sass/**/*.scss', ['sass']);
	gulp.watch('/assets/src/sprites/*.svg', ['webfonts']);
	gulp.watch('/assets/src/images/**/*.*', ['images']);
	gulp.watch('/assets/src/scripts/**/*.*', ['scripts']);
});

gulp.task('default', function () {
	runSequence('webfonts', 'images', 'sass', 'scripts', 'browsersync');
});
