<?php
//session_start();
	class country_controller extends CI_Controller{
		//public static $t1=1;
		//public static $t2=10;
		public function __construct()
		{
			parent:: __construct();
        $this->load->helper("url");
        //$this->load->model("country_model");
        $this->load->model("MyPagination");
        $this->load->library("pagination");
		}
		
    	
		public function index()
		{
			//session_unset();
			//session_destroy();
			$this->view();
					}
		public function view()
		{	
			//static $t1=1;
			//session_destroy();
 			//$starting_no=0;
			//$no_of_record=10;
			//$full_data=$this->db->query('select * from tbl_country');
	//		$config = array();
    //    	$config["base_url"] = base_url() . "country_controller/view";
    //    	$config["total_rows"] = $this->country_model->record_count();
        	//$config["total_rows"] = $full_data->num_rows();
    //    	$config["per_page"] = 10;
    //    	$config["uri_segment"] = 3;
        	//$choice = $config["total_rows"] / $config["per_page"];
    //		$config["num_links"] = 9;


    //    	$this->pagination->initialize($config);
			//$page_data['no_of_page']=ceil($total_record/$no_of_record);
	//		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			//echo $page;
    //    	$page_data["resultset"] = $this->country_model->fetch_countries($config["per_page"], $page);
    //    	$page_data["links"] = $this->pagination->create_links();

			/*if(!isset($_SESSION['t4']))
			{
				$_SESSION['t4']=10;
				$page_data['page_starting_no']=1;
				$page_data['page_ending_no']=10;
			}*/
			/*if(isset($_GET['page_no']))
			{
				$page_data['current_page']=$_GET["page_no"];	
				$starting_no=($page_data['current_page']-1)*$no_of_record;
				$page_data['next']=$page_data['current_page']+1;
				$page_data['pre']=$page_data['current_page']-1;
			
			if($page_data['current_page']==$_SESSION['t4'])//$page_data['page_ending_no'])
			{
				$page_data['page_starting_no']=$page_data['page_starting_no']+5;
			    $page_data['page_ending_no']=$page_data['page_ending_no']+5;
			   $_SESSION['t4']=$page_data['page_ending_no'];
			}
		}*/
			//$page_data['resultset']=$this->db->query('select * from tbl_country limit '.$starting_no.','.$no_of_record.'');
			$array_result=$this->MyPagination->MyPaginationFunction();
			$page_data['resultset']=$array_result[0];
			$page_data['links']=$array_result[1];
			$page_data['title']='Country View';
			$page_data['page_name']="country_view";
			/*if($param1!="")
			{
				$page_data['resultset']=$this->db->get($param1);
				$page_data['fields']=$this->db->list_fields($param1);
				$this->localeconv()ad->view('admin/home_view',$page_data);	
			}*/
			$this->load->view('admin/home_view',$page_data);
		}

		public function country_crud($param1,$param2="")
		{
			if($param1=="do_insert")
			{
				$data['country_name']=$this->input->post('txt_name');
				//$data['brand_logo']=$this->input->files('file_logo');
				/*$data=$_FILESfile_logo;
				echo "<pre>";
				print_r($param2);
				echo "</pre>";*/	
				//$data['brand_logo']=$param2;
				$data['country_code']=$this->input->post('txt_web');
				//$data['brand_contact_person']=$this->input->post('txt_cont_per');
				//$data['brand_email']=$this->input->post('txt_email');
			$this->db->insert('tbl_country',$data);
			redirect('country_controller');
			}
			else if($param1=="do_delete")
			{
				$this->db->where('country_id',$param2);
			 $this->db->delete('tbl_country');
			 redirect('country_controller');
			}
			else if($param1=="do_update")
			{
					$data['country_name']=$this->input->post('txt_name');
					$data['country_code']=$this->input->post('file_logo');
					//$data['brand_website']=$this->input->post('txt_web');
					//$data['brand_contact_person']=$this->input->post('txt_cont_per');
					//$data['brand_email']=$this->input->post('txt_email');
					$this->db->where('country_id',$param2);
					$this->db->update('tbl_country',$data);
					redirect(base_url().'country_controller');
			}
			else if($param1="do_edit")
			{
					$array_result=$this->MyPagination->MyPaginationFunction();
					$page_data['resultset']=$array_result[0];
					$page_data['links']=$array_result[1];
					$page_data['resultset1']=$this->db->get_where('tbl_country',array('country_id'=>$param2));
					$page_data['resultset']=$this->db->get('tbl_country');
					$page_data['page_name']='country_view';
					$page_data['title']='Country View';
					$this->load->view('admin/home_view.php',$page_data);		
			}
		
		}
	}
?>