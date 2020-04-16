<ul class="question__answer u-clearfix">

    <? foreach ($item['answer'] as $answer): ?>

        <li class="question__answer-item <?= ($answer[1] && $gameMode === 'mania') ? 'is-hint' : ''; ?>" data-answer="<?= $answer[0]; ?>">
        <div class="question__answer-item_inner">
        <? if (isImg($answer[0])):
            //ここロジックの方に移す？
            $splitAnswer = explode(',', $answer[0]);
            $answerPic = $splitAnswer[0];
            $answerTxt = isset($splitAnswer[1]) ? $splitAnswer[1] : '';
            ?>
            <img src="<?= $assets_dir . $answerPic; ?>" alt="">
            <?= $answerTxt; ?>
        <? else: ?>
            <?= $answer[0]; ?>
        <? endif; ?>
        </div>
        </li>

    <? endforeach; ?>

</ul>
    