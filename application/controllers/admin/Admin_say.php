<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_say extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		checkuser();
	}

	public function index($page=1)
	{
		$offset=($page-1)*ADMIN_ROW_COUNT;
		$config['base_url'] = '/admin/admin_say/index';
		$config['total_rows'] = $this->say_model->allRecord();
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = ADMIN_ROW_COUNT;
		$this->pagination->initialize($config);
		$pagination=$this->pagination->create_links();
		$arData["pagination"]=$pagination;
		$arData["arSay"]=$this->say_model->index($offset,ADMIN_ROW_COUNT);
		$this->load->view('templates/admin/template',$arData);
	}
	public function edit_say()
	{
		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$arData["arEdit"]=$this->say_model->edit($id);
		}
		$this->load->view('admin/say/edit_say',$arData);
	}
	public function del($id)
	{
		$arDel=array('id_saying'=>$id);
		if ($this->say_model->del($arDel)) {
			$arKT=array("msg"=>"Xóa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
			redirect('/admin/admin_say/index');
		}else{
			$arKT=array("msg"=>"Có lỗi khi xóa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
			redirect('/admin/admin_say/index');
		}
	}
	public function add()
	{
		if (isset($_POST["them"])) {
			$arAdd=$this->input->post();
			$result=$this->say_model->add($arAdd);
			if ($result) {
				$arKT=array("msg"=>"Thêm thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_say/index');
			}else{
				$arKT=array("msg"=>"Có lỗi khi xóa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_say/index');
			}
		}
	}
	public function update()
	{
		if (isset($_POST["update"])) {
			$arAdd=$this->input->post();
			$id=$this->input->post("id_say");
			$result=$this->say_model->update($arAdd,$id);
			if ($result) {
				$arKT=array("msg"=>"Sửa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_say/index');
			}else{
				$arKT=array("msg"=>"Có lỗi khi sửa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_say/index');
			}
		}
	}

}

/* End of file Admin_index.php */
/* Location: ./application/controllers/admin/Admin_index.php */