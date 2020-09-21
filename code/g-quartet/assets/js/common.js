// SP ナビゲーション
jQuery(function () {
  jQuery('.l-drawer__icon').click(function () {
    jQuery('#js-logo').toggleClass('fix');
    // $('.l-drawer__icon').click();
  });
  jQuery('.l-gnav--list a').on('click', function () {
    jQuery('.l-drawer__icon').click();
  });
});

// NEWS アコーディオン
jQuery(function () {
  jQuery('.news-year-list').click(function () {
    jQuery('.news-year-list li').slideToggle(100);
    jQuery('.news-year-list').toggleClass('is_active');
  });
});


// スムーススクロール
!
// var headerHeight = $('.header').outerHeight(); //fixedのヘッダーの高さを取得

// $('a[href^="#"]').on({
//   'click',
//   function () {
//     var href = $(this).attr("href");
//     var target = $(href);
//     // var position = target.offset().top - headerHeight;
//     var position = target.offset().top;
//     $('body,html').stop().animate({
//       scrollTop: position
//     }, 500);
//   }
// });

jQuery(function () {
  jQuery('a[href^="#"]').click(function () {
    var speed = 500;
    var href = jQuery(this).attr("href");
    var target = jQuery(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    jQuery("html, body").animate({
      scrollTop: position
    }, speed, "swing");
    return false;
  });
});


//scroll down
var position = $(".target").offset().top; //最初の要素の、ドキュメント上での表示位置[y軸]を返す

jQuery("#scroll_down").click(function () {
  jQuery("html,body").animate({
    scrollTop: position // さっき変数に入れた位置まで
  }, {
    queue: false // どれくらい経過してから、アニメーションを始めるか。キュー[待ち行列]。falseを指定すると、キューに追加されずに即座にアニメーションを実行。
  });
});
