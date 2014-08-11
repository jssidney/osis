<?php

class SAM_Controller extends CI_Controller {



    public function __construct() {
       parent::__construct();
	   
    }
	
	public function check_session(){
		$user_is_logged_in = $this->session->userdata('isLoggedIn');
		if($user_is_logged_in==false){
			redirect('auth');
		}
	}
	

	
	
}

?>