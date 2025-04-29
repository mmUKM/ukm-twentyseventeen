var gulp = require('gulp');
var clean = require('gulp-clean');
 
gulp.task('default', function () {
    return gulp.src('packages/cmb2/languages/*', {read: false})
        .pipe(clean());
});