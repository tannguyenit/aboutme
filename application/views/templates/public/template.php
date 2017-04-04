<?php $this->load->view('templates/public/header.php')?>

	<?php 
		$Controller=$this->router->fetch_class();
		$Controller=str_replace(array('Public_','public_'),array('',''),$Controller);
		$Method=$this->router->fetch_method();
		$this->load->view("{$Controller}/{$Method}")
	 ?>

<?php $this->load->view('templates/public/footer.php') ?>		