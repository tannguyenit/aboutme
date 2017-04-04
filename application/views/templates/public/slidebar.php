<div id="sidebar">
				<div class="testimonials">
					<h3>Những câu nói hay</h3>
					<ul>
					<?php 
					
					foreach ($this->arSay as $key => $value) {?>
						<li>
							<p>
								<?php echo $value["content"]?>
							</p>
							<span class="author"><?php echo $value["author"]?></span>
						</li>
					<?php }?>
					</ul>
				</div>
				<div class="awards">
					<h3>Quảng cáo</h3>

					<?php foreach ($this->arAdv as $key => $value) {
						 if ($value['banner']!="") {
						          $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$value['banner'];
						          if(file_exists($url_pic)){
						          	$url=$value["link"];
						            $pic=$value['banner'];
						          }else{
						          	$url="/public_contact";
						          $pic="dat-quang-cao.gif";
						        }
						      }

						?>
					<a href="<?php echo $url?>" class="first">
						<img src="<?php echo FILES?>/<?php echo $pic?>" alt="" />
					</a>
					<?php }?>
				</div>
			</div>