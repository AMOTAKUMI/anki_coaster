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


    //viewArray($questions);

    $toDOM = array();
    $toJSON = array();

    $count = 0;

    //問題数分、配列をプッシュしていく
    foreach ($questions as $item) {

        //選択肢が空の場合、ダミーの選択肢を入れるので、
        //setAnswerの引数に$dummyAnswerも渡しておく
        //最大6択入れる。

        $answer = array(
            setAnswer($item[19], $item[17], $dummyAnswer[0]),
            setAnswer($item[22], $item[20], $dummyAnswer[1]),
            setAnswer($item[25], $item[23], $dummyAnswer[2]),
            setAnswer($item[28], $item[26], $dummyAnswer[3]),
            setAnswer($item[31], $item[29], $dummyAnswer[4]),
            setAnswer($item[34], $item[32], $dummyAnswer[5]),
        );

        //正解をシャッフル前に保存
        //正解 $item[35] -> 何番目かが入る
        $collectIndex = $item[35] - 1;
        $collectAnswer = $answer[$collectIndex][0];

        //問題文の加工
        $questionTxt = $item[8];
        $ttlImg = $item[10];

        //問題文がスライドするかどうか
        $multipleQuestion = ($item[40] !== '');
        $multipleQuestion_ttl = $item[40];
        $multipleQuestion_body = preg_replace("/\n/", "<br>", $item[41]);


        //シャッフル
        shuffle($answer);

        //加工後配列
        $toDOM[$count]["qnum"] = $count + 1;
        $toDOM[$count]["qttl"] = $questionTxt;
        $toDOM[$count]["ttlImg"] = $ttlImg;
        $toDOM[$count]["answer"] = $answer;
        $toDOM[$count]["collectAnswer"] = $collectAnswer;
        $toDOM[$count]["multipleQuestion"] = $multipleQuestion;

        if ($multipleQuestion) {
            $toDOM[$count]["multipleQuestion_ttl"] = $multipleQuestion_ttl;
            $toDOM[$count]["multipleQuestion_body"] = $multipleQuestion_body;
        }


        //json用
        $toJSON[$count]["collectAnswer"] = $collectAnswer;

        $count++;
    }


    return array(
        "toDOM" => $toDOM,
        "toJSON" => $toJSON
    );
}


