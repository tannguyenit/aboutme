<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_adv extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		checkuser();
	}

	public function index($page=1)
	{
		$offset=($page-1)*ADMIN_ROW_COUNT;
		$config['base_url'] = '/admin/admin_adv/index';
		$config['total_rows'] = $this->adv_model->allRecord();
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = ADMIN_ROW_COUNT;
		$this->pagination->initialize($config);
		$pagination=$this->pagination->create_links();
		$arData["pagination"]=$pagination;
		$arData["arAdv"]=$this->adv_model->index($offset,ADMIN_ROW_COUNT);
		$this->load->view('templates/admin/template',$arData);
	}
	public function edit_adv()
	{	
		if (isset($_POST["id"])) {

			$id_advs=$_POST["id"];
			$arData["arEdit"]=$this->adv_model->edit($id_advs);
		}
		$this->load->view('admin/adv/edit_adv',$arData);
		//$this->load->view('admin/adv/edit_adv');
	}
	public function add_adv()
	{	
		if (isset($_POST["them"])) {
			$name_pic=$_FILES["hinhanh"]["name"];
			// nếu có hình=>up hình
			$filename="";
			if ($name_pic!='') {
				$arPic=$this->library_file->upload_file("hinhanh");
				$filename=$arPic['file_name'];
			}
			$arAdd=$this->input->post();
			$arAdd['hinhanh']=$filename;
			$result=$this->adv_model->add($arAdd);
			if ($result) {
				$arKT=array("msg"=>"Thêm thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_adv/index');
			}else{
				$arKT=array("msg"=>"Có lỗi khi thêm","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_adv/index');
			}
		}
	}
	public function update()
	{
		if (isset($_POST["update"])) {
			$name_pic=$_FILES["hinhanh2"]["name"];
			$id=$this->input->post("id_adv");
			$arData=$this->adv_model->edit($id);
		
			$filename=$arData["banner"];//tên file cũ
			if ($name_pic!='') {//tên file mới
				$arPic=$this->library_file->upload_file("hinhanh2");

				$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$filename;
				if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
					$this->library_file->delete($filename);
				}

				$filename=$arPic['file_name'];
			}

			$arAdd=$this->input->post();
			$arAdd['hinhanh']=$filename;
			
			$result=$this->adv_model->update($arAdd,$id);
			if ($result) {
				$arKT=array("msg"=>"Sửa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_adv/index');
			}else{
				$arKT=array("msg"=>"Có lỗi khi sửa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_adv/index');
			}
		}
	}
	public function del_adv($id)
	{
		$arDel=array('id_advs'=>$id);
		$arData=$this->adv_model->edit($id);
			// lấy ảnh để xóa
		$picture=$arData["banner"];
			if ($picture != "") {
				$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$picture;
				echo $url_pic;
				if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
					$this->library_file->delete($picture);
				}
			}
		if ($this->adv_model->del($arDel)) {
			$arKT=array("msg"=>"Xóa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
			redirect('/admin/admin_adv/index');
		}else{
			$arKT=array("msg"=>"Có lỗi khi xóa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
			redirect('/admin/admin_adv/index');
		}
	}
}

/* End of file Admin_index.php */
/* Location: ./application/controllers/admin/Admin_index.php */