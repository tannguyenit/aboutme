<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Public_contact extends MY_Controller
{

    public function index()
    {
        $arData["arUser"] = $this->user_model->get();
        $this->load->view('templates/public/template', $arData);
    }

    public function contact()
    {
        if (isset($_POST["send"])) {
            $contact = $this->input->post("message");
            $mail = $this->input->post("email");
            if ($this->contact_model->getcontact($mail, $contact)) {
                $arKT = ["msg" => "Nội dung tin nhắn trùng"];
                $this->session->set_userdata("msg", $arKT);
                redirect('/public_contact');
            } else {
                $arContac = [
                    "fullname" => $this->input->post("name"),
                    "email" => $this->input->post("email"),
                    "address" => $this->input->post("address"),
                    "phone" => $this->input->post("phone"),
                    "phone" => $this->input->post("phone"),
                    "content" => $this->input->post("message"),
                ];
                $result = $this->contact_model->add($arContac);
                $email = $this->input->post('email');
                $name = $this->input->post("name");
                $address = $this->input->post("address");
                $message = $this->input->post('message');
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
                $list = [$email];
                $ci->email->to($list);
                $ci->email->subject('Xác nhận người liên hệ');
                $ci->email->message('Tên người liên hệ ' . $name . ' Địa chỉ ' . $address . '' . $message . 'Vui lòng đăng nhập http://tan.vnsmiles.com/admin để liên hệ với ' . $name . ' hoặc reply để trả lời mail');
                if ($ci->email->send()) {
                    $arKT = ["msg" => "Gửi liên hệ thành công"];
                    $this->session->set_userdata("msg", $arKT);
                    redirect('/lien-he.html');
                } else {
                    $arKT = ["msg" => "Gửi liên hệ thất bại"];
                    $this->session->set_userdata("msg", $arKT);
                    redirect('/lien-he.html');
                }
            }
        }
    }
}

/* End of file Public_project.php */
/* Location: ./application/controllers/Public_project.php */
