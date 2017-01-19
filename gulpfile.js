'use strict';

var gulp = require('gulp');
var baseDir = '.';

gulp.task('sass', function () {

    var sass = require('gulp-sass');
    var sourcemaps = require('gulp-sourcemaps');
    return gulp.src([baseDir+'/assets/sass/app.sass', baseDir+'/assets/sass/vendor.sass'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(baseDir+'/assets/css/'));

});

gulp.task('default', function () {
    gulp.watch(baseDir+'/assets/sass/**/*.sass', ['sass']);
});