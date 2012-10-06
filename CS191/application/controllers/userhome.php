<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserHome extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		#$this->load->model('UserHome_Model', 'Model');
	}
	
	public function index() {
		$this->load_view('home_view');
	}
	
	public function logout() {
		$this->session->unset_userdata('userdata');
		$this->session->sess_destroy();
	
		redirect('home','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */