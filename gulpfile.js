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
	del = require("del"),

	//Propios

	gulp.task("default", function (callback) {
		runSequence("clean", "js", "scss", "images");
	});

gulp.task("default-dev", function (callback) {
	runSequence("clean", "js", "scss", "images");
});

gulp.task("js", function () {
	var tasks = getBundles(regex.js).map(function (bundle) {
		return gulp.src(bundle.inputFiles, {
				base: "."
			})
			.pipe(concat(bundle.outputFileName))
			.pipe(gulp.dest("."))
			.pipe(babel())
			.pipe(uglify())
			.pipe(rename(function (path) {
				path.extname = ".min.js"
			}))
			.pipe(gulp.dest("."));
	});
	return merge(tasks);
});

gulp.task("scss", function () {
	return gulp.src(bundle.inputFiles, {
			base: "."
		})
		.pipe(sass())
		.pipe(concat(bundle.outputFileName))
		.pipe(gulp.dest("."))
		.pipe(cssmin())
		.pipe(rename(function (path) {
			path.extname = ".min.css"
		}))
		.pipe(gulp.dest("."))
		.pipe(browserSync.stream());
});

gulp.task("clean", function () {
	return del(["./**/*"]);
});

gulp.task("images", function () {
	return gulp.src('/assets/images/**/*')
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
		.pipe(gulp.dest('/assets/images/**/*'))
		.pipe(browserSync.stream());
});

var fontName = 'icon';

gulp.task('webfonts', function () {
	return gulp.src('assets/webfonts/*.svg')
		.pipe(iconfontTemplate({
			fontName: fontName,
			targetPath: './css/icon.html',
			fontPath: '../'
		}))
		.pipe(iconfontCss({
			fontName: fontName,
			targetPath: 'assets/css/icon.css',
			fontPath: '../'
		}))
		.pipe(iconfont({
			fontName: fontName,
			formats: ['svg', 'ttf', 'eot', 'woff', 'woff2'],
			normalize: true,
			fontHeight: 1001
		}))
		.pipe(gulp.dest('assets/webfonts'))
		.pipe(browserSync.stream());
});

/*var dllName = "Ats.WebUI.dll";
var iisPort = 50347;*/

gulp.task('browser-sync', function () {
	browserSync.init({
		port: iisPort + 1
	});

	gulp.watch(["Content/CoreUI/scss/**/*.scss"], ["coreui:scss", "scss"]).on('change', browserSync.reload);
	gulp.watch(["Content/css/**/*.scss"], ["scss"]).on('change', browserSync.reload);
	gulp.watch('Content/js/**/*.js', ["js"]).on('change', browserSync.reload);
	gulp.watch('Content/images/**/*.*', ["images"]).on('change', browserSync.reload);
	gulp.watch('Content/webfonts/**/*.*', ["webfonts"]).on('change', browserSync.reload);
	gulp.watch('Content/CoreUI/ats-components.html', ["snippets"]).on('change', browserSync.reload);
	gulp.watch('Views/**/*.cshtml').on('change', browserSync.reload);

	gulp.watch("bin/" + dllName).on('change', browserSync.reload);
});


//Vendors

/*gulp.task('vendors', ['vendors:css', 'vendors:js', 'vendors:fonts'])

gulp.task('vendors:css', function () {
	return gulp.src(vendors.css)
		.pipe(gulp.dest('wwwroot/vendors/css/'));
});

gulp.task('vendors:js', function () {
	return gulp.src(vendors.js)
		.pipe(gulp.dest('wwwroot/vendors/js/'));
});

gulp.task('vendors:fonts', function () {
	return gulp.src(vendors.fonts)
		.pipe(gulp.dest('wwwroot/vendors/fonts/'));
});*/




/*//CoreUI

gulp.task('coreui', ['coreui:scss', 'coreui:js', 'coreui:vendors']);

gulp.task('coreui:scss', function () {
	return gulp.src('Content/CoreUI/scss/style.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(gulp.dest('Content/CoreUI/css'))
		.pipe(cssmin())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest('Content/CoreUI/css'))
		.pipe(gulp.dest('wwwroot/CoreUI/css'))
		.pipe(browserSync.stream());
});

gulp.task('coreui:js', function () {
	return gulp.src(['Content/CoreUI/js/*.js', '!Content/CoreUI/src/js/*.min.js'])
		.pipe(uglify())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest('wwwroot/CoreUI/js'))
		.pipe(browserSync.stream());
});

gulp.task('coreui:vendors', function () {
	return gulp.src('Content/CoreUI/vendors/**')
		.pipe(gulp.dest('wwwroot/CoreUI/vendors/'))
		.pipe(browserSync.stream());
});

//Snippet html custom components

gulp.task('snippets', function () {
	return gulp.src('Content/CoreUI/ats-components.html')
		.pipe(gulp.dest('wwwroot/ui-snippets'))
		.pipe(browserSync.stream());
});




//Functions

function getBundles(regexPattern) {
	return bundleconfig.filter(function (bundle) {
		return regexPattern.test(bundle.outputFileName);
	});
}*/
