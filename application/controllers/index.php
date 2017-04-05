<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {
	
	public function home()
	{	
		$data = array('message' => '' ,'base_url'=>base_url() ,'products' => $this->productmodel->viewAllProducts(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		if ($this->session->userdata("type")=="Admin")
		{
			$this->parser->parse('view_home_admin', $data);
		}
		else if($this->session->userdata("type")=="Manager")
		{
			$this->parser->parse('view_home_manager', $data);
		}
		else if ($this->session->userdata("type")=="Consummer")
		{
			$this->parser->parse('view_home_user', $data);
		}
		
		else
		$this->parser->parse('view_home', $data);

		
		
	}
	
		public function searchByCategory($id)
	{	
		$info = array('cat_id'=>$id);
		$data = array('message' => '' ,'base_url'=>base_url() ,'products' => $this->productmodel->viewProductByCategory($info),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		if ($this->session->userdata("type")=="Admin")
		{
			$this->parser->parse('view_home_admin', $data);
		}
		else if ($this->session->userdata("type")=="Consummer")

		$this->parser->parse('view_home_user', $data);
		else
		$this->parser->parse('view_home', $data);

		
		
	}
	
	
	public function searchByBrand($id)
	{	
		$info = array('brand_id'=>$id);
		$data = array('message' => '' ,'base_url'=>base_url() ,'products' => $this->productmodel->viewProductByBrand($info),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		if ($this->session->userdata("type")=="Admin")
		{
			$this->parser->parse('view_home_admin', $data);
		}
		else if ($this->session->userdata("type")=="Consummer")

		$this->parser->parse('view_home_user', $data);
		else
		$this->parser->parse('view_home', $data);

		
		
	}
	
	
	public function viewProductDetails($id)
	{
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
				$info = array('product_id'=> $id);
		$product = $this->productmodel->viewProductById($info);
		$data = array('message' => '' ,'base_url'=>base_url(), 'product_id'=>$id,'product_name'=>$product['product_name'],  'buy_price' =>$product[			'buy_price'],'sell_price'=>$product['sell_price'],'quantity'=>$product['quantity'],'brands'=>$this->productmodel->getBrands(),'suppliers'=>$this->productmodel->getSuppliers(),'categories'=>$this->productmodel->getCatagories(),'image_location'=>$product['image_location'],'description' => $product['description'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
	
		$this->parser->parse('view_product_details', $data);
			}
		else
		{
			redirect(base_url(), 'refresh');
		}	
	}
	
	public function viewProductDetailsUser($id)
	{
			if ($this->session->userdata("username"))
			{
				$info = array('product_id'=> $id);
		$product = $this->productmodel->viewProductById($info);
		$data = array('message' => '' ,'base_url'=>base_url(), 'product_id'=>$id,'product_name'=>$product['product_name'],  'buy_price' =>$product[			'buy_price'],'sell_price'=>$product['sell_price'],'quantity'=>$product['quantity'],'brands'=>$this->productmodel->getBrands(),'suppliers'=>$this->productmodel->getSuppliers(),'categories'=>$this->productmodel->getCatagories(),'image_location'=>$product['image_location'],'description' => $product['description'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
	
		$this->parser->parse('view_product_details_user', $data);
			}
		else
		{
			redirect(base_url(), 'refresh');
		}	
	}
	
	public function viewReportSalePerMonth()
	{
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
				$info2 = array ('orderer_id'=>$this->session->userdata('user_id'));
				
				$total=$this->productordermodel->totalSum($info2);
		
				$data = array('message' => '' ,'base_url'=>base_url(),'orders' => $this->productordermodel->viewOrderList($info2),		'orderer_id'=>$info2['orderer_id'],'totalSum'=>$total['totalSum'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
				$this->session->set_userdata($total);
				//print_r($data);
		
		
				$this->parser->parse("view_report",$data);
			}
		else
		{
				redirect(base_url(), 'refresh');
		}
	}
	
	public function viewReportTopProducts()
	{
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
				$info2 = array ('orderer_id'=>$this->session->userdata('user_id'));
				
				$total=$this->productordermodel->totalSum($info2);
		
				$data = array('message' => '' ,'base_url'=>base_url(),'orders' => $this->productordermodel->viewOrderList($info2),		'orderer_id'=>$info2['orderer_id'],'totalSum'=>$total['totalSum'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
				$this->session->set_userdata($total);
				//print_r($data);
		
		
				$this->parser->parse("view_report1",$data);
			}
		else
		{
				redirect(base_url(), 'refresh');
		}
	}
	
	public function viewReportviewReportTopBrands()
	{
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
				$info2 = array ('orderer_id'=>$this->session->userdata('user_id'));
				
				$total=$this->productordermodel->totalSum($info2);
		
				$data = array('message' => '' ,'base_url'=>base_url(),'orders' => $this->productordermodel->viewOrderList($info2),		'orderer_id'=>$info2['orderer_id'],'totalSum'=>$total['totalSum'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
				$this->session->set_userdata($total);
				//print_r($data);
		
		
				$this->parser->parse("view_report2",$data);
			}
		else
		{
				redirect(base_url(), 'refresh');
		}
	}
	
	public function viewReportTopServicesProducts()
	{
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
				$info2 = array ('orderer_id'=>$this->session->userdata('user_id'));
				
				$total=$this->productordermodel->totalSum($info2);
		
				$data = array('message' => '' ,'base_url'=>base_url(),'orders' => $this->productordermodel->viewOrderList($info2),		'orderer_id'=>$info2['orderer_id'],'totalSum'=>$total['totalSum'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
				$this->session->set_userdata($total);
				//print_r($data);
		
		
				$this->parser->parse("view_report3",$data);
			}
		else
		{
				redirect(base_url(), 'refresh');
		}
	}
	
	public function viewReportTopServicesBrands()
	{
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
				$info2 = array ('orderer_id'=>$this->session->userdata('user_id'));
				
				$total=$this->productordermodel->totalSum($info2);
		
				$data = array('message' => '' ,'base_url'=>base_url(),'orders' => $this->productordermodel->viewOrderList($info2),		'orderer_id'=>$info2['orderer_id'],'totalSum'=>$total['totalSum'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
				$this->session->set_userdata($total);
				//print_r($data);
		
		
				$this->parser->parse("view_report4",$data);
			}
		else
		{
				redirect(base_url(), 'refresh');
		}
	}
	
	public function viewReport5()
	{
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
				$info2 = array ('orderer_id'=>$this->session->userdata('user_id'));
				
				$total=$this->productordermodel->totalSum($info2);
		
				$data = array('message' => '' ,'base_url'=>base_url(),'orders' => $this->productordermodel->viewOrderList($info2),		'orderer_id'=>$info2['orderer_id'],'totalSum'=>$total['totalSum'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
				$this->session->set_userdata($total);
				//print_r($data);
		
		
				$this->parser->parse("view_report5",$data);
			}
		else
		{
				redirect(base_url(), 'refresh');
		}
	}
	
	
	
	public function addCart($id)
	{
			if ($this->session->userdata("username"))
			{
				$info = array('product_id'=> $id);
		$product = $this->productmodel->viewProductById($info);
		$data = array('message' => '' ,'base_url'=>base_url(), 'product_id'=>$id,'product_name'=>$product['product_name'],  'buy_price' =>$product['buy_price'],'sell_price'=>$product['sell_price'],'quantity'=>$product['quantity'],'brands'=>$this->productmodel->getBrands(),'suppliers'=>$this->productmodel->getSuppliers(),'categories'=>$this->productmodel->getCatagories(),'image_location'=>$product['image_location'],'description' => $product['description'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		$info2 = array ('orderer_id'=>$this->session->userdata('user_id'),'product_id'=>$product['product_id'],'order_price'=>$product['sell_price']);
		$this->productordermodel->addOrder($info2);			
		redirect(base_url().'index/home', 'refresh');
			}
			else
		{
			redirect(base_url(), 'refresh');
		}
	}
	
	
	public function addOrder()
	{
			if ($this->session->userdata("username"))
			{
				$info2 = array ('orderer_id'=>$this->session->userdata('user_id'));
				
				$total=$this->productordermodel->totalSum($info2);
		
				$data = array('message' => '' ,'base_url'=>base_url(),'orders' => $this->productordermodel->viewOrderList($info2),		'orderer_id'=>$info2['orderer_id'],'totalSum'=>$total['totalSum'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
				$this->session->set_userdata($total);
				//print_r($data);
		
		
				$this->parser->parse("view_order_list",$data);
			}
		else
		{
				redirect(base_url(), 'refresh');
		}
	}
	
	public function cartlist_admin()
	{
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
				$info2 = array ('orderer_id'=>$this->session->userdata('user_id'));
				
				$total=$this->productordermodel->totalSum($info2);
		
				$data = array('message' => '' ,'base_url'=>base_url(),'orders' => $this->productordermodel->viewOrderList($info2),		'orderer_id'=>$info2['orderer_id'],'totalSum'=>$total['totalSum'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
				$this->session->set_userdata($total);
				//print_r($data);
		
		
				$this->parser->parse("view_cart_list_admin",$data);
			}
		else
		{
				redirect(base_url(), 'refresh');
		}
	}
		
	public function removeOrder($id)
	{
			if ($this->session->userdata("type")=="Consummer")
			{
				$info2 = array ('order_id'=>$id);
		$this->productordermodel->removeOrder($info2);
		$data = array('message' => '' ,'base_url'=>base_url(),'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		
		redirect(base_url().'index/addOrder', 'refresh');
			}
			
			else if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
				$info2 = array ('order_id'=>$id);
		$this->productordermodel->removeOrder($info2);
		$data = array('message' => '' ,'base_url'=>base_url());
		
		redirect(base_url().'index/cartlist_admin', 'refresh');
			}
		
		else
		{
			redirect(base_url(), 'refresh');
		}
	}
	public function confirmOrder($id)
	{
			if ($this->session->userdata("username"))
			{
				$info2 = array ('orderer_id'=>$id);
		$this->productordermodel->confirmOrder($info2);
		redirect(base_url().'index/home', 'refresh');
			}
		else
		{
			redirect(base_url(), 'refresh');
		}
	}
	public function adminOrderList()
	{
		
			if ($this->session->userdata("type")=="Admin" || $this->session->userdata("type")=="Manager")
			{
				$total=$this->productordermodel->totalSumAdmin();
		$data = array('message' => '' ,'base_url'=>base_url(),'orders' => $this->productordermodel->viewAllOrderList(),'totalSum'=>$total['totalSum'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		
		$this->parser->parse("view_order_list_admin",$data);
			}
		
		else
		{
			redirect(base_url(), 'refresh');
		}	
	}
	public function soldOrder($id)
	{
			if ($this->session->userdata("username"))
			{
				$info2 = array ('orderer_id'=>$id);
		$this->productordermodel->soldOrder($info2);
		$total=$this->productordermodel->totalSumAdmin();
		$data = array('message' => '' ,'base_url'=>base_url(),'orders' => $this->productordermodel->viewAllOrderList(),'totalSum'=>$total['totalSum'],'categorie'=>$this->categorymodel->viewAllCategories(),'brand'=>$this->brandmodel->viewAllBrands());
		
		$this->parser->parse("view_order_list_admin",$data);
			}
		else
		{
			redirect(base_url(), 'refresh');
		}
	}
}



	
	
	
	



