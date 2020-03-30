<?php 
/**
 * Template Name: page-other-basic
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 */
get_header(); 
?>

<main class="other">

  <section class="mc_otherimage">
    <div class="mobile_fix"><img src="https://i2.wp.com/smartdrive-style.jp/wp-content/uploads/2019/01/95beb9ea4a056bd6a9a90a1c57c0a4dc_m.jpg" alt="main image" /></div>
  </section>

  <section class="mc_page_nav">
    <nav class="mc_page_nav_inner">
      <p class="mc_page_nav__mobile_triger" data-role="mc-page-nav-triger">関連ページ</p>
      <ul class="mc_page_nav__wrap" data-role="mc-page-nav">
        <li><a class="mc_page_nav__li" href="">輸送サービス移動部</a></li>
        <li><a class="mc_page_nav__li" href="">マーキングシステム事業部</a></li>
        <li><a class="mc_page_nav__li" href="">カーライン事業部</a></li>
        <li><a class="mc_page_nav__li" href="">LED照明販売事業</a></li>
        <li><a class="mc_page_nav__li" href="">化粧ダクト兼用架台販売事業</a></li>
      </ul>
    </nav>
  </section>

<?php
$custom_contents = get_field('custom_contents');

$basicdata_key = get_page_by_path('top-and-common')->ID;
$top_contents = get_field('top_contents', $basicdata_key);

// print_r('<pre style="margin-top: 100px;">');
// var_dump($custom_contents);
// print_r('</pre>');

if(!empty($custom_contents)):
  foreach($custom_contents as $key => $value):
    if($value['acf_fc_layout'] == '1column_largephoto'): one_column_largephoto($value); endif;
    if($value['acf_fc_layout'] == '2column_liststyle'): two_column_liststyle($value); endif;
    if($value['acf_fc_layout'] == '3column_article'): three_column_article($value); endif;
    if($value['acf_fc_layout'] == 'title_and_text'): title_and_text($value); endif;
    if($value['acf_fc_layout'] == 'border_contents'): border_contents($value); endif;
    if($value['acf_fc_layout'] == 'tables'): tables($value); endif;
    if($value['acf_fc_layout'] == '1column_liststyle'): one_column_liststyle($value); endif;
    if($value['acf_fc_layout'] == '1or2column_photo'): one_or_two_column_photo($value); endif;
    if($value['acf_fc_layout'] == 'subtitle_and_text'): subtitle_and_text($value); endif;
    if($value['acf_fc_layout'] == '3column_photo'): three_column_photo($value); endif;
    if($value['acf_fc_layout'] == '3column_photo_normagin'): three_column_photo_normagin($value); endif;
    if($value['acf_fc_layout'] == 'gallery'): gallery($value); endif;
  endforeach;
endif;

function one_column_largephoto($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  if(!empty($obj['title'])):
    $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  endif;
  if(!empty($obj['photo']['ID'])):
    $html_dom .= '<img src="'.$obj['photo']['sizes']['large'].'" alt="'.$obj['photo']['alt'].'" />';
  endif;
  $html_dom .= '</section>';
  echo $html_dom;
}

function two_column_liststyle($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  if(!empty($obj['title'])):
    $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  endif;
  if(!empty($obj['list'])):
    $html_dom .= '<div class="mc_cp_2column_liststyle">';
    foreach($obj['list'] as $key => $value):
      $html_dom .= '<dl><dt>'.$value['left_text'].'</dt><dd>'.$value['right_text'].'</dd></dl>';
    endforeach;
    $html_domm .= '</div>';
  endif;
  $html_dom .= '</section>';
  echo $html_dom;
}

function three_column_article($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  if(!empty($obj['title'])): //タイトルの表示
    $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  endif;
  if(!empty($obj['article'])):
    $html_dom .= '<div class="mc_cp_caption_photo_other">';
    foreach($obj['article'] as $key => $value):
      $html_dom .= '<figure class="mc_cp_caption_photo_other__unit">';
      if(!empty($value['photo'])): //写真の表示
        $html_dom .= '<img class="photo" src="'.$value['photo']['url'].'" alt="'.$value['photo']['title'].'" />';
      endif;
      $html_dom .= '<figcaption class="text">';
        if(!empty($value['caption'])): //キャプションの表示
          $html_dom .= '<span class="ttl">'.$value['caption'].'</span>';
        endif;
        if(!empty($value['textarea'])): //テキストエリアの表示
          $html_dom .= '<span>'.$value['textarea'].'</span>';
        endif;
      $html_dom .= '</figcaption>';
      if(!empty($value['link'])): //写真の表示
        $html_dom .= '<a class="btn" href="'.$value['link']['url'].'">'.$value['link']['title'].'</a>';
      endif;
      $html_dom .= '</figure>';
    endforeach;
    $html_dom .= '</div>';
  endif;
  $html_dom .= '</section>';
  echo $html_dom;
}

function title_and_text($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  if(!empty($obj['title'])):
    $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  endif;
  if(!empty($obj['sub_title'])):
    $html_dom .= '<h3 class="mc_contents_ttl">'.$obj['sub_title'].'</h3>';
  endif;
  if(!empty($obj['textarea'])):
    $html_dom .= '<div class="mc_textarea">';
    $html_dom .= '<p>'.$obj['textarea'].'</p>';
    $html_dom .= '</div>';
  endif;
  $html_dom .= '</section>';
  echo $html_dom;
}

function border_contents($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  $html_dom .= '<div class="mc_cp_bordercontents">';
  if(!empty($obj['image']['ID'])):
    $html_dom .= '<div class="photo"><img src="'.$obj['image']['url'].'" alt="'.$obj['image']['title'].'" /></div>';
  endif;
  if(!empty($obj['textarea'])):
    $html_dom .= '<div class="mc_textarea">';
    $html_dom .= '<p>'.$obj['textarea'].'</p>';
    $html_dom .= '</div>';
  endif;
  $html_dom .= '</div>';
  $html_dom .= '</section>';
  echo $html_dom;
}

