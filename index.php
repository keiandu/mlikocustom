<?php get_header(); ?>

<?php
//ACFdataの取得
$basicdata_key = get_page_by_path('top-and-common')->ID;
$common_data = get_field('common_data', $basicdata_key);
$top_contents = get_field('top_contents', $basicdata_key);

// print_r('<pre style="margin-top: 100px;">');
// var_dump($top_contents[6]);
// print_r('</pre>');

function three_column_photo_normagin($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  if(!empty($obj['textarea_top'])):
    $html_dom .= '<div class="mc_textarea">';
    $html_dom .= '<p>'.$obj['textarea_top'].'</p>';
    $html_dom .= '</div>';
  endif;
  if(!empty($obj['article'])):
    $html_dom .= '<div class="mc_cp_borderess_photo">';
    foreach($obj['article'] as $key => $value):
      $html_dom .= '<div><img src="'.$value['photo']['url'].'" alt="'.$value['photo']['title'].'" /></div>';
    endforeach;
    $html_dom .= '</div>';
  endif;
  if(!empty($obj['textarea'])):
    $html_dom .= '<div class="mc_textarea">';
    $html_dom .= '<p>'.$obj['textarea'].'</p>';
    $html_dom .= '</div>';
  endif;
  $html_dom .= '</section>';
  echo $html_dom;
}

function three_column_photo_link($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_cp_bgphoto_contents mc_slash_right mc_slash_left">';
  $html_dom .= '<nav class="mc_cp_bgphoto_contents__overnav">';
  foreach($obj['article'] as $key => $value):
    if(!empty($value['link'])):
      $html_dom .= '<a class="mc_cp_bgphoto_contents__overnav__unit" href="'.$value['link']['url'].'">';
      $html_dom .= '<p class="text underline_parent"><span class="underline">'.$value['link']['title'].'</span></p>';
    endif;
    if(!empty($value['photo'])):
      $html_dom .= '<div class="img_hover"><img src="'.$value['photo']['url'].'" alt="'.$value['photo']['title'].'" /></div>';
    endif;
    if(!empty($value['link'])):
      $html_dom .= '</a>';
    endif;
  endforeach;
  $html_dom .= '</nav>';
  $html_dom .= '<div class="mc_cp_bgphoto_contents__overnav__bg"></div>';
  $html_dom .= '</section>';
  echo $html_dom;
}

function three_column_photo($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  if(!empty($obj['title'])):
    $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  endif;
  if(!empty($obj['textarea'])):
    $html_dom .= '<div class="mc_textarea">';
    $html_dom .= '<p>'.$obj['textarea'].'</p>';
    $html_dom .= '</div>';
  endif;
  if(!empty($obj['article'])):
    $html_dom .= '<div class="mc_cp_caption_photo">';
    foreach($obj['article'] as $key => $value):
      $html_dom .= '<figure class="mc_cp_caption_photo__unit">';
      if(!empty($value['photo'])):
        $html_dom .= '<img class="photo" src="'.$value['photo']['url'].'" alt="'.$value['photo']['title'].'" />';
      endif;
      if(!empty($value['text'])):
        $html_dom .= '<figcaption class="text">'.$value['text'].'</figcaption>';
      endif;
      $html_dom .= '</figure>';
    endforeach;
    $html_dom .= '</div>';
  endif;
  $html_dom .= '</section>';
  echo $html_dom;
}

function four_column_nav($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_cp_bgphoto_contents mc_slash_right mc_slash_left colorfilter_blue">';
  $html_dom .= '<div class="mc_cp_bgphoto_contents__squarenav">';
  $html_dom .= '<div>';
  if(!empty($obj['title'])):
    $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  endif;
  if(!empty($obj['textarea'])):
    $html_dom .= '<div class="mc_textarea">';
    $html_dom .= '<p>'.$obj['textarea'].'</p>';
    $html_dom .= '</div>';
  endif;
  $html_dom .= '<div class="mc_cp_bgphoto_contents__squarenav__article">';
  foreach($obj['article'] as $key => $value):
    if(!empty($value['link'])):
      $html_dom .= '<a class="mc_cp_bgphoto_contents__squarenav__unit" href="'.$value['link']['url'].'">';
      $html_dom .= '<p class="text underline_parent"><span class="underline">'.$value['link']['title'].'</span></p>';
    endif;
    if(!empty($value['photo'])):
      $html_dom .= '<div class="img_hover"><img src="'.$value['photo']['sizes']['bnlink_size'].'" alt="'.$value['photo']['title'].'" /></div>';
    endif;
    if(!empty($value['link'])):
      $html_dom .= '</a>';
    endif;
  endforeach; 
  $html_dom .= '</div></div></div>';
  $html_dom .= '<div class="mobile_fix_wrap"><img class="bgphoto mobile_fix" src="https://weekly-net.co.jp/wp/wp-content/uploads/2019/09/091808.jpg" alt="" /></div>';
  $html_dom .= '</section>';
  echo $html_dom;
}

