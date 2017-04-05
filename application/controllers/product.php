<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

	public function addProduct()
	{

		if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
		{
			$brands=$this->productmodel->getBrands();
		$suppliers=$this->productmodel->getSuppliers();
		$categories=$this->productmodel->getCatagories();
		$data = array('message' => '', 'base_url'=>base_url(),'brands' =>$brands ,'suppliers'=>$suppliers,'categories'=>$categories,'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		if(!$this->input->get_post('buttonAdd'))
		{	
			$this->parser->parse('view_product', $data);
			return;
		}
		$info['product_name'] = $this->input->post('product_name');
		$info['buy_price'] = $this->input->post('buy_price');
		$info['sell_price'] = $this->input->post('sell_price');
		$info['quantity'] = $this->input->post('quantity');
		$info['brand_id'] = $this->input->post('brand_id');
		$info['supplier_id'] = $this->input->post('supplier_id');
		$info['cat_id'] = $this->input->post('cat_id');
		$info ['image_location'] = $this->input->post('image_location');
        $info ['description'] = $this->input->post('description');
		$info['base_url'] = base_url();
		$info['categorie']=$this->categorymodel->viewAllCategories();
		$info['brand']=$this->brandmodel->viewAllBrands();
		

		//print_r($info);
		//return;
		if (!$this->productmodel->checkExistingProduct($info))
		{
			$product_info = $this->productmodel->addProduct($info);
			if ($product_info)
			{
				$data['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> Success</div>';
				$this->parser->parse('view_product', $data);
			}
		}
		else
		{
			$data['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Oops!</strong> User Already Exists</div>';
			$this->parser->parse('view_product', $data);
		}
				
		
		}
		
		else
		{
			redirect(base_url(), 'refresh');
		}

	}
	
	public function viewProducts()
	
	{	
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
					$data = array('message' => '' ,'base_url'=>base_url() , 'products' => $this->productmodel->viewAllProducts(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		

		$this->parser->parse('view_products_list', $data);

			}
			else
		{
			redirect(base_url(), 'refresh');
		}
		}
	
	public function editProduct($id)
	{	
	
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
					$info['product_id'] = $id; 
		$product = $this->productmodel->viewProductById($info);
		$data = array('message' => '' ,'base_url'=>base_url(), 'product_name'=>$product['product_name'],'buy_price' =>$product['buy_price'],'sell_price'=>$product['sell_price'],'quantity'=>$product['quantity'],'brands'=>$this->productmodel->getBrands(),'suppliers'=>$this->productmodel->getSuppliers(),'categories'=>$this->productmodel->getCatagories(),'image_location'=>$product['image_location'],'description' => $product['description'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		
		if(!$this->input->get_post('buttonUpdate'))
		{
			$this->parser->parse('view_product_edit', $data);
			
			return;
		}
		$info['product_name'] = $this->input->post('product_name');
		$info['buy_price'] = $this->input->post('buy_price');
		$info['sell_price'] = $this->input->post('sell_price');
		$info['quantity'] = $this->input->post('quantity');
		$info['brand_id'] = $this->input->post('brand_id');
		$info['supplier_id'] = $this->input->post('supplier_id');
		$info['cat_id'] = $this->input->post('cat_id');
		$info['image_location'] = $this->input->post('image_location');
        $info['description'] = $this->input->post('description');
		
		$info['base_url'] = base_url();
		$info['categorie']=$this->categorymodel->viewAllCategories();
		$info['brand']=$this->brandmodel->viewAllBrands();
		
		$user_info = $this->productmodel->updateProduct($info);
		if ($user_info)
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>update</strong> Success</div>';
			redirect(base_url().'product/viewProducts', 'refresh');
		}
		else
		{
			$info['message'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>update</strong> Failed</div>';
			$this->parser->parse('view_product_edit', $info);
		}
	
			}
				else
		{
			redirect(base_url(), 'refresh');
		}	
	}
}