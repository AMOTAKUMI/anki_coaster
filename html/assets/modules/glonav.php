<?php
//ルート判定
$rootdir = 'html';
$dirname = dirname($_SERVER['SCRIPT_FILENAME']);
$dirname = explode('/',$dirname);
$length = count($dirname);
$is_root = ($dirname[$length - 1] == $rootdir)?'':'../';
?>

<header class="l-header">
    <nav class="l-gnav">
        <ul class="l-gnav_menu u-clearfix">
            <li class="l-gnav_menu__item"><a href="../mania/">暗記マニア</a></li>
            <li class="l-gnav_menu__item"><a href="../tower/">暗記タワー</a></li>
            <li class="l-gnav_menu__item"><a href="../lounge/">暗記ラウンジ</a></li>
            <li class="l-gnav_menu__item"><a href="../coaster/">暗記コースター</a></li>
        </ul>
    </nav>
</header>

