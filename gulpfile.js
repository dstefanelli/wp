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

	gulp.paths = {
		dist: 'dist/',
		src: 'src/',
		vendors: 'dist/vendors/'
	};

var paths = gulp.paths;

gulp.pkg = require('./package.json');
var pkg = gulp.pkg;

require('require-dir')('./gulp-tasks');

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function () {

	browserSync.init({
		server: ['./', './src']
	});

	gulp.watch(paths.src + 'scss/**/*.scss', ['sass']);
	gulp.watch(paths.src + '**/*.html').on('change', browserSync.reload);
	gulp.watch(paths.src + 'js/**/*.js').on('change', browserSync.reload);

});

gulp.task('serve:dist', function () {
	browserSync.init({
		server: ['./dist']
	});
});

gulp.task('sass', ['compile-vendors'], function () {
	return gulp.src(paths.src + '/scss/style.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(gulp.dest(paths.src + 'css'))
		.pipe(cssmin())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest(paths.src + 'css'))
		.pipe(browserSync.stream());
});

gulp.task('sass:watch', function () {
	gulp.watch(paths.src + 'scss/**/*.scss', ['sass']);
});

gulp.task('default', ['serve']);


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

gulp.task('copy:vendorsCSS', function () {
	return gulp.src(vendors.css)
		.pipe(gulp.dest(paths.vendors + 'css/'));
});

gulp.task('minify:vendorsCSS', function () {
	return gulp.src([
		paths.vendors + 'css/*.css',
		'!' + paths.vendors + 'css/*.min.css'
	])
		.pipe(cssmin())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest(paths.vendors + 'css/'));
});

gulp.task('clean:vendorsCSS', function () {
	return del([
		paths.vendors + 'css/*.css',
		'!' + paths.vendors + 'css/*.min.css'
	]);
});

gulp.task('vendors:css', function (callback) {
	runSequence('copy:vendorsCSS', 'minify:vendorsCSS', 'clean:vendorsCSS', callback);
});

gulp.task('copy:vendorsJS', function () {
	return gulp.src(vendors.js)
		.pipe(gulp.dest(paths.vendors + 'js/'));
});

gulp.task('minify:vendorsJS', function () {
	return gulp.src([
		paths.vendors + 'js/*.js',
		'!' + paths.vendors + 'js/*.min.js'
	])
		.pipe(gulp.dest(paths.vendors + 'js/'))
		.pipe(uglify())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest(paths.vendors + 'js/'));
});

gulp.task('clean:vendorsJS', function () {
	return del([
		paths.vendors + 'js/*.js',
		'!' + paths.vendors + 'js/*.min.js']);
});

gulp.task('vendors:js', function (callback) {
	runSequence('copy:vendorsJS', 'minify:vendorsJS', 'clean:vendorsJS', callback);
});

gulp.task('copy:vendorsFonts', function () {
	return gulp.src(vendors.fonts)
		.pipe(gulp.dest(paths.vendors + 'fonts/'));
});

gulp.task('copy:vendorsFlags', function () {
	return gulp.src(vendors.flags)
		.pipe(gulp.dest(paths.vendors + 'flags/'));
});

gulp.task('replace:node_modules', function () {
	return gulp.src([
		paths.dist + '**/*.html',
		paths.dist + '**/*.js',
	], {
			base: './'
		})
		.pipe(replace(/node_modules+.+(\/[a-z0-9][^/]*\.js+(\'|\"))/ig, 'vendors/js$1'))
		.pipe(replace(/"vendors\/js\/(.*).js(\'|\")/ig, '"vendors/js/$1.min.js"'))
		.pipe(replace(/"..\/..\/vendors\/js\/(.*).js(\'|\")/ig, '"../../vendors/js/$1.min.js"'))
		.pipe(replace('.min.min.js', '.min.js'))
		.pipe(replace(/node_modules+.+(\/[a-z0-9][^/]*\.css+(\'|\"))/ig, 'vendors/css$1'))
		.pipe(replace(/"vendors\/css\/(.*).css(\'|\")/ig, '"vendors/css/$1.min.css"'))
		.pipe(replace(/"..\/..\/vendors\/css\/(.*).css(\'|\")/ig, '"../../vendors/css/$1.min.css"'))
		.pipe(replace('.min.min.css', '.min.css'))
		.pipe(gulp.dest('./'));
});

gulp.task('vendors', function (callback) {
	runSequence('vendors:css', 'vendors:js', 'copy:vendorsFonts', 'copy:vendorsFlags', 'replace:node_modules', callback);
});

gulp.task('clean:dist', function () {
	return del(paths.dist);
});

gulp.task('copy:css', function () {
	return gulp.src(paths.src + 'css/**/*')
		.pipe(gulp.dest(paths.dist + 'css'));
});

gulp.task('copy:img', function () {
	return gulp.src(paths.src + 'img/**/*')
		.pipe(gulp.dest(paths.dist + 'img'));
});

gulp.task('copy:js', function () {
	return gulp.src(paths.src + 'js/**/*')
		.pipe(gulp.dest(paths.dist + 'js'));
});

gulp.task('copy:views', function () {
	return gulp.src(paths.src + 'views/**/*')
		.pipe(gulp.dest(paths.dist + 'views'));
});

gulp.task('copy:html', function () {
	var framework = pkg.name.split('/')[1];
	if (framework == 'ajax') {
		return gulp.src(paths.src + 'index.html')
			.pipe(gulp.dest(paths.dist));
	} else {
		return gulp.src(paths.src + '**/*.html')
			.pipe(gulp.dest(paths.dist));
	}
});

gulp.task('copy:vendors', function () {
	return gulp.src(paths.src + 'vendors/**/*')
		.pipe(gulp.dest(paths.dist + 'vendors/'));
});

gulp.task('build:dist', function (callback) {
	runSequence('clean:dist', 'copy:css', 'copy:img', 'copy:js', 'copy:views', 'copy:html', 'copy:vendors', 'vendors', callback);
});
