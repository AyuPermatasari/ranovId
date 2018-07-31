<?php

    
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Register extends CI_Controller {
    
        public function index()
        {
            $this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'trim|required|numeric|callback_cekEmail');
		$this->form_validation->set_rules('pwd_usr', 'pwd_usr', 'trim|required');
		$this->load->model('Register_Model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('register');
		} else{
						$this->Register_Model->insertUser();
						redirect('LoginUser/cekLogin');
                }
		}
	
        
        public function cekEmail($email)
	{
		$this->load->library('form_validation');
    	$is_exist = $this->Register_Model->select_email($email);

    	if ($is_exist) 
    	{
       		$this->form_validation->set_message('cekEmail', 'email Sudah di pakai.');    
        	return false;
    	} 
    	else 
    	{
        	return true;
    	}
	}
	
    
    }
    
    /* End of file Register.php */
    

?>