

<div class="content">
<?php
if (($message=$this->session->userdata("msg"))) {
	$thongbao=$message["msg"];
	echo "<script>alert('$thongbao')</script>";
}
?>
	<div id="section">
		<h2>Liên hệ với <?php echo $arUser[0]["fullname"]?></h2>
		 <?php if ($arUser[0]["picture"]!="") {
			$url=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$arUser[0]["picture"];
			if (file_exists($url)) {	?>				
		 <img src="<?php echo FILES?>/<?php echo $arUser[0]["picture"] ?>" alt >
		 <?php }
		 }?>
		<form action="/public_contact/contact" method="post" id="gui_mail">
			<b>Gửi liên hệ trực tuyển</b>
			<span>Vui lòng điền đầy đủ thông tin để liên hệ trực tuyến đến <?php echo $arUser[0]["fullname"]?>. Tôi sẽ phản hồi sớm nhất có thể!</span>
			<input type="text" name="name" id="name" value="" placeholder="Họ và tên" required />
			<input type="email" name="email" id="email" value=""  placeholder="Email" required/>
			<input type="text" name="address" id="address" value=""  placeholder="Địa chỉ" />
			<input type="tel" minlength="10" maxlength="11" name="phone" id="phone" value=""  placeholder="Số phone" />
			<textarea name="message" id="message" cols="30" rows="10" placeholder="Nội dung"></textarea>
			<input  type="submit" name="send" id="send" value="Gửi liên hệ">
		</form>
		<div class="fb-comments" data-href="http://tan.vnsmiles.com/lien-he.html" data-width="580px" data-numposts="4"></div>
	</div>
	
	<?php 
	$this->load->view('templates/public/slidebar');
	?>
	
</div>
<?php 
 $this->session->unset_userdata('msg');

?>
