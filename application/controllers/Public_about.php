<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_about extends MY_Controller {

	public function index()
	{
		
		$arData["arAbout"]=$this->introduce_model->index();
		$arData["arUser"]=$this->user_model->get();
		$this->load->view('templates/public/template',$arData);
	}

}

/* End of file Public_about.php */
/* Location: ./application/controllers/Public_about.php */