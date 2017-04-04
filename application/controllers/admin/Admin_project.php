<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_project extends CI_Controller
{

    public function index($page = 1)
    {
        $offset = ($page - 1) * ADMIN_ROW_COUNT;
        $config['base_url'] = '/admin/admin_project/index';
        $config['total_rows'] = $this->project_model->allRecord();
        $config['use_page_numbers'] = true;
        $config['per_page'] = ADMIN_ROW_COUNT;
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        $arData["pagination"] = $pagination;
        $arData['arPro'] = $this->project_model->index($offset, ADMIN_ROW_COUNT);
        $this->load->view('templates/admin/template', $arData);
    }

    public function edit()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $arData["arEdit"] = $this->project_model->edit($id);
        }

        $this->load->view('admin/project/edit', $arData);
    }

    public function del($id)
    {
        $arDel = ['id_projects' => $id];
        $arData = $this->project_model->edit($id);
        $picture = $arData["picture"];

        if ("" != $picture) {
            $url_pic = $_SERVER["DOCUMENT_ROOT"] . "/assets/file/tmp/" . $picture;
            echo $url_pic;

            if (file_exists($url_pic)) {
                $this->library_file->delete($picture);
            }
        }

        if ($this->project_model->del($arDel)) {
            $arKT = ["msg" => "Xóa thành công", "kt" => 1];
            $this->session->set_userdata("kt", $arKT);
            redirect('/admin/admin_project/index');
        } else {
            $arKT = ["msg" => "Có lỗi khi xóa", "kt" => 2];
            $this->session->set_userdata("kt", $arKT);
            redirect('/admin/admin_project/index');
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
            $result = $this->project_model->add($arAdd);

            if ($result) {
                $arKT = ["msg" => "Thêm thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_project/index');
            } else {
                $arKT = ["msg" => "Có lỗi khi thêm", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_project/index');
            }
        }
    }

    public function update()
    {
        if (isset($_POST["update"])) {
            $name_pic = $_FILES["hinhanh2"]["name"];
            $id = $this->input->post("id_projects");
            $arData = $this->project_model->edit($id);
            $filename = $arData["picture"];

            if ('' != $name_pic) {
                $arPic = $this->library_file->upload_file("hinhanh2");
                $url_pic = $_SERVER["DOCUMENT_ROOT"] . "/assets/file/tmp/" . $filename;

                if (file_exists($url_pic)) {
                    $this->library_file->delete($filename);
                }

                $filename = $arPic['file_name'];
            }

            $arAdd = $this->input->post();
            $arAdd['hinhanh'] = $filename;
            $result = $this->project_model->update($arAdd, $id);

            if ($result) {
                $arKT = ["msg" => "Sửa thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_project/index');
            } else {
                $arKT = ["msg" => "Thêm thành công", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_project/index');
            }
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

            $this->project_model->update_img($id);
            echo '<img src="' . $img_upload . '" width="349px" height="170px" alt="" style="display:block">';
        }
    }
}

/* End of file Admin_index.php */
/* Location: ./application/controllers/admin/Admin_index.php */
