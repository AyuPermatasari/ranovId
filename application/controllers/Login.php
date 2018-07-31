<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url','form');
            $this->load->library('form_validation');
            $this->load->model('Login_model');
        }
        

        public function index()
        {
            $this->load->view('user/login');
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
		    $this->form_validation->set_rules('pwd_usr', 'pwd_usr', 'trim|required|callback_cekDb');
		    if ($this->form_validation->run() == FALSE) {
			    $this->load->view('user/login');
            } 
            else {
			    redirect('Home','refresh');
		    }
        }

        public function cekDb($pwd_usr)
        {
            $email = $this->input->post('email');
		    $result = $this->Login_model->login($email, $pwd_usr);
		    if ($result) {
			    $sess_array = array();
			    foreach ($result as $row) {
				    $sess_array = array(
					    'id_user' =>$row->id_user,
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
    
    
    
    /* End of file Login.php */
    
?>