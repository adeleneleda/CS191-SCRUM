<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct() {
		parent::__construct(true);
		$this->load->model('Home_Model', 'Model');
	}
	
	public function index() {
	
		$years = $this->Model->get_years();
		$approved_titles = $this->Model->get_approved_proposal_titles();
		$proposal = array();
		foreach ($approved_titles as $index=>$approved) {
		
			$proposal[$index]['title'] = $approved['title'];
			$proposal[$index]['status_date'] = $approved['status_date'];
			
			$authors = $this->Model->get_authors($approved['proposal_id']);
			
				foreach ($authors as $auth_index=>$indiv) {
					$proposal[$index]['author'][$auth_index] = $indiv['lastname'].", ".$indiv['firstname']." ".$indiv['middlename'];
				}
		}
		
		
		
		if($this->session->userdata('userdata')){
			redirect('userhome', 'refresh');
		}
		else{
			$this->load->view('entrance_view', compact('proposal', 'years'));
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
	
	
	public function prop_search() {
	
	$years = $this->Model->get_years();
	
	if(!empty($_POST['proponent']) && empty($_POST['keyword']) && empty($_POST['year'])) {
	$search = 'yes';
	$a = $_POST['proponent'];
	$proponent = $this->Model->proponent_search($_POST['proponent']);
	
	$this->load->view('propsearch_view', compact('search', 'a', 'years', 'proponent'));
	
	
	}
	
	else {
	
		$a = $_POST['proponent'];
		$b = $_POST['year'];
		$c = $_POST['keyword'];
	
		
		$approved_titles = $this->Model->search_all($_POST['proponent'], $_POST['year'], $_POST['keyword']);
		
		$proposal = array();
			foreach ($approved_titles as $index=>$approved) {
			
				$proposal[$index]['title'] = $approved['title'];
				$proposal[$index]['status_date'] = $approved['status_date'];
				
				$authors = $this->Model->get_authors($approved['proposal_id']);
				
					foreach ($authors as $auth_index=>$indiv) {
						$proposal[$index]['author'][$auth_index] = $indiv['lastname'].", ".$indiv['firstname']." ".$indiv['middlename'];
					}
			}
		$search = "yes";	
		$this->load->view('entrance_view', compact('proposal', 'years', 'search','a','b', 'c'));
	}	
		
	
}
	
	public function prop_helper($proponent_id) {
	
	$a = "";
	$b = "";
	$c = "";
	
	$years = $this->Model->get_years();
	
	$approved_titles = $this->Model->search_proponent($proponent_id, "", "");
		
		$proposal = array();
			foreach ($approved_titles as $index=>$approved) {
			
				$proposal[$index]['title'] = $approved['title'];
				$proposal[$index]['status_date'] = $approved['status_date'];
				
				$authors = $this->Model->get_authors($approved['proposal_id']);
				
					foreach ($authors as $auth_index=>$indiv) {
						$proposal[$index]['author'][$auth_index] = $indiv['lastname'].", ".$indiv['firstname']." ".$indiv['middlename'];
					}
			}
		$search = "yes";	
		$this->load->view('entrance_view', compact('proposal', 'years', 'search','a','b', 'c'));
	
	
	}
	
	
	
}


	

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */