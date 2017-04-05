<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class brand extends CI_Controller {

	public function addBrand()
	{	
		if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
		{
			$data = array('message' => '' ,'base_url'=>base_url(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());

		if(!$this->input->get_post('buttonAdd'))
		{
			$this->parser->parse('view_brand', $data);
			return;
		}
		$info['brand_name'] = $this->input->post('brand_name');
		$info['description'] = $this->input->post('description');
		$info['base_url'] = base_url();
		$info['categorie']=$this->categorymodel->viewAllCategories();
		$info['brand']=$this->brandmodel->viewAllBrands();
		
		
		if (!$this->brandmodel->checkExistingBrand($info))
		{
			$user_info = $this->brandmodel->addBrand($info);
			if ($user_info)
				{
					$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> Success</div>';
					$this->parser->parse('view_brand', $info);
				}
			else
				{
					$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> Failed</div>';
					$this->parser->parse('view_brand', $info);
				}
		}
		else
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> User Already Exists</div>';
			$this->parser->parse('view_brand', $info);
		}
		

		}
		else
		{
			redirect(base_url(), 'refresh');
		}
		
		
		
	}
	
	
	public function viewBrand()
	{	
		if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
		{
				$data = array('message' => '' ,'base_url'=>base_url() , 'brands' => $this->brandmodel->viewAllBrands(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		

		$this->parser->parse('view_brand_list', $data);
		}
		else
		{
			redirect(base_url(), 'refresh');
		}
	}

	public function editBrand($id)
	{	
		if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
		{
			$info['brand_id'] = $id; 
		$brands = $this->brandmodel->viewBrandById($info);
		$data = array('message' => '' ,'base_url'=>base_url(), 'brand_name'=>$brands['brand_name'],'description' =>$brands['description'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		$data2 = array('message' => '' ,'base_url'=>base_url() , 'brands' => $this->brandmodel->viewAllBrands());
		if(!$this->input->get_post('buttonUpdate'))
		{
			$this->parser->parse('view_brand_edit', $data);
			
			return;
		}
		$info['brand_name'] = $this->input->post('brand_name');
		$info['description'] = $this->input->post('description');
		$info['base_url'] = base_url();
		$info['categorie']=$this->categorymodel->viewAllCategories();
		$info['brand']=$this->brandmodel->viewAllBrands();
		
		
		$user_info = $this->brandmodel->updateBrand($info);
		if ($user_info)
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>update</strong> Success</div>';
			redirect(base_url().'brand/viewBrand', 'refresh');
		}
		else
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>update</strong> Failed</div>';
			$this->parser->parse('view_brand_edit', $info);
		}
		
		}
		else
		{
			redirect(base_url(), 'refresh');
		}

			
	}

}