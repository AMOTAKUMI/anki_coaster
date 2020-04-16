<?php
//------------------------------------------
// レンダリング questionsがテンプレート部分
// $question : 整形済みの配列
// 画像判別は、.jpg.pngのpregmatchで判断する
//問題図版はある場合のみ追加挿入する
//------------------------------------------
foreach ($question as $item): ?>

    <section class="question q<?= $item['qnum']; ?> <?= ($item['qnum'] == 1) ? 'is-active' : ''; ?>">

        <?
        //gameModeで読み込むタイトル部分を分岐
        include 'question_ttl_'.$gameMode.'.php'
        ?>
        <? include 'answer.php' ?>
    </section>

<? endforeach;?>


<div class="judge is-true"><img src="../../assets/img/game/question/true.png" alt=""></div>
<div class="judge is-false"><img src="../../assets/img/game/question/false.png" alt=""></div>


