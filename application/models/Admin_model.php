<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin_model extends CI_Model {
    
        public function insertAdmin()
		{
			$password = $this->input->post('pwd_adm');
			$insert = array(
					'id_pegawai' => $this->input->post('id_pegawai'),
					'email' => $this->input->post('email'),
					'pwd_adm' => md5($password),
					'nama_adm' => $this->input->post('nama_adm'),
				);
			$this->db->insert('admin', $insert);
		}

		public function showAdmin()
		{
			$this->db->select("admin.id_admin, admin.id_pegawai, admin.email, admin.nama_adm, pegawai.id_pegawai, pegawai.nama_pegawai");
			$this->db->join('pegawai', 'admin.id_pegawai = pegawai.id_pegawai', 'left');
			$this->db->order_by('nama_pegawai', 'desc');
			$query = $this->db->get('admin');
			return $query->result();
		}

		public function getPegawai()
		{
			$this->db->select("id_pegawai, nama_pegawai");
			$query = $this->db->get('pegawai');
			return $query->result();
		}

		public function getAdminById($id_admin)
		{
			$this->db->select("id_admin, email, nama_adm, id_pegawai");
			$this->db->where('id_admin', $id_admin);
			$query = $this->db->get('admin');
			return $query->result();
		}

		public function editAdmin($id_admin)
		{
			$edit = array(
				'email' => $this->input->post('email'), 
				'nama_adm' => $this->input->post('nama_adm'),
				'id_pegawai' => $this->input->post('id_pegawai'),
			);
			$this->db->where('id_admin', $id_admin);
			$this->db->update('admin', $edit);
		}

		public function deleteAdmin($id_admin)
		{
			$this->db->where('id_admin', $id_admin);
			$this->db->delete('admin');
		}

		function adminTerdaftar($id_admin) {
			$this->db->select('id_admin');
			$this->db->from('admin');
			$this->db->where('id_admin', $id_admin);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
    
    }
    
    /* End of file Admin_model.php */
    
?>