<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductModel extends CI_Model {

	public function addProduct($info)
	{
		

		$param = array(
			'product_name' => $info['product_name'],
			'buy_price' => $info['buy_price'],
			'sell_price' => $info ['sell_price'],
			'quantity' => $info ['quantity'],
			'last_purchased'=>'2016-09-20',
			'last_sold'=>'2016-09-20',
			'brand_id' => $info ['brand_id'],
			'supplier_id' => $info ['supplier_id'],
			'cat_id' => $info ['cat_id'],
			'image_location' => $info ['image_location'],
			'description' => $info ['description']
			
			
			);
		return $this->db->insert('products',$param);
		

	}
	public function checkExistingProduct($data)
	{
		$param = array(
			'product_name' => $data['product_name']
		); 
		$result = $this->db->get_where('products', $param);
		
		return $result->row_array();

	}
	public function getBrands()
	{
		$result = $this->db->get('brands');
		return $result->result_array();
	}
	public function getSuppliers()
	{
		$result = $this->db->get('suppliers');
		return $result->result_array();
	}
	public function getCatagories()
	{
		$result = $this->db->get('categories');
		return $result->result_array();
	}
	
	public function viewAllProducts()
	{
		$query = $this->db->query("SELECT `product_id`, `product_name`, `buy_price`, `sell_price`, `quantity`, `last_purchased`, `last_sold`, (SELECT brand_name FROM `brands` WHERE brand_id=P.brand_id) as brand_name, (SELECT supplier_name FROM `suppliers` WHERE supplier_id=P.supplier_id) as supplier_name, (SELECT cat_name FROM `categories` WHERE cat_id=P.cat_id) as cat_name, `image_location`,`description` FROM `products`P");
		
		return $query->result_array();
		

	}
	public function viewProductById($data)
	{
		 
		$param = array(
			'product_id' => $data['product_id']
		); 
		$result = $this->db->get_where('products',$param);
		return $result->row_array();

	}
	
	public function viewProductByCategory($data)
	{
		 
		$param = array(
			'cat_id' => $data['cat_id']
		); 
		$result = $this->db->get_where('products',$param);
		return $result->result_array();

	}
	
	public function viewProductByBrand($data)
	{
		 
		$param = array(
			'brand_id' => $data['brand_id']
		); 
		$result = $this->db->get_where('products',$param);
		return $result->result_array();

	}
	
	public function updateProduct($info)
	{
		

		$param = array(
			'product_name' => $info['product_name'],
			'buy_price' => $info['buy_price'],
			'sell_price' => $info['sell_price'],
			'quantity' => $info['quantity'],
			'brand_id' => $info['brand_id'],
			'supplier_id' => $info['supplier_id'],
			'cat_id' => $info['cat_id'],
			'image_location' => $info['image_location'],
			'description ' => $info['description']
			
			);
		$param2 = array(
			'product_id' => $info ['product_id']
		);	
		
		return $this->db->update('products',$param,$param2);
		

	}
}