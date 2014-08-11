<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends SAM_Controller {


	public function index()
	{
		$user_is_logged_in = $this->session->userdata('isLoggedIn');
		if($user_is_logged_in==true){
			redirect('/');
		}
		$this->load->view('pages/login_page');
	}
	
	public function login(){
		//if true
		//additional session variables - branch & level,...
		$username = $this->input->post('username');
		$userpass  = $this->input->post('userpass');

		//Ensure values exist for email and pass, and validate the user's credentials
		if( $username && $userpass && $this->auth_model->validate_user($username,$userpass)) {
          // If the user is valid, redirect to the main view
			redirect('/main');
		} else {
          // Otherwise show the login screen with an error message.
          //$this->show_login(true);
		  $this->load->view('pages/login_page');
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('auth/');
	}
	
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */