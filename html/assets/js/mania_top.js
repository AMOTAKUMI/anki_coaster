$(function () {

    var scores = JSON.parse(localStorage.getItem('scores')) || [];

    //最高点
    if(scores[0]){
        $('.ttl__highscore').find('.num').text(scores[0].score);
    }
});