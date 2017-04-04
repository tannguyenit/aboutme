<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_index extends CI_Controller {

public function __construct()
{
	parent::__construct();
	checkuser();
}
	public function index()
	{
		// $tg=time();
		// $tgout=900;
		// $tgnew=$tg - $tgout;
		// $REMOTE_ADDR=$REMOTE_ADDR;
		// $PHP_SELF=$PHP_SELF;
		// $arData["time"]=$this->user_model->insert($tg,$REMOTE_ADDR,$PHP_SELF);
		$arData["total_read"]=$this->news_model->total_read();
		$arData["total_user"]=$this->user_model->toltal();
		$arData["total_news"]=$this->news_model->toltal();
		$arData["total_contact"]=$this->contact_model->allRecord();
		$ngayhientai=date("Y-m-d");
		$year=date("Y");
		$mounth=date("m");
		$ngaytrongthang= days_in_month($mounth,$year);
		for ($i=1; $i <= $ngaytrongthang; $i++) { 
			$arData["ngaythu".$i]=$this->statistical_model->index("$year-$mounth-0$i");
		}
		for ($i=1; $i <= $ngaytrongthang ; $i++) { 
			$arData["ngay".$i]= $arData["ngaythu".$i]["view"]."";
			
		}
		
		//$arData["ngay1"]=$this->statistical_model->index($ngayhientai);
		$this->load->view('templates/admin/template',$arData);
	}
	
	// public function counting()
	// {
	// 	$ip_file='ip.txt';
	// 	$count_file='counter.txt';
	// 	$ip=$_SERVER['REMOTE_ADDR']; 
	// 	global $count_file, $ip_file; 
	// 	if (!in_array($ip, file($ip_file,FILE_IGNORE_NEW_LINES))){
	// 		 $current_val=(file_exists($count_file)) ? file_get_contents($count_file) : 0; 
	// 		 file_put_contents($ip_file, $ip."\n" , FILE_APPEND); 
	// 		 file_put_contents($count_file, ++$current_val);
	// 	}
		
	// 	}
	// 	echo "<pre>";
	// 	print_r ($variable);
	// 	echo "</pre>";
	}

/* End of file Admin_index.php */
/* Location: ./application/controllers/admin/Admin_index.php */