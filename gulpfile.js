var concat      = require('gulp-concat');
var del         = require('del');
var gulp        = require('gulp');
var prefix      = require('gulp-autoprefixer');
var sass        = require('gulp-sass');
var sourcemaps  = require('gulp-sourcemaps');
var uglify      = require('gulp-uglify');

var paths = {
  scripts_src: 'assets/scripts/src/**/*.js',
  scripts_dist: 'assets/scripts',
  sass_main: 'assets/styles/src/main.scss',
  sass_src: 'assets/styles/src/**/*',
  sass_dist: 'assets/styles',
};

// Not all tasks need to use streams
// A gulpfile is just another node program and you can use all packages available on npm
gulp.task('clean', function(cb) {
  // You can use multiple globbing patterns as you would with `gulp.src`
  del(['build'], cb);
});

gulp.task('sass', ['clean'], function () {
  return gulp.src(paths.sass_main)
  .pipe(sass({style: 'compact', sourcemap: true, errLogToConsole: true, includePaths: ['assets/styles/src']}))
  .pipe(prefix("last 500 version"))
  .pipe(gulp.dest(paths.sass_dist));
});

gulp.task('scripts', ['clean'], function() {
  // Minify and copy all JavaScript (except vendor scripts)
  // with sourcemaps all the way down
  return gulp.src(paths.scripts_src)
  .pipe(sourcemaps.init())
  // .pipe(uglify())
  .pipe(concat('main.min.js'))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest(paths.scripts_dist));
});

// Rerun the task when a file changes
gulp.task('watch', function() {
  gulp.watch(paths.sass_src, ['sass']);
  gulp.watch(paths.scripts_src, ['scripts']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['watch', 'sass', 'scripts']);
