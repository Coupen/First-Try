
<?php
class State extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function record_count() {
        return $this->db->count_all("tbl_state");
    }

    public function fetch_countries($limit, $start) {
        $this->db->select('tbl_state.state_id,tbl_state.state_name,tbl_country.country_name');
        $this->db->from('tbl_state');
        $this->db->join('tbl_country','tbl_country.country_id=tbl_state.country_id');
        $this->db->group_by('state_id');
        $this->db->limit($limit, $start);
        $query = $this->db->get('');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}
?>