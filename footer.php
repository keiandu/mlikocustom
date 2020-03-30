<?php
$basicdata_key = get_page_by_path('top-and-common')->ID;
$common_data = get_field('common_data', $basicdata_key);

function set_logo_ft($obj){
  $html_dom = '';
  $html_dom .= '<div class="header_logo"><a href="/">';
  if(!empty($obj['images'])):
    $html_dom .= '<img src="'.$obj['images']['url'].'" alt="'.$obj['text'].'" />';
  endif;
  if(!empty($obj['text'])):
    $html_dom .= '<span>'.$obj['text'].'</span>';
  endif;
  $html_dom .= '</a></div>';
  echo $html_dom;
}

?>
<section class="mc_section_inner__bread">
  <nav class="breadcrumb">
    <ul>
      <li><a href="/">TOP</a></li>
      <li><a href="#">ページ名01</a></li>
      <li><a href="#">ページ名02</a></li>
      <li><a href="#">ページ名03</a></li>
      <li><a href="#">ページ名03</a></li>
      <li><a href="#">ページ名03</a></li>
      <li><a href="#">ページ名03</a></li>
      <li><a href="#">ページ名03</a></li>
      <li><span>現在のページ名</span></li>
    </ul>
  </nav>
</section>

<footer class="mc_footer mc_slash_left">
  <div class="mc_section_inner mc_footer_inner">
    <?php set_logo_ft($common_data[0]); ?>
    <address class="mc_footer_addr"><?php echo $common_data[2]['addr']; ?></address>
    <nav class="mc_footer_menu__wrap">
    <?php
    wp_nav_menu( array(
      'menu' => 'global_nav',
      'container' => false ,
      'items_wrap' => '<ul class="mc_footer_menu">%3$s</ul>',
      'walker' => new Custom_Walker_Footer_Menu
    ));
    ?>
    </nav>
    <small class="copyright"><?php echo $common_data[2]['copyright']; ?></small>
  </div>
</footer>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/common.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
$('.mc_cp_slider').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  prevArrow: '<span class="slick_prev_arrow">&lt;</span>',
  nextArrow: '<span class="slick_next_arrow">&gt;</span>',
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
</script>
<?php wp_footer(); ?>
</body>
</html>

