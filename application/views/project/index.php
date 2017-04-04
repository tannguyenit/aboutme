<div class="content">
			<div id="blog">
				<h2>Các dự án đã thực hiện</h2>
				<ul>
				<?php foreach ($arProject as $key => $value) {
						$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$value['picture'];
			          if(file_exists($url_pic)){
			            $pic=$value['picture'];
			          }else{
			          $pic="noimage.png";
			        }

					?>
					<li>
						<div class="article">
							<h3><?php echo $value["name"]?></h3>
							<p>
								<?php echo $value["preview_text"]?>				
							</p>
							<a href="<?php echo $value["link"]?>" class="more" target="_blank">Truy cập trang này</a>
						</div>
						<div class="stats">
							<a href="<?php echo $value["link"]?>" class="more" target="_blank"><img src="<?php echo FILES?>/<?php echo $pic?>" alt="" /></a>
						</div>
					</li>
				<?php }?>
					
				</ul>
				<div class="pagination">
					<?php echo $pagination; ?>
				</div>
			</div>
			<?php 
			$this->load->view('templates/public/slidebar');
			?>
			
			
		</div>