<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	function checkuser()
	{
		$CI =& get_instance();
		if (!$CI->session->userdata('arsUser')) {
			redirect("/admin/admin_login");
		}	
	}

/* End of file check_user_helper.php */
/* Location: ./application/helpers/check_user_helper.php */