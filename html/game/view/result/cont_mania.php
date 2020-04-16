<?

function scoreMessage($score)
{

    if ($score >= 90) {
        $scoreMessage = '90点以上もとるなんてすごいね！';
    } else if ($score >= 60) {
        $scoreMessage = 'おめでとう！60点以上は高得点！';
    } else if ($score >= 30) {
        $scoreMessage = 'もうちょっとがんばろう。';
    } else {
        $scoreMessage = '30点は頑張ってとってみよう！';
    }
    return $scoreMessage;
}

?>

<? include_once dirname(__FILE__) . '/score.php'; ?>

<div class="result__cont-inner u-clearfix">
    <? include_once dirname(__FILE__) . '/ranking.php'; ?>

    <section class="advice">
        <span class="result__cont-ch"><img src="../../assets/img/game/result/ch_haradon.png" alt=""></span>
        <div class="advice__serif c-serifcol">
            <div class="c-serifcol__inner">
                <p>
                    <span class="is-true"><?= scoreMessage($score); ?><br></span>
                    まだまだ暗記マニアへの道は遠い！<br>
                    解答・解説をしっかり読もう。<br>
                    どこが間違えたのか復習することで、より強く記憶に定着するぞ。<br>
                    ノートに繰り返し書き込んでみるのも効果大だ！
                </p>
            </div>
        </div>

        <nav class="result__nav">
            <a href="./" class="result__nav-back c-backbtn">一覧に戻る</a>
            <a href="#commentary" class="result__nav-commentary js-commentaryBtn">解答解説</a>
        </nav>
    </section>
</div>