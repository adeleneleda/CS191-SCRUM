<?
class Userhome_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function get_own_proposals($status) {
	
		$id = 'SELECT proponent_id FROM users join proponent using (user_id) WHERE username="' . $this->session->userdata('userdata')['login'].'" AND password="'.substr(md5($this->session->userdata('userdata')['password']),0,20).'";';
		$results = $this->db->query($id);
		$results = $results->result_array();
		$id = $results[0]['proponent_id'];
	
		$results = $this->db->query('SELECT proposal_id, title, date(status_date) as status_date FROM proposals JOIN proposes USING (proposal_id) WHERE proponent_id = '.$id.' and status = "'.$status.'";');
		$results = $results->result_array();
		return $results;
	}
	
	function get_prop_id() {
	
		$id = 'SELECT proponent_id FROM users join proponent using (user_id) WHERE username="' . $this->session->userdata('userdata')['login'].'" AND password="'.substr(md5($this->session->userdata('userdata')['password']),0,20).'";';
		$results = $this->db->query($id);
		$results = $results->result_array();
		return $results;
	
	}

	
	function get_abstract($proposal_id) {
		$results = $this->db->query('SELECT abstract FROM proposals WHERE proposal_id = '.$proposal_id.';');
		$results = $results->result_array();
		return $results;
	}
	
	function get_info($proposal_id) {
	$query_long = "SELECT title, abstract, date(status_date) as status_date from proposals where proposal_id = ".$proposal_id.";";
	$results = $this->db->query($query_long);
	$results = $results->result_array();
	return $results;	
	
	
	}
	
	
	function get_authors($proposal_id) {
		$results = $this->db->query('SELECT proposal_id, lastname, firstname, middlename FROM proponent JOIN proposes USING (proponent_id) WHERE proposal_id  = '.$proposal_id.';');
		$results = $results->result_array();
		return $results;
	
	}
	
	
	function download_file($proposal_id) {
		$results = $this->db->query('SELECT filename, filesize, filetype, proposal as file FROM proposals where proposal_id='.$proposal_id.';');
		
		if($results->num_rows() > 0)
		{
			$temp = $results->result_array();
			return $temp[0];
		}
		return false;
	}
	
	
	
	
}