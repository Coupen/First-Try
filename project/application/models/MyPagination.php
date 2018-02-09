<?php
class MyPagination extends CI_Model
{
	public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        //$this->load->model("country_model");
        //$this->load->model("MyPagination");
        $this->load->library("pagination");
    }

    public function record_count() {
        return $this->db->count_all("tbl_country");
    }

    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("tbl_country");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function MyPaginationFunction() {
        $config = array();
        $config["base_url"] = base_url() . "country_controller/view";
        $config["total_rows"] = $this->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 9;
        $config['full_tag_open'] = '<div><ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '<p class="text-success">First</p>';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '<p class="text-success">Last</p>';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '<p class="text-success">Next</p>';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<p class="text-success">Previous</p>';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="" class="bg-success text-white">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $results_model = $this->fetch_countries($config["per_page"], $page);
        $links_model = $this->pagination->create_links();
        return array($results_model,$links_model);
    }
}

?>
