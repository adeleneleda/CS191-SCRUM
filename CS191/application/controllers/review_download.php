<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review_Download extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Review_Download_Model', 'Model');
	}
	
	public function index() {
		$reviews = $this->Model->get_reviews();
		
		$this->load_view('review_download_view', compact('reviews'));
	}
	
	public function download($reviewid) {
		$file = $this->Model->download_file($reviewid);
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
?>