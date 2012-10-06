<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct() {
		parent::__construct(true);
		$this->load->model('Home_Model', 'Model');
	}
	
	public function index() {
		if($this->session->userdata('userdata')){
			redirect('userhome', 'refresh');
		}
		else{
			$this->load->view('entrance_view');
		}
	}
	
	public function login() {
		if($this->session->userdata('userdata')){
			redirect('userhome', 'refresh');
		}
		else{
			$userdata['login'] = $this->input->post('upwebmail');
			$userdata['password'] = $this->input->post('password');
			
			if($this->Model->check_userdata($userdata)){
				$this->session->set_userdata('userdata',$userdata);
				redirect('userhome', 'refresh');
			}else{
				$error = $this->Model->get_loginerror($userdata);
				$this->load->view('entrance_view',compact('error'));
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */