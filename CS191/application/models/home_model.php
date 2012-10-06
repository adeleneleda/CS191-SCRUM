<?
class Home_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function check_userdata($userdata) {
		$results = $this->db->query('SELECT * FROM users WHERE username="'.$userdata['login'].'" AND password="'.substr(md5($userdata['password']),0,20).'";');
		
		if($results->num_rows() > 0)
		{
			return true;
		}
		return false;
	}
	
	function get_loginerror($userdata) {
		$results = $this->db->query('SELECT * FROM users WHERE username="'.$userdata['login'].'";');
		
		if($results->num_rows() > 0)
		{
			return "UP Webmail and password do not match.";
		}
		return "Invalid UP Webmail account.";
	}
}