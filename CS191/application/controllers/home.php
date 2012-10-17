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
			$proposal[$index]['proposal_id'] = $approved['proposal_id'];
			
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
			$userdetails = $this->Model->check_userdata($userdata);
			if($userdetails){
				$userroles = $this->Model->get_userroles($userdetails['user_id']);
				foreach($userroles as $role){
					$roles[] = $role['usertype'];
				}
				
				$this->session->set_userdata('userid',$userdetails['user_id']);
				$this->session->set_userdata('userdata',$userdata);
				$this->session->set_userdata('userroles',$roles);
				$this->session->set_userdata('activerole',$roles[0]);
				redirect('userhome', 'refresh');
			}else{
				$error = $this->Model->get_loginerror($userdata);
				
				
				$years = $this->Model->get_years();
				$approved_titles = $this->Model->get_approved_proposal_titles();
				$proposal = array();
				foreach ($approved_titles as $index=>$approved) {
		
				$proposal[$index]['title'] = $approved['title'];
				$proposal[$index]['status_date'] = $approved['status_date'];
				$proposal[$index]['proposal_id'] = $approved['proposal_id'];
				
				$authors = $this->Model->get_authors($approved['proposal_id']);
				
					foreach ($authors as $auth_index=>$indiv) {
						$proposal[$index]['author'][$auth_index] = $indiv['lastname'].", ".$indiv['firstname']." ".$indiv['middlename'];
				}
		}
				
				$this->load->view('entrance_view',compact('error', 'proposal', 'years'));
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
				$proposal[$index]['proposal_id'] = $approved['proposal_id'];
				
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
				$proposal[$index]['proposal_id'] = $approved['proposal_id'];
				
				$authors = $this->Model->get_authors($approved['proposal_id']);
				
					foreach ($authors as $auth_index=>$indiv) {
						$proposal[$index]['author'][$auth_index] = $indiv['lastname'].", ".$indiv['firstname']." ".$indiv['middlename'];
					}
			}
		$search = "yes";	
		$this->load->view('entrance_view', compact('proposal', 'years', 'search','a','b', 'c'));
	
	
	}
	
	public function view_prop_info($proposal_id) {
			
		$abstract_info = $this->Model->get_info($proposal_id);
		$authors = $this->Model->get_authors($proposal_id);
		

		$this->load->view('propdetails_view', compact('authors', 'abstract_info'));
	
	
	}
	

	
	
	
}


	

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */