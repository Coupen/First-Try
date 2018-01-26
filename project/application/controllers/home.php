<?php
	class home extends CI_Controller{
		public function index()
		{
			$this->view();
		}
		public function view($param1="tbl_country")
		{
			if($param1!="")
			{
				$page_data['resultset']=$this->db->get($param1);
				$page_data['fields']=$this->db->list_fields($param1);
				$this->load->view('admin/home_view',$page_data);	
			}
			$this->load->view('admin/home_view');
		}
		public function country_crud($param1,$param2="")
		{
			if($param1=="do_insert")
			{
				$data['country_name']=$this->input->post('txt_cname');
			$this->db->insert('tbl_country',$data);
			redirect('Country');
			}
			else if($param1=="do_delete")
			{
				$this->db->where('country_id',$param2);
			 $this->db->delete('tbl_country');
			 redirect('Country');
			}
			else
			{
				if($param1=="do_update")
				{
				//echo "abc";
					$update_data['country_name']=$this->input->post('txt_cname');
					$this->db->where('country_id',$param2);
					$this->db->update('tbl_country',$update_data);
					redirect(base_url().'Country');
				}
				else
				{
					$page_data['resultset2']=$this->db->get_where('tbl_country',array('country_id'=>$param1));
					$this->load->view('country_view1.php',$page_data);		
				}
			}
		}
	}
?>