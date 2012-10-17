<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Review extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Review_Model', 'Model');
	}
	
	public function index($proposalid) {
		$proposal_details = $this->Model->get_proposal_details($proposalid);
		$this->load_view('review_view', compact('proposalid', 'proposal_details'));
	}
	
	public function submit($proposalid) {
		if($_FILES['userfile']['size'] > 0)
		{
			$fileName = $_FILES['userfile']['name'];
			$tmpName  = $_FILES['userfile']['tmp_name'];
			$fileSize = $_FILES['userfile']['size'];
			$fileType = $_FILES['userfile']['type'];

			$fp      = fopen($tmpName, 'r');
			$content = fread($fp, $fileSize);
			$content = addslashes($content);
			fclose($fp);

		if(!get_magic_quotes_gpc())
		{
			$fileName = mysql_real_escape_string($fileName);
		}
		
		$review['verdict'] = $this->input->post('verdict');
		$review['comment'] = $this->input->post('comment');
		$review['file'] = $content;
		$review['filesize'] = $fileSize;
		$review['filename'] = $fileName;
		$review['filetype'] = $fileType;
		$review['user_id'] = $this->session->userdata('userid');
		$review['proposal_id'] = $proposalid;
		
		$this->Model->add_review($review);
		
		redirect('review_download');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>