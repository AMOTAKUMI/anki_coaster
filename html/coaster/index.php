<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <?php include_once '../assets/modules/meta.php';?>
    <link rel="stylesheet" href="../assets/css/page/coaster/coaster.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Play:400,700">

    <!-- ////////////////////////////////////////
    ループを増やしたい場合は<ol>を増やしてください。
    1つの<ol>に対し6つまで<li>を格納できます。
    <a>についているis-c_xxxを変更すると円の色を変えられます。
    <a>についているis-s_xxxを変更すると円の色を変えられます。
    htmlだけで編集追加できるようしてあるのでdiv多い&style特殊です。
    バルーンのURLは「y-xxx」「o-xxx」の形式で挿入し、
    同じ名前（#除く）でhtmlファイルを作成し、
    html/assets/modules/coasterの中に格納してください。
    ////////////////////////////////////////-->

</head>
<body>
<main class="l-main">
    <?php include_once '../assets/modules/glonav.php';?>
    <div class="l-main__inner">
        <section class="l-cont is-full clearfix">
            <h1 class="c-ttl_category is-top">
                <img src="../assets/img/coaster/coaster_ttl.png" alt="">
            </h1>
            <div class="anki_coaster">
                <section class="yakudachi">
                <div class="yakudachi__go"><img src="../assets/img/coaster/yakudachi_go_btn.png" alt=""></div>
                <ul class="yakudachi__btn">
                    <li class="yakudachi__btn__start"><i class="fa fa-play" aria-hidden="true"></i>START</li>
                    <li class="yakudachi__btn__stop"><i class="fa fa-stop" aria-hidden="true"></i>STOP</li>
                </ul>
                <div class="yakudachi__inner u-clearfix">
                        <div class="coaster u-clearfix">
                        <div class="coaster__inner">
                            <h2 class="coaster__ttl"><img src="../assets/img/coaster/yakudachi_ttl.png" alt=""></h2>
                            <ol class="coaster__list">
                                <li class="coaster__list__item coaster__list--item01"><a class="is-s_m is-c_red" href="#y-hoge"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item02"><a class="is-s_m is-c_yellow" href="#y-fuga"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item03"><a class="is-s_m is-c_orange" href="#y-hogera"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item04"><a class="is-s_m is-c_red" href="#y-hoge"><span>中134<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item05"><a class="is-s_m is-c_yellow" href="#y-fuga"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item06"><a class="is-s_m is-c_orange" href="#y-hogera"><span>中1<br>名前</span></a></li>
                            </ol>
                            <ol class="coaster__list">
                                <li class="coaster__list__item coaster__list--item01"><a class="is-s_m is-c_red" href="#y-hoge"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item02"><a class="is-s_m is-c_yellow" href="#y-fuga"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item03"><a class="is-s_m is-c_orange" href="#y-hogera"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item04"><a class="is-s_m is-c_red" href="#y-hoge"><span>中134<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item05"><a class="is-s_m is-c_yellow" href="#y-fuga"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item06"><a class="is-s_m is-c_orange" href="#y-hogera"><span>中1<br>名前</span></a></li>
                            </ol>
                        </div>
                        </div>
                </div>
                </section>

                <section class="omoshiro">
                <div class="omoshiro__go"><img src="../assets/img/coaster/omoshiro_go_btn.png" alt=""></div>
                <ul class="omoshiro__btn">
                    <li class="omoshiro__btn__start"><i class="fa fa-play" aria-hidden="true"></i>START</li>
                    <li class="omoshiro__btn__stop"><i class="fa fa-stop" aria-hidden="true"></i>STOP</li>
                </ul>
                <div class="omoshiro__inner u-clearfix">
                        <div class="coaster u-clearfix">
                        <div class="coaster__inner">
                            <h2 class="coaster__ttl"><img src="../assets/img/coaster/omoshiro_ttl.png" alt=""></h2>
                            <ol class="coaster__list">
                                <li class="coaster__list__item coaster__list--item01"><a class="is-s_m is-c_green" href="#o-hoge"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item02"><a class="is-s_m is-c_blue" href="#o-fuga"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item03"><a class="is-s_m is-c_purple" href="#o-hogera"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item04"><a class="is-s_m is-c_green" href="#o-hoge"><span>中134<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item05"><a class="is-s_m is-c_blue" href="#o-fuga"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item06"><a class="is-s_m is-c_purple" href="#o-hogera"><span>中1<br>名前</span></a></li>
                            </ol>
                            <ol class="coaster__list">
                                <li class="coaster__list__item coaster__list--item01"><a class="is-s_m is-c_green" href="#o-hoge"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item02"><a class="is-s_m is-c_blue" href="#o-fuga"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item03"><a class="is-s_m is-c_purple" href="#o-hogera"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item04"><a class="is-s_m is-c_green" href="#o-hoge"><span>中134<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item05"><a class="is-s_m is-c_blue" href="#o-fuga"><span>中1<br>名前</span></a></li>
                                <li class="coaster__list__item coaster__list--item06"><a class="is-s_m is-c_purple" href="#o-hogera"><span>中1<br>名前</span></a></li>
                            </ol>
                        </div>
                        </div>
                </div>
                </section>
            </div>
        </section>
    </div>
</main>

<div class="modal">
    <a href="#close" class="modal__close"><img src="../assets/img/coaster/btn_close.png" alt=""></a>
    <div class="modal__inner">
    </div>
</div>

<script src="../assets/js/coaster.js"></script>
</body>
</html>
