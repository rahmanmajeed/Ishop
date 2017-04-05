<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SupplierModel extends CI_Model {

	public function addSupplier($info)
	{
		

		$param = array(
			'supplier_name' => $info['supplier_name'],
			'supplier_phone' => $info['supplier_phone'],
			'supplier_email' => $info['supplier_email'],
			'supplier_address' => $info['supplier_address'],
			'security_deposit' => $info['security_deposit']
			
		
			);
		return $this->db->insert('suppliers',$param);
		

	}
	public function checkExistingSupplier($data)
	{
		$param = array(
			'supplier_phone' => $data['supplier_phone']
			

		); 
		$result = $this->db->get_where('suppliers', $param);
		return $result->row_array();

	}
	
	
	public function viewAllSuppliers()
	{
		 
		$result = $this->db->get('suppliers');
		return $result->result_array();

	}
	
	public function viewSupplierById($data)
	{
		 
		$param = array(
			'supplier_id' => $data['supplier_id']
		); 
		$result = $this->db->get_where('suppliers',$param);
		return $result->row_array();

	}
	
	public function updateSupplier($info)
	{
		

		$param = array(
			'supplier_name' => $info['supplier_name'],
			'supplier_phone' => $info['supplier_phone'],
			'supplier_email' => $info['supplier_email'],
			'supplier_address' => $info['supplier_address'],
			'security_deposit' => $info['security_deposit']
			
			);
		$param2 = array(
			'supplier_id' => $info ['supplier_id']
		);	
		
		return $this->db->update('suppliers',$param,$param2);
		

	}
	
}