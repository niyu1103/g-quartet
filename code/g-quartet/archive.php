<?php get_header(); ?>
  <main>
    <div class="container">
      <div class=" hd-01--bg">
        <h1 class="hd-tit-01">News<span class="hd-tit-01--sub">ニュース</span></h1>
        <section>
          <div class="news-inner">

            <div class="news-nav">
              <ul class="news-nav__list">
              <?php

              $thiscat = get_the_archive_title();
              $cat_tit = single_cat_title( '', false );
              // var_dump($cat_tit);
              if ($cat_tit == ''){
                echo '<li class="cat-item current-cat"><a href="/news">すべて</a></li>';
              }else{
                echo '<li class="cat-item"><a href="/news">すべて</a></li>';
              }
              ?>
                <?php
                $thiscategory = get_category($cat);
                // var_dump($thiscategory);
                  $args = array(
                    'type'                     => 'post',
                    'child_of'                 => 0,
                    'parent'                   => '',
                    'orderby'                  => 'id',
                    'order'                    => 'ASC',
                    'hide_empty'               => 0,
                    'hierarchical'             => 1,
                    'exclude'                  => '',
                    'include'                  => '',
                    'number'                   => '',
                    'taxonomy'                 => 'category',
                    'pad_counts'               => false
                  );
                  $categories = get_categories( $args );
                  // var_dump($categories);
                foreach ($categories as $category) {

                  if($category->cat_name == $thiscat)
                  {$option = '<li class="cat-item current-cat"><a href="/posts/category/'.$category->category_nicename.'">';}
                  else{
                    $option = '<li class="cat-item"><a href="/posts/category/'.$category->category_nicename.'">';
                  }
                  $option .= $category->cat_name;
                  $option .= '</li>';
                  echo $option; }
                  ?>
              </ul>
            </div>
            <div>
              <div class="l-breadcrumb">
                <a href="<?php echo home_url(); ?>">Home</a>
                <span class="breadcrumb-item current"><?php echo $thiscat; ?></span>
              </div>
            </div>
              <div class="news-year-list">
                <?php
                if ($cat_tit != '' || $thiscat == 'ニュース'){
                  echo '<li class="current">すべて</li>';
                }else{
                  echo '<li class="current">'.$thiscat.'</li>';
                }
                ?>
                  <li><a href="/news">すべて</a></li>
                  <?php
                    $args = array(
                      'type'            => 'yearly',
                      'limit'           => '',
                      'format'          => 'html',
                      'before'          => '',
                      'after'           => '',
                      'show_post_count' => false,
                      'echo'            => 1,
                      'order'           => 'DESC',
                      'post_type'     => 'post'
                    );
                    wp_get_archives( $args );
                    ?>
              </div>
            <div class="news-archive target">
              <ul>
              <?php
              if (have_posts()):
                while ( have_posts() ): the_post();
            ?>
                <li class="news-archive__list l-column">
                  <a href="<?php the_permalink(); ?>">
                    <figure class="news-archive__img">
                      <div class="news-archive__img__box">
                        <?php if (has_post_thumbnail()) { //アイキャッチ画像を設定している場合
                            the_post_thumbnail('single-thum');
                          } else { //アイキャッチ画像を設定していない場合 ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/no_image.jpg"/>
                      <?php } ?>
                      </div>
                      <div class="mask">
                        <div class="caption">view more ＞</div>
                      </div>
                    </figure>
                    <div class="news-archive__txt__box">
                    <?php
                      $cat = get_the_category();
                      $cat_name = $cat[0] -> cat_name;
                      ?>
                      <div class="news__date"><?php echo get_post_time('Y.m.d'); ?><span class="news__cat"><?php echo $cat_name; ?></span></div>
                      <dl>
                        <dt class="news-archive__tit"><?php the_title(); ?></dt>
                        <dd class="news-archive__txt"><?php the_excerpt(); ?></dd>
                      </dl>
                    </div>
                  </a>
                </li>
           <?php endwhile; else : ?>
              <p class="no_post">該当記事がありません。</p>
          <?php endif; ?>
              </ul>
            </div>
            <div class="news-pagination">
              <ul class="news-pagination__list">
                <?php
                    the_posts_pagination( array(
                      'mid_size' => 1,
                      'prev_text' => '&lt;',
                     'next_text' => '&gt;',
                    ) );
                  ?>
              </ul>
            </div>

          </div>
        </section>
      </div>
    </div>
    <?php get_template_part('contact_banner'); ?>
  </main>
<?php get_footer(); ?>
