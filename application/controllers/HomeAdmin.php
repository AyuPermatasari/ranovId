<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class HomeAdmin extends CI_Controller {
	
		public function index()
		{
			$this->load->view('headerAdmin/header');
			$this->load->view('homeAdmin/index');
			$this->load->view('footerAdmin/footer');
			
		}
	
	}
	
	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */

?>