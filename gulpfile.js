var gulp = require('gulp');
var clean = require('gulp-clean');

gulp.task('default', function () {
    return gulp.src( [
        'libs/cmb2/languages/*.po',
        'libs/cmb2/languages/*.mo',
        'libs/puc/languages/*.po',
        'libs/puc/languages/*.mo'
    ], {read: false})
        .pipe(clean());
});