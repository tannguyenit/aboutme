<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_introduce extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		checkuser();
	}

	public function index()
	{
		$arsUser=$this->session->userdata("arsUser");
		$id_user=$arsUser["id_user"];
		$arData["arIntroduce"]=$this->introduce_model->index($id_user);
		$this->load->view('templates/admin/template',$arData);

	}
	public function update()
	{
		if ($_POST["update"]) {
			$arsUser=$this->session->userdata("arsUser");
			$id_user=$arsUser["id_user"];
			$arAdd=array(
				"name"=>$this->input->post('name'),
				"detail_text"=>$this->input->post('detail_text'),
				"id_aboutme"=>$id_user,
				);
		
			$result=$this->introduce_model->add($arAdd);
		
			if ($result) {
				$arKT=array("msg"=>"Thêm thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_introduce/index');
			}else{
				$arKT=array("msg"=>"Có lỗi khi thêm","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_introduce/index');
			}
		}
		
	}


}

/* End of file Admin_index.php */
/* Location: ./application/controllers/admin/Admin_index.php */