<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_cat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkuser();
    }

    public function index($page = 1)
    {
        $offset = ($page - 1) * ADMIN_ROW_COUNT;
        $config['base_url'] = '/admin/admin_cat/index';
        $config['total_rows'] = $this->cat_model->allRecord();
        $config['use_page_numbers'] = true;
        $config['per_page'] = ADMIN_ROW_COUNT;
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        $arData["pagination"] = $pagination;
        $arCat = $this->cat_model->pagination($offset, ADMIN_ROW_COUNT);
        $arData['arCat'] = $arCat;
        $this->load->view('templates/admin/template', $arData);
    }

    public function edit_cat()
    {
        if (isset($_POST["id"])) {
            $id_cat = $_POST["id"];
            $arData["arEdit"] = $this->cat_model->edit($id_cat);
        }

        $this->load->view('admin/cat/edit_cat', $arData);
    }

    public function add_cat()
    {
        if ($this->input->post('them')) {
            $arAdd = $this->input->post();
            $result = $this->cat_model->add_cat($arAdd);
            if ($result) {
                $arKT = ["msg" => "Thêm thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_cat/index');
            } else {
                $arKT = ["msg" => "Có lỗi khi thêm ", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_cat/index');
            }
        }
    }

    public function update()
    {
        if (isset($_POST["update"])) {
            $arAdd = $this->input->post();
            $id = $this->input->post("id_cat");
            $result = $this->cat_model->update($arAdd, $id);
            if ($result) {
                $arKT = ["msg" => "Sửa thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_cat/index');
            } else {
                $arKT = ["msg" => "Có lỗi khi sửa", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_cat/index');
            }
        }
    }

    public function del_cat($id)
    {
        $arDel = ['id_cat' => $id];
        $arData = $this->news_model->getid_cat($id);

        if (count($arData) > 0) {
            foreach ($arData as $key => $value) {
                $picture = $value["picture"];

                if ("" != $picture) {
                    $url_pic = $_SERVER["DOCUMENT_ROOT"] . "/assets/file/tmp/" . $picture;

                    if (file_exists($url_pic)) {
                        $this->library_file->delete($picture);
                    }
                }

                $this->news_model->del_cat($id);
            }
        }
        $this->news_model->del_cat($id);

        if ($this->cat_model->del($arDel)) {
            $arKT = ["msg" => "Xóa thành công", "kt" => 1];
            $this->session->set_userdata("kt", $arKT);
            redirect('/admin/admin_cat/index');
        } else {
            $arKT = ["msg" => "Có lỗi khi xóa", "kt" => 2];
            $this->session->set_userdata("kt", $arKT);
            redirect('/admin/admin_cat/index');
        }
    }

    public function check_tendm()
    {
        if (isset($_POST["namecat"])) {
            $namecat = $_POST["namecat"];
            $arData = $this->cat_model->check_tendm($namecat);

            if (count($arData) > 0) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }
}

/* End of file Admin_index.php */
/* Location: ./application/controllers/admin/Admin_index.php */
