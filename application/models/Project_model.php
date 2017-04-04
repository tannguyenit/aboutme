<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($offset, $row_count)
    {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->order_by('id_projects', 'desc');
        $this->db->limit($row_count, $offset);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('projects');
        $arWhere = ['id_projects' => $id];
        $this->db->where($arWhere);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function del($arDel)
    {
        return $this->db->delete('projects', $arDel);
    }

    public function add($arAdd)
    {
        $array = [
            'name' => $arAdd['ten'],
            'preview_text' => $arAdd['mota'],
            'link' => $arAdd['link'],
            'picture' => $arAdd['hinhanh'],
        ];

        return $this->db->insert('projects', $array);
    }

    public function update($arAdd, $id)
    {
        $array = [
            'name' => $arAdd['ten'],
            'preview_text' => $arAdd['mota'],
            'link' => $arAdd['link'],
            'picture' => $arAdd['hinhanh'],

        ];
        $arWhere = ['id_projects' => $id];
        $this->db->where($arWhere);

        return $this->db->update('projects', $array);
    }

    public function allRecord()
    {
        return $this->db->count_all_results('projects');
    }

    public function update_img($id)
    {
        $arWhere = [
            'id_projects' => $id,
        ];
        $array = [
            'picture' => '',
        ];

        return $this->db->update('projects', $array, $arWhere);
    }
}

/* End of file project_model.php */
/* Location: ./application/models/project_model.php */
