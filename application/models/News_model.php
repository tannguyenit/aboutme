<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function allRecord()
	{
		return $this->db->count_all_results("news");
	}
	public function allRecordCat($id_cat)
	{
		$arWhere=array('id_cat'=>$id_cat);
		$this->db->where($arWhere);
		$this->db->order_by('id_news', 'desc');
		$query=$this->db->get('news');
		return $num = $query->num_rows();
	}
	public function pagination_cat($id_cat,$offset,$row_count)
	{
		$this->db->select('*');
		$this->db->from("news");
		$arWhere=array('id_cat'=>$id_cat,"is_active"=>1);
		$this->db->where($arWhere);
		$this->db->order_by('id_news', 'desc');
		$this->db->limit($row_count,$offset);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function index($arSearch)
	{
		$this->db->select('news.*,category.name AS tendanhmuc');
		$this->db->from("news");
		$this->db->join('category', 'category.id_cat = news.id_cat');
		if(count($arSearch)>0) {
		    if($arSearch['id_cat']!="" && $arSearch['is_active']!="" && $arSearch['name']!="") {
		        $arWhere=array( 'news.id_cat'=> $arSearch['id_cat'], 'news.is_active'=> $arSearch['is_active']);
		        $arLike=array('news.name'=> $arSearch['name']);
		        $this->db->where($arWhere);
		        $this->db->like($arLike);
		    }
		    else if($arSearch['id_cat']!="" && $arSearch['is_active']!="") {
		        $arWhere=array( 'news.id_cat'=> $arSearch['id_cat'], 'news.is_active'=> $arSearch['is_active']);
		        $this->db->where($arWhere);
		    }
		    else if($arSearch['id_cat']!="" && $arSearch['name']!="") {
		        $arWhere=array( 'news.id_cat'=> $arSearch['id_cat'], 'news.is_active'=> $arSearch['is_active']);
		        $arLike=array('news.name'=> $arSearch['name']);
		        $this->db->where($arWhere);
		        $this->db->like($arLike);
		    }
		    else if($arSearch['is_active']!="" && $arSearch['name']!="") {
		        $arWhere=array( 'news.id_cat'=> $arSearch['id_cat'], 'news.is_active'=> $arSearch['is_active']);
		        $arLike=array('news.name'=> $arSearch['name']);
		        $this->db->where($arWhere);
		        $this->db->like($arLike);
		    }
		    else if($arSearch['is_active']!="") {
		        $arWhere=array( 'news.is_active'=> $arSearch['is_active']);
		        $this->db->where($arWhere);
		    }
		    else if($arSearch['id_cat']!="") {
		        $arWhere=array( 'news.id_cat'=> $arSearch['id_cat']);
		        $this->db->where($arWhere);
		    }
		    else if($arSearch['name']!="") {
		        $arLike=array('news.name'=> $arSearch['name']);
		        $this->db->like($arLike);
		    }
		}
		$this->db->order_by('id_news', 'desc');
		$query=$this->db->get();
		return $query->result_array();
	}
	public function profile($id_user)
	{
		
		$arWhere=array('id_user'=>$id_user);
		$this->db->where($arWhere);
		$this->db->limit(4,0);
		$query=$this->db->get('news');
		return $query->result_array();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('news');
		$arWhere=array('id_news'=>$id);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function del($id_news)
	{
		$arWhere=array('id_news'=>$id_news);
		return $this->db->delete('news',$arWhere);
	}
	public function del_cat($id)
	{
		$arWhere=array('id_cat'=>$id);
		return $this->db->delete('news',$arWhere);
	}
	public function getid_cat($id)
	{
		$arWhere=array('id_cat'=>$id,"is_active"=>1);
		$this->db->where($arWhere);
		$query=$this->db->get('news');
		return $query->result_array();
		
	}
	public function getid_cat_once($id)
	{
		$arWhere=array('id_cat'=>$id,"is_active"=>1);
		$this->db->where($arWhere);
		$this->db->limit(1,0);
		$query=$this->db->get('news');
		return $query->result_array();
		
	}
	public function getid_cat_four($id)
	{
		$arWhere=array('id_cat'=>$id,"is_active"=>1);
		$this->db->where($arWhere);
		$this->db->limit(4,1);
		$query=$this->db->get('news');
		return $query->result_array();
		
	}
	public function add($arAdd)
	{
		
		return $this->db->insert('news', $arAdd);
	}
	public function update($arAdd,$id)
	{
		$arWhere=array('id_news'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('news', $arAdd);
	}
	public function read($arRead,$id)
	{
		$arWhere=array('id_news'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('news', $arRead);
	}
	public function is_active($arAdd,$id)
	{
		
		$arWhere=array('id_news'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('news', $arAdd);
	}
	public function toltal()
	{
		return $this->db->count_all_results('news');
	}
	public function total_read()
	{
		$this->db->select('read,date');
		$query=$this->db->get('news');
		return $query->result_array();
	}
	public function update_img($id)
	{
		$arWhere=array(
			'id_news'=>$id
		);
		$array=array(
			'picture'=>''
		);
		return $this->db->update('news', $array,$arWhere);
	}
	public function total_search($arSearch)
	{
		$this->db->select('news.*,category.name AS tendanhmuc');
		$this->db->from("news");
		$this->db->join('category', 'category.id_cat = news.id_cat');
		
		if(count($arSearch)>0) {
		    if($arSearch['id_cat']!="" && $arSearch['is_active']!="" && $arSearch['name']!="") {
		        $arWhere=array( 'news.id_cat'=> $arSearch['id_cat'], 'news.is_active'=> $arSearch['is_active']);
		        $arLike=array('news.name'=> $arSearch['name']);
		        $this->db->where($arWhere);
		        $this->db->like($arLike);
		    }
		    else if($arSearch['id_cat']!="" && $arSearch['is_active']!="") {
		        $arWhere=array( 'news.id_cat'=> $arSearch['id_cat'], 'news.is_active'=> $arSearch['is_active']);
		        $this->db->where($arWhere);
		    }
		    else if($arSearch['id_cat']!="" && $arSearch['name']!="") {
		        $arWhere=array( 'news.id_cat'=> $arSearch['id_cat'], 'news.is_active'=> $arSearch['is_active']);
		        $arLike=array('news.name'=> $arSearch['name']);
		        $this->db->where($arWhere);
		        $this->db->like($arLike);
		    }
		    else if($arSearch['is_active']!="" && $arSearch['name']!="") {
		        $arWhere=array( 'news.id_cat'=> $arSearch['id_cat'], 'news.is_active'=> $arSearch['is_active']);
		        $arLike=array('news.name'=> $arSearch['name']);
		        $this->db->where($arWhere);
		        $this->db->like($arLike);
		    }
		    else if($arSearch['is_active']!="") {
		        $arWhere=array( 'news.is_active'=> $arSearch['is_active']);
		        $this->db->where($arWhere);
		    }
		    else if($arSearch['id_cat']!="") {
		        $arWhere=array( 'news.id_cat'=> $arSearch['id_cat']);
		        $this->db->where($arWhere);
		    }
		    else if($arSearch['name']!="") {
		        $arLike=array('news.name'=> $arSearch['name']);
		        $this->db->like($arLike);
		    }
		}
		
		$this->db->order_by('id_news', 'desc');
		
		$query=$this->db->get();
		return count($query->result_array());
	}
	public function detail($id_news)
	{
		$this->db->select('*');
		$this->db->from("news");
		$arWhere=array('id_news'=>$id_news,"is_active"=>1);
		$this->db->where($arWhere);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function tinlienquan($id_news,$id_cat)
	{
		$this->db->select('*');
		$this->db->from("news");
		$arWhere=array('id_news!='=>$id_news,'id_cat'=>$id_cat,"is_active"=>1);
		$this->db->where($arWhere);
		$this->db->limit(3);
		$this->db->order_by('id_news', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
}

/* End of file project_model.php */
/* Location: ./application/models/project_model.php */