import gulp from 'gulp';
import browserSync from 'browser-sync'
import PATH from '../../config';


gulp.task('browserSync', ()=>{
    browserSync({
        proxy: PATH.proxy
    });

    // srcフォルダ以下のファイルを監視
    gulp.watch([PATH.root+'**'], function () {
    browserSync.reload();
    });
});
