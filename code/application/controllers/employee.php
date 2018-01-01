<?php
class employee extends CI_Controller
{
	public function index()
	{
		$page_data['resultset'] = $this->db->get("emp");
		$this->load->view("employee_view",$page_data);
	}
	public function manage_emp($pera1 = "",$pera2 = "",$pera3 = "")
	{
		if($pera1=="add")
		{
			$data['emp_name'] = $this->input->post('txt_ename');
			$data['emp_salary'] = $this->input->post('txt_sal');
			$data['emp_dsgn'] = $this->input->post('txt_desg');
			$this->db->insert('emp',$data);
			redirect(base_url(),'employee');
		}
		elseif ($pera1=="del") 
		{
			$this->db->where('emp_id',$pera2);
			$this->db->delete('emp');
			redirect(base_url().'employee');
		}
		elseif ($pera1=="edit")
		{
			if($pera2=="do_edit")
			{
				$update_data['emp_name'] = $this->input->post("txt_ename");
				$update_data['emp_salary'] = $this->input->post("txt_sal");
				$update_data['emp_dsgn'] = $this->input->post("txt_desg");
				$this->db->where('emp_id',$pera3);
				$this->db->update('emp',$update_data);
				redirect(base_url(),'employee');
			}
			$page_data['resultset']= $this->db->get_where('emp',array('emp_id'=>$pera2));
			$this->load->view('emp_edit_view',$page_data);
		}
	}
}
?>