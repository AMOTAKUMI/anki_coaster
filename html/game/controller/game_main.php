<?php

/* ------------------------------------------------------------------
 INCLUDES FUNCTIONS
 ------------------------------------------------------------------ */

//GAME-MODE 暗記マニアかタワーでsetting,makeQuestionArrayを分岐
$gameMode = strpos($_SERVER['REQUEST_URI'], 'tower') ? 'tower' : 'mania';


include_once dirname(__FILE__) . '/../utility/utility.php'; //Utility
include_once dirname(__FILE__) . '/../model/loadSettings.php'; //Settings読み込み
include_once dirname(__FILE__) . '/../model/loadcsv.php'; //CSV読み込み
include_once dirname(__FILE__) . '/../model/setAnswer.php';

//CSVを問題出力用整形して配列を返す関数::towerとmaniaでCSVの形式が異なるため、別にする。
include_once dirname(__FILE__) . '/../model/makeQuestionArray_'.$gameMode.'.php';


/* ------------------------------------------------------------------
グローバル変数のセット
 ------------------------------------------------------------------ */

session_start();


//セッティング読み込み(JSON)
//連想配列で得ると、PHP4系でエラーになるので、オブジェクトのまま得る
$settings = loadSettings(dirname(__FILE__) . '/../../assets/json/setting_' . $gameMode . '.json');


//パラメータ 初期値はenglish:1
$subject = (isset($_GET['subject'])) ? $_GET['subject'] : 'english'; //教科
$unit = (isset($_GET['unit'])) ? $_GET['unit'] : '1'; //単元


//教科設定オブジェクトを取得
$subjectData = $settings[0]->$subject;

//CSV読み込み
$CSV = loadCSV($subjectData->csv_file->$unit);
$dummyAnswerCSV = loadCSV($subjectData->dummy_answer);

//CSV加工
$questionArray = makeQuestionArray($CSV, $dummyAnswerCSV);
$question = $questionArray['toDOM'];
$question_json = json_encode($questionArray['toJSON']); //JSで正解を判定するオブジェクト

//画像の呼出し先の固定
$assets_dir = $subjectData->assets->$unit;

/* ------------------------------------------------------------------
 * SESSION変数
 ------------------------------------------------------------------ */

//ゲームモード
if (isset($_SESSION['GAME_MODE'])) {
    unset($_SESSION['GAME_MODE']);
}
$_SESSION['GAME_MODE'] = $gameMode;


//保存する前に別の問題が入っていたら初期化
if (isset($_SESSION['LOADED_QUESTION'])) {
    unset($_SESSION['LOADED_QUESTION']);
}
$_SESSION['LOADED_QUESTION'] = $question;

//自分がやっていた教科など
if (isset($_SESSION['SUBJECT_UNIT'])) {
    unset($_SESSION['SUBJECT_UNIT']);
}
$_SESSION['SUBJECT_UNIT'] = array($subject, $unit);


//ランキングの多重投稿を防ぐため、ゲームIDをセッションに持たせる。
if (isset($_SESSION['GAME_ID'])) {
    unset($_SESSION['GAME_ID']);
}
$_SESSION['GAME_ID'] = mt_rand();