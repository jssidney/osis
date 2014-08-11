<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* APC Online Sales and Inventory Systems
*
* Main Class
*
* Main Controller 
*
*/
class Main extends SAM_Controller {

	public function __construct()
       {
            parent::__construct();
			$this->check_session();
       }
	
	public function index()
	{
		$this->load->view('blocks/header');
		$this->load->view('main_view');
		$this->load->view('blocks/footer');
	}
	
	
	
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */