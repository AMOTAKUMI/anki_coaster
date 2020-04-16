<?

//階数による文言の変化
switch($unit){
    case 1:
        $waypoint_ttl='1Fトレーニング：キミの日常生活での記憶を確認してみよう！';
        break;
    case 2:
        $waypoint_ttl='2Fトレーニング：覚えやすく忘れにくい覚え方を試してみよう！';
        break;
    case 3:
        $waypoint_ttl='3Fトレーニング：キミの日常生活での記憶を確認してみよう！';
        break;
}
?>

<section class="question__ttl u-clearfix">

    <p class="question__ttl-waypoint"><?= $waypoint_ttl; ?></p>

    <div class="question__ttl-txt">
        <h1>
            <?= "Q${item['qnum']}.${item['qttl']}"; ?>
            <? if ($item['ttlImg'] !== ''): ?>
                <img src="<?= $assets_dir . $item['ttlImg']; ?>" alt="">
            <? endif; ?>
        </h1>
    </div>

    <a class="question__close" href="./"><img src="../../assets/img/game/question/close_tower.png" alt=""></a>
</section>


<? if($item['multipleQuestion']) include 'multiple_question.php'; ?>


