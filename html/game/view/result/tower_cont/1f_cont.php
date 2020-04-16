<?
//正解数のフォーマット

$collect_length = 0;
$question_length = 0;

foreach ($result_data as $item) {
    if ($item->judges === 1) {
        $collect_length++;
    }
    $question_length++;
}
?>

<div class="tower_result u-clearfix">

    <section class="tower_result__collectanswer">
        <p class="tower_result__waypoint">1Fトレーニング：キミの日常生活での記憶を確認してみよう！</p>
        <p class="tower_result__score u-clearfix">
            <span class="tower_result__score-pic"><img src="../../assets/img/tower/result/1f_currentttl.png" alt=""></span>
            <span class="tower_result__score-txt"><?= $collect_length; ?>問（全<?= $question_length; ?>問）</span>
        </p>
    </section>

    <section class="tower_result__advice">
        <span class="tower_result__haradon"><img src="../../assets/img/game/result/ch_haradon.png" alt=""></span>
        <div class="tower_result__message c-serifcol">
            <div class="c-serifcol__inner">
                <p>
                    どうだったかな？<br>
                    よく目にしているもの、普段触れているものでも、いざ答えるとなると間違えることが多いんだ！<br>
                    これは、覚えていたものを忘れているわけではなく、実は最初からきちんと覚えていないんだ。<br>
                    そしてこれが、「覚えていたはずなのに、いざテストになると思い出せなくて解答できない」という暗記の落とし穴につながっているんだ！<br>
                    テストにおいては、“なんとなく覚えたつもりになるのではなく、ちゃんと記憶・暗記することが大事！”ということが分かってくれたかな？<br>
                    それじゃあ、暗記タワー2Fから、ちゃんと記憶・暗記するためのトレーニングに取り組むぞ！
                    <a class="tower_result__message-btn" href="floor.php?f=2"><img src="../../assets/img/tower/result/to2f_btn.png" alt=""></a>
                </p>
            </div>
        </div>
    </section>


</div>

