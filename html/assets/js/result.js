$(function () {

    //todo::タワー用のローカルストレージとマニア用のローカルストレージを分ける
    //ankiland_mania_scores
    //ankiland_tower_scores

    //sessionごとのGAME_IDも保存しておいて多重投稿を防止
    //localstorage周り
    var scores = JSON.parse(localStorage.getItem('scores')) || [];
    var currentScore = window.currentScore;
    var game_id = window.gameId;

    var currentInfo = {score: currentScore, gameId: game_id};

    //直前のものとgame_idが違う場合のみ、配列にpush
    if (scores.length == 0 || !is_samegame()) {
        scores.push(currentInfo);
    }


    //scoresの中のgameIdと今のgameidを比べて
    //同一ゲームチェックをする
    function is_samegame() {
        var is_same = false;

        for (i = 0; i < scores.length; i++) {
            if(scores[i].gameId == game_id){
                is_same = true;
            }
        }
        return is_same;
    }

    // scoreで降順にソート
    scores = _.sortBy(scores, function (item) {
        return -item.score;
    });

    //10個以上になったら最下位を切り捨て
    if (scores.length > 10) {
        scores.pop();
    }

    localStorage.setItem('scores', JSON.stringify(scores));


    //モーダルオープン
    $('.js-commentaryBtn').on('click', function () {
        if ($('.commentary').hasClass('is-active')) {
            $('.commentary').removeClass('is-active');
            $('.result__cont').addClass('is-active');
        } else {
            $('.commentary').addClass('is-active');
            $('.result__cont').removeClass('is-active');
        }
        //return false;
    });


    //ランキング表示
    $('.ranking__scorelist-item').each(function (i) {
        if (scores[i]) {
            $(this).find('.number').text(scores[i].score);
            $(this).find('.id').text('ID:'+scores[i].gameId);
        }
    });
    
    console.log(scores);

});