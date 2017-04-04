<div class="content">
			<div id="section">
				<h2><?php echo $arAbout["name"]?></h2>
				<p>
					<?php echo $arAbout["detail_text"]?>
				</p>
				<?php if ($arUser[0]["picture"]!="") {
					$url=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$arUser[0]["picture"];
					if (file_exists($url)) {	?>				
				 <img src="<?php echo FILES?>/<?php echo $arUser[0]["picture"] ?>" alt >
				 <?php }
				 }?>
				<div class="article">
					<div>
						<div class="chitiet">
							<h3>Vài nét về  <?php echo $arUser[0]["fullname"]?></h3>
							<p>
							- Họ tên: <?php echo $arUser[0]["fullname"]?><br />
							- Địa chỉ: <?php echo $arUser[0]["address"]?><br />
							- Email: <?php echo $arUser[0]["email"]?> - Phone: <?php echo $arUser[0]["phone"]?> 
							</p>
						</div>
						<div class="chitiet">
							<h3>Khả năng của tôi</h3>
							<p>
							<?php echo $arUser[0]["Ability"]?> 
							</p>
						</div>
						
					</div>
					
					<div>
					<div class="chitiet">
						<h3>Kỹ năng chuyên ngành</h3>
						<p>
						<?php echo $arUser[0]["skill"]?> 
						</p>
					</div>
						<div class="chitiet">
							<h3>Mục tiêu của tôi</h3>
						<p>
						<?php echo $arUser[0]["target"]?> 
						</p>
						</div>
						
						
					</div>
				</div>
			</div>
			<?php 
			$this->load->view('templates/public/slidebar');
			?>
		</div>