function slider($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  if(!empty($obj['title'])):
    $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  endif;
  if(!empty($obj['textarea'])):
    $html_dom .= '<div class="mc_textarea">';
    $html_dom .= '<p>'.$obj['textarea'].'</p>';
    $html_dom .= '</div>';
  endif;
  if(!empty($obj['article'])):
    $html_dom .= '<section class="mc_cp_slider">';
    foreach($obj['article'] as $key => $value):
      $html_dom .= '<article class="mc_cp_slider__article">';
      $html_dom .= '<div class="mc_cp_slider__article__title">';
      if(!empty($value['title'])):
        $html_dom .= '<p class="ttl">'.$value['title'].'</p>';
      endif;
      if(!empty($value['textarea'])):
        $html_dom .= '<p class="text">'.$value['textarea'].'</p>';
      endif;
      $html_dom .= '</div>';
      $html_dom .= '<div class="mc_photo_gradiate">';
      $html_dom .= '<img src="'.$value['photo']['sizes']['slider_size'].'" alt="'.$value['photo']['title'].'" />';
      $html_dom .= '</div>';
      $html_dom .= '</article>';
    endforeach;
    $html_dom .= '</section>';
  endif;
  $html_dom .= '</section>';
  echo $html_dom;
}

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

function two_column_nav($obj){
  $html_dom = '';
  $html_dom .= '<section class="mc_section_inner">';
  $html_dom .= '<div>';
  $html_dom .= '<h2 class="mc_mainttl">'.$obj['title'].'</h2>';
  if(!empty($obj['textarea'])):
    $html_dom .= '<div class="mc_textarea">';
    $html_dom .= '<p>'.$obj['textarea'].'</p>';
    $html_dom .= '</div>';
  endif;
  $html_dom .= '<div class="mc_cp_contents__overnav">';
  foreach($obj['article'] as $key => $value):
    $html_dom .= '<a class="mc_cp_contents__overnav__unit" href="'.$value['link']['url'].'">';
    $html_dom .= '<p class="text underline_parent"><span class="underline">'.$value['link']['title'].'</span></p>';
    $html_dom .= '<div class="img_hover"><img src="'.$value['photo']['sizes']['bnlink_size'].'" alt="'.$value['title'].'" /></div>';
    $html_dom .= '</a>';
  endforeach;
  $html_dom .= '</div></div>';
  $html_dom .= '</section>';
  echo $html_dom;
}

?>
<style>
.background {
  background: url(https://www.non-standardworld.co.jp/wp-content/themes/nswinc/img/visual_header.jpg) no-repeat center center;
  background-size: cover;
  position: relative;
  z-index: -2;
  width: 100%;
  height: 100vh;
  margin: 0 auto;
}
.background .background-wrap {
  position: relative;
  top: 0;
  left: 0;
  z-index: -1;
  min-width: 100%;
  min-height: 100%;
  overflow: hidden;
}
.background .background-wrap .background-movie {
  position: relative;
  display: flex;
  justify-content: center;
}
.background .background-wrap #background-movie-player {
  width: 100%;
  height: 100vh;
  flex: none;
}
</style>

<main>
  <section class="mc_mainimage mc_slash_right">
    <div id="visual_header" class="background">
      <div class="background-wrap">
        <div class="background-movie">
          <div id="background-movie-player"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="mc_section_inner mc_top_news_base">
    <div class="mc_top_news">
      <p class="mc_top_news__icon">
        <span class="mc_top_news__icon__ttl">お知らせ</span>
        <img class="mc_top_news__icon__bg" src="<?php bloginfo( 'template_url' ); ?>/images/icon_news.png" alt="" />
      </p>
      <p class="mc_top_news__text"><a href="">2020.2.25 【採用情報】大型トラック運転手の募集を再開しました</a></p>
    </div>
  </section>

  <?php three_column_photo_normagin($top_contents[0]); ?>
  <?php three_column_photo_link($top_contents[1]); ?>
  <?php three_column_photo($top_contents[2]); ?>
  <?php four_column_nav($top_contents[3]); ?>
  <?php slider($top_contents[4]); ?>
  <?php recruit($top_contents[5]); ?>
  <?php two_column_nav($top_contents[6]); ?>


</main>

<?php get_footer(); ?>
