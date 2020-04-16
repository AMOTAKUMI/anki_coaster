/* ------------------------------------------------------------
 Answer
 ---------------------------------------------------------- */

var $dom = {
    $answerBtn: $('.question__answer-item'),
    $question: $('.question'),
    $skipBtn: $('.question__skip')
};

//touchstartに対応してたらtouchstart、してなければclick
var deviceClick = window.ontouchstart === null ? 'touchstart' : 'click';


var Gamebase = function () {
    this.timerID = '';
    this.sec = 10;
    this.sec_reset = 10;
    this.qLength = GAME.questions.length;
    this.init();
};

Gamebase.prototype.init = function () {
    this.eventBind();
    this.timer();//タイマー開始
};


/* ---------------------------------------------------
 Eventbind
 -------------------------------------------------- */

Gamebase.prototype.eventBind = function () {
    var that = this;

    $dom.$answerBtn.on(deviceClick, function () {
        that.answer($(this));
    });

    $dom.$skipBtn.on(deviceClick, function () {
        that.answer(false,'isSkip');
    });

};


/* ---------------------------------------------------
 ロジック系
 -------------------------------------------------- */


Gamebase.prototype.judgeAnswer = function (qnum, answer) {
    return answer === GAME.questions[qnum].collectAnswer;
};


/* ---------------------------------------------------
 Timer処理
 -------------------------------------------------- */


Gamebase.prototype.timer = function () {
    var that = this;

    if (!$('.is-active .second_hand').hasClass('is-anim')) {
        $('.second_hand').addClass('is-anim');
    }

    //初期化
    clearInterval(this.timerID);
    this.sec = this.sec_reset; //初期値に戻す

    this.timerID = setInterval(countDown, 1000);

    function countDown() {
        if (that.sec <= 0) {
            return false;
        }
        that.sec--;
    }
};


/* ---------------------------------------------------
 gameEnd
 -------------------------------------------------- */

Gamebase.prototype.gameEnd = function () {

    var f = document.forms['toResult'];
    f.method = 'POST';
    f.action = 'result.php';
    f.toResult__data.value = JSON.stringify(GAME.userState);

    setTimeout(f.submit(), 1000);
};

/* ---------------------------------------------------
 saveProps
 -------------------------------------------------- */

Gamebase.prototype.saveProps = function (isCollect, qIndex) {
    GAME.userState[qIndex].judges = isCollect ? 1 : 0; //正解時は1を記録
    GAME.userState[qIndex].time = this.sec;
};


/* ---------------------------------------------------
 showJudge
 -------------------------------------------------- */

Gamebase.prototype.showJudge = function (isCollect) {
    $('.judge').removeClass('is-active');

    if (isCollect) {
        $('.judge.is-true').addClass('is-active');
    } else {
        $('.judge.is-false').addClass('is-active');
    }

    setTimeout(function () {
        $('.judge').removeClass('is-active');
    }, 400);
};


/* ---------------------------------------------------
 Answer
 //todo:個々のロジック整理
 -------------------------------------------------- */

Gamebase.prototype.answer = function ($eventTarget, isSkip) {
    //インデックスの取得
    var that = this;
    var index = this.getIndex();
    var isCollect;

    //答えを取得
    var answer = $eventTarget ? $eventTarget.attr('data-answer') : false;
    if ($eventTarget) $eventTarget.addClass('is-clicked');


    //todo:ここのsettimeout違う書き方に。
    setTimeout(function () {
        //DOMの出し入れ
        if (index !== that.qLength - 1) {
            that.showNextQuestion(index);
        }
    }, 300);


    //メイン処理::skipは強制的に間違い扱いにする
    if (isSkip) {
        isCollect = false;
        this.saveProps(isCollect, index); //オブジェクトに値を保存
    } else {
        isCollect = this.judgeAnswer(index, answer);
        this.saveProps(isCollect, index); //オブジェクトに値を保存
        this.showJudge(isCollect);
    }

    //タイマー再開始
    this.timer();

    if (index == this.qLength - 1) {
        this.gameEnd();
    }

};


Gamebase.prototype.showNextQuestion = function (index) {
    //DOMはpropに格納
    var question = '.question';
    var nextIndex = index + 1;

    $(question + '.is-active').removeClass('is-active');
    $(question).eq(nextIndex).addClass('is-active');
};

Gamebase.prototype.getIndex = function () {
    //DOMはpropに格納
    var question = '.question';

    //現在地取得など
    var index = $('.is-active').index(question);

    return index;
};


/* ---------------------------------------------------
 Export Module
 -------------------------------------------------- */

module.exports = Gamebase;
