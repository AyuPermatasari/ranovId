<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin extends CI_Controller {
    
        public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}
	public function index()
	{
		$data['title'] = "Data Admin";
		$data["pegawai"] = $this->Admin_model->getPegawai();
		$data['data_admin'] = $this->Admin_model->showAdmin();
		$this->load->view('headerAdmin/header', $data);
		$this->load->view('admin/admin', $data);
		$this->load->view('footerAdmin/footer', $data);
	}
	public function add()
 	{
 		$data['title'] = "Add Admin";
 		$this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('pwd_adm', 'pwd_adm', 'trim|required');
         $this->form_validation->set_rules('nama_adm', 'nama_adm', 'trim|required');
 		$this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim|required');         
                  
		$data["pegawai"] = $this->Admin_model->getPegawai();
		$data['data_admin'] = $this->Admin_model->showAdmin();
 
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('headerAdmin/header', $data);
			$this->load->view('admin/admin');
			$this->load->view('footerAdmin/footer', $data);
		} else { 
			$this->Admin_model->insertAdmin();
	    	$this->session->set_flashdata('sudah_input', 'Admin sudah ditambah!');	
	   		redirect('admin','refresh');
		}
	}
	public function edit($id_admin)
	{
	 	$data['title'] = "Edit Admin";
		$data['get_admin']=$this->Admin_model->getAdminById($id_admin);
		$data["pegawai"] = $this->Admin_model->getPegawai();
		$this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('nama_adm', 'nama_adm', 'trim|required');
 		$this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim|required');  
	 
		if($this->form_validation->run()==FALSE){
			$this->load->view('headerAdmin/header', $data);
			$this->load->view('admin/edit_admin');
			$this->load->view('footerAdmin/footer', $data);
		}else{
			$this->Admin_model->editAdmin($id_admin);
			redirect('admin','refresh');
		}
	}
	public function delete($id_admin)
	{
			$terdaftar=$this->Admin_model->adminTerdaftar($id_admin);
			if ($terdaftar) {
				$this->session->set_flashdata('terhapus', 'Admin Berhasil Dihapus');
				$this->Admin_model->deleteAdmin($id_admin);
                redirect('admin', 'refresh');
			} else {
                $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Pengadaan tersebut telah terdaftar dalam Produksi! Silahkan hapus produksi yang bersangkutan terlebih dahulu.');
				redirect('admin','refresh');
			}
	}
    
    }
    
    /* End of file Admin.php */
    
?>