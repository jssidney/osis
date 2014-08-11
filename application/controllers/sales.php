<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends SAM_Controller {


	public function index()
	{
		$this->load->view('main_view');
	}
	
	public function add(){
	
	}
	
	public function update($action){
		// $action ('activate','deactivate','delete')
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */