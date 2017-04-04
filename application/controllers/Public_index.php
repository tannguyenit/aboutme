<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Public_index extends CI_Controller
{

    public function index()
    {
        $arData["arSay"] = $this->say_model->index(0, 1);
        $arData["arAbout"] = $this->introduce_model->index();
        $arData["arSlide"] = $this->slide_model->index(0, 4);
        $this->load->view('templates/public/template', $arData);
    }
}

/* End of file Public_index.php */
/* Location: ./application/controllers/Public_index.php */
