<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WriteProposal extends CI_Controller {
    
    public $proplist = array();
	public function __construct() {
		parent::__construct();
		$this->load->model('WriteProposal_Model', 'Model');
	}
    
    public function remove_proponent($remove)
    {
        $ctr = 0;
        $newlist = array();
        while($ctr < count($this->session->userdata('proponent_list')))
        {
            if($this->session->userdata('proponent_list')[$ctr] != $remove)
            {
                array_push($newlist, $this->session->userdata('proponent_list')[$ctr]);
            }
            $ctr++;
        }
        $this->session->set_userdata('proponent_list', $newlist);
        $the_list = $this->session->userdata('proponent_list');
        $this->load_view('writeproposal_view', compact('the_list'));
    }
    
	
    public function add_proponent()
    {
        $temp_proponent_list = array();
        $proponent = $this->input->post('proponent');
        $parray = array();
        array_push($parray, $proponent);
            $temp_proponent_list = $this->session->userdata('proponent_list');
            array_push($temp_proponent_list, $proponent);
            $this->session->set_userdata('proponent_list', $temp_proponent_list);
            $the_list = $this->session->userdata('proponent_list');
        $the_list = $this->session->userdata('proponent_list');
        $this->load_view('writeproposal_view', compact('the_list'));
    }

    public function submit() {
        $emptyfields = "*Fields cannot be empty";
        $title = $this->input->post('title');
        $abstract = $this->input->post('abstract');
        $funding = $this->input->post('funding');
        if($_FILES['file']['size'] > 0)
		{
			$filename = $_FILES['file']['name'];
			$tmpName  = $_FILES['file']['tmp_name'];
			$filesize = $_FILES['file']['size'];
			$filetype = $_FILES['file']['type'];

			$fp      = fopen($tmpName, 'r');
			$content = fread($fp, $filesize);
			$content = addslashes($content);
			fclose($fp);
        }

		if(!get_magic_quotes_gpc())
		{
			$fileName = mysql_real_escape_string($fileName);
		}
        $proposal = $content;      
        $start = $this->input->post('startdate');
        $end = $this->input->post('enddate');
        $the_list = $this->session->userdata('proponent_list');
        if(empty($title) or empty($abstract) or empty($funding) or empty($proposal) or empty($start) or empty($end))
        {
            $this->load_view('writeproposal_view', compact('emptyfields', 'the_list'));
        }
        else
        {
            $this->Model->addtoproposal($title, $abstract, $proposal, $filename, $filesize, $filetype, $funding, $start, $end, $the_list);
            $this->submitted();
        }
    }
    
    public function submitted()
    {
        $this->load_view('submitproposal_view');
    }
    
	public function index() {
        $id = 'SELECT user_id FROM users WHERE username="' . $this->session->userdata('userdata')['login'].'" AND password="'.substr(md5($this->session->userdata('userdata')['password']),0,20).'";';
        $uid = mysql_query($id);
        $row = mysql_fetch_array($uid);
        $value = $row['user_id'];
        $propid = 'select proponent_id from proponent where user_id=' . (int)$value . ';';
        $pid = mysql_query($propid);
        $row = mysql_fetch_array($pid);
        $currentpid = array();
        $value = $row['proponent_id'];
        array_push($currentpid, $value);
        $this->session->set_userdata('proponent_list', $currentpid);
        $the_list = $this->session->userdata('proponent_list');
        $this->load_view('writeproposal_view', compact('the_list'));
	}
	
	public function logout() {
		$this->session->unset_userdata('userdata');
		$this->session->sess_destroy();
	
		redirect('home','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/writeproposal.php */