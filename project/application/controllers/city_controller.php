<?php
	class city_controller extends CI_Controller{

		public function index()
		{
			$this->view();
		}
		public function view($param,$param1)
		{
				$this->db->select('tbl_city.*');
				$this->db->from('tbl_city');
				$this->db->where('state_id',$param);		
				//$this->db->join('tbl_country', 'tbl_state.country_id = tbl_country.country_id');
			    //$this->db->limit(10,10);
				$page_data['resultset'] = $this->db->get();
				$page_data['resultset2']=$this->db->get_where('tbl_state',array('country_id'=>$param1));
				$page_data['resultset3']=$this->db->get_where('tbl_state',array('state_id'=>$param));
				$page_data['page_name']='city_view';
				$page_data['title']='City View';
				$page_data['st_id']=$param;
				$page_data['con_id']=$param1;
				$this->load->view('admin/home_view',$page_data);			
		}
		public function city_crud($param1,$param2="",$param3="",$param4="")
		{
			if($param1=="do_insert")
			{
				$data['city_name']=$this->input->post('txt_name');
				$data['state_id']=$param2;
				//echo $param2;
				//echo $this->input->post('txt_name');
				$this->db->insert('tbl_city',$data);
				redirect(base_url().'city_controller/view/'.$param2.'/'.$param3);
			}
			else if($param1=="do_delete")
			{
				$this->db->where('city_id',$param2);
			 $this->db->delete('tbl_city');
			 redirect(base_url().'city_controller/view/'.$param3.'/'.$param4);
			}
			else
			{
				if($param1=="do_update")
				{
					$data['city_name']=$this->input->post('txt_name');
						$data['state_id']=$this->input->post('cmb_state');
					$this->db->where('city_id',$param2);
					$this->db->update('tbl_city',$data);
					redirect(base_url().'city_controller/view/'.$param3.'/'.$param4);	
				}
				else
				{
					$page_data['resultset1']=$this->db->get_where('tbl_city',array('city_id'=>$param1));
					/*$page_data['resultset3']=$this->db->get_where('tbl_state',array('state_id'=>$param2));		
					$this->db->select('tbl_city.*,state_name,country_name');
					$this->db->from('tbl_city');
					$this->db->join('tbl_state','tbl_city.state_id = tbl_state.state_id');		
					$this->db->join('tbl_country', 'tbl_state.country_id = tbl_country.country_id');
			    	$this->db->limit(10,10);
					$page_data['resultset'] = $this->db->get();
					$page_data['resultset2']=$this->db->get('tbl_country');
					$page_data['page_name']='city_view';*/
					$this->db->select('tbl_city.*');
					$this->db->from('tbl_city');
					$this->db->where('state_id',$param2);		
				    $this->db->limit(10,10);
					$page_data['resultset'] = $this->db->get();
					$page_data['resultset2']=$this->db->get_where('tbl_state',array('country_id'=>$param3));
					$page_data['resultset3']=$this->db->get_where('tbl_state',array('state_id'=>$param2));
					$page_data['title']='City View';
					$page_data['page_name']='city_view';
					$page_data['st_id']=$param2;
					$page_data['con_id']=$param3;
					$this->load->view('admin/home_view.php',$page_data);		
				}
			}
		}
		/*public function abc($id="")
		{
			echo $id;
		}
		public function cmb_state($param)
		{
			//echo "hello";
			$page_data['resultset']=$this->db->get_where('tbl_state',array('country_id'=>$param));		
			$this->load->view('admin/cmb_state.php',$page_data);
		}*/
	}
?>