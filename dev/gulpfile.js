// ******************** Variables
// Dependencies
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var newer = require('gulp-newer');
var cache = require('gulp-cache');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var uncss = require('gulp-uncss');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var browserSync = require('browser-sync');

// ******************** Change this
// Paths
var IN = {
  sass: 'assets/scss/'
}

var OUT = {
  css: 'assets/css/'
}

// Error
function customPlumber(errTitle) {
  return plumber({
    errorHandler: notify.onError({
          // Customizing error title
          title: "Error running " + errTitle || "Error running Gulp"
        })
    });
}

// ******************** Tasks
// Sass
gulp.task('sass', function() {
  return gulp.src(IN.sass + 'style.scss')
    .pipe(autoprefixer())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(concat('style.css', {newLine: ''}))
    .pipe(gulp.dest(OUT.css));
});

// Cache
gulp.task('cache', function () {
  return cache.clearAll();
});

// Browser-sync
gulp.task('browserSync', ['sass', 'cache'], function() {
  browserSync.init([OUT.css + '*', IN.sass + '*', './*.html'], {
    server: {
        baseDir: "./"
    }
  })
});

// Watch
gulp.task('watch', ['browserSync'], function() {
  gulp.watch([IN.sass + '*.scss'], ['sass']);
  gulp.watch( './*.html' ).on( 'change', function( file ) {
    browserSync.reload();
  });
})

// Default
gulp.task('default', ['watch']);
