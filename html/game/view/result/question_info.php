<h1 class="commentary__answer-ttl">
    <span class="is-false">Q<?= $item['qnum']; ?>：</span><?= $item['qttl']; ?>
    <? if ($item['ttlImg'] !== ''): ?>
        <img src="<?= $assets_dir . $item['ttlImg']; ?>" alt="">
    <? endif; ?>
</h1>
