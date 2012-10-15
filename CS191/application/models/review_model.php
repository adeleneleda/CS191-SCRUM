<?
class Review_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function add_review($review) {
		return $this->db->insert('reviews', $review);
	}
}