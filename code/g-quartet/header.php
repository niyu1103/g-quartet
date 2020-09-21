<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title></title>

    <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
    <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/common.css">
    <?php if (is_front_page()): ?>
    <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/top.css">
    <?php elseif (is_page('service')): ?>
    <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/service.css">
    <?php elseif (is_page('recruit')): ?>
    <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/recruit.css">
    <?php elseif (is_page('contact') || is_page('thanks')): ?>
    <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/contact.css">
    <?php else: ?>
    <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/news.css">
    <?php endif; ?>
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP:400,600&display=swap&subset=japanese"
      rel="stylesheet">
    <!-- ファビコン -->
    <link rel="icon" href="<?php echo home_url(); ?>/wp-content/uploads/2019/12/favicon.ico">
    <!-- スマホ用アイコン -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo home_url(); ?>/wp-content/uploads/2019/12/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo home_url(); ?>/wp-content/uploads/2019/12/android-chrome-192x192.png" sizes="192x192">

    <!-- Windows用アイコン -->
    <meta name="msapplication-square150x150logo" content="<?php echo home_url(); ?>/wp-content/uploads/2019/12/mstile-150x150.png"/>
    <meta name="msapplication-TileColor" content="#c3c454"/>

    <script type='text/javascript' src='<?php echo home_url(); ?>/wp-includes/js/wp-embed.min.js'></script>
    <?php wp_head();?>
  </head>
  <body <?php body_class(); ?>>
    <header class="l-header">
      <div class="l-header--box Scroll_box">
        <div class="l-header--list">
          <h1 id="js-logo" class="l-header--logo">
            <a href="<?php echo home_url(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo.png" alt="global quartet">
            </a>
          </h1>
          <input class="l-drawer__checkbox" id="drawerCheckbox" type="checkbox" name="check" />
          <label class="l-drawer__icon" for="drawerCheckbox">
            <span class="l-drawer__icon-parts"></span>
          </label>
          <nav class="header--nav">
            <ul class="l-gnav">
            <?php if (  is_front_page() ) : ?>
               <li class="l-gnav--list current"><a href="#id_aboutUs">About us</a></li>
            <?php else: ?>
              <li class="l-gnav--list current"><a href="<?php echo home_url(); ?>/#id_aboutUs">About us</a></li>
            <?php endif; ?>
              <li class="l-gnav--list"><a href="<?php echo home_url(); ?>/service">Service</a></li>
              <li class="l-gnav--list"><a href="<?php echo home_url(); ?>/news">News</a></li>
              <li class="l-gnav--list"><a href="<?php echo home_url(); ?>/recruit">Recruit</a></li>
              <?php if (  is_front_page() ) : ?>
              <li class="l-gnav--list"><a href="#id_company">Company</a></li>
              <?php else: ?>
              <li class="l-gnav--list"><a href="<?php echo home_url(); ?>/#id_company">Company</a></li>
              <?php endif; ?>
              <li class="l-gnav--list contact"><a href="<?php echo home_url(); ?>/contact">Contact</a></li>
            </ul>
            <div class="sp_only">
              <ul class="hg_sns">
                <li class="sp-nav__item ico_facebook">
                  <a href="https://www.facebook.com/GlobalQuartetPR/">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/ico_facebook.png" alt="facebook">
                  </a>
                </li>
                <li class="sp-nav__item ico_twitter">
                  <a href="https://twitter.com/globalquartet">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/ico_twitter.png" alt="twitter">
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <div class="l-scroll pc_only">
          <a id="scroll_down" class="l-scroll__bar" href="javascript:void(0);">Scroll down</a>
          <div class="arrow"></div>
        </div>
        <div class="l-sns pc_only">
        <ul>
          <li class="l-sns__item"><a href="https://www.facebook.com/GlobalQuartetPR/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/ico_facebook.png" alt="facebook"></a>
          </li>
          <li class="l-sns__item"><a href="https://twitter.com/globalquartet" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/ico_twitter.png" alt="twitter"></a></li>
        </ul>
      </div>
      </div>
    </header>
