<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistical_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($date)
    {
        $arWhere = ["date" => $date];
        $this->db->where($arWhere);

        return $this->db->get('statistical')->row_array();
    }

    public function getdate($date)
    {
        $this->db->select('view');
        $arWhere = ["date" => $date];
        $this->db->where($arWhere);
        $arDate = $this->db->get('statistical')->row_array();

        return $arDate["view"];
    }

    public function insert($date)
    {
        $arInsert = ["date" => $date, 'view' => 1];
        $this->db->insert('statistical', $arInsert);
    }

    public function update($date, $view)
    {
        $arWhere = ["date" => $date];
        $this->db->where($arWhere);
        $arUpdate = ["view" => $view];
        $this->db->update('statistical', $arUpdate);
    }
}

/* End of file statistical_model.php */
/* Location: ./application/models/statistical_model.php */
