<?php
class country extends CI_Controller
{
	public function index()
	{
		$page_data['resultset']=$this->db->get("tbl_country");

		$this->load->view('country_view',$page_data);
	}
	public function save_country()
	{
		$data['country_name']=$this->input->post('txt_name');
		$data['country_code']=$this->input->post('txt_code');
		$this->db->insert('tbl_country',$data);
		redirect(base_url().'country');
	}
	public function edit_country($country_id,$cid="")
	{
		if($country_id=="do_update")
		{
			$update_data['country_name']=$this->input->post('txt_name');
			$update_data['country_code']=$this->input->post('txt_code');

			$this->db->where('country_id',$cid);
			$this->db->update('tbl_country',$update_data);
			redirect(base_url().'country');
		}
		$page_data['resultset'] = $this->db->get_where('tbl_country',array("country_id"=>$country_id));
		$this->load->view('country_edit_view',$page_data);
	}
	public function delete_country($country_id)
	{
		$this->db->where('country_id',$country_id);
		$this->db->delete('tbl_country');
		redirect(base_url().'country');
	}
}
?>