


<div class="section">
			<h2>Trang tin Tân Nguyễn</h2>
			<p class="ptop">
				Cập nhật các tin tức mới nhất về hoạt động xã hội của Tân Nguyễn hoặc những tin tức ngoài lề mà Tân Nguyễn quan tâm:
			</p>
			
			<?php foreach ($arCat as $key => $value) {
				$name=$value["name"];
				$nameSEO=SEO_URL($name);
				$arNews_once=$this->news_model->getid_cat_once($value["id_cat"]);
				$arNews_four=$this->news_model->getid_cat_four($value["id_cat"]);
			?>
			<!-- begin block -->
			<div class="project-wrap">
				<a href="/tin-tuc/<?php echo $nameSEO?>-<?php echo $value["id_cat"]?>"><h3  class="title"><?php echo $value["name"]?></h3></a>
				<?php foreach ($arNews_once as $key => $value) {
					$name=$value["name"];$name_detail=SEO_URL($name);
				?>
				<div class="project-top">
					<a onclick="read(<?php echo $value["id_news"]?>)" href="/<?php echo $name_detail?>-<?php echo $value["id_news"]?>.html">
					<?php if ($value["picture"]!="") {
						$url=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$value["picture"];
						if (file_exists($url)) {	?>				
					<img src="<?php echo FILES?>/<?php echo $value["picture"]?>" alt="">
					 <?php }
					 }?>
					</a>
					<div>
						<b><a onclick="read(<?php echo $value["id_news"]?>)" href="/<?php echo $name_detail?>-<?php echo $value["id_news"]?>.html"><?php echo $value["name"]?></a></b> 
						<small>Ngày đăng: <?php echo $value["date"]?></small>
						<p class="preview_text">
							<?php echo $value["preview_text"]?>
						</p>
					</div>
				</div>
				<?php }?>
				<ul class="article">
				<?php foreach ($arNews_four as $key => $value) {
					$name=$value["name"];$name_detail=SEO_URL($name);
				?>
					<li>
						<a onclick="read(<?php echo $value["id_news"]?>)" href="/<?php echo $name_detail?>-<?php echo $value["id_news"]?>.html">
						<?php if ($value["picture"]!="") {
						$url=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$value["picture"];
						if (file_exists($url)) {	?>				
					<img src="<?php echo FILES?>/<?php echo $value["picture"]?>" alt="">
					 <?php }
					 }?></a> <b>
						<a onclick="read(<?php echo $value["id_news"]?>)" href="/<?php echo $name_detail?>-<?php echo $value["id_news"]?>.html"><?php echo $value["name"]?></a></b> <small>Ngày Đăng: <?php echo $value["date"]?></small>
						<p>
							<?php echo $value["preview_text"]?>
						</p>
						
					</li>
					<?php }?>
				</ul>
				<div class="clr"></div>
			</div> <!-- end block -->
			<?php }?>
		</div>