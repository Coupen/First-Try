<?php
	class Category extends CI_Controller {
		/*public function index($param="")
		{
			
			if($param=="")
			{
				$page_data['resultset1']=$this->db->get('tbl_category');
				$this->load->view('category_view.php',$page_data);	
			}
			else
			{
				$page_data['resultset1']=$this->db->get('tbl_category');
				$page_data['act']=$param;
				$this->load->view('category_view.php',$page_data);	
			}
		}*/
		public function index()
		{
			$page_data['resultset1']=$this->db->get('tbl_category');
				$this->load->view('category_view.php',$page_data);	

		}
		public function category_crud()
		{
			echo "hello";
		}
	}
?>