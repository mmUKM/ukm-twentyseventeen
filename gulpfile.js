var gulp = require('gulp');
var clean = require('gulp-clean');

gulp.task('default', function () {
    return gulp.src( [
        'packages/cmb2/languages/*.po',
        'packages/cmb2/languages/*.mo',
        'packages/puc/languages/*.po',
        'packages/puc/languages/*.mo'
    ], {read: false})
        .pipe(clean());
});