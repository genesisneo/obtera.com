'use strict';

var config = require('./src/assets/config/settings.json'),
  gulp = require('gulp'),
  noop = require('gulp-noop'),
  sass = require('gulp-sass'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify'),
  strip = require('gulp-strip-css-comments'),
  autoprefixer = require('gulp-autoprefixer');

var browserSyncRunning = false, browserSync;
gulp.task('browserSync', function(callback) {
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
  callback();
});

gulp.task('scss', function() {
  return gulp.src(config.theme.scss.files)
    .pipe(sass({outputStyle:'compressed'}))
    .pipe(strip({preserve:false}))
    .pipe(autoprefixer())
    .pipe(gulp.dest(config.theme.scss.path))
    .pipe(browserSyncRunning ? browserSync.reload({stream:true}) : noop());
});

gulp.task('js', function() {
  return gulp.src(config.theme.js.files)
    .pipe(concat('obtera.js'))
    .pipe(uglify({"compress":true}))
    .pipe(gulp.dest(config.theme.js.path))
    .pipe(browserSyncRunning ? browserSync.reload({stream:true}) : noop());
});

gulp.task('default', gulp.series(
  gulp.parallel('js', 'scss'),
  'browserSync',
  function() {
    gulp.watch(['./**/*.php'], browserSyncRunning ? browserSync.reload : {});
    gulp.watch([config.theme.scss.path + '/*.scss'], gulp.task('scss'));
    gulp.watch([config.theme.js.path + '/scripts.js'], gulp.task('js'));
  }
));

var dist = config.dist;
gulp.task('copy', function(callback) {
  for (var key in dist) {
    var files = dist[key].files;
    var path = dist[key].path;
    files.map(function(element) {
      return gulp.src(element)
        .pipe(gulp.dest(path));
    });
  }
  callback();
});

gulp.task('dist', gulp.series(
  gulp.parallel('js', 'scss'),
  'copy'
));
