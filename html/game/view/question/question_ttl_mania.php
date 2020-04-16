<section class="question__ttl u-clearfix">

    <div class="question__time">
        <span class="second_hand"></span>
    </div>

    <div class="question__ttl-txt">
        <h1>
            <?= 'Q'.$item['qnum'].'. '.$item['qttl']; ?>
            <? if ($item['ttlImg'] !== ''): ?>
                <img src="<?= $assets_dir . $item['ttlImg']; ?>" alt="">
            <? endif; ?>
        </h1>
    </div>

    <a class="question__close" href="./"><img src="../../assets/img/game/question/close_mania.png" alt=""></a>
</section>