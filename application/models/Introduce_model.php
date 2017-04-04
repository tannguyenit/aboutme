<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Introduce_model extends CI_Model {
		public function __construct()
		{
			parent::__construct();
		}
	
	public function index()
	{
		$this->db->select('aboutme.*,users.*');
		$this->db->join('users', 'aboutme.id_aboutme = users.id_user', 'aboutme');
		
		$query=$this->db->get("aboutme");
		return $query->row_array();
	}
	public function add($arAdd)
	{
		$id_aboutme=$arAdd["id_aboutme"];
		$array=array(
			"name"=>$arAdd["name"],
			"detail_text"=>$arAdd["detail_text"]
			);
		$arWhere=array("id_aboutme"=>$id_aboutme);
		$this->db->where($arWhere);
		return $this->db->update('aboutme', $arAdd);
	}
	public function add_user()
	{
		return $this->db->insert('aboutme');
	}
}

/* End of file Introduce_model.php */
/* Location: ./application/models/Introduce_model.php */