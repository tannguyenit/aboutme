<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($offset, $row_count)
    {
        $this->db->select('*');
        $this->db->from("contact");
        $this->db->order_by('id_contact', 'desc');
        $this->db->limit($row_count, $offset);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function allRecord()
    {
        return $this->db->count_all_results("contact");
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('contact');
        $arWhere = ['id_contact' => $id];
        $this->db->where($arWhere);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function getcontact($mail, $contact)
    {

        $this->db->from('contact');
        $arWhere = ['content' => $contact, "email" => $mail];
        $this->db->where($arWhere);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function del($arDel)
    {
        return $this->db->delete('contact', $arDel);
    }

    public function add($arContac)
    {
        return $this->db->insert('contact', $arContac);
    }
}

/* End of file contact_model.php */
/* Location: ./application/models/contact_model.php */
