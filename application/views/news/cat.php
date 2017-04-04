<div id="body" class="blogdt">
<div class="section">
		<!-- begin block -->
	<div class="project-wrap">
		<h3 class="title"><?php echo $arDMT["name"]?></h3>
		<?php foreach ($arNews as $key => $value) {
			$name=$value["name"];$name_chitiet=SEO_URL($name);
			?>
			<div class="project-top">
				<a onclick="read(<?php echo $value["id_news"]?>)" href="/<?php echo $name_chitiet?>?>-<?php echo $value["id_news"]?>.html">
				<img src="<?php echo FILES?>/<?php echo $value["picture"]?>" alt=""></a>
				<div>
					<b><a onclick="read(<?php echo $value["id_news"]?>)" href="/<?php echo $name_chitiet?>-<?php echo $value["id_news"]?>.html"><?php echo $value["name"]?></a></b> 
					<small>Ngày đăng: <?php echo $value["date"]?></small>
					<p class="preview_text"><?php echo $value["preview_text"]?></p>
				</div>
			</div>
			<div style="margin-bottom:20px;"></div>
			<div class="clr"></div>
		<?php }?>
		</div> <!-- end block -->
	<div class="pagination">
		<?php echo $pagination?>
	</div>
</div>
</div>
	