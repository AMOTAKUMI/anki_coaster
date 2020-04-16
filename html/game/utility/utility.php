<?php


// json_encode()関数が存在しないとき
// json_encode,json_decodeをライブラリから設定
if (!function_exists('json_encode')) {
    require_once 'json.php';
    function json_encode($value) {
        $s = new Services_JSON();
        return $s->encodeUnsafe($value);
    }
    function json_decode($json, $assoc = false) {
        $s = new Services_JSON($assoc ? SERVICES_JSON_LOOSE_TYPE : 0);
        return $s->decode($json);
    }
}


//配列の中身を見やすく列挙
function viewArray($array){
    echo "<PRE>";
    print_r($array);
    echo "</PRE>";
}


//画像かどうか判別する
function isImg($string){
    $pattern = '/.jpg|.png|.eps/';
    return ( preg_match($pattern,$string) !== 0 );
}

