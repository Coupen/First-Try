<?php
	class home extends CI_Controller{
		public function index()
		{
			$this->view();
		}
			public function view()
			{
				$page_data['page_name']='temp_cont';
				$this->load->view('admin/home_view',$page_data);
			}
		
	}
?>