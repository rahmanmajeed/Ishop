<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProfileModel extends CI_Model {

	public function addUser($info)
	{
		

		$param = array(
			'username' => $info['phone'],
			'password' => $info['password'],
			'type' => $info['type'],
			'status' => 'active',
			'last_login' => ''
			
			);
		$this->db->insert('users',$param);
		$user_id = $this->db->insert_id();
		//echo $user_id;
		$data = array(
				'user_id' => $user_id,
				'name' => $info['name'],
				'phone' => $info['phone'],
				'email' => $info['email'],
				'address' => $info['address'],
				'creator_id' => $this->session->userdata('user_id')				
		);
	
		return $this->db->insert('profiles',$data);
		
		

	}
	public function checkExistingUser($data)
	{
		$param = array(
			'phone' => $data['phone']
		); 
		$result = $this->db->get_where('profiles', $param);
		return $result->row_array();

	}
	
	public function viewAllProfiles()
	{
		 
		$result = $this->db->get('profiles');
		return $result->result_array();

	}
	
	public function viewProfileById($data)
	{
		 
		$param = array(
			'profile_id' => $data['profile_id']
		); 
		$result = $this->db->get_where('profiles',$param);
		return $result->row_array();

	}
	
	public function updateProfile($info)
	{
		

		$param = array(
			'name' => $info['name'],
			'phone' => $info['phone'],
			'email' => $info['email'],
			'address' => $info['address']
			
			);
		$param2 = array(
			'profile_id' => $info ['profile_id']
		);
		
		return $this->db->update('profiles',$param,$param2);
	}
	
	public function changePassword($info)
	{
		

		$param = array(
			'password' => $info['password']
			
			);
		$param2 = array(
			'username' => $info ['username']
		);
		
		return $this->db->update('users',$param,$param2);
	}
	
}