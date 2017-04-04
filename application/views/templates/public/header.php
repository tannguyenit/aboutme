<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta property="fb:app_id" content="1325239484152746" />
	<meta property="fb:admins" content="https://www.facebook.com/dongluc.195/"/>
	<title>Dự án của tôi</title>
	<link rel="stylesheet" href="<?php echo PUBLIC_URL?>/css/style.css" type="text/css">
	<script type="text/javascript" src="<?php echo ADMIN_URL?>/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_URL?>/js/jquery.validate.min.js"></script>
    <div id="fb-root"></div>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1325239484152746',
      xfbml      : true,
      version    : 'v2.8'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/vi_VN/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


	<!--[if IE 7]>
		<link rel="stylesheet" href="css/ie7.css" type="text/css">
	<![endif]-->
</head>
<body>
	<div id="header">
		<div>
			<div>
				<span>Nguyễn Văn Tân</span>
				<a href="/" class="logo"><img src="<?php echo FILES?>/images/logo.png" alt=""></a>
				<span class="tagline">Không gì là không thể ! Chỉ có thể bạn không tin mà thôi</span>
			</div>

			<ul  id="active">
			<?php $segment =  $this->uri->segment(1);?>
				<li class="<?php if($segment==""){echo 'selected';}?>">
					<a href="/">Trang chủ</a>
				</li>
				<li class="<?php if($segment=="gioi-thieu.html"){echo 'selected';}?>">
					<a href="/gioi-thieu.html">Giới thiệu</a>
				</li>
				<li class="<?php if($segment=="du-an"){echo 'selected';}?>">
					<a href="/du-an">Dự án thực hiện</a>
				</li>
				<li class="<?php if($segment=="tin-tuc" || ($segment!="" && $segment!="gioi-thieu" && $segment!="du-an" &&$segment!="lien-he.html")){echo 'selected';}?>">
					<a href="/tin-tuc">Tin tức</a>
				</li>
				<li class="<?php if($segment=="lien-he.html"){echo 'selected';}?>">
					<a href="/lien-he.html">Liên hệ</a>
				</li>
			</ul>



		</div>
	</div>
	
	<div id="body">
	<!-- <script type="text/javascript">
		
		var url=window.location.pathname;
		$("#active li a").filter(function(){ 
			    return location.href.match($(this).attr("href"))
			})
			.addClass("selected");
	</script> -->