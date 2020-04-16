'use strict';

/* ------------------------------------------------------------

 ---------------------------------------------------------- */

var Utility = require('./game/utility/utility');
var Gamebase = require('./game/game_base');
var GameExtension = require('./game/game_extension');

//namespace
global.GAME = {};
GAME.questions = window.questions;
GAME.userState = []; //POSTするのはこのオブジェクト

for (var i = 0; i < GAME.questions.length; i++) {
    GAME.userState[i] = {};
}

GAME.utility = new Utility();


/* ------------------------------------------------------------
 GAME START
 ---------------------------------------------------------- */
$(function () {
    new Gamebase();
    new GameExtension();
});