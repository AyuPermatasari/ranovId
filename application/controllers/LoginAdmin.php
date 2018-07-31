<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class LoginAdmin extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url','form');
            $this->load->library('form_validation');
            $this->load->model('Login_admin_model');
        }
        

        public function index()
        {
            $this->load->view('admin/loginAdmin');
        }

    //     public function index()
    // {
    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('email', 'email', 'trim|required|numeric');
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDb');
    //     if($this->form_validation->run()==false){
    //         $this->load->view('register');
    //     }else{
    //         $this->load->view('login');
    //     }
    // }

        public function cekLogin(){

            $this->load->library('form_validation');
		    $this->form_validation->set_rules('email', 'email', 'trim|required');
		    $this->form_validation->set_rules('pwd_adm', 'pwd_adm', 'trim|required|callback_cekDb');
		    if ($this->form_validation->run() == FALSE) {
			    $this->load->view('admin/loginAdmin');
            } 
            else {
			    redirect('HomeAdmin','refresh');
		    }
        }

        public function cekDb($pwd_adm)
        {
            $email = $this->input->post('email');
		    $result = $this->Login_admin_model->loginAdmin($email, $pwd_adm);
		    if ($result) {
			    $sess_array = array();
			    foreach ($result as $row) {
				    $sess_array = array(
					    'id_admin' =>$row->id_admin,
					    'email' => $row->email,
					    // 'role' => $row->role
				    );
				
				    $this->session->set_userdata( 'logged_in',$sess_array );
			    }
			    return true;
		    }else {
			    $this->form_validation->set_message("cekDb", "Login Gagal Username dan Password tidak valid");
			    return false;
		    }
        }
        
        public function logout()
        {
            $this->session->unset_userdata('logged_in');
		    $this->session->sess_destroy();
		    redirect('Login','refresh');
        }
    
    }
    
    /* End of file LoginAdmin.php */
    
?>