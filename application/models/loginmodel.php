<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	public function validateUser($username, $password)
	{

		$param = array(
			'username' => $username,
			'password' => $password
			);
		
		$result = $this->db->get_where('users', $param);
		return $result->row_array();


	}
	public function lastLoginDate($id)
	{
		date_default_timezone_set("Asia/Dhaka");
		$data = array(
			'last_login' => date("Y/m/d")
			);
		$this->db->where('user_id', $id);
		$this->db->update('users', $data); 
		return;
	}
	public function userName($user_id)
	{
		
		$data = array(
			'user_id' => $user_id['user_id']
			);
		
		 
		 $result=$this->db->get_where('profiles', $data);
		 return $result->row_array();
	}
}