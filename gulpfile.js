'use strict';

var config = require('./src/assets/config/settings.json'),
  autoprefixer = require('gulp-autoprefixer'),
  strip = require('gulp-strip-css-comments'),
  runSequence = require('run-sequence'),
  uglify = require('gulp-uglify'),
  concat = require('gulp-concat'),
  util = require('gulp-util'),
  sass = require('gulp-sass'),
  gulp = require('gulp');

var browserSyncRunning = false, browserSync;
gulp.task('browserSync', function() {
  if (!browserSyncRunning) {
    browserSync = require('browser-sync').create();
    browserSync.init({
      files: config.mamp.path + config.mamp.wordPress + config.mamp.wordPressThemes + config.mamp.themeName,
      proxy: config.mamp.domain + ':' + config.mamp.port,
      port: config.dependencies.browseSync.port,
      watch: true,
      injectChanges: true,
      open: false,
      notify: false,
      ghostMode: false,
      ui: {
        port: config.dependencies.browseSync.uiPort
      }
    });
    browserSyncRunning = true;
  }
});

gulp.task('scss', function() {
  return gulp.src(config.theme.scss.files)
    .pipe(sass({outputStyle:'compressed'}))
    .pipe(strip({preserve:false}))
    .pipe(autoprefixer())
    .pipe(gulp.dest(config.theme.scss.path))
    .pipe(browserSyncRunning ? browserSync.reload({stream:true}) : util.noop());
});

gulp.task('js', function() {
  return gulp.src(config.theme.js.files)
    .pipe(concat('obtera.js'))
    .pipe(uglify({"compress":true}))
    .pipe(gulp.dest(config.theme.js.path))
    .pipe(browserSyncRunning ? browserSync.reload({stream:true}) : util.noop());
});

gulp.task('default', function() {
  return runSequence(['js', 'scss'], 'browserSync', function() {
    gulp.watch(['./**/*.php'], browserSyncRunning ? browserSync.reload : {});
    gulp.watch([config.theme.scss.path + '/*.scss'], ['scss']);
    gulp.watch([config.theme.js.path + '/scripts.js'], ['js']);
  });
});

var dist = config.dist;
gulp.task('copy', function() {
  for (var key in dist) {
    var files = dist[key].files;
    var path = dist[key].path;
    files.map(function(element) {
      return gulp.src(element)
        .pipe(gulp.dest(path));
    });
  }
});

gulp.task('dist', function() {
  return runSequence(['js', 'scss'], 'copy');
});
