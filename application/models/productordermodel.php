<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class productordermodel extends CI_Model {

	public function addOrder($info)
	{
		
		date_default_timezone_set("Asia/Dhaka");

		$param = array(
			'orderer_id' => $info['orderer_id'],
			'order_price' => $info['order_price'],
			'order_date' => date("Y/m/d"),
			'product_id' => $info['product_id'],
			'status' => 'incomplete'
			);
		return $this->db->insert('orders',$param);
	}
	public function viewOrderList($info)
	{
		

			$query = $this->db->query("SELECT   order_id,(SELECT `product_name` FROM `products` WHERE `product_id` = O.product_id) as name, order_price FROM `orders`O where order_date=curdate() and orderer_id =" .$info['orderer_id']." and status='incomplete'");
		return $query->result_array();

	}
	public function confirmOrder($info)
	{
		date_default_timezone_set("Asia/Dhaka");

		$param = array(
			'status' => 'completed'
			
			
			);
			
			
		$param2 = array(
			'orderer_id' => $info['orderer_id'],
			'order_date' => date("Y/m/d")
			
			
			);
		return $this->db->update('orders',$param,$param2);
	}
	
	public function soldOrder($info)
	{
		

		$param = array(
			'status' => 'sold'
			
			
			);
			
			
		$param2 = array(
			'order_id' => $info['orderer_id'],
			
			
			
			);
		return $this->db->update('orders',$param,$param2);
	}
	public function removeOrder($info)
	{
		

		$param = array(
			'order_id' => $info['order_id']
			
			
			);
		return $this->db->delete('orders',$param);
	}
   	public function totalSum($info)
	{
		date_default_timezone_set("Asia/Dhaka");
		
			$query = $this->db->query("SELECT SUM(order_price) AS totalSum FROM orders where orderer_id=".$info['orderer_id']." AND order_date=CURDATE() AND status='incomplete'");
		return $query->row_array();


	
	}
	public function viewAllOrderList()
	{
		
		$query = $this->db->query("SELECT   order_id,(SELECT `product_name` FROM `products` WHERE `product_id` = O.product_id) as 		product_name, order_price,(SELECT `username` FROM `users` WHERE `user_id` = O.orderer_id)as phone FROM `orders`O where  status ='completed'");
		return $query->result_array();

	}
	
	   	public function totalSumAdmin()
	{
		
		
			$query = $this->db->query("SELECT SUM(order_price) AS totalSum FROM orders where status='completed'");
		return $query->row_array();


	
	}



}