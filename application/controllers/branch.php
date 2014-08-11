<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branch extends SAM_Controller {


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

/* End of file branch.php */
/* Location: ./application/controllers/branch.php */