<?php
/* ---------------------------------------------------------------------------
 * CSVから実際に使う部分の配列の加工
---------------------------------------------------------------------------- */
function makeQuestionArray($_CSV, $_dummyAnswerCSV)
{
    //------------------------------------------
    // CSV加工
    //------------------------------------------

    //問題部分は$csv[4]以降。
    //array_spliceするのでコピーしておく。
    $questions = $_CSV;
    array_splice($questions, 0, 4);

    //$dummyAnswerもcsvで読み込んだもの
    $dummyAnswer = $_dummyAnswerCSV[0];
    shuffle($dummyAnswer); //ダミーをシャッフル


    $toDOM = array();
    $toJSON = array();

    $count = 0;
    

    foreach ($questions as $item) {

        //選択肢が空の場合、ダミーの選択肢を入れるので、
        //setAnswerの引数に$dummyAnswerも渡しておく
        //最大6択入れる。

        $answer = array(
            setAnswer($item[19],$item[17],$dummyAnswer[0]),
            setAnswer($item[22],$item[20],$dummyAnswer[1]),
            setAnswer($item[25],$item[23],$dummyAnswer[2]),
            setAnswer('','',$dummyAnswer[3]),
            setAnswer('','',$dummyAnswer[4]),
            setAnswer('','',$dummyAnswer[5]),
        );

        //正解をシャッフル前に保存
        //正解 $item[26] -> 何番目かが入る
        $collectIndex = $item[26] - 1;
        $collectAnswer = $answer[$collectIndex][0];

        //問題文の加工
        $questionTxt = $item[8];
        $ttlImg = $item[10];
        $commentary = $item[28];
        $commentaryImg = $item[30];


        //シャッフル
        shuffle($answer);

        //加工後配列
        $toDOM[$count]["qnum"] = $count + 1;
        $toDOM[$count]["qttl"] = $questionTxt;
        $toDOM[$count]["ttlImg"] = $ttlImg;
        $toDOM[$count]["answer"] = $answer;
        $toDOM[$count]["collectAnswer"] = $collectAnswer;
        $toDOM[$count]["commentary"] = $commentary;
        $toDOM[$count]["commentaryImg"] = $commentaryImg;
        $toDOM[$count]["multipleQuestion"] = false;

        $toJSON[$count]["collectAnswer"] = $collectAnswer;

        $count++;
    }


    return array(
        "toDOM" => $toDOM,
        "toJSON" => $toJSON
    );
}


