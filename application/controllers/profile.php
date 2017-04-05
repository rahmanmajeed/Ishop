<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {

	public function addProfile()
	{
		if($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
		{
			//	echo "<script>alert('hello');
		$data = array('message' => '', 'base_url'=>base_url(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		
		if(!$this->input->get_post('buttonAdd'))
		{	
			
			$this->parser->parse('view_profile', $data);
			return;
		}
		$info['name'] = $this->input->post('name');
		$info['password'] = $this->input->post('password');
		$info['email'] = $this->input->post('email');
		$info['phone'] = $this->input->post('number');
		$info['type'] = $this->input->post('type');
		$info['address'] = $this->input->post('address');
		$info['creator_id'] = $this->session->userdata('user_id');
		$info['base_url'] = base_url();
		$info['categorie']=$this->categorymodel->viewAllCategories();
		$info['brand']=$this->brandmodel->viewAllBrands();
		
		//print_r($info);
		//return;
		if (!$this->profilemodel->checkExistingUser($info))
		{
			$user_info = $this->profilemodel->addUser($info);
			if ($user_info)
			{
				$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> Success</div>';
				$this->parser->parse('view_profile', $info);
			}
		}
		else
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> User Already Exists</div>';
			$this->parser->parse('view_profile', $info);
		}
			
		}
		
		
		else{
			redirect(base_url(),'refresh');
		}

	}
	
	public function viewProfiles()
	{	
		if($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
		{
			$data = array('message' => '' ,'base_url'=>base_url() , 'profiles' => $this->profilemodel->viewAllProfiles(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
			$this->parser->parse('view_profile_list', $data);
		}
		
		else{
			redirect(base_url(),'refresh');
		}
	}
	
	public function editProfile($id)
	{
		if($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
		{
			$info['profile_id'] = $id; 
		$profile = $this->profilemodel->viewprofileById($info);
		$data = array('message' => '' ,'base_url'=>base_url(), 'name'=>$profile['name'],'phone' =>$profile['phone'],'email'=>$profile['email'],'address'=>$profile['address'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		
		if(!$this->input->get_post('buttonUpdate'))
		{	
			$this->parser->parse('view_profile_edit', $data);
			return;
		}
		
		$info['name'] = $this->input->post('name');
		$info['phone'] = $this->input->post('phone');
		$info['email'] = $this->input->post('email');
		$info['address'] = $this->input->post('address');
		
		$info['base_url'] = base_url();
		$info['categorie']=$this->categorymodel->viewAllCategories();
		$info['brand']=$this->brandmodel->viewAllBrands();
	
		$user_info = $this->profilemodel->updateProfile($info);
		if ($user_info)
		{
			
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>update</strong> Success</div>';
			//echo "<script>alert('hello');
			redirect(base_url().'profile/viewProfiles', 'refresh');
		}
		else
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>update</strong> Failed</div>';
			$this->parser->parse('view_profile_edit', $info);
		}
			
		}
		
		else{
			redirect(base_url(),'refresh');
		}
		
		
			
	}
    
    public function register()
	{
			//	echo "<script>alert('hello');
		$data = array('message' => '', 'base_url'=>base_url(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		
		if(!$this->input->get_post('buttonAdd'))
		{	
			
			$this->parser->parse('view_register_user', $data);
			return;
		}
		$info['name'] = $this->input->post('name');
		$info['password'] = $this->input->post('password');
		$info['email'] = $this->input->post('email');
		$info['phone'] = $this->input->post('number');
		$info['type'] = $this->input->post('type');
		$info['address'] = $this->input->post('address');
		$info['creator_id'] = $this->session->userdata('user_id');
		$info['base_url'] = base_url();
		$info['categorie']=$this->categorymodel->viewAllCategories();
		$info['brand']=$this->brandmodel->viewAllBrands();
	
		//print_r($info);
		//return;
		if (!$this->profilemodel->checkExistingUser($info))
		{
			$user_info = $this->profilemodel->addUser($info);
			if ($user_info)
			{
				$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> Success</div>';
				redirect(base_url().'login/index', 'refresh');
			}
		}
		else
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> User Already Exists</div>';
			$this->parser->parse('view_register_user', $info);
		}
			
	
	}
	
	public function changePassword()
	{	
		if($this->session->userdata("username"))
		{
											
			$data = array('message' => '','base_url'=>base_url(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
	
			if(!$this->input->get_post('buttonChange'))
			{
				$this->parser->parse('view_change_password', $data);
				return;
			}
			$oldpass = $this->input->post('oldpass');
			$newpass = $this->input->post('newpass');
			$confpass = $this->input->post('confpass');
			if ($newpass===$confpass)
			{
				$user_info = $this->loginmodel->validateUser($this->session->userdata("username"), $oldpass);
				if(!$user_info)
				{
					$data['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> Invalid password</div>';
					$this->parser->parse('view_change_password', $data);
					return;
				}
					
				else
				{
					$info['username'] = $this->session->userdata("username");
					$info['password'] = $this->input->post('newpass');
					$user_info = $this->profilemodel->changePassword($info);
					redirect(base_url().'index/home', 'refresh');
				}
			}
	
			
		else
		{
			$data['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong></strong> write password again</div>';
			$this->parser->parse('view_change_password', $data);
			return;
		}	
	
		}
		

		
	}
	
}