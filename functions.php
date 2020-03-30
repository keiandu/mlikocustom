<?php

add_theme_support('post-thumbnails');
add_image_size('bnlink_size', 392, 122 ,true); // オリジナルサムネイルサイズ
add_image_size('slider_size', 375, 477 ,true); // オリジナルサムネイルサイズ

// カスタムメニューの出力調整（PC）
class Custom_Walker_Nav_Pc_Menu extends Walker_Nav_Menu {
    public $cnt = 0;
    function start_lvl( &$output, $depth = 0, $item = array(), $args = array()) { // 子要素のulの調整
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array('sub_nav');
        $class_names = implode( ' ', $classes );
        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) { // メニュー全ての調整
        $item_output = "";
        $target = "";
        if($depth === 0):
            $this->cnt++; // data-id を振るためにcountする
            if($item -> target == '_blank'):
              $target = ' target="_blank"';
            endif;
            $output .= '<li class="main_nav">';
            $item_output .= '<a href="'.esc_attr($item -> url).'"'.$target.'>'
                            . $item -> title . '</a>';
        else:
            if($item -> target == '_blank'):
              $target = ' target="_blank"';
            endif;
            $output .= '<li>';
            $item_output .= '<a class="sub_nav__li" href="'
                            . esc_attr($item -> url) .'"'.$target.'>'
                            . $item -> title . '</a>';
        endif;
        $item->cnt = $this->cnt;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
add_theme_support('menus');

// カスタムメニューの出力調整（SP）
class Custom_Walker_Nav_Sp_Menu extends Walker_Nav_Menu {
    public $cnt = 0;
    function start_lvl( &$output, $depth = 0, $item = array(), $args = array()) { // 子要素のulの調整
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array('sub_nav');
        $class_names = implode( ' ', $classes );
        // build html
        $output .= '<span class="main_nav__child_btn" data-id="'.$this->cnt.'">';
        $output .= '<span class="icon_arrow" data-role="sub-nav-icon" data-id="'.$this->cnt.'"></span></span>';
        $output .= "\n" . $indent . '<ul class="' . $class_names . '" data-role="sub-nav-contents" data-id="'.$this->cnt.'">' . "\n";
    }
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) { // メニュー全ての調整
        $item_output = "";
        $target = "";
        if($depth === 0):
            $this->cnt++; // data-id を振るためにcountする
            if($item -> target == '_blank'):
              $target = ' target="_blank"';
            endif;
            $output .= '<li class="main_nav">';
            $item_output .= '<a class="main_nav__li" href="'.esc_attr($item -> url).'"'.$target.'>'
                            . $item -> title . '</a>';
        else:
            if($item -> target == '_blank'):
              $target = ' target="_blank"';
            endif;
            $output .= '<li>';
            $item_output .= '<a class="sub_nav__li" href="'
                            . esc_attr($item -> url) .'"'.$target.'>'
                            . $item -> title . '</a>';
        endif;
        $item->cnt = $this->cnt;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
add_theme_support('menus');

class Custom_Walker_Footer_Menu extends Walker_Nav_Menu {
    public $cnt = 0;
    function start_lvl( &$output, $depth = 0, $item = array(), $args = array()) { // 子要素のulの調整
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array('sub_nav');
        $class_names = implode( ' ', $classes );
        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) { // メニュー全ての調整
        $item_output = "";
        $target = "";
        if($depth === 0):
            $this->cnt++; // data-id を振るためにcountする
            if($item -> target == '_blank'):
              $target = ' target="_blank"';
            endif;
            $output .= '<li class="main_nav">';
            $item_output .= '<a class="sub_nav__li" href="'
                            . esc_attr($item -> url) .'"'.$target.'>'
                            . $item -> title . '</a>';
        else:
            if($item -> target == '_blank'):
              $target = ' target="_blank"';
            endif;
            $output .= '<li class="main_nav">';
            $item_output .= '<a class="sub_nav__li" href="'
                            . esc_attr($item -> url) .'"'.$target.'>'
                            . $item -> title . '</a>';
        endif;
        $item->cnt = $this->cnt;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
add_theme_support('menus');

/**
 * RECRUITカスタム投稿
 * カテゴリ有り
 * 
 * 
*/
add_action( 'init', 'register_cpt_recruit' );
function register_cpt_recruit() {
  $labels = array(
    'name' => _x( '採用', 'recruit' ),
    'singular_name' => _x( '採用', 'recruit' ),
    'add_new' => _x( '新規追加', 'recruit' ),
    'add_new_item' => _x( '新しいプロフィールを追加', 'recruit' ),
    'edit_item' => _x( 'プロフィールを編集', 'recruit' ),
    'new_item' => _x( '新しいrecruit', 'recruit' ),
    'view_item' => _x( 'プロフィールを見る', 'recruit' ),
    'search_items' => _x( '検索', 'recruit' ),
    'not_found' => _x( 'プロフィールが見つかりません', 'recruit' ),
    'not_found_in_trash' => _x( 'ゴミ箱にプロフィールはありません', 'recruit' ),
    'parent_item_colon' => _x( '親:', 'recruit' ),
    'menu_name' => _x( '採用', 'recruit' )
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'description' => '経歴紹介とか',
    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
    'taxonomies' => array('cat-recruit'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
	  'show_in_rest' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );
  flush_rewrite_rules( false );
  register_post_type( 'recruit', $args );
  register_taxonomy(
    'cat-recruit',
    'recruit',
    array(
      'hierarchical' => true,
      'label' => 'カテゴリ',
      'show_ui' => true,
		'show_in_rest' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'cat-recruit'),
      'singular_label' => 'カテゴリ'
    )
  );
}

// 管理画面のナビゲーションを削除する
function remove_menus () {
    global $menu;
    if (!current_user_can('administrator')) {
    //unset($menu[2]);  // ダッシュボード
    //unset($menu[4]);  // メニューの線1
    unset($menu[5]);  // 投稿
    //unset($menu[10]); // メディア
    unset($menu[15]); // リンク
    //unset($menu[20]); // ページ
    unset($menu[25]); // コメント
    //unset($menu[59]); // メニューの線2
    unset($menu[60]); // テーマ
    unset($menu[65]); // プラグイン
    unset($menu[70]); // プロフィール
    unset($menu[75]); // ツール
    unset($menu[80]); // 設定
    //unset($menu[90]); // メニューの線3
    }else{
        unset($menu[5]);  // 投稿
        //unset($menu[10]); // メディア
        unset($menu[25]); // コメント
    }
}
add_action('admin_menu', 'remove_menus', 20);

// アイキャッチ画像をリストに追加（順番ソートも）
function sort_list($ch){
    $ch = array(
        'cb' => '<input type="checkbox" />',
        'eye' => 'Image',
        'title' => 'タイトル',
        //'categories' => 'カテゴリー',
        //'tags' => 'タグ',
        'date' => '日時',
    );
    return $ch;
}
add_filter( 'manage_posts_columns', 'sort_list');

 // アイキャッチ画像の列の幅をCSSで調整
function css_list() {
    echo '<style TYPE="text/css">.column-eye{width:100px;}</style>';
}
add_action('admin_print_styles', 'css_list', 14);


/**
 * Hide editor on specific pages.
 * デフォルトエディタを非表示にしたい場合、ここのifに追加する（固定ページのみ）
 */
add_action( 'admin_init', 'hide_editor', 13);
function hide_editor() {
	global $pagenow;
	if( !( 'post.php' == $pagenow ) ) return;
	global $post;
	// Get the Post ID.
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	if( !isset( $post_id ) ) return;
	// Hide the editor on the page titled 'Homepage'
	$homepgname = get_the_title($post_id);
	if($homepgname == '通常メニュー' || $homepgname == 'クーポン'){ 
		remove_post_type_support('page', 'editor');
	}
}


// ビジュアルエディタのHTML切り替えを削除する
add_filter('wp_editor_settings', function($settings, $editor_id){
     // Queck tagsをオフにすると、
     // 切り替えボタンがなくなる
     $settings['quicktags'] = false;
     return $settings;
}, 10, 2);

//addQuickTagをカスタム投稿にも対応させる
//add_filter( 'addquicktag_post_types', 'my_addquicktag_post_types' );
function my_addquicktag_post_types( $post_types ) {
    $services_array = service_slug();
    foreach($services_array as $key => $value){
        $post_types[] = $value;
    }
    return $post_types;
}

//管理画面 - 画像投稿の不要要素を削除する
add_filter( 'image_send_to_editor', 'remove_image_attribute', 10 );
add_filter( 'post_thumbnail_html', 'remove_image_attribute', 10 );

function remove_image_attribute( $html ){
  $html = preg_replace( '/(width|height)="\d*"\s/', '', $html );
  $html = preg_replace( '/class=[\'"]([^\'"]+)[\'"]/i', '', $html );
  $html = preg_replace( '/title=[\'"]([^\'"]+)[\'"]/i', '', $html );
  $html = preg_replace( '/<a href=".+">/', '', $html );
  $html = preg_replace( '/<\/a>/', '', $html );
  return $html;
}

function delete_host_from_attachment_url( $url ) {
  $regex = '/^http(s)?:\/\/[^\/\s]+(.*)$/';
  if ( preg_match( $regex, $url, $m ) ) {
    $url = $m[2];
  }
  return $url;
}
add_filter( 'wp_get_attachment_url', 'delete_host_from_attachment_url' );

function my_login_logo_url() {
    return '/'; //ロゴにリンクさせたいURL
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
 
function my_login_logo_url_title() {
    $ttl = get_bloginfo('name');
    return $ttl; //マウスオーバー時に表示させたい文字
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

//addQuickTag用
function my_admin_style() {
  echo '<style>
    .text-red {
      color: red;
    }
    .bg-wrap-red {
      border-radius: 8px;
      background: #fdf7f8;
      padding: 16px;
      display: inline-block;
    }
  </style>'.PHP_EOL;
}
add_action('admin_print_styles', 'my_admin_style');

function my_acf_init() {
  acf_update_setting('google_api_key', 'AIzaSyBt5Xdkes_36X-0z5QVYr6uy7vtZoYQJkI');
}
add_action('acf/init', 'my_acf_init', 9);

function hide_admin_logo() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'hide_admin_logo' );

/*
*  the_archive_title 余計な文字を削除
*
*/
function my_theme_archive_title( $title ) {
  if ( is_post_type_archive() && !is_date() ) {
    $title = post_type_archive_title( '', false );
  } elseif ( is_date() ) {
    $date  = single_month_title('',false);
    $point = strpos($date,'月');
    $title = mb_substr($date,$point+1).'年'.mb_substr($date,0,$point+1);
  }
  return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

function custom_query( $query ) {
  if( is_admin() || !$query->is_main_query() ){
    return;
  }
  if( $query->is_tax( 'topics') ) {
    $query->set( 'posts_per_page', '10' );
    return;
  }
}
add_action( 'pre_get_posts', 'custom_query' );

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// ログイン画面のカスタマイズ
function my_login_style() { ?>
  <style type="text/css">
  body {
    /*background: #F4BE01 none repeat scroll 0 0 !important;*/
  }
  .login h1 a {
    background-image: none !important;
  }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_style' );

// jquery wp_headで読みこまない
function my_delete_local_jquery() {
    wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' );


?>