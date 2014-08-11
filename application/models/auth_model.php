<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {
	
	var $user_data;

	function validate_user( $username, $userpass ) {
		// Build a query to retrieve the user's details
		// based on the received username and password
		$this->db->from('tbl_users');
		$this->db->where('username',$username );
		$this->db->where( 'userpass',$userpass );
		$login = $this->db->get()->result();

		// The results of the query are stored in $login.
		// If a value exists, then the user account exists and is validated
		if ( is_array($login) && count($login) == 1 ) {
			// Set the users details into the $user_data property of this class
			$this->user_data = $login[0];
			// Call set_session to set the user's session vars via CodeIgniter
			$this->set_session();
			return true;
		}

		return false;
	}
	
	function set_session() {
    // session->set_userdata is a CodeIgniter function that
    // stores data in a cookie in the user's browser.  Some of the values are built in
    // to CodeIgniter, others are added (like the IP address).  See CodeIgniter's documentation for details.
    $this->session->set_userdata( array(
            'id'=>$this->user_data->id,
            'name'=> $this->user_data->name,
            'username'=>$this->user_data->username,
            'level'=>$this->user_data->level,
            'branch'=>$this->user_data->branch,
            'isLoggedIn'=>true,
			)
		);
	}
	
}

/* End of file auth_model.php */
/* Location: ./application/model/auth_model.php */