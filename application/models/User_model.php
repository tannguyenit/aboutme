<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index($offset,$row_count)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id_user', 'desc');
		$this->db->limit($row_count,$offset);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function get()
	{
		$this->db->select('*');
		$this->db->from('users');
		$arWhere=array("id_user"=>1);
		$this->db->where($arWhere);
		$this->db->order_by('id_user', 'desc');
		//$this->db->limit($row_count,$offset);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$arWhere=array('id_user'=>$id);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function profile($id_user)
	{
		$this->db->select('*');
		$this->db->from('users');
		$arWhere=array('id_user'=>$id_user);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function del($arDel)
	{
		return $this->db->delete('users',$arDel);
	}
	public function add($arAdd)
	{
		$array=array(
			'username'=>$arAdd['username'],
			'password'=>md5($arAdd['password']),
			'fullname'=>$arAdd['fullname'],
			'picture'=>$arAdd['hinhanh']

		);
		return $this->db->insert('users', $array);
	}
	public function update($arAdd,$id)
	{
		$arWhere=array('id_user'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('users', $arAdd);
	}
	public function capcha_update($id_user,$macapcha)
	{
		$array=array(
			'maxacnhan'=>$macapcha
		);
		$arWhere=array('id_user'=>$id_user);
		$this->db->where($arWhere);
		return $this->db->update('users', $array);
	}
	public function update_password($arUpdate)
	{
		$id_user=$arUpdate["id_user"];
		$arWhere=array('id_user'=>$id_user);
		$this->db->where($arWhere);
		return $this->db->update('users', $arUpdate);
	}
	public function register($arRegister)
	{
		return $this->db->insert('users', $arRegister);
	}
	public function login($arLogin)
	{
		$username=$arLogin["username"];
		$password=md5($arLogin["password"]);
		$arWhere=array(
			"username"=>$username,
			"password"=>$password
		);
		$this->db->where($arWhere);
		$this->db->limit(1);
		$query=$this->db->get('users');
		return $query->row_array();
	}
	public function check_active($arLogin)
	{
		$username=$arLogin["username"];
		$arWhere=array(
			"username"=>$username,
			"active"=>1
		);
		$this->db->where($arWhere);
		$this->db->limit(1);
		$query=$this->db->get('users');
		return $query->row_array();
	}
	public function check_ma($arCheck)
	{
		$this->db->where($arCheck);
		$this->db->limit(1);
		$query=$this->db->get('users');
		return $query->row_array();
	}
	public function check_user($username)
	{
		$arWhere=array(
			"username"=>$username
		);
		$this->db->where($arWhere);
		$this->db->limit(1);
		$query=$this->db->get('users');
		return $query->row_array();
	}
	public function toltal()
	{
		return $this->db->count_all_results('users');
	}
	public function login_forgot($name_forgot)
	{
		$this->db->like('username',$name_forgot);
		$this->db->or_like('email', $name_forgot);
		$this->db->limit(1);
		$query=$this->db->get('users');
		return $query->row_array();
	}
	public function is_active($arAdd,$id)
	{
		
		$arWhere=array('id_user'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('users', $arAdd);
	}
	public function allRecord()
	{
		return $this->db->count_all_results('users');
	}
	public function update_img($id)
	{
		$arWhere=array(
			'id_user'=>$id
		);
		$array=array(
			'picture'=>''
		);
		return $this->db->update('users', $array,$arWhere);
	}
	public function get_user()
	{
		return $this->db->get('users')->r;
	}
	public function get_all_session_data()
	{
	    $query=$this->db->select('user_data')->get('ci_sessions');
		return $query;
	}
	public function login_fb($arUser_fb)
	{
		$arWhere=array(
			"username"=>$arUser_fb[""]
		);
		$this->db->where($arWhere);
		$this->db->limit(1);
		$query=$this->db->get('users');
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */