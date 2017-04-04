<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adv_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index($offset,$row_count)
	{
		$this->db->select('*');
		$this->db->from("advs");
		$this->db->order_by('id_advs', 'desc');
		$this->db->limit($row_count,$offset);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function allRecord()
	{
		return $this->db->count_all_results("advs");
	}
	public function edit($id_advs)
	{
		$this->db->select('*');
		$this->db->from('advs');
		$arWhere=array('id_advs'=>$id_advs);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function add($arAdd)
	{
		$array=array(
			'name'=>$arAdd['ten'],
			'link'=>$arAdd['link'],
			'banner'=>$arAdd['hinhanh']

		);
		return $this->db->insert('advs', $array);
	}
	public function update($arAdd,$id)
	{
		$array=array(
			'name'=>$arAdd['ten'],
			'link'=>$arAdd['link'],
			'banner'=>$arAdd['hinhanh']

		);
		$arWhere=array('id_advs'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('advs', $array);
	}
	public function del($arDel)
	{
		return $this->db->delete('advs',$arDel);
	}
	

}

/* End of file adv_model.php */
/* Location: ./application/models/adv_model.php */