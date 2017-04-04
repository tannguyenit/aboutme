<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkuser();
    }

    public function index($page = 1)
    {
        $arsUser = $this->session->userdata("arsUser");
        $id_user = $arsUser['id_user'];
        if (1 != $id_user) {
            redirect('/admin/admin_user/profile/' . $id_user);
        } else {
            $offset = ($page - 1) * ADMIN_ROW_COUNT;
            $config['base_url'] = '/admin/admin_user/index';
            $config['total_rows'] = $this->user_model->allRecord();
            $config['use_page_numbers'] = true;
            $config['per_page'] = ADMIN_ROW_COUNT;
            $this->pagination->initialize($config);
            $pagination = $this->pagination->create_links();
            $arData["pagination"] = $pagination;
            $arData["arUser"] = $this->user_model->index($offset, ADMIN_ROW_COUNT);
            $this->load->view('templates/admin/template', $arData);
        }
    }

    public function profile($id_user = 1)
    {
        $arData["arUser"] = $this->user_model->profile($id_user);
        $arData["arNews"] = $this->news_model->profile($id_user);
        $this->load->view('templates/admin/template', $arData);
    }

    public function edit()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $arData["arEdit"] = $this->user_model->edit($id);
        }
        $this->load->view('admin/user/edit_user', $arData);
    }

    public function check_user()
    {
        $username = $_POST["username"];
        $arCheck_user = $this->user_model->check_user($username);

        if (count($arCheck_user) > 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function check_login()
    {
        return 0;
    }

    public function edit_profile()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $arData["arEdit"] = $this->user_model->edit($id);
        }

        $this->load->view('admin/user/edit_profile', $arData);
    }

    public function del($id)
    {
        $arsUser = $this->session->userdata("arsUser");
        $id_user_del = $arsUser["id_user"];

        if (1 == $id_user_del) {
            $arDel = ['id_user' => $id];
            $arData = $this->user_model->edit($id);
            $picture = $arData["picture"];

            if ("" != $picture) {
                $url_pic = $_SERVER["DOCUMENT_ROOT"] . "/assets/file/tmp/" . $picture;

                if (file_exists($url_pic)) {
                    $this->library_file->delete($picture);
                }
            }

            if ($this->user_model->del($arDel)) {
                $arKT = ["msg" => "Xóa thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_user/index');
            } else {
                $arKT = ["msg" => "Có lỗi khi xóa", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_user/index');
            }
        } else {

            if (1 == $id) {
                $arKT = ["msg" => "", "kt" => 3];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_index/index');
            } elseif ($id_user_del != $id) {
                $arKT = ["msg" => "Bạn không có quyền xóa user khác", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_user/index');
            } else {
                $arDel = ['id_user' => $id];
                $arData = $this->user_model->edit($id);
                $picture = $arData["picture"];

                if ("" != $picture) {
                    $url_pic = $_SERVER["DOCUMENT_ROOT"] . "/assets/file/tmp/" . $picture;

                    if (file_exists($url_pic)) {
                        $this->library_file->delete($picture);
                    }
                }

                if ($this->user_model->del($arDel)) {
                    $this->session->unset_userdata('arsUser');
                    redirect("/admin/admin_login");
                } else {
                    $arKT = ["msg" => "Có lỗi khi xóa", "kt" => 2];
                    $this->session->set_userdata("kt", $arKT);
                    redirect('/admin/admin_user/index');
                }
            }
        }
    }

    public function add()
    {
        if (isset($_POST["them"])) {
            $name_pic = $_FILES["hinhanh"]["name"];
            $filename = "";

            if ('' != $name_pic) {
                $arPic = $this->library_file->upload_file("hinhanh");
                $filename = $arPic['file_name'];
            }

            $arAdd = $this->input->post();
            $arAdd['hinhanh'] = $filename;
            $username = $this->input->post("username");
            $result = $this->user_model->add($arAdd);

            if ($result) {
                $arKT = ["msg" => "Thêm thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_user/index');
            } else {
                $arKT = ["msg" => "Có lỗi khi thêm", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_user/index');
            }
        }
    }

    public function update()
    {
        $id_login = $this->session->userdata('arsUser')["id_user"];

        if (isset($_POST["update"])) {
            $name_pic = $_FILES["hinhanh2"]["name"];
            $id = $this->input->post("id_user");
            $password = ($this->input->post("password"));
            $arData = $this->user_model->edit($id);
            $filename = $arData["picture"];

            if ('' != $name_pic) {
                $arPic = $this->library_file->upload_file("hinhanh2");
                $url_pic = $_SERVER["DOCUMENT_ROOT"] . "/assets/file/tmp/" . $filename;

                if (file_exists($url_pic)) {
                    $this->library_file->delete($filename);
                }

                $filename = $arPic['file_name'];

                if ($id == $id_login) {
                    $arsUser = $this->session->userdata("arsUser");
                    $arsUser["picture"] = $filename;
                    $arMoi = $this->session->set_userdata("arsUser", $arsUser);
                }
            }

            if ("" == $password) {
                $arAdd = [
                    "id_user" => $id,
                    "fullname" => $this->input->post("fullname"),
                ];
            } else {
                $arAdd = [
                    "id_user" => $id,
                    "fullname" => $this->input->post("fullname"),
                    "password" => md5($password),
                ];
            }

            $arAdd['picture'] = $filename;
            $result = $this->user_model->update($arAdd, $id);

            if ($result) {
                $arKT = ["msg" => "Sửa thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_user/index');
            } else {
                $arKT = ["msg" => "Có lỗi khi sửa", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_user/index');
            }
        }
    }

    public function update_profile()
    {
        $id_login = $this->session->userdata('arsUser')["id_user"];

        if (isset($_POST["update_profile"])) {
            $name_pic = $_FILES["hinhanh2"]["name"];
            $id = $this->input->post("id_user");
            $password = ($this->input->post("password"));
            $arData = $this->user_model->edit($id);
            $filename = $arData["picture"];

            if ("" != $name_pic) {
                $arPic = $this->library_file->upload_file("hinhanh2");
                $url_pic = $_SERVER["DOCUMENT_ROOT"] . "/assets/file/tmp/" . $filename;

                if (file_exists($url_pic)) {
                    $this->library_file->delete($filename);
                }

                $filename = $arPic['file_name'];

                if ($id == $id_login) {
                    $arsUser = $this->session->userdata("arsUser");
                    $arsUser["picture"] = $filename;
                    $arMoi = $this->session->set_userdata("arsUser", $arsUser);
                }
            }

            if ("" == $password) {
                $arAdd = [
                    "id_user" => $id,
                    "fullname" => $this->input->post("fullname"),
                    "address" => $this->input->post("address"),
                    "workplace" => $this->input->post("workplace"),
                    "website" => $this->input->post("website"),
                    "skill" => $this->input->post("skill"),
                    "ability" => $this->input->post("ability"),
                    "target" => $this->input->post("target"),
                ];
            } else {
                $arAdd = [
                    "id_user" => $id,
                    "fullname" => $this->input->post("fullname"),
                    "password" => md5($password),
                    "fullname" => $this->input->post("fullname"),
                    "address" => $this->input->post("address"),
                    "workplace" => $this->input->post("workplace"),
                    "website" => $this->input->post("website"),
                    "skill" => $this->input->post("skill"),
                    "ability" => $this->input->post("ability"),
                    "target" => $this->input->post("target"),
                ];
            }
            $arAdd['picture'] = $filename;
            $result = $this->user_model->update($arAdd, $id);

            if ($result) {
                $arKT = ["msg" => "Sửa thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_user/profile/' . $id);
            } else {
                $arKT = ["msg" => "Có lỗi khi sửa", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_user/profile/' . $id);
            }
        }
    }

    public function active()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $is_active = $_POST["is_active"];

            if (1 == $is_active) {
                $arAdd = ['active' => 0];
                echo 0;
            } else {
                $arAdd = ['active' => 1];
                echo 1;
            }

            return $this->user_model->is_active($arAdd, $id);
        }
    }

    public function removefile()
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $img_upload = FILE_UPLOAD . "/upload.png";

        if ('' == $name) {
            echo '<img src="' . $img_upload . '" width="349px" height="170px" alt="" style="display:block">';
        } else {
            $url_pic = $_SERVER["DOCUMENT_ROOT"] . "/assets/file/tmp/" . $name;

            if (file_exists($url_pic)) {
                $this->library_file->delete($name);
            }

            $this->user_model->update_img($id);
            echo '<img src="' . $img_upload . '" width="349px" height="170px" alt="" style="display:block">';
        }
    }
}

/* End of file Admin_index.php */
/* Location: ./application/controllers/admin/Admin_index.php */
