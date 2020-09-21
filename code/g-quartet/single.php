<?php get_header(); ?>
  <main>
    <div class="container">
      <div class=" hd-01--bg">
        <h1 class="hd-tit-01">News<span class="hd-tit-01--sub">ニュース</span></h1>
        <section>

          <div class="news-inner">
            <div class="news-nav">
             <ul class="news-nav__list">
               <li class="cat-item"><a href="/news">すべて</a></li>
              <?php
                $cat = get_the_category();
                $cat = $cat[0];
                $thiscat = $cat->category_nicename;
                // var_dump($thiscat);
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
                foreach ($categories as $category) {
                  if($category->category_nicename === $thiscat)
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
            <?php
            if (have_posts()):
              while ( have_posts()): the_post();
           ?>
            <div>
            <?php
              $cat = get_the_category( '', false );
              $cat_name = $cat[0] -> cat_name;
              $cat_slug = $cat[0] -> category_nicename;
              ?>
              <div class="l-breadcrumb">
                <a href="<?php echo home_url(); ?>">Home</a>
                <span class="breadcrumb-item"><?php echo $cat_name; ?></span>
                <span class="breadcrumb-item current"><?php the_title(); ?></span>
              </div>
            </div>
            <div class="news-list target">
              <div class="news__date"><?php echo get_post_time('Y.m.d'); ?><span class="news__cat"><?php echo $cat_name; ?></span></div>
              <h2 class="news__tit"><?php the_title(); ?></h2>
              <div class="news__txt"><?php the_content(); ?></div>
            </div>
            <?php
              endwhile;
            endif;
            ?>
        </section>
      </div>
    </div>
   <?php get_template_part('contact_banner'); ?>
  </main>
<?php get_footer(); ?>
