<section class="c-ttl_category">
    <h1 class="c-page_ttl"><img src="../../assets/img/<?= $gameMode; ?>/question/page_ttl.png" alt=""></h1>
    <p class="question__waypoint">
        <img src="../../assets/img/<?= $gameMode; ?>/question/waypoint_<?= $subject . $unit; ?>.png" alt="">
    </p>
    <? if ($gameMode === 'mania' && strpos($_SERVER['REQUEST_URI'],'result') == 0): ?>
        <p class="question__skip"><img src="../../assets/img/mania/question/skip.png" alt=""></p>
    <? endif; ?>
</section>