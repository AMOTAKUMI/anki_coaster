import gulp from 'gulp';
import plumber from 'gulp-plumber'
import concat from 'gulp-concat';
import browserify from 'browserify';
import source from 'vinyl-source-stream';
import PATH from '../../config';


gulp.task('concat', ()=>{
    let files = [
        PATH.js+'lib/easeljs-0.8.2.min.js',
        PATH.js+'lib/tweenmax.min.js',
        PATH.js+'lib/gsap_scrolltoplugin.js',
        PATH.js+'lib/js.cookie.js',
        PATH.js+'lib/jquery.colorbox-min.js'
    ];
    gulp.src(files)
        .pipe(plumber())
        .pipe(concat('libs.js'))
        .pipe(gulp.dest(PATH.js+'lib/'));
});

gulp.task('browserify', ()=>{
    return browserify(PATH.js + 'source/game.js')
        .bundle()
        .pipe(source('./game_bundle.js'))
        //.pipe(buffer())
        //.pipe(uglify())
        .pipe(gulp.dest(PATH.js));
});
