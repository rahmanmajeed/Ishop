<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BrandModel extends CI_Model {

	public function addBrand($info)
	{
		

		$param = array(
			'brand_name' => $info['brand_name'],
			'description' => $info['description']
			
			);
		return $this->db->insert('brands',$param);
		

	}
	public function checkExistingBrand($data)
	{
		$param = array(
			'brand_name' => $data['brand_name']
		); 
		$result = $this->db->get_where('brands', $param);
		return $result->row_array();

	}
	
	public function viewAllBrands()
	{
		 
		$result = $this->db->get('brands');
		return $result->result_array();

	}
	
	public function viewBrandById($data)
	{
		 
		$param = array(
			'brand_id' => $data['brand_id']
		); 
		$result = $this->db->get_where('brands',$param);
		return $result->row_array();

	}
	
	public function updateBrand($info)
	{
		

		$param = array(
			'brand_name' => $info['brand_name'],
			'description' => $info['description']
			
			);
		$param2 = array(
			'brand_id' => $info ['brand_id']
		);	
		
		return $this->db->update('brands',$param,$param2);
		

	}
}