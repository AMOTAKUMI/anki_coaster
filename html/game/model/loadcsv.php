<?php
setlocale(LC_ALL, 'ja_JP.UTF-8');

function loadCSV($the_file)
{

    $file = dirname(__FILE__) . '/../../assets/csv/' . $the_file;
    $data = file_get_contents($file);
    //文字コードがいずれでもUTF-8に変更
    $data = mb_convert_encoding($data, 'UTF-8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    //改行コードをmacのCRから→LFに変更
    $data = preg_replace("\r\n|\r|\n", "\n", $data);
    $temp = tmpfile();
    $csv = array();

    fwrite($temp, $data);
    rewind($temp);
    
    //※PHP5以前では第2引数を省略できないので注意
    while (($data = fgetcsv($temp,1000)) !== FALSE) {
        $lineLength = count($data);
        $d = array_count_values($data);

        //excel上の空行を取り除く
        if (isset($d[""]) && $d[""] == $lineLength) {
            continue;
        }
        $csv[] = $data;
    }
    fclose($temp);

    return $csv;
}




