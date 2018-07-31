	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Home extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Produk_model');
		}
	
		public function index()
		{
			$data['data_produk'] = $this->Produk_model->showProduk();
			$this->load->view('home/header');
			$this->load->view('home/index',$data);
			$this->load->view('home/footer');
			
		}

		public function kontak()
		{
			$this->load->view('home/header');
			$this->load->view('home/kontak');
			$this->load->view('home/footer');
			
		}
	
	}
	
	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */

?>