<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index($offset,$row_count)
	{
		$this->db->select('*');
		$this->db->from("slide");
		$this->db->order_by('id_slide', 'desc');
		$this->db->limit($row_count,$offset);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function allRecord()
	{
		return $this->db->count_all_results("slide");
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('slide');
		$arWhere=array('id_slide'=>$id);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function del($arDel)
	{
		return $this->db->delete('slide',$arDel);
	}
	public function add($arAdd)
	{
		$array=array(
			'name'=>$arAdd['ten'],
			'picture'=>$arAdd['hinhanh']

		);
		return $this->db->insert('slide', $array);
	}
	public function update($arAdd,$id)
	{
		$array=array(
			'name'=>$arAdd['ten'],
			'picture'=>$arAdd['hinhanh']

		);
		$arWhere=array('id_slide'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('slide', $array);
	}
}

/* End of file project_model.php */
/* Location: ./application/models/project_model.php */