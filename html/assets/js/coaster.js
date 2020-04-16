(function() {
  var lastTime = 0;
  var vendors = ['ms', 'moz', 'webkit', 'o'];
  for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
    window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
    window.cancelRequestAnimationFrame = window[vendors[x] + 'CancelRequestAnimationFrame'];
  }
  if (!window.requestAnimationFrame)
    window.requestAnimationFrame = function(callback, element) {
      var currTime = new Date().getTime();
      var timeToCall = Math.max(0, 16 - (currTime - lastTime));
      var id = window.setTimeout(function() { callback(currTime + timeToCall); }, timeToCall);
      lastTime = currTime + timeToCall;
      return id;
    };
  if (!window.cancelAnimationFrame)
    window.cancelAnimationFrame = function(id) {
      clearTimeout(id);
    };


}())

var deviceClick = window.ontouchstart === null ? 'touchstart' : 'click';

window.onload = function(){

    var $y_in       = $('.yakudachi__inner'),
        $o_in       = $('.omoshiro__inner'),
        $y_c        = $('.yakudachi .coaster'),
        $o_c        = $('.omoshiro .coaster'),
        $y_go       = $('.yakudachi__go'),
        $o_go       = $('.omoshiro__go'),
        $y_start    = $('.yakudachi__btn__start'),
        $o_start    = $('.omoshiro__btn__start'),
        $y_stop     = $('.yakudachi__btn__stop'),
        $o_stop     = $('.omoshiro__btn__stop'),
        $y_c_in     = $('.yakudachi .coaster__inner'),
        $o_c_in     = $('.omoshiro .coaster__inner'),
        $y_c_li     = $('.yakudachi .coaster__list'),
        $o_c_li     = $('.omoshiro .coaster__list'),
        $y_c_ttl    = $('.yakudachi .coaster__ttl'),
        $o_c_ttl    = $('.omoshiro .coaster__ttl'),
        $modal      = $('.modal'),
        $modal_in   = $('.modal__inner'),
        y_c_w       = $y_c_ttl.outerWidth() + $y_c_li.outerWidth() * $y_c_li.length,
        o_c_w       = $o_c_ttl.outerWidth() + $o_c_li.outerWidth() * $o_c_li.length,
        y_speed     = 2,    //やくだちのアニメーション速度
        o_speed     = 3,    //おもしろのアニメーション速度
        y_highspeed = 10,   //やくだちの加速時の速度
        o_highspeed = 8,    //おもしろの加速時の速度
        balloon_rag = 120,  //バルーンが順番に出る時の間隔
        start_rag   = 1300, //goを押してからアニメーションが始まるまで。goのcssアニメーションと合わせる。
        y_speed_rag = 6000, //やくだちの通常速度の秒数
        o_speed_rag = 8000, //おもしろの通常速度の秒数
        duration    = 2000, //加速時の秒数
        y_c_pos,
        o_c_pos,
        y_up,
        o_up,
        y_scroll,
        o_scroll,
        y_starter,
        o_starter,
        y_play,
        o_play,
        path        = '../assets/modules/coaster/';

    /*----------------------------------------
    コースター作成
    ----------------------------------------*/

    //-----前後にダミー作成
    $y_c_in.clone().insertAfter($y_c_in);
    $y_c_in.clone().insertAfter($y_c_in);
    $o_c_in.clone().insertAfter($o_c_in);
    $o_c_in.clone().insertAfter($o_c_in);

    //-----複製後の初期化（length用）
    $y_c_in  = $('.yakudachi .coaster__inner');
    $o_c_in  = $('.omoshiro .coaster__inner');

    //-----width（コースター追加したい時css触らなくて済むように）
    $y_c_in.css('width', y_c_w + 'px');
    $o_c_in.css('width', o_c_w + 'px');
    $y_c.css('width', $y_c_in.outerWidth() * $y_c_in.length + 'px');
    $o_c.css('width', $o_c_in.outerWidth() * $o_c_in.length + 'px');

    //-----中央のコースターに移動
    $y_in.scrollLeft(y_c_w);
    $o_in.scrollLeft(o_c_w);

    /*----------------------------------------
    バルーンイントロ
    ----------------------------------------*/

    $('.yakudachi .coaster__list__item').each(function(i) {
        var $this = $(this)
        setTimeout(function(){$this.addClass('is-show');},balloon_rag*i);
    });
    $('.omoshiro .coaster__list__item').each(function(i) {
        var $this = $(this)
        setTimeout(function(){$this.addClass('is-show');},balloon_rag*i);
    });

    /*----------------------------------------
    update
    ----------------------------------------*/

    function scroll_y(){
        if(y_starter) y_up ? y_up = y_c_pos += y_highspeed : y_c_pos += y_speed;
        $y_in.scrollLeft(y_c_pos);
        if($y_in.scrollLeft() >= y_c_w * 2 || $y_in.scrollLeft() <= 0){ $y_in.scrollLeft(y_c_w); y_c_pos = y_c_w; }
        if(y_up) setTimeout(function(){y_up=false;},duration);
        requestAnimationFrame(scroll_y);
    }

    function scroll_o(){
        if(o_starter) o_up ? o_up = o_c_pos += o_highspeed : o_c_pos += o_speed;
        $o_in.scrollLeft(o_c_pos);
        if($o_in.scrollLeft() >= o_c_w * 2 || $o_in.scrollLeft() <= 0){ $o_in.scrollLeft(o_c_w); o_c_pos = o_c_w; }
        if(o_up) setTimeout(function(){o_up=false;},duration);
        requestAnimationFrame(scroll_o);
    }

    /**
     * 引数は省略しないで使う
     * @coaster コースター名
     * @first   初回か否か
     * @starter アニメーションonoff
     */
    function animation(coaster, first, starter){
        if(coaster == 'yakudachi'){
            starter ? y_starter = true : y_starter = false;
            if(first) {
                $y_go.addClass('is-start');
                setTimeout(function(){
                    $y_stop.toggleClass('is-show');
                    setInterval(function(){y_up=true;},y_speed_rag+duration);
                    scroll_y();
                },start_rag);
            } else {
                $y_stop.toggleClass('is-show');
                $y_start.toggleClass('is-show');
            }
        } else if (coaster == 'omoshiro'){
            starter ? o_starter = true : o_starter = false;
            if(first){
                $o_go.addClass('is-start');
                setTimeout(function(){
                    $o_stop.toggleClass('is-show');
                    setInterval(function(){o_up=true;},o_speed_rag+duration);
                    scroll_o();
                },start_rag);
            } else {
                $o_stop.toggleClass('is-show');
                $o_start.toggleClass('is-show');
            }
        }
    }

    /*----------------------------------------
    UI
    ----------------------------------------*/

    $y_go.on(deviceClick,    function(){animation('yakudachi',true,true);});
    $o_go.on(deviceClick,    function(){animation('omoshiro', true,true);});
    $y_start.on(deviceClick, function(){animation('yakudachi',false,true);});
    $o_start.on(deviceClick, function(){animation('omoshiro', false,true);});
    $y_stop.on(deviceClick,  function(){animation('yakudachi',false,false);});
    $o_stop.on(deviceClick,  function(){animation('omoshiro', false,false);});

    //-----モダール
    $(window).on('load hashchange', function () {

        $modal.removeClass('is-show is-yakudachi is-omoshiro');
        var url = path +  location.hash.replace( /#/g , "" ) + '.html';
        if (location.hash.match(/y-/) || location.hash.match(/o-/)){
            y_play = y_starter ? true : false;
            o_play = o_starter ? true : false;
            y_starter = false;
            o_starter = false;
            if(location.hash.match(/y-/)){
                $modal.addClass('is-show is-yakudachi');
                $modal_in.load(url);
            } else if(location.hash.match(/o-/)) {
                $modal.addClass('is-show is-omoshiro');
                $modal_in.load(url);
            }
        } else if (location.hash.match(/close/)) {
            y_play && (y_starter = true);
            o_play && (o_starter = true);
        }
    });
};
