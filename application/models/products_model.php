<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_model extends CI_Model {
	
	function all_products() {
        $query = $this->db->select('*')->from('tbl_products')->where('flag >=',1)->get();
		return $query->result();
    }

	function insertnew(){
		$data = array(
				  'type'=>$this->input->post('type'),
				  'name'=>$this->input->post('name'),
				  'model'=>$this->input->post('model'),
				  'brand'=>$this->input->post('brand'),
				  'manufacturer'=>$this->input->post('manufacturer'),
				  'price'=>$this->input->post('price'),
				  'details'=>$this->input->post('details'),
				  'added_by'=>$this->input->post('added_by'),
				);
		$this->db->insert('tbl_products',$data);
	}
	
	function deleteproduct(){
	
		$id = $this->input->post('product_id');
		$this->db->delete('tbl_products', array('id' => $id)); 
	}
	
}

/* End of file products_model.php */
/* Location: ./application/model/products_model.php */