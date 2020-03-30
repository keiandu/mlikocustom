$(function(){

	// SPメニューのドロワー処理
	$('.menu_trigger').on('click',function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$('main').removeClass('open');
			$('.mc_mobile_menu').removeClass('active');
			$('.mc_mobile_menu__wrap').removeClass('open');
			$('.overlay').removeClass('open');
		} else {
			$(this).addClass('active');
			$('main').addClass('open');
			$('.mc_mobile_menu__wrap').addClass('open');
			$('.mc_mobile_menu').addClass('active');
			$('.overlay').addClass('open');
		}
	});
	$('.overlay').on('click',function(){
		if($(this).hasClass('open')){
			$(this).removeClass('open');
			$('.menu_trigger').removeClass('active');
			$('main').removeClass('open');
			$('.mc_mobile_menu__wrap').removeClass('open');      
		}
	});

	var $subNavOpen = $('[data-role=sub-nav-open]');
	var $subNavContents = $('[data-role=sub-nav-contents]');
	var $subNavIcon = $('[data-role=sub-nav-icon]');
	var $subNavTargetCls = '.main_nav__child_btn';

	$subNavOpen.on('click', $subNavTargetCls, function(e){
		var $self = $(this);
		var $openTarget = $subNavContents.filter('[data-id="'+$self.data("id")+'"]');
		var $iconTarget = $subNavIcon.filter('[data-id="'+$self.data("id")+'"]');
		$openTarget.slideToggle('fast');
		$iconTarget.toggleClass('open');
	});

  // SP関連ページメニューの処理
  var $mcPageNavTriger = $('[data-role=mc-page-nav-triger]');
  var $mcPageNav = $('[data-role=mc-page-nav]');
  $mcPageNavTriger.on('click', function(e){
    $mcPageNav.slideToggle('fast');
    $mcPageNavTriger.toggleClass('on');
  });
})

// YouTube IFrame Player API の読み込み
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// YouTubeの埋め込み
var ytPlayer;
function onYouTubeIframeAPIReady() {
  ytPlayer = new YT.Player(
    'background-movie-player', // 埋め込む場所の指定
	{
	videoId:'sLVqhhJVnKk',
      playerVars: {
        playsinline: 1,
        autoplay: 1, // 自動再生
        loop: 1, // ループ有効
		playlist: 'sLVqhhJVnKk',
        controls: 0, // コントロールバー非表示
        enablejsapi: 1, //JavaScript API 有効
        iv_load_policy: 3, //動画アノテーションを表示しない
        disablekb:1, //キーボード操作OFF
        showinfo:0, //動画の再生が始まる前に動画のタイトルなどの情報を表示しない
        rel:0, //再生終了時に関連動画を表示しない
		origin: 'https://akc.3to8.net/'
      },
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange,
        'onError': onPlayerError
      }
    }
  );
}

// プレーヤーの準備ができたとき
function onPlayerReady(event) {
  // 動画をミュートにする
  const player = event.target;
  player.mute();
  player.playVideo();
}

// onStateChangeのコールバック関数
function onPlayerStateChange(event) {
  var status = event.data;
  var playerWrap = $('.background-wrap');
  var names = {
    '-1' : '未開始',
    '0' : '終了',
    '1' : '再生中',
    '2' : '停止',
    '3' : 'バッファリング中',
    '5' : '頭出し済み'
  };
  //バッファリングの完了後、動画背景を表示させる
  if (status == 1) {
    $(playerWrap).css('opacity','1');
  }
}

// errorの発生時
function onPlayerError(event) {
  var errorstatus = event.data;
  var playerWrap = $('.background-wrap');
  //何らかのエラーステータスが渡された場合、youtubeプレイヤーを削除する
  if (errorstatus !== '') {
    $(playerWrap).remove();
  }
}