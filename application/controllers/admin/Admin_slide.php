<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_slide extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		checkuser();
	}

	public function index($page=1)
	{
		$offset=($page-1)*ADMIN_ROW_COUNT;
		$config['base_url'] = '/admin/admin_slide/index';
		$config['total_rows'] = $this->slide_model->allRecord();
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = ADMIN_ROW_COUNT;
		$this->pagination->initialize($config);
		$pagination=$this->pagination->create_links();
		$arData["pagination"]=$pagination;
		$arData["arSlide"]=$this->slide_model->index($offset,ADMIN_ROW_COUNT);
		$this->load->view('templates/admin/template',$arData);
	}
	public function edit()
	{
		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$arData["arEdit"]=$this->slide_model->edit($id);
		}
		$this->load->view('admin/slide/edit_slide',$arData);
	}
	public function del($id)
	{
		$arDel=array('id_slide'=>$id);
		$arData=$this->slide_model->edit($id);
			// lấy ảnh để xóa
		$picture=$arData["picture"];
			if ($picture != "") {
				$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$picture;
				echo $url_pic;
				if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
					$this->library_file->delete($picture);
				}
			}
		if ($this->slide_model->del($arDel)) {
			$arKT=array("msg"=>"Xóa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
			redirect('/admin/admin_slide/index');
		}else{
			$arKT=array("msg"=>"Có lỗi khi xóa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
			redirect('/admin/admin_slide/index');
		}
	}
	public function add()
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
			$result=$this->slide_model->add($arAdd);
			if ($result) {
				$arKT=array("msg"=>"Thêm thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_slide/index');
			}else{
				$arKT=array("msg"=>"Có lỗi khi thêm","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_slide/index');
			}
		}
	}
	public function update()
	{
		if (isset($_POST["update"])) {
			$name_pic=$_FILES["hinhanh2"]["name"];
			$id=$this->input->post("id_slide");
			$arData=$this->slide_model->edit($id);
		
			$filename=$arData["picture"];//tên file cũ
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
			
			$result=$this->slide_model->update($arAdd,$id);
			if ($result) {
				$arKT=array("msg"=>"Sửa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_slide/index');
			}else{
				$arKT=array("msg"=>"Có lỗi khi sửa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_slide/index');
			}
		}
	}

}

/* End of file Admin_index.php */
/* Location: ./application/controllers/admin/Admin_index.php */