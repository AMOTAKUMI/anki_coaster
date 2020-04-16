<?
//問題文エリアで数枚スライドさせたいときに使う
?>

<div class="multiple_question q<?= $item['qnum'];?>">

    <section class="question__ttl">
        <p class="question__ttl-waypoint"><?= $waypoint_ttl; ?></p>
        <div class="question__ttl-txt">
            <h1><?= "Q${item['qnum']}.${item['multipleQuestion_ttl']}";?></h1>
        </div>
    </section>


    <section class="question__ttl-slide">
        <p><?= $item['multipleQuestion_body'];?></p>
    </section>
    <a href="#" class="multiple_question__next js-multipleQuestionNext" data-parentQuestion="q<?= $item['qnum'];?>">
        <img src="../../assets/img/tower/question/multiplequestion_next.png" alt="">
    </a>
</div>