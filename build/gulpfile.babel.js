import gulp from 'gulp';
import PATH from './config';
import requireDir from 'require-dir';

requireDir('./tasks',{recurse: true});

gulp.task('watch', ()=>{
    gulp.watch( PATH.scss + '**/*.scss',['compileSCSS']);
    gulp.watch( PATH.js + '**/*.js',['browserify']);
});



gulp.task('default', [
    'watch',
    'browserSync'
]);