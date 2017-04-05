<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class supplier extends CI_Controller {

	public function addSupplier()
	{	if($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
		{
			$data = array('message' => '' ,'base_url'=>base_url(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());

		if(!$this->input->get_post('buttonAdd'))
		{
			$this->parser->parse('view_supplier', $data);
			return;
		}
		$info['supplier_name'] = $this->input->post('supplier_name');
		$info['supplier_phone'] = $this->input->post('supplier_phone');
		$info['supplier_email'] = $this->input->post('supplier_email');
		$info['supplier_address'] = $this->input->post('supplier_address');
		$info['security_deposit'] = $this->input->post('security_deposit');
		$info['base_url'] = base_url();
		$info['categorie']=$this->categorymodel->viewAllCategories();
		$info['brand']=$this->brandmodel->viewAllBrands();
		
		if (!$this->suppliermodel->checkExistingSupplier($info))
		{
			$user_info = $this->suppliermodel->addSupplier($info);
			if ($user_info)
				{
					$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> Success</div>';
					$this->parser->parse('view_supplier', $info);
				}
			else
				{
					$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> Failed</div>';
					$this->parser->parse('view_supplier', $info);
				}
		}
		else
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> User Already Exists</div>';
			$this->parser->parse('view_supplier', $info);
		}
			
		}
		
		
		

		else{
			redirect(base_url(),'refresh');
		}
		
		
	}
	
	
	
	public function viewSuppliers()
	{
		if($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
		{
			$data = array('message' => '' ,'base_url'=>base_url() , 'suppliers' => $this->suppliermodel->viewAllSuppliers(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
			$this->parser->parse('view_suppliers_list', $data);
		}		
		else{
			redirect(base_url(),'refresh');
		}
		
		
	}
	
	public function editSupplier($id)
	{
		if($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
		{
			$info['supplier_id'] = $id; 
		$supplier = $this->suppliermodel->viewSupplierById($info);
		$data = array('message' => '' ,'base_url'=>base_url(), 'supplier_name'=>$supplier['supplier_name'],'supplier_phone' =>$supplier['supplier_phone'],'supplier_email'=>$supplier['supplier_email'],'supplier_address'=>$supplier['supplier_address'],'security_deposit'=>$supplier['security_deposit'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		
		if(!$this->input->get_post('buttonUpdate'))
		{
			$this->parser->parse('view_supplier_edit', $data);
			
			return;
		}
		$info['supplier_name'] = $this->input->post('supplier_name');
		$info['supplier_phone'] = $this->input->post('supplier_phone');
		$info['supplier_email'] = $this->input->post('supplier_email');
		$info['supplier_address'] = $this->input->post('supplier_address');
		$info['security_deposit'] = $this->input->post('security_deposit');
		$info['base_url'] = base_url();
		$info['categorie']=$this->categorymodel->viewAllCategories();
		$info['brand']=$this->brandmodel->viewAllBrands();
		
		$user_info = $this->suppliermodel->updateSupplier($info);
		if ($user_info)
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>update</strong> Success</div>';
			redirect(base_url().'supplier/viewSuppliers', 'refresh');
		}
		else
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>update</strong> Failed</div>';
			$this->parser->parse('view_supplier_edit', $info);
		}
		
			
		}
		else{
			redirect(base_url(),'refresh');
		}
		
	
			
	}
}