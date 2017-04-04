<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_contact extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		checkuser();
	}

	public function index($page=1)
	{
		$offset=($page-1)*ADMIN_ROW_COUNT;
		$config['base_url'] = '/admin/admin_say/index';
		$config['total_rows'] = $this->contact_model->allRecord();
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = ADMIN_ROW_COUNT;
		$this->pagination->initialize($config);
		$pagination=$this->pagination->create_links();
		$arData["pagination"]=$pagination;
		$arData["arContact"]=$this->contact_model->index($offset,ADMIN_ROW_COUNT);
		$this->load->view('templates/admin/template',$arData);
	}
	public function del($id)
	{
		$arDel=array('id_contact'=>$id);
		if ($this->contact_model->del($arDel)) {
			$arKT=array("msg"=>"Xóa thành công","kt"=>1);
			$this->session->set_userdata("kt",$arKT);
			redirect('/admin/admin_contact/index');
		}else{
			$arKT=array("msg"=>"Có lỗi khi xóa","kt"=>2);
			$this->session->set_userdata("kt",$arKT);
			redirect('/admin/admin_contact/index');
		}
	}
	public function del_all()
	{
		if (isset($_POST["name_mail"])) {
			# code...
			$email=$_POST["name_mail"];
			$count=count($email);
			for ($i=0; $i < $count; $i++) {
				$arDel=array('email'=>$email[$i]);
				$this->contact_model->del($arDel);
			} 
			echo 1;
			}
	}
	public function send_mail()
	{
		if ($this->input->post('send_mail')) {
			$email=$this->input->post('email');
			$list_email=explode(",",$email);
			$count=count($list_email);
			for ($i=0; $i < $count; $i++) {
			$title=$this->input->post('title');
			$message=$this->input->post('message');
			$ci = get_instance();
			$ci->load->library('email');
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "ssl://smtp.gmail.com";
			$config['smtp_port'] = "465";
			$config['smtp_user'] = NAME_MAIL; 
			$config['smtp_pass'] = PASS_MAIL;
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";
			$ci->email->initialize($config);
			$ci->email->from(NAME_MAIL, $title);
			$list = array($email);
			
				 $ci->email->to($list[$i]);
			
			//$ci->email->to($list);
			//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
			$ci->email->subject('Xác nhận yêu cầu liên hệ');
			$ci->email->message($message);
			    if ($ci->email->send()){
			    	$arKT=array("msg"=>"Gửi mail liên hệ thành công","kt"=>1);
					$this->session->set_userdata("kt",$arKT);
					redirect("../admin/admin_contact/index");
			    }	
			    else{
			      	$arKT=array("msg"=>"Gửi mail liên hệ thất bại","kt"=>2);
					$this->session->set_userdata("kt",$arKT);
					redirect("../admin/admin_contact/index");
			      }
			}
			// $this->session->set_userdata('arsUser',$result);
			//redirect("../admin/admin_index ");
			

		}
		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$arData["arSend"]=$this->contact_model->edit($id);
		}
		$this->load->view('admin/contact/send_mail',$arData);
	}

}

/* End of file Admin_index.php */
/* Location: ./application/controllers/admin/Admin_index.php */