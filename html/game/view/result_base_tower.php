<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <? include_once dirname(__FILE__) . '/../../assets/modules/meta.php'; ?>
    <link rel="stylesheet" href="../assets/css/page/game/game.css">
    <link rel="stylesheet" href="../assets/css/page/tower/tower.css">

    <script>
        (function () {
            window.currentScore =  <?= $score;?>;
            window.gameId =  <?= $game_id;?>;
        })();
    </script>
</head>
<body>

<main class="l-main">

    <?php include_once dirname(__FILE__).'/../../assets/modules/glonav.php';?>

    <div class="l-main__inner u-clearfix">
        <? include_once dirname(__FILE__). '/common_parts/page_ttl.php'; ?>

        <section class="l-cont">
            <? include_once dirname(__FILE__) . '/result/tower_cont/'.$unit.'f_cont.php'; ?>
        </section>
    </div>


</main>



<script src="../assets/js/lib/libs.js"></script>
<script src="../assets/js/result.js"></script>
</body>
</html>