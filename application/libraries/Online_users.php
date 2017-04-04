<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Online_users
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->model('online_users');
	}
	function get_all_session_data()
	{

	    $query=$this->ci->online_users_mod->get_all_session_data();
	    $user = array();

	    /* array to store the user data we fetch */
	    $j=0;$k=0;
	    foreach ($query->result() as $row)
	    {
	        $udata = unserialize($row->user_data);

	        /* put data in array using username as key */

	        if(isset($udata['yourlogin_data']))
	        {

	            if($udata['yourlogin_data']['User_cat']==2)
	            {
	                $user[$j]['yourlogin_data'] = $udata['yourlogin_data'];
	                $j++;
	            }

	            }

	        }


	    return $user ;
	    }
	}
	

}

/* End of file Online_users.php */
/* Location: ./application/libraries/Online_users.php */
