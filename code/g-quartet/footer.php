 <footer>
      <div class="footer-box ">
        <div class="footer-item__box">
          <div class="l-column">
            <div>
              <h2 class="footer-logo">
                <a href="<?php echo home_url(); ?>">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo-white.png" alt="global quartet">
                </a>
              </h2>
              <p class="footer-copy"><small>© 2019 Global Quartet Inc.</small></p>
            </div>
            <div class="to-top sp_only">
              <a href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/sp_page_top.png" alt="totop">
              </a>
            </div>
          </div>
          <div class=" footer_nav">
            <ul>
              <li class="footer-nav__item"><a href="<?php echo home_url(); ?>">Home</a></li>
              <li class="footer-nav__item list-service"><a href="<?php echo home_url(); ?>/service">Service</a></li>
              <li class="footer-nav__item list-news"><a href="<?php echo home_url(); ?>/news">News</a></li>
            </ul>
            <ul class="footer_nav_sec">
              <li class="footer-nav__item nav_sec"><a href="<?php echo home_url(); ?>/recruit">Recruit</a></li>
              <li class="footer-nav__item"><a href="<?php echo home_url(); ?>/contact">Contact</a></li>
              <ul class="fotter_sns">
                <li class="footer-nav__item ico_facebook">
                  <a href="https://www.facebook.com/GlobalQuartetPR/" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/ico_facebook-white.png" alt="facebook">
                  </a>
                </li>
                <li class="footer-nav__item ico_twitter">
                  <a href="https://twitter.com/globalquartet" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/ico_twitter-white.png" alt="twitter">
                  </a>
                </li>
              </ul>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>
  </body>
</html>
