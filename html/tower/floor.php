<? $floor = isset($_GET['f']) ? $_GET['f'] : 1; ?>

<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <? include_once dirname(__FILE__).'/../assets/modules/meta.php'; ?>
    <link rel="stylesheet" href="../assets/css/page/tower/tower.css">
</head>
<body>
<main class="l-main">
    <? include_once dirname(__FILE__).'/../assets/modules/glonav.php'; ?>
    <div class="l-main__inner u-clearfix">
        <section class="c-ttl_category is-top">
            <h1 class="c-page_ttl"><img src="../../assets/img/tower/floor/tower_ttl.png" alt=""></h1>
            <p class="floorttl"><img src="../../assets/img/tower/floor/<?= $floor ?>f_waypoint.png" alt=""></p>
        </section>

        <section class="l-cont is-nomargin tower_floor">
            <? include_once dirname(__FILE__).'/floor_cont/'.$floor.'f.php'; ?>

            <span class="tower_floor__haradon">
                <img src="../../assets/img/tower/floor/haradon.png" alt="">
            </span>
        </section>
    </div>
</main>

</body>
</html>