<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login_model extends CI_Model {
    
      //   public function login($email, $pwd_usr)
      //   {
      //       $this->db->select('id_user, email, pwd_usr');
		    // $this->db->from('user');
		    // $this->db->where('email', $email);
		    // $this->db->where('pwd_usr', MD5($pwd_usr));
		    // $query = $this->db->get();
		    // if($query->num_rows()==1){
			   //  return $query->result();
		    // }else {
			   //  return false;
		    // }
      //   }

    	public function login($email,$pwd_usr)
	{
		$this->db->select('id_user,email,pwd_usr');
		$this->db->from('user');
		$this->db->where('email', $email);
		$this->db->where('pwd_usr', md5($pwd_usr));
		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}
    
    }
    
    /* End of file Login_model.php */
    
?>