<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CategoryModel extends CI_Model {

	public function addCategory($info)
	{
		

		$param = array(
			'cat_name' => $info['cat_name'],
			'description' => $info['description']
			
			);
		return $this->db->insert('categories',$param);
		

	}
	public function checkExistingCategory($data)
	{
		$param = array(
			'cat_name' => $data['cat_name']
		); 
		$result = $this->db->get_where('categories', $param);
		return $result->row_array();

	}
	
	public function viewAllCategories()
	{
		 
		$result = $this->db->get('categories');
		return $result->result_array();

	}
	
	public function viewCategoryById($data)
	{
		 
		$param = array(
			'cat_id' => $data['cat_id']
		); 
		$result = $this->db->get_where('categories',$param);
		return $result->row_array();

	}
	
	public function updateCategory($info)
	{
		

		$param = array(
			'cat_name' => $info['cat_name'],
			'description' => $info['description']
			
			);
		$param2 = array(
			'cat_id' => $info ['cat_id']
		);	
		
		return $this->db->update('categories',$param,$param2);
		

	}
	
}