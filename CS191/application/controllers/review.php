<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Review extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Review_Model', 'Model');
	}
	
	public function index() {
		$this->load_view('review_view');
	}
	
	public function submit() {
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
		#echo $content;
		#die();
		$review['filesize'] = $fileSize;
		$review['filename'] = $fileName;
		$review['filetype'] = $fileType;
		$review['user_id'] = $this->session->userdata('userid');
		$review['proposal_id'] = 1;
		
		$this->Model->add_review($review);
		#echo $content;
		#die();
		
		redirect('review_download');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>