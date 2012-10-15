<?
class Review_Download_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function get_reviews() {
		$results = $this->db->query('SELECT filename, review_id, verdict, comment, proposal_id, user_id FROM reviews;');
		
		if($results->num_rows() > 0)
		{
			$temp = $results->result_array();
			return $temp;
		}
		return false;
	}
	
	function download_file($reviewid) {
		$results = $this->db->query('SELECT filename, filesize, filetype, file FROM reviews where review_id='.$reviewid.';');
		
		if($results->num_rows() > 0)
		{
			$temp = $results->result_array();
			return $temp[0];
		}
		return false;
	}
}
?>