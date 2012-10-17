<?
class Review_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	public function get_proposal_details($proposalid){
		$results = $this->db->query('SELECT title, lastname, middlename, firstname FROM proposals JOIN proposes USING(proposal_id) 
									JOIN proponent USING(proponent_id)
									WHERE proposal_id ='.$proposalid.';');
		$results = $results->result_array();
		return $results[0];
	}
	
	public function add_review($review) {
		return $this->db->insert('reviews', $review);
	}
	#todo: triggers, check if the reviewer is the proponent, pdf viewer, vote count?, abstain 
}