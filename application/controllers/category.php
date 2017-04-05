<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category extends CI_Controller {

	public function addCategory()
	{	
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
				$data = array('message' => '' ,'base_url'=>base_url(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());

		if(!$this->input->get_post('buttonAdd'))
		{
			$this->parser->parse('view_category', $data);
			return;
		}
		$info['cat_name'] = $this->input->post('cat_name');
		$info['description'] = $this->input->post('description');
		$info['base_url'] = base_url();
		$info['categorie']=$this->categorymodel->viewAllCategories();
		$info['brand']=$this->brandmodel->viewAllBrands();
		
		if (!$this->categorymodel->checkExistingCategory($info))
		{
			$user_info = $this->categorymodel->addCategory($info);
			if ($user_info)
				{
					$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> Success</div>';
					$this->parser->parse('view_category', $info);
				}
			else
				{
					$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> Failed</div>';
					$this->parser->parse('view_category', $info);
				}
		}
		else
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> User Already Exists</div>';
			$this->parser->parse('view_category', $info);
		}
		

		
	}
		else
		{
			redirect(base_url(), 'refresh');
		}
		
	}
	
	
	
	public function viewCategories()
	
	{	
		if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
		{
			$data = array('message' => '' ,'base_url'=>base_url() , 'categories' => $this->categorymodel->viewAllCategories(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
			$this->parser->parse('view_category_list', $data);
		}
		
		else
		{
			redirect(base_url(), 'refresh');
		}
	}
	
	public function editCategory($id)
	{	
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
				$info['cat_id'] = $id; 
		$category = $this->categorymodel->viewCategoryById($info);
		$data = array('message' => '' ,'base_url'=>base_url(), 'cat_name'=>$category['cat_name'],'description' =>$category['description'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		
		if(!$this->input->get_post('buttonUpdate'))
		{
			$this->parser->parse('view_category_edit', $data);
			
			return;
		}
		$info['cat_name'] = $this->input->post('cat_name');
		$info['description'] = $this->input->post('description');
		$info['base_url'] = base_url();
		$info['categorie']=$this->categorymodel->viewAllCategories();
		$info['brand']=$this->brandmodel->viewAllBrands();
		
		$user_info = $this->categorymodel->updateCategory($info);
		if ($user_info)
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>update</strong> Success</div>';
			redirect(base_url().'category/viewCategories', 'refresh');
		}
		else
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>update</strong> Failed</div>';
			$this->parser->parse('view_category_edit', $info);
		}
		
			}
		else
		{
			redirect(base_url(), 'refresh');
		}	
	}
	
}