<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Register_Model extends CI_Model {	

		public function insertUser()
		{
			$pass = md5($this->input->post('pwd_user'));
			$object = array('nama_usr' => $this->input->post('nama_usr'),'alamat' => $this->input->post('alamat'),'jk' => $this->input->post('jk'),'nohp' => $this->input->post('nohp'),'email' => $this->input->post('email'),'pwd_user' => $pass);
			$this->db->insert('user', $object);
		}

		public function select_email($email)
	{
		$this->db->select('id_user,nama_usr,email,pwd_user');
		$this->db->from('user');
    	$this->db->where('email', $email);
    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {
        	return true;
    	} else {
        	return false;
    	}
	}		

	}
?>