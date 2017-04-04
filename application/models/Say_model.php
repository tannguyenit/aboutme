<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Say_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($offset, $row_count)
    {
        $this->db->select('*');
        $this->db->from('saying');
        $this->db->order_by('id_saying', 'desc');
        $this->db->limit($row_count, $offset);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function allRecord()
    {
        return $this->db->count_all_results('saying');
    }

    public function del($arDel)
    {
        return $this->db->delete('saying', $arDel);
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('saying');
        $arWhere = ['id_saying' => $id];
        $this->db->where($arWhere);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function add($arAdd)
    {
        $array = [
            'content' => $arAdd['content'],
            'author' => $arAdd['author'],
        ];

        return $this->db->insert('saying', $array);
    }

    public function update($arAdd, $id)
    {
        $array = [
            'content' => $arAdd['content'],
            'author' => $arAdd['author'],
        ];
        $arWhere = ['id_saying' => $id];
        $this->db->where($arWhere);

        return $this->db->update('saying', $array);
    }
}

/* End of file say_model.php */
/* Location: ./application/models/say_model.php */
