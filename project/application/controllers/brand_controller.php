<?php
	class brand_controller extends CI_Controller{

		public function index()
		{
			$this->view();
		}
		public function view()
		{
				$page_data['title']='Brand';
				$page_data['resultset']=$this->db->get('tbl_brand');
				$page_data['page_name']='brand_view';
				$this->load->view('admin/home_view',$page_data);			
		}
		public function brand_crud($param1,$param2="")
		{
			if($param1=="do_insert")
			{
				$data['brand_name']=$this->input->post('txt_name');
				//$data['brand_logo']=$this->input->files('file_logo');
				/*$data=$_FILESfile_logo;
				echo "<pre>";
				print_r($param2);
				echo "</pre>";*/	
				$data['brand_logo']=$param2;
				$data['brand_website']=$this->input->post('txt_web');
				$data['brand_contact_person']=$this->input->post('txt_cont_per');
				$data['brand_email']=$this->input->post('txt_email');
			$this->db->insert('tbl_brand',$data);
			redirect('brand_controller');
			}
			else if($param1=="do_delete")
			{
				$this->db->where('brand_id',$param2);
			 $this->db->delete('tbl_brand');
			 redirect('brand_controller');
			}
			else
			{
				if($param1=="do_update")
				{
					$data['brand_name']=$this->input->post('txt_name');
					$data['brand_logo']=$this->input->post('file_logo');
					$data['brand_website']=$this->input->post('txt_web');
					$data['brand_contact_person']=$this->input->post('txt_cont_per');
					$data['brand_email']=$this->input->post('txt_email');
					$this->db->where('brand_id',$param2);
					$this->db->update('tbl_brand',$data);
					redirect(base_url().'brand_controller');
				}
				else
				{
					$page_data['title']='Brand';
					$page_data['resultset1']=$this->db->get_where('tbl_brand',array('brand_id'=>$param1));
					$page_data['resultset']=$this->db->get('tbl_brand');
					$page_data['page_name']='brand_view';
					$this->load->view('admin/home_view.php',$page_data);		
				}
			}
		}
		public function abc($id="")
		{
			echo $id;
		}
	}
?>