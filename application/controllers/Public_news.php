<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Public_news extends MY_Controller
{

    public function index($page = 1)
    {

        $offset = ($page - 1) * PUBLIC_ROW_COUNT;
        $config['base_url'] = '/tin-tuc';
        $config['total_rows'] = $this->cat_model->allRecord();
        $config['use_page_numbers'] = true;
        $config['prefix'] = 'page';
        $config['suffix'] = '';
        $config['num_links'] = 2;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['per_page'] = PUBLIC_ROW_COUNT;
        $config['uri_segment'] = 2;
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        $arData["pagination"] = $pagination;
        $arData["arCat"] = $this->cat_model->index($offset, PUBLIC_ROW_COUNT);
        foreach ($arData["arCat"] as $key => $value) {
        }
        $this->load->view('templates/public/template', $arData);
    }

    public function detail($id_news)
    {
        $arData['arNews'] = $this->news_model->detail($id_news);
        $id_cat = $arData['arNews']["id_cat"];
        $arData['arNewsLQ'] = $this->news_model->tinlienquan($id_news, $id_cat);
        $this->load->view('templates/public/template', $arData);
    }

    public function cat($id_cat, $page = 1)
    {
        $arData['arDMT'] = $this->cat_model->show_id_cat($id_cat);
        $nameSEO = SEO_URL($arData['arDMT']["name"]);
        $offset = ($page - 1) * PUBLIC_ROW_COUNT;
        $config['base_url'] = '/tin-tuc/' . $nameSEO . '-' . $id_cat . '';
        $config['total_rows'] = $this->news_model->allRecordCat($id_cat);
        $config['use_page_numbers'] = true;
        $config['prefix'] = 'page-';
        $config['suffix'] = '.html';
        $config['num_links'] = 2;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['per_page'] = PUBLIC_ROW_COUNT;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        $arData["pagination"] = $pagination;
        $arData['arNews'] = $this->news_model->pagination_cat($id_cat, $offset, PUBLIC_ROW_COUNT);
        $this->load->view('templates/public/template', $arData);
    }

    public function read()
    {
        $id = $_POST["id"];
        $arData['arNews'] = $this->news_model->detail($id);
        $read = $arData['arNews']["read"];
        $arRead = ["read" => $read + 1];
        $this->news_model->read($arRead, $id);
        $timenow = date("Y-m-d");
        if (count($this->statistical_model->index($timenow)) > 0) {
            $view = $this->statistical_model->getdate($timenow);
            $view = $view + 1;
            $this->statistical_model->update($timenow, $view);
        } else {
            $this->statistical_model->insert($timenow);
        }
    }
}

/* End of file Public_news.php */
/* Location: ./application/controllers/Public_news.php */
