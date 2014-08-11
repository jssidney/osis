<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends SAM_Controller {
	public function __construct()
       {
            parent::__construct();
			$this->check_session();
			$this->load->model('products_model');
       }

	public function index(){
	
		$data['products'] = $this->products_model->all_products();
		
		$this->load->view('blocks/header');
		$this->load->view('product_list',$data);
		$this->load->view('blocks/footer');
	}
	
	public function all(){
	
	}
	
	public function addnewproduct(){
	
		if($this->input->post('saveproduct')){
			$this->products_model->insertnew();
		}
		$this->session->set_flashdata('flashmsg', 'New product added successfuly');
		$this->session->set_flashdata('flashtype', 'alert-success');
		redirect('products');
	}
	
	public function updateproduct(){
		if($this->input->post('deleteproduct')){
			$this->products_model->deleteproduct();
			$this->session->set_flashdata('flashmsg', 'Product Successfuly Deleted');
			$this->session->set_flashdata('flashtype', 'alert-success');
			redirect('products');
		}
		if($this->input->post('updateproduct')){
			$this->session->set_flashdata('flashmsg', 'Product Successfuly Updated');
			$this->session->set_flashdata('flashtype', 'alert-success');
			redirect('products');
		}
		
	}
	
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */