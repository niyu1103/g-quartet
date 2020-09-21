<?php
/* 外部リンク対応ブログカードのショートコードを作成 */
function show_Linkcard($atts)
{
    extract(shortcode_atts(array(
        'url'=>"",
        'title'=>"",
        'excerpt'=>""
    ), $atts));

    //画像サイズの横幅を指定
    $img_width ="300px";
    //画像サイズの高さを指定
    $img_height = "auto";

    //OGP情報を取得
    require_once 'OpenGraph.php';
    $graph = OpenGraph::fetch($url);

    //OGPタグからタイトルを取得
    $Link_title = $graph->title;
    if (!empty($title)) {
        $Link_title = $title;//title=""の入力がある場合はそちらを優先
    }

    //OGPタグからdescriptionを取得（抜粋文として利用）
    $Link_description = wp_trim_words($graph->description, 60, '…');//文字数は任意で変更
    if (!empty($excerpt)) {
        $Link_description = $excerpt;//値を取得できない時は手動でexcerpt=""を入力
    }

    $xLink_img_pre =  $graph->image;
    //OGPを表示
    $xLink_img = '<img src="'. $xLink_img_pre .'" width="'. $img_width .'" />';

    //ファビコンを取得（GoogleのAPIでスクレイピング）
    $host = parse_url($url)['host'];
    $searchFavcon = 'https://www.google.com/s2/favicons?domain='.$host;
    if ($searchFavcon) {
        $favicon = '<img class="favicon" src="'.$searchFavcon.'">';
    }

    //外部リンク用ブログカードHTML出力
    $sc_Linkcard .='
	<div class="blogcard ex">
	<a href="'. $url .'" target="_blank">
	 <div class="blogcard_thumbnail">'. $xLink_img .'</div>
	 <div class="blogcard_content">
	  <div class="blogcard_title">'. $Link_title .'</div>
	  <div class="blogcard_excerpt">'. $Link_description .'</div>
	  <div class="blogcard_link">'. $favicon .' '. $url .' <i class="icon-external-link-alt"></i></div>
	 </div>
	 <div class="clear"></div>
	</a>
	</div>';

    return $sc_Linkcard;
}

//ショートコードに追加
add_shortcode("sc_Linkcard", "show_Linkcard");

//内部リンクをブログカードにするショートコード
function show_blogcard($atts)
{
    extract(shortcode_atts(array(
        'url'=>"",
        'title'=>"",
        'excerpt'=>""
    ), $atts));

    //URLから投稿IDを取得
    $id = url_to_postid($url);
    //画像サイズの横幅を指定
    $img_width ="265";
    //画像サイズの高さを指定
    $img_height = "auto";
    //アイキャッチ画像がない場合の画像を指定
    $no_image = '<?php echo get_template_directory_uri(); ?>/assets/img/common/no_image.jpg';

    //タイトルを取得
    if (empty($title)) {
        $title = esc_html(get_the_title($id));
    }

    //本文を取得
    if (has_excerpt($id)) {
        //抜粋文字列がある場合
        $excerpt = wp_trim_words(get_the_excerpt($id), 72, '…');
    } else {
        //抜粋文字列がない場合本文から切り出し
        $excerpt = wp_trim_words(strip_shortcodes(get_post($id)->post_content), 72, '…');
    }

    //アイキャッチ画像を取得
    if (has_post_thumbnail($id)) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), array($img_width,$img_height));
        $img_tag = '<img src="'. $img[0] .'" alt="'. $title .'" width="'. $img[1] .'" height="'. $img[2] .'" />';
    } else {
        $img_tag = '<img src="'. $no_image .'" alt="" width="'. $img_width .'" height="'. $img_height .'" />';
    }

    //ブログカード部分のHTML
    $sc_blogcard .='
	<div class="blogcard">
	<a href="'. $url .'">
	 <div class="blogcard_thumbnail">'. $img_tag .'</div>
	 <div class="blogcard_content">
	  <div class="blogcard_title">'. $title .'</div>
	  <div class="blogcard_excerpt">'. $excerpt .'</div>
	 </div>
	 <div class="clear"></div>
	</a>
	</div>';
    return $sc_blogcard;
}

