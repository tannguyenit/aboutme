<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_index extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkuser();
    }

    public function index()
    {
        $arData["total_read"] = $this->news_model->total_read();
        $arData["total_user"] = $this->user_model->toltal();
        $arData["total_news"] = $this->news_model->toltal();
        $arData["total_contact"] = $this->contact_model->allRecord();
        $ngayhientai = date("Y-m-d");
        $year = date("Y");
        $mounth = date("m");
        $ngaytrongthang = days_in_month($mounth, $year);

        for ($i = 1; $i <= $ngaytrongthang; $i++) {
            $arData["ngaythu" . $i] = $this->statistical_model->index("$year-$mounth-0$i");
        }
        for ($i = 1; $i <= $ngaytrongthang; $i++) {
            $arData["ngay" . $i] = $arData["ngaythu" . $i]["view"] . "";
        }

        $this->load->view('templates/admin/template', $arData);
    }
}

/* End of file Admin_index.php */
/* Location: ./application/controllers/admin/Admin_index.php */
