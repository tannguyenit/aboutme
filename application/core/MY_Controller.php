<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $arSay;
	public $arAdv;
		public function __construct()
		{
			parent::__construct();
			$this->arSay=$this->say_model->index(0,4);
			$this->arAdv=$this->adv_model->index(0,2);
		}
	
	
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */