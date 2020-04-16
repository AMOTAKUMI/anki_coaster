<?php
//ベネッセサーバーはPHP5.2以下なので、json_decodeが使えない(´・ω・｀)
//のでJSON.phpを読み込んでおく

function loadSettings($jsonfile){
    $json = file_get_contents($jsonfile);
    //文字コードがいずれでもUTF-8に変更
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $settings = json_decode($json);
    return $settings;
}