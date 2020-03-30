<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?><?php } ?> <?php wp_title(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/common.css?20200111">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-migrate-3.1.0.js"></script>
<?php wp_head(); ?>
</head>
<body>
<?php
//ACFdataの取得
$basicdata_key = get_page_by_path('top-and-common')->ID;
$common_data = get_field('common_data', $basicdata_key);

// print_r('<pre style="margin-top: 100px;">');
// var_dump($top_contents[0]);
// print_r('</pre>');

function set_logo($obj){
  $html_dom = '';
  $html_dom .= '<h1 class="header_logo"><a href="/">';
  if(!empty($obj['images'])):
    $html_dom .= '<img src="'.$obj['images']['url'].'" alt="'.$obj['text'].'" />';
  endif;
  if(!empty($obj['text'])):
    $html_dom .= '<span>'.$obj['text'].'</span>';
  endif;
  $html_dom .= '</a></h1>';
  echo $html_dom;
}

?>

<header class="mc_float_header">
  <div class="mc_float_header_inner">
    <?php set_logo($common_data[0]); ?>
    <nav class="mc_global_menu__wrap">
    <?php
    wp_nav_menu( array(
      'menu' => 'global_nav',
      'container' => false ,
      'items_wrap' => '<ul class="mc_global_menu">%3$s</ul>',
      'walker' => new Custom_Walker_Nav_Pc_Menu
    ));
    ?>
    </nav>
  </div>
</header>

<a href="#" class="menu_trigger" data-role="mc-drawer-trigger">
  <span></span>
  <span></span>
  <span></span>
</a>

<nav class="mc_mobile_menu__wrap" data-role="mc-drawer-contents">
  <?php
  wp_nav_menu( array(
    'menu' => 'global_nav',
    'container' => false ,
    'items_wrap' => '<ul class="mc_mobile_menu" data-role="sub-nav-open">%3$s</ul>',
    'walker' => new Custom_Walker_Nav_Sp_Menu
  ));
  ?>
</nav>

<div class="overlay" data-role="mc-drawer-bg"></div>