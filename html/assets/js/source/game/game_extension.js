/* ------------------------------------------------------------
 Answer
 ---------------------------------------------------------- */

var $dom = {
    $slideQuestionBtn: $('.js-multipleQuestionNext')
};

//touchstartに対応してたらtouchstart、してなければclick
var deviceClick = window.ontouchstart === null ? 'touchstart' : 'click';


var GameExtension = function () {
    
    this.init();
};

GameExtension.prototype.init = function () {
    this.eventBind();
};

/* ---------------------------------------------------
 EventBind
 -------------------------------------------------- */

GameExtension.prototype.eventBind = function () {
    var that = this;

    $dom.$slideQuestionBtn.on(deviceClick, function () {
        that.slideQuestion($(this));
    });

};

/* ---------------------------------------------------
 Methods
 -------------------------------------------------- */

//問題文部分で問題を可変スライドにさせる
GameExtension.prototype.slideQuestion = function ($eventTarget) {
     console.log($eventTarget.attr('data-parentQuestion'));
     var currentQ = $eventTarget.attr('data-parentQuestion');
    $('.multiple_question.'+currentQ).addClass('is-hidden');
};


/* ---------------------------------------------------
 Export Module
 -------------------------------------------------- */

module.exports = GameExtension;
