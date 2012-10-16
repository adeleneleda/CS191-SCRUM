<?
class WriteProposal_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function addproposes($proponents, $proposal)
    {
        $ctr = 0;
        while($ctr < count($proponents))
        {
            $this->db->query('insert into proposes(proposal_id, proponent_id)' . ' values(' . (int)$proposal . ', ' . (int)$proponents[$ctr] . ');');
            $ctr++;
        }
    }
    
    function addtoproposal($title, $abstract, $proposal, $filename, $filesize, $filetype, $funding, $start, $end, $proponents) {
        $this->db->query('insert into proposals(title, abstract, proposal, filename, filesize, filetype, fundingreq, startdate, enddate)' . 
        'values(\'' . $title . '\', \'' . $abstract . '\', \'' . $proposal . '\', \'' . $filename . '\', ' . $filesize . ', \'' . $filetype . '\', ' . 
        $funding . ', \'' . $start . '\', \'' . $end . '\');'); 
        $proposalid = 'select proposal_id from proposals where title="' . $title . '";';
        $idresult = mysql_query($proposalid);
        $row = mysql_fetch_array($idresult);
        $value = $row['proposal_id'];
        $this->addproposes($proponents, $value);
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