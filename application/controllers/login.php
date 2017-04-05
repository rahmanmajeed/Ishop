<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{	
		//$this->load->view('view_profile');
			
			
									
		$data = array('message' => '','base_url'=>base_url(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());

		if(!$this->input->get_post('buttonLogin'))
		{
			$this->parser->parse('view_login', $data);
			return;
		}
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user_info = $this->loginmodel->validateUser($username, $password);
		if(!$user_info)
		{
			$data['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> Invalid username or password</div>';
			$this->parser->parse('view_login', $data);
			return;
		}
		if($user_info['status']=='active')
		{
			if($user_info['type']=='Admin' || $user_info['type']=='Manager')
			{
				$this->session->set_userdata($user_info);
				$this->session->userdata('user_id');
				$this->loginmodel->lastLoginDate($user_info['user_id']);
				//redirect(base_url().'profile/addProfile', 'refresh');
				//redirect(base_url().'brand/addBrand', 'refresh');
				//redirect(base_url().'category/addCategory', 'refresh');
				redirect(base_url().'index/home', 'refresh');
			}
			else if ($user_info['type']=='Consummer')
			{
				$this->session->set_userdata($user_info);
				$this->session->userdata('user_id');
				$name=$this->loginmodel->userName($user_info);
				$this->session->set_userdata($name);
				//echo $this->session->userdata("name");
				$this->loginmodel->lastLoginDate($user_info['user_id']);
				//redirect(base_url().'profile/addProfile', 'refresh');
				//redirect(base_url().'brand/addBrand', 'refresh');
				//redirect(base_url().'category/addCategory', 'refresh');
				redirect(base_url().'index/home', 'refresh');
			}
			
			else
				redirect(base_url().'index/home', 'refresh');
		}

	}
	public function homePage()
	{
		$data = array('message' => '','base_url'=>base_url());
		redirect(base_url().'index/home', 'refresh');
			
	}

	
		public function logout()
	{
		
		$this->session->unset_userdata();
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect(base_url().'index/home', 'refresh');
	}
}