function tables($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  $html_dom .= '<table class="mc_cp_table">';
  if(!empty($obj['table']['header'])):
    $html_dom .= '<tr>';
    foreach($obj['table']['header'] as $key => $value):
      $html_dom .= '<th>'.$value['c'].'</th>';
    endforeach;
    $html_dom .= '</tr>';
  endif;
  if(!empty($obj['table']['body'])):
    foreach($obj['table']['body'] as $key => $value):
      $html_dom .= '<tr>';
      foreach($value as $keys => $values):
        $html_dom .= '<td>'.$values['c'].'</th>';
      endforeach;
      $html_dom .= '</tr>';
    endforeach;
  endif;
  $html_dom .= '</table>';
  $html_dom .= '</section>';
  echo $html_dom;
}

function one_column_liststyle($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  if(!empty($obj['title'])):
    $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  endif;
  $html_dom .= '<div class="mc_cp_1column_liststyle">';
  $html_dom .= '<ul>';
  foreach($obj['list'] as $key => $value):
    $html_dom .= '<li>'.$value['text'].'</li>';
  endforeach;
  $html_dom .= '</ul>';
  $html_dom .= '</div>';
  $html_dom .= '</section>';
  echo $html_dom;
}

function one_or_two_column_photo($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  $html_dom .= '<div class="mc_cp_caption_photo">';
  foreach($obj['photofield'] as $key => $value):
    $html_dom .= '<figure class="mc_cp_center_photo__unit">';
    if(!empty($value['photo'])):
      $html_dom .= '<img class="photo" src="'.$value['photo']['url'].'" alt="'.$value['photo']['title'].'" />';
    endif;
    if(!empty($value['caption'])):
      $html_dom .= '<figcaption class="text">'.$value['caption'].'</figcaption>';
    endif;
    $html_dom .= '</figure>';
  endforeach;
  $html_dom .= '</div>';
  $html_dom .= '</section>';
  echo $html_dom;
}

function subtitle_and_text($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  if(!empty($obj['subtitle'])):
    $html_dom .= '<h3 class="mc_contents_ttl">'.$obj['subtitle'].'</h3>';
  endif;
  if(!empty($obj['subtitle'])):
    $html_dom .= '<div class="mc_textarea">';
    $html_dom .= '<p>'.$obj['textarea'].'</p>';
    $html_dom .= '</div>';
  endif;
  $html_dom .= '</section>';
  echo $html_dom;
}

function three_column_photo($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  if(!empty($obj['article'])):
    $html_dom .= '<div class="mc_cp_caption_photo">';
    foreach($obj['article'] as $key => $value):
      $html_dom .= '<figure class="mc_cp_caption_photo__unit">';
      if(!empty($value['photo'])):
        $html_dom .= '<img class="photo" src="'.$value['photo']['url'].'" alt="'.$value['photo']['title'].'" />';
      endif;
      $html_dom .= '<figcaption class="text">';
      if(!empty($value['sub_title'])):
        $html_dom .= '<span class="ttl">'.$value['sub_title'].'</span>';
      endif;
      if(!empty($value['text'])):
        $html_dom .= '<span class="ttl">'.$value['text'].'</span>';
      endif;
      $html_dom .= '</figcaption>';
      $html_dom .= '</figure>';
    endforeach;
    $html_dom .= '</div>';
  endif;
  $html_dom .= '</section>';
  echo $html_dom;
}

function three_column_photo_normagin($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  if(!empty($obj['article'])):
    $html_dom .= '<div class="mc_cp_borderess_photo">';
    foreach($obj['article'] as $key => $value):
      $html_dom .= '<div><img src="'.$value['photo']['url'].'" alt="'.$value['photo']['title'].'" /></div>';
    endforeach;
    $html_dom .= '</div>';
  endif;
  if(!empty($obj['textarea'])):
    $html_dom .= '<p>'.$obj['textarea'].'</p>';
  endif;
  $html_dom .= '</section>';
  echo $html_dom;
}

function gallery($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  $html_dom .= '<div class="mc_cp_borderess_gallery">';
  foreach($obj['gallery'] as $key => $value):
    $html_dom .= '<div class="photo"><img src="'.$value['url'].'" alt="'.$value['title'].'" /></div>';
  endforeach;
  $html_dom .= '</div>';
  $html_dom .= '</section>';
  echo $html_dom;
}

// これだけ別枠で（index.phpにも記述あり）
function recruit($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_cp_bgphoto_contents mc_slash_right mc_slash_left">';
  $html_dom .= '<div class="mc_cp_bgphoto_contents__centertext">';
  $html_dom .= '<div>';
  $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  if(!empty($obj['textarea'])):
    $html_dom .= '<div class="mc_textarea">';
    $html_dom .= '<p>'.$obj['textarea'].'</p>';
    $html_dom .= '</div>';
  endif;
  $html_dom .= '<a class="mc_cp_bgphoto_contents__centertext__btn" href="'.$obj['btn']['link']['url'].'">'.$obj['btn']['text'].'</a>';
  $html_dom .= '</div></div>';
  $html_dom .= '<div class="mobile_fix_wrap__bottom"><img class="bgphoto mobile_fix" src="'.$obj['background']['url'].'" alt="'.$obj['background']['title'].'" /></div>';
  $html_dom .= '</section>';
  echo $html_dom;
}
?>

<?php recruit($top_contents[5]); ?>

</main>

<?php get_footer(); ?>