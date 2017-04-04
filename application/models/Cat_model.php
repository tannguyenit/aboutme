<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index($offset,$row_count)
	{
		$this->db->order_by('id_cat', 'desc');
		$this->db->limit($row_count,$offset);
		$query=$this->db->get('category');
		return $query->result_array();

	}
	public function get_cat()
	{
		$this->db->order_by('id_cat', 'desc');
		$query=$this->db->get('category');
		return $query->result_array();

	}
	public function check_tendm($tendm)
	{
		$this->db->select("*");
		$this->db->from("category");
		$arWhere=array('name'=>$tendm);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function pagination($offset,$row_count)
	{
		$this->db->select("*");
		$this->db->from("category");
		$this->db->order_by('id_cat', 'desc');
		$this->db->limit($row_count,$offset);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function edit($id_cat)
	{
		$this->db->select('*');
		$this->db->from('category');
		$arWhere=array('id_cat'=>$id_cat);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function add_cat($arAdd)
	{
		$array=array(
			'name'=>$arAdd['tendm']
		);
		return $this->db->insert('category', $array);
	}
	public function update($arAdd,$id)
	{
		$array=array(
			'name'=>$arAdd['tendm']
		);
		$arWhere=array('id_cat'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('category', $array);
	}
	public function del($arDel)
	{
		return $this->db->delete('category',$arDel);
	}
	public function allRecord()
	{
		return $this->db->count_all_results('category');
	}
	public function get_id_news($offset,$row_count)
	{
		$this->db->select('category.id_cat,news.*');
		$this->db->from('category');
		$this->db->join('news', 'category ON news.id_cat=category.id_cat', 'category');
		$this->db->order_by('category.id_cat', 'desc');
		$this->db->limit($row_count,$offset);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function show_id_cat($id_cat)
	{
		$this->db->select("*");
		$this->db->from("category");
		$arWhere=array('id_cat'=>$id_cat);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
		
	}
}

/* End of file cat_model.php */
/* Location: ./application/models/cat_model.php */