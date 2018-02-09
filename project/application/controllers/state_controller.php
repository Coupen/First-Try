<?php
	class state_controller extends CI_Controller{

		public function index()
		{
			$this->view();
		}
		public function view($param)
		{
				$this->db->select('tbl_state.*');
				$this->db->from('tbl_state');		
				$this->db->where('country_id',$param);
			  	//$this->db->limit(10,10);
				$page_data['resultset'] = $this->db->get();
				$page_data['resultset2']=$this->db->get('tbl_country');
				$page_data['resultset3']=$this->db->get_where('tbl_country',array('country_id'=>$param));
				$page_data['page_name']='state_view';
				$page_data['title']='State View';
				$page_data['con_id']=$param;
				$this->load->view('admin/home_view',$page_data);			
		}
		public function state_crud($param1,$param2="",$param3="")
		{
			if($param1=="do_insert")
			{
				$data['state_name']=$this->input->post('txt_name');
				$data['country_id']=$param2;
				//$data['country_id']=$this->input->post('cmb_country');
				$this->db->insert('tbl_state',$data);
				redirect(base_url().'state_controller/view/'.$param2);
			}
			else if($param1=="do_delete")
			{
				$this->db->where('state_id',$param2);
			 $this->db->delete('tbl_state');
			 redirect(base_url().'state_controller/view/'.$param3);
			}
			else
			{
				if($param1=="do_update")
				{
					$data['state_name']=$this->input->post('txt_name');
					$data['country_id']=$this->input->post('cmb_country');
					$this->db->where('state_id',$param2);
					$this->db->update('tbl_state',$data);
					redirect(base_url().'state_controller/view/'.$param3);
				}
				else
				{
					$page_data['resultset1']=$this->db->get_where('tbl_state',array('state_id'=>$param1));
					$this->db->select('tbl_state.*');
					$this->db->from('tbl_state');		
					$this->db->where('country_id',$param2);
				  	//$this->db->limit(10,10);
					$page_data['resultset'] = $this->db->get();
					$page_data['resultset2']=$this->db->get('tbl_country');
					$page_data['resultset3']=$this->db->get_where('tbl_country',array('country_id'=>$param2));
					$page_data['page_name']='state_view';
					$page_data['con_id']=$param2;
					$page_data['title']='State View';
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