//ショートコードに追加
add_shortcode("sc_blogcard", "show_blogcard");


//blog--card end



//bodyにスラッグ名のクラス追加
add_filter('body_class', 'add_page_slug_class_name');
function add_page_slug_class_name($classes)
{
    if (is_page()) {
        $page = get_post(get_the_ID());
        $classes[] = $page->post_name;
    }
    return $classes;
}

//アイキャッチ画像
add_theme_support('post-thumbnails');
add_image_size('single-thum', 280, 180, true);
add_image_size('home-thum', 246, 150, true);

//アーカイブページ表示
// function post_has_archive( $args, $post_type ) {
//     if ( 'post' == $post_type ) {
//         $args['rewrite'] = true;
//         $args['has_archive'] = 'news'; // ページ名
//     }
//     return $args;
// }
// add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

add_filter('register_post_type_args', function ($args, $post_type) {
    if ('post' == $post_type) {
        global $wp_rewrite;
        $archive_slug = 'news';
        $args['label'] = 'ニュース';
        $args['has_archive'] = $archive_slug;
        $archive_slug = $wp_rewrite->root.$archive_slug;
        $feeds = '(' . trim(implode('|', $wp_rewrite->feeds)) . ')';
        add_rewrite_rule("{$archive_slug}/?$", "index.php?post_type={$post_type}", 'top');
        add_rewrite_rule("{$archive_slug}/feed/{$feeds}/?$", "index.php?post_type={$post_type}".'&feed=$matches[1]', 'top');
        add_rewrite_rule("{$archive_slug}/{$feeds}/?$", "index.php?post_type={$post_type}".'&feed=$matches[1]', 'top');
        add_rewrite_rule("{$archive_slug}/{$wp_rewrite->pagination_base}/([0-9]{1,})/?$", "index.php?post_type={$post_type}".'&paged=$matches[1]', 'top');
    }
    return $args;
}, 10, 2);



add_editor_style('/assets/css/editor-style.css');


// 固定ページのみ自動的に付与されるpタグやbrタグを無効
add_filter('the_content', 'wpautop_filter', 9);
function wpautop_filter($content)
{
    global $post;
    $remove_filter = false;
    $arr_types = array('page'); //適用させる投稿タイプを指定
    $post_type = get_post_type($post->ID);
    if (in_array($post_type, $arr_types)) {
        $remove_filter = true;
    }
    if ($remove_filter) {
        remove_filter('the_content', 'wpautop');
        remove_filter('the_excerpt', 'wpautop');
    }
    return $content;
}


//カテゴリー一覧タイトル表示から余計な文言削除
function custom_archive_title($title)
{
    $titleParts=explode(': ', $title);
    if ($titleParts[1]) {
        return $titleParts[1];
    }
    return $title;
}
add_filter('get_the_archive_title', 'custom_archive_title');

//THANKSPAGE
$contact = 'contact';
$thanks = 'thanks';


add_action('wp_footer', 'redirect_thanks_page');
function redirect_thanks_page()
{
    global $contact;
    global $thanks;

    if (is_page($contact)) {
        ?>
  <script>
    document.addEventListener( 'wpcf7mailsent', function( event ) {
      location = '<?php echo home_url('/'.$thanks); ?>'; // 遷移先のURL
    }, false );
  </script>
  <?php
    }
}

// 固定カスタムフィールドボックス
function add_recruit_fields()
{
    add_meta_box('recruit_setting', '【募集要項】recruitページ内のみで使用できます。', 'insert_recruit_fields', 'page', 'normal');
}
add_action('admin_menu', 'add_recruit_fields');


// カスタムフィールドの入力エリア
function insert_recruit_fields()
{
    global $post;

    echo '募集職種　　　　　　： <textarea cols="100" rows="1" name="recruit_type">'.get_post_meta($post->ID, 'recruit_type', true).'</textarea><br>';
    echo 'リサーチチームの特徴： <textarea cols="100" rows="10" name="recruit_feature">'.get_post_meta($post->ID, 'recruit_feature', true).'</textarea><br>';
    echo '業務内容　　　　　　： <textarea cols="100" rows="10" name="recruit_description">'.get_post_meta($post->ID, 'recruit_description', true).'</textarea><br>';
    echo '求めている人物像　　： <textarea cols="100" rows="10" name="recruit_profile">'.get_post_meta($post->ID, 'recruit_profile', true).'</textarea><br>';
}


// カスタムフィールドの値を保存
function save_recruit_fields($post_id)
{
    if (!empty($_POST['recruit_type'])) { //題名が入力されている場合
        update_post_meta($post_id, 'recruit_type', $_POST['recruit_type']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'recruit_type'); //値を削除
    }

    if (!empty($_POST['recruit_feature'])) {
        update_post_meta($post_id, 'recruit_feature', $_POST['recruit_feature']);
    } else {
        delete_post_meta($post_id, 'recruit_feature');
    }

    if (!empty($_POST['recruit_description'])) {
        update_post_meta($post_id, 'recruit_description', $_POST['recruit_description']);
    } else {
        delete_post_meta($post_id, 'recruit_description');
    }

    if (!empty($_POST['recruit_profile'])) {
        update_post_meta($post_id, 'recruit_profile', $_POST['recruit_profile']);
    } else {
        delete_post_meta($post_id, 'recruit_profile');
    }
}
add_action('save_post', 'save_recruit_fields');

 // Default block styles Gutenberg
function nendebcom_theme_support_setup()
{
    add_theme_support('wp-block-styles');

    // Wide Alignment Gutenberg
    //add_theme_support( 'align-wide' );
}
add_action('after_setup_theme', 'nendebcom_theme_support_setup');

//ゴミ箱に移動する直前に実行する
add_action("wp_trash_post", "no_delete_page", 1, 1);
function no_delete_page($post_id)
{
    global $post_type;

    //固定ページのみ対象
    if ($post_type == 'page') {
        //削除したくないページIDを配列に格納
        $no_delete_page_lists = array("11","5","9","7","60");

        if (in_array($post_id, $no_delete_page_lists)) {
            if (!strpos(wp_get_referer(), 'notrash=1')) {
                $no_trash_flag = '&notrash=1';
            }
            wp_redirect(wp_get_referer() . $no_trash_flag);
            exit();
        }
    }
}

//エラーメッセージ表示処理
add_action('admin_notices', 'trash_notice');
function trash_notice()
{
    //パラメータがある時にメッセージを表示
    if (strpos(getenv('REQUEST_URI'), 'notrash=1')) {
        echo '<div class="message error"><p>選択されたページを削除することはできません。</p></div>';
    }
}

function disable_visual_editor_in_page()
{
    global $typenow;
    $post_id = $_GET['post'];
    if ($typenow == 'page') {
        if (in_array($post_id, array("11","5","9","7","2","60"), true)) {
            $hide_postdiv_css = '<style type="text/css">.editor-block-list__layout, .block-editor-block-list__layout { display: none; }</style>';
            echo $hide_postdiv_css;
        }
    }
}
add_action('load-post.php', 'disable_visual_editor_in_page');
add_action('load-post-new.php', 'disable_visual_editor_in_page');

function remove_menus()
{
    remove_submenu_page('edit.php?post_type=page', 'post-new.php?post_type=page');//固定ページ>新規追加
remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');//投稿>カテゴリー
remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');//投稿>タグ
remove_menu_page('edit-comments.php');
    remove_menu_page('themes.php');
}
add_action('admin_menu', 'remove_menus');

function load_recaptcha_js()
{
    if (! is_page('contact')) {
        wp_deregister_script('google-recaptcha');
    }
}
add_action('wp_enqueue_scripts', 'load_recaptcha_js');
