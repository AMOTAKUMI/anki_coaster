import gulp from 'gulp';
import sass from 'gulp-sass';
import pleeease from 'gulp-pleeease';
import sassGlob from 'gulp-sass-glob';
import plumber from 'gulp-plumber'
import PATH from '../../config';


gulp.task('compileSCSS', ()=>{
    gulp.src(PATH.scss + '**/*.scss')
        .pipe(plumber())
        .pipe(sassGlob())
        .pipe(sass({outputStyle : 'expanded'}))
        .pipe(pleeease({
            minifier:false,
            autoprefixer:{'browsers': ['last 2 versions', 'ie >= 9', 'Android >= 4','ios_saf >= 8']}
        }))
        .pipe(gulp.dest(PATH.css));
});