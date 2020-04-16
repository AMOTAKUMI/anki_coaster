<div class="commentary__head">
    <h1 class="commentary__ttl">
        <img src="../../assets/img/mania/result/wpttl_<?= $subject.$unit ?>.png" alt="">
    </h1>
    <a href="#" class="commentary__head-backbtn c-backbtn is-bkbg js-commentaryBtn">一覧に戻る</a>
</div>

<div class="commentary__body customscroll-y">
    <? if ($question !== ''): foreach ($question as $item): ?>
        <div class="commentary__answer">
            <? include dirname(__FILE__) .'/question_info.php' ?>
            <p class="commentary__answer-collect">
                <span class="is-true">A：</span><?= $item['collectAnswer'] ?>
                <?= $result_data[$item['qnum'] - 1]->judges == 0 ?'<span class="is-false">【不正解】</span>':'<span class="is-true">【正解】</span>'; ?>
            </p>
            <? if ($item['commentary'] !== ''): ?>
                <p class="commentary__answer-commentary"><?= $item['commentary'] ?></p>
            <? endif; ?>
        </div>
    <? endforeach; endif; ?>
</div>
