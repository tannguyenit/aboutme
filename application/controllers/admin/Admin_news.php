<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_news extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		checkuser();
	}
	public function index($page=1)
	{
		$arWhere=array();
		if (isset($_POST["search"])) {
			$text=$this->input->post("text");
			$danhmuctin=$this->input->post("danhmuctin");
			$trangthai=$this->input->post("trangthai");
			$arWhere=array(
				"name"=>$text,
				"id_cat"=>$danhmuctin,
				"is_active"=>$trangthai,
				);
		}
		$offset=($page-1)*ADMIN_ROW_COUNT;
		
		$arData['arNews']=$this->news_model->index($arWhere);
		$arData["nameCat"]=$this->cat_model->get_cat();
		$this->load->view('templates/admin/template',$arData);
	}
	public function edit_news()
	{
		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$arData["arEdit"]=$this->news_model->edit($id);
			$arData["nameCat"]=$this->cat_model->get_cat();
		}
		$this->load->view('admin/news/edit_news',$arData);
	}
	public function del($id_news)
	{
		$rs=$this->news_model->edit($id_news);
		$picture=$rs["picture"];
		if ($picture != "") {
			$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$picture;
			if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
				$this->library_file->delete($picture);
			}
		}
		if ($this->news_model->del($id_news)) {
				$arKT=array("msg"=>"Xóa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect("admin/admin_news/index");
			}else{
				$arKT=array("msg"=>"Có lỗi khi xóa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect("admin/admin_news/index");
			}
	}
	public function add()
	{
		if (isset($_POST["them"])) {
			$name_pic=$_FILES["hinhanh"]["name"];
			$arsUser=$this->session->userdata('arsUser');
			$id_user=$arsUser["id_user"];
			$date=date('d F');
			// nếu có hình=>up hình
			$filename="";
			if ($name_pic!='') {
				$arPic=$this->library_file->upload_file("hinhanh");
				$filename=$arPic['file_name'];
			}
			$arAdd=array(
				"name"=>$this->input->post("tentin"),
				"preview_text"=>$this->input->post("mota"),
				"detail_text"=>$this->input->post("chitiet"),
				"id_cat"=>$this->input->post("danhmuctin"),
				"id_user"=>$id_user,
				"date"=>$date,
				);
			$arAdd['picture']=$filename;
			$result=$this->news_model->add($arAdd);
			if ($result) {
				$arKT=array("msg"=>"Thêm tin thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_news/index');
			}else{
				$arKT=array("msg"=>"Có lỗi khi thêm tin","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_news/index');
			}
		}
	}
	public function update()
	{
		if (isset($_POST["update"])) {
			$name_pic=$_FILES["hinhanh2"]["name"];
			$id=$this->input->post("id_news");
			$arData=$this->news_model->edit($id);
			// lấy data cũ
			$filename=$arData["picture"];//tên file cũ
			if ($name_pic!='') {//tên file mới
				$arPic=$this->library_file->upload_file("hinhanh2");
				$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$filename;
				if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
					$this->library_file->delete($filename);
				}
				$filename=$arPic['file_name'];
			}
			// lấy đc tên hình
			$arAdd=array(
				"name"=>$this->input->post("tentin"),
				"preview_text"=>$this->input->post("mota"),
				"detail_text"=>$this->input->post("chitiet"),
				"id_cat"=>$this->input->post("danhmuctin"),
				);
			$arAdd["picture"]=$filename;
			
			$result=$this->news_model->update($arAdd,$id);
			if ($result) {
				$arKT=array("msg"=>"Sửa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_news/index');
			}else{
				$arKT=array("msg"=>"Có lỗi khi sửa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_news/index');
			}
		}
	}
	public function is_active()
	{
		if (isset($_POST["id"])) {

			$id=$_POST["id"];
			$is_active=$_POST["is_active"];
			if ($is_active==1) {
				$arAdd=array('is_active'=>0);
				echo 0;
			}else{
				$arAdd=array('is_active'=>1);
				echo 1;
			}
			return $this->news_model->is_active($arAdd,$id);

		}
	}
	public function removefile()
	{
		$id=$_POST["id"];
		$name=$_POST["name"];

		$img_upload=FILE_UPLOAD."/upload.png";
		if ($name=='') {
			echo '<img src="'.$img_upload.'" width="349px" height="170px" alt="" style="display:block">';
		}else{
			$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$name;
			if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
				$this->library_file->delete($name);
			}
			$this->news_model->update_img($id);
			
			echo '<img src="'.$img_upload.'" width="349px" height="170px" alt="" style="display:block">';
		}
		
	}
	public function delete()
	{
		if (isset($_POST["delete"])) {
			$del=$this->input->post("del_news");
			$count=count($del);
			for ($i=0; $i <$count ; $i++) {
				$rs=$this->news_model->edit($del[$i]);
				$picture=$rs["picture"];
				if ($picture != "") {
					$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$picture;
					if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
						$this->library_file->delete($picture);
					}
				}
			$this->news_model->del($del[$i]);
			}
			$arKT=array("msg"=>"Xóa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
			redirect("admin/admin_news/index");
		}
	}
	
}

/* End of file Admin_index.php */
/* Location: ./application/controllers/admin/Admin_index.php */