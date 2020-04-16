<?php

/* ---------------------------------------------------------------------------
 * 選択肢に図版存在するかどうかで
 * $answerを加工して返す
 * 画像版も考慮
 * 図版テーブルの値が空じゃない場合、図版テーブルの値を使用する。
 * その場合,test.jpgなどの値が入る
 * 大文字が混ざるので、lowerにする（ファイル名の日本語はCSV上で英数に修正）
---------------------------------------------------------------------------- */

function setAnswer($pictureID, $answerString, $dummyAnswer)
{

    $answer = array();
    $answer[1] = true; //ダミーの回答はこのキーを持たせない

    if ($pictureID !== '') {
        $pictureID = strtolower($pictureID).'.png';
        $answer[0] = $pictureID;
        if($answerString !== ''){
            $answer[0] = $pictureID . ',' . $answerString;
        }
    } else {
        $answer[0] = $answerString;
    }


    //ダミーアンサーの判定
    if($pictureID ==''&&$answerString==''&&$dummyAnswer){
        $answer[0] = $dummyAnswer;
        $answer[1] = false;
    }

    return $answer;
}