
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('arsUser')) {
			redirect("/admin/admin_index");
		}
	}
	public function index()
	{
		$this->load->view('admin/login/index');
	}
	public function forgot()
	{
		$kt="";
		if ($this->input->post('back_user')) {
			
				
				$name_forgot=trim($this->input->post("name_forgot"));
				$result1=$this->user_model->login_forgot($name_forgot);
				$id_user=$result1["id_user"];
				$maxacnhan=$result1["maxacnhan"];
				if (count($result1)>0) {
					$this->session->set_userdata('arsForgot',$result1);
					$macapcha=rand(100000,999999999);
					$capcha=$this->user_model->capcha_update($id_user,$macapcha);
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

					$ci->email->from(NAME_MAIL, 'For got password');
					$list = array($name_forgot);
					$ci->email->to($list);
					//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
					$ci->email->subject('Yêu cầu khôi phục mật khẩu');
					$ci->email->message('Bạn vừa yêu cầu khôi phục mật khẩu cho tài khoản'.$result["username"].' trên trang http://tan.vnsmiles.com/ . Nhập mã sau để đặt mật khẩu mới'.$macapcha);
					    if ($ci->email->send())
					       redirect("../admin/admin_login/re_password");
					    else
					       $kt="There is error in sending mail!";
					
					// $this->session->set_userdata('arsUser',$result);
					//redirect("../admin/admin_index ");
					
				}else{
					$kt="Email bạn vừa nhập không đúng! Vui lòng kiểm tra lại";
					//redirect("../admin/admin_login?kt=Bạn nhập sai tên đăng nhập hoặc pass");
				}
			}
		$arData["kt"]=$kt;
		$this->load->view('/admin/login/forgot',$arData);
	}
	public function login()
	{
		$kt=" ";
		if ($this->input->post('login')) {
			
				$arLogin=array(
				'username'=>trim($this->input->post('username')),
				'password'=>trim($this->input->post('password'))
				);
				$username=trim($this->input->post('username'));
				$check_user=$this->user_model->check_user($username);
				if (count($check_user)>0) {
					# tồn tại username
					$result=$this->user_model->login($arLogin);
					if (count($result) > 0) {
						$check=$this->user_model->check_active($arLogin);
						if (count($check)>0) {
								$this->session->set_userdata('arsUser',$result);
								redirect("../admin/admin_index");
							}else{
								redirect("../admin/admin_login?kt=Tài khoản của bạn chưa được kích hoạt! Vui lòng đăng nhập vào lúc khác");
							}
						}else{
							redirect("../admin/admin_login?kt=Bạn nhập sai tên đăng nhập hoặc pass");
						}
				}else{
					redirect("../admin/admin_login?kt=Bạn chưa có tài khoản! Vui lòng đăng ký ");
				}
			}
		$arData["kt"]=$kt;
		$this->load->view('admin/login/index',$arData);
	}
	public function re_password()
	{
		$kt=" ";
		if ($this->input->post("next")) {
			
				$arCheck=array(
				"maxacnhan"=>trim($this->input->post("maxacnhan")),
				"id_user"=>trim($this->input->post("id_user"))
				);
				$check=$this->user_model->check_ma($arCheck);
				if (count($check)>0) {
					redirect("../admin/admin_login/update_password");
				}else{
					redirect("../admin/admin_login/re_password?kt=Mã xác nhận không đúng. Xin vui lòng kiểm tra lại");
				}

				
			}
		$arData["kt"]=$kt;
		$this->load->view('admin/login/re_password');
	}
	public function update_password()
	{
		if ($this->input->post("finish")) {
				$maxacnhan=rand(100000,9999999999);
				$arUpdate=array(
				"password"=>trim(md5($this->input->post("passnews"))),
				"id_user"=>trim($this->input->post("id_user")),
				"maxacnhan"=>$maxacnhan
				);
				$update=$this->user_model->update_password($arUpdate);
				if (count($update)>0) {
					$this->session->unset_userdata('arsForgot');
					redirect("../admin/admin_login?kt=Cập nhật mật khẩu thành công.Vui lòng đăng nhập");
				}else{
					redirect("../admin/admin_login/update_password?kt=Cập nhật mật khẩu không thành công");
				}

				
			}
		$this->load->view('admin/login/update_password');
	}
	public function register()
	{

				$arRegister=array(
				'first_name'=>trim($this->input->post('first_name')),
				'last_name'=>trim($this->input->post('last_name')),
				'password'=>trim($this->input->post('password')),
				'username'=>trim($this->input->post('username')),
				'email'=>trim($this->input->post('email'))
				);
				$first_name=trim($this->input->post('first_name'));
				$last_name=trim($this->input->post('last_name'));
				$password=trim($this->input->post('password'));
				$email=trim($this->input->post('email'));
				$arDK= $this->user_model->register($arRegister);
				if (count($arDK)>0) {
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

					$ci->email->from(NAME_MAIL, 'Đăng ký tài khoản trên aboutme');
					$list = array($email);
					$ci->email->to($list);
					//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
					$ci->email->subject('Đăng ký tài khoản');
					$ci->email->message('Thông tin người đăng ký tài khoản: Tên '.$first_name.' '. $last_name.' username '.$username.' Email'.$email.'Vui lòng đăng nhập để kích hoạt cho tài khoản http://tan.vnsmiles.com/admin');
					    if ($ci->email->send())
					       redirect("../admin/admin_login?kt=Đăng ký thành công. Vui lòng chờ được kích hoạt tài khoản");
					    else
					       redirect("../admin/admin_login?kt=Đăng ký thất bại");
					
					// $this->session->set_userdata('arsUser',$result);
					//redirect("../admin/admin_index ");
					
				}
	

	}
	public function login_fb()
	{
		$arUser_fb=$_POST["arUser_fb"];
		echo "<pre>";
		print_r ($arUser_fb);
		echo "</pre>";
	}

}
