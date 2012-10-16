<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserHome extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('UserHome_Model', 'Model');
	}
	
	public function index() {
	
		$who = $this->Model->get_prop_id();
		$this->session->set_userdata('curr_proponent_id', $who);
		
		$proposals_approved = $this->Model->get_own_proposals('APPROVED');		
		$proposals_pending = $this->Model->get_own_proposals('PENDING');
		$proposals_disapproved = $this->Model->get_own_proposals('DISAPPROVED');

		$this->load_view('home_view', compact('proposals_approved', 'proposals_pending', 'proposals_disapproved'));
	}
	
	public function logout() {
		$this->session->unset_userdata('userdata');
		$this->session->sess_destroy();
	
		redirect('home','refresh');
	}
	
	public function about() {
	
		$this->load_view('about_view');	
	}
	
	public function view_prop_info($proposal_id) {
			
		$abstract_info = $this->Model->get_info($proposal_id);
		$authors = $this->Model->get_authors($proposal_id);
		

		$this->load_view('propdetails_loggedin_view', compact('proposal_id', 'authors', 'abstract_info'));
	
	
	}
	
	
	public function writeproposal()
    {
        redirect('writeproposal', 'refresh');
    }
	
	public function download($proposal_id) {
		$file = $this->Model->download_file($proposal_id);
		$type = $file['filetype'];
		$size = $file['filesize'];
		$name = $file['filename'];
		$data = $file['file'];
		header("Content-type:". $type);
		header("Content-length:". filesize($data));
		header("Content-Disposition: attachment; filename=".$name);
		#header("Content-transfer-encoding: binary");
		echo stripslashes($data);
		exit;
	}
	

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */