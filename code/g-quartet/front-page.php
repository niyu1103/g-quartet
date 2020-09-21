<?php get_header(); ?>
  <main>
    <section>
      <div class="container mv">
        <div class="l-mv">
          <img class="pc_only" src="<?php echo get_template_directory_uri(); ?>/assets/img/top/main_pc.jpg" alt="">
          <h2 class="l-mv--tit">Team of Professionals<br>make a true difference</h2>
          <div class="l-scroll_sp sp_only"><a id="scroll_down" class="l-scroll__bar_sp" href="javascript:void(0);">Scroll down</a><div class="arrow"></div></div>
        </div>
        <p class="hd-txt">
          ひとりのフリーランスよりも<br class="sp_only">複数名の専門性
        </p>
      </div>
    </section>
    <section id="id_aboutUs" class="target">
      <div class="container">
        <h2 class="hd-tit-02">About us<span class="hd-tit-02--sub">グローバル・カルテットとは</span></h2>
        <div>
          <p class="hd-tit-02__center_txt">
            私たちは、”リサーチのプロフェッショナル・フリーランスチーム”です。<br class="pc_only">
            各々が得意とする業種・業務工程を担当することで、<span class="font-bold">円滑でスピーディー、かつ高クオリティにコミット</span>することが可能です。<br
              class="pc_only">複数のフリーランスをアサインすることで、1人の専門知識にとどまらず、チームとしての相乗効果を発揮した高クオリティな成果物をご提供します。
          </p>
          <div class="About-img">
            <img class="pc_only" src="<?php echo get_template_directory_uri(); ?>/assets/img/top/top_about.jpg" alt="フリーランスチーム　業務/品質管理のしくみ">
            <img class="sp_only" src="<?php echo get_template_directory_uri(); ?>/assets/img/top/sp_top_about.jpg">
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container top-inner_box">
        <h2 class="hd-tit-02__center">
          <span class="hd-tit-02__center_bar">News</span>
          <span class="hd-tit-02__center__sub">最新ニュース</span>
        </h2>
        <div class="top-news__area">
          <ul>
          <?php
                $args = array(
                  'posts_per_page' => 6
                );
                $posts =get_posts($args);
              if (!empty($posts)):
                foreach ($posts as $post):
                setup_postdata($post);
            ?>
            <li class="top-news__list">
              <a href="<?php the_permalink(); ?>">
                <div class="top-news__list__img__box">
                  <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('home-thum'); ?>
                      <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/no_image.jpg" alt="">
                      <?php endif; ?>
                </div>
                <div class="mask">
                  <div class="caption">view more ＞</div>
                </div>
                <h3 class="top-news-tit"><?php the_title(); ?></h3>
                <?php
                  $cat = get_the_category();
                  $cat_name = $cat[0] -> cat_name;
                ?>
                <div class="news__date"><?php echo get_post_time('Y.m.d'); ?><span class="news__cat"><?php echo $cat_name; ?></span>
                </div>
              </a>
            </li>
            <?php
             endforeach;
              wp_reset_postdata();
            endif;
              ?>
          </ul>
        </div>
        <a class="to-ViewAll" href="/news">View all</a>
      </div>
    </section>
    <section>
      <div class="top-mission-vision__area">
        <div class="top-mission__area__bg">
          <div class="top-mission__area">
            <h2 class="hd-tit-02">Mission</h2>
            <h3 class="hd-tit-03_2">“ひとりのフリーランスより複数名の専門性”</h3>
            <p class="hd-tit-03_2__txt">
              私たちはリサーチのスペシャリストとして、事業成長には欠かせない「仮説の設定」「検証と結果の分析から施策の糸口を探る」「提言を含めた報告を行う」までの一連のリサーチ業務を担います。<br
                class="pc_only">それらを<span
                class="font-bold">”複数名の最適チーム”</span>で担当することで、課題に対するクオリティの高い成果物をお約束。クライアント様には事業戦略やマーケティング戦略に専念いただくことができます。<br
                class="pc_only">業務の品質管理や工程分担は全体を見渡せるコントローラーが行います。工程ごとの実務は案件に相応しい知見・スキルを持つメンバーを<span
                class="font-bold">世界各地</span>からアサインしているため、個人では懸念される納期やクオリティの品質を高く維持できます。
            </p>
          </div>
        </div>
        <div class="top-vision__area__bg">
          <div class="top-vision__area">
            <h2 class="hd-tit-02">Vision</h2>
            <h3 class="hd-tit-03_2">“世界のどこにいても働き続けられるカタチ”</h3>
            <p class="hd-tit-03_2__txt">私たちは、メンバーが居住地や時間に左右されずキャリア
              を継続でき、次なるステップを選択しやすくなる仕組みを
              構築しています。<span class="font-bold">“物理的なデメリットを全員でメリットに変える”</span>をキーワードに、<span
                class="font-bold">リモートワーク</span>でクライアント様を支援しています。<br
                class="pc_only">通勤、対面打ち合わせ<span class="mark">※</span>、稼働時間の定時拘束を行わない分、海外メンバーの時差を利用した稼働はもちろん、集中してコア業務に従事できるため、質の高いアウトプットと最短納期で対応し、高評価をいただいています。<span
                class="top-vision__area__fonts">※クオリティコントローラーは対面打ち合わせも適宜行います。</span>
            </p>
          </div>
        </div>
      </div>
    </section>
    <section id="id_company">
      <div class="container top-inner_box">
        <div class="top-company">
          <h2 class="hd-tit-02__center">
            <span class="hd-tit-02__center_bar">Company</span>
            <span class="hd-tit-02__center__sub">会社情報</span>
          </h2>
          <div class="top-company__info">
            <dl class="top-company__info__list">
              <dt class="top-company__info__tit">会社名</dt>
              <dd class="top-company__info__txt">株式会社グローバル・カルテット(Global Quartet Inc.)</dd>
            </dl>
            <dl class="top-company__info__list">
              <dt class="top-company__info__tit">代表者</dt>
              <dd class="top-company__info__txt">城　みのり</dd>
            </dl>
            <dl class="top-company__info__list">
              <dt class="top-company__info__tit">事業内容</dt>
              <dd class="top-company__info__txt">市場調査、 マーケティングリサーチ</dd>
            </dl>
            <dl class="top-company__info__list">
              <dt class="top-company__info__tit">所在地</dt>
              <div class="top-company__info__addr">
                <dd>〒105-0004</dd>
                <dd>東京都港区新橋2丁目２０-１５<br>新橋駅前ビル１号館６階　ビステーション新橋内</dd>
                <dd class="top-company__info__addr__sub"><span>JR各線/都営地下鉄浅草線/東京メトロ銀座線/ゆりかもめ　地下直結 </span><span
                    class="to-gmap"><a href="https://goo.gl/maps/7xk8EiN8d6HBK3G66" target="_blank">Google Maps</a></span></dd>
              </div>
            </dl>
            <div class="top-company__info__txt ggmap">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.4369270377047!2d139.75735651507395!3d35.66624213840164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188be9b6536139%3A0x849a30ab43ee0284!2z44CSMTA1LTAwMDQg5p2x5Lqs6YO95riv5Yy65paw5qmL77yS5LiB55uu77yS77yQ4oiS77yR77yV!5e0!3m2!1sja!2sjp!4v1575527903031!5m2!1sja!2sjp"
                width="843" height="467" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
          </div>
          <div class="top-company__ceo">
            <div class="ceo__about">
              <div>
                <h3 class="ceo__about_tit">グローバル・カルテット代表</h3>
                <p class="ceo__about__name">城 みのり / Minori Jo </p>
                <p class="ceo__about__sub"><span>リサーチャー兼<br class="sp_only">クオリティコントローラー</span></p>
              </div>
              <figure class="ceo__about__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/home_minorijo.png" alt=""></figure>
            </div>
            <p class="ceo__about__txt">
              コンサルティングファームの業務支援とメディカル・ヘルスケア専門マーケティングリサーチ企業のリサーチ職として定量・定性調査に従事の後2016年退社。独立直後より「フリーランスだけのチームで1案件にコミット」を始める。<br>主に各疾患調査の他、健康経営やヘルスケア系新規事業案件等、近年のトレンドテーマの調査に従事。<br>現在はプレーヤー兼、世界各地のリサーチメンバーを牽引するクオリティコントローラーとして稼働。
            </p>
          </div>
        </div>
      </div>
    </section>
    <?php get_template_part('contact_banner'); ?>
  </main>
<?php get_footer(); ?>
