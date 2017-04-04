<?php 
// $segment =  $this->uri->segment(1);
// echo $segment;
$nameseo=SEO_URL($arNews['name']);
	//$get_url= $nameseo.'-'.$arNews["id_news"].'.html';
	$get_url= $nameseo.'-'.$arNews["id_news"].'.html';
	$url=$this->uri->segment(1);
	if ($url!=$get_url) {
		echo '<script> window.location.href="/'.$get_url.'"</script>' ;	
	}
	?>
<div id="body">
		<div class="content">
			<div id="blog" class="blogdt">
				<div class="news_detail">

					<h1><?php echo $arNews["name"]?></h1>
					<p class="date">Ngày đăng: <?php echo $arNews["date"]?> - Lượt đọc: <?php echo $arNews["read"]?></p>
					<div class="news_content">
						<?php echo $arNews["detail_text"]?>
					</div>
					<div class="fb-like" data-href="http://tan.vnsmiles.com/<?php echo $get_url?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
					<div class="fb-comments" data-href="http://tan.vnsmiles.com/<?php echo $get_url?>" data-numposts="5"></div>
				</div>
				
				<h4 class="relate">Tin liên quan</h4>
				<ul><?php foreach ($arNewsLQ as $key => $value) {
					$name=$value["name"];$name_chitiet=SEO_URL($name);
					?>
					<li>
						<div class="article">
							<h3><a onclick="read(<?php echo $value["id_news"]?>)" href="/<?php echo $name_chitiet?>-<?php echo $value["id_news"]?>.html" class="more"><?php echo $value["name"]?></a></h3>
							<p><?php echo $value["preview_text"]?>							
							</p>
						</div>
						<div class="stats">
							<a onclick="read(<?php echo $value["id_news"]?>)" href="/<?php echo $name_chitiet?>-<?php echo $value["id_news"]?>.html" class="more" target="_blank">
								<?php if ($value["picture"]!="") {
						$url=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$value["picture"];
						if (file_exists($url)) {	?>				
					<img src="<?php echo FILES?>/<?php echo $value["picture"]?>" alt="">
					 <?php }
					 }?>
							</a>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
		<?php 
			$this->load->view('templates/public/slidebar');
			?>
			
		</div>
	</div>