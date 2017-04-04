<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Public_project extends MY_Controller
{

    public function index($page = 1)
    {
        $offset = ($page - 1) * PUBLIC_ROW_COUNT;
        $config['base_url'] = '/du-an/';
        $config['total_rows'] = $this->project_model->allRecord();
        $config['use_page_numbers'] = true;
        $config['prefix'] = 'page-';
        $config['suffix'] = '.html';
        $config['uri_segment'] = 2;
        $config['num_links'] = 1;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['per_page'] = PUBLIC_ROW_COUNT;
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        $arData["pagination"] = $pagination;
        $arData["arProject"] = $this->project_model->index($offset, PUBLIC_ROW_COUNT);
        $this->load->view('templates/public/template', $arData);
    }
}

/* End of file Public_project.php */
/* Location: ./application/controllers/Public_project.php */
