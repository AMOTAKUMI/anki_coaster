<?php
/* ------------------------------------------------------------------
 INCLUDES FUNCTIONS
 ------------------------------------------------------------------ */
include_once dirname(__FILE__) . '/../utility/utility.php'; //Utility

/* ------------------------------------------------------------------
グローバル変数のセット
 ------------------------------------------------------------------ */
session_start();

//SESSIONから問題情報,単元情報をロード 初期値は空の配列
$gameMode = isset($_SESSION['GAME_MODE']) ? $_SESSION['GAME_MODE'] : 'mania'; //ゲームモード
$question = isset($_SESSION['LOADED_QUESTION']) ? $_SESSION['LOADED_QUESTION'] : array(); //問題集
$subject_unit = isset($_SESSION['SUBJECT_UNIT']) ? $_SESSION['SUBJECT_UNIT'] : array(); //自分が選択した単元
$game_id = isset($_SESSION['GAME_ID']) ? $_SESSION['GAME_ID'] : 0; //ゲームのユニークID（多重投稿禁止用）

//教科情報
$subject = $subject_unit[0];
$unit = $subject_unit[1];

//game.phpでpostしたJSONを受取ってresult表示する。 初期値は空の配列
//ユーザーのスコアなど
$result_data = isset($_POST['toResult__data']) ? json_decode($_POST['toResult__data']) : array();


//点数の計算 $scoreに代入する
$score = 0;

foreach ($result_data as $item) {

    $point = intval($item->judges) * 10;
    $left_time = intval($item->time);

    if ($point !== 0) {
        //10秒で×１どんどん0.4,,,と減っていく
        $point *= $left_time / 10;
    }

    $score += $point;
}
