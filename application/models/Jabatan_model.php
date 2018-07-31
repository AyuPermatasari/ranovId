<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Jabatan_model extends CI_Model {
    
        public function insertJabatan()
	    {
		    $insert = array(
                'nama_jabatan' => $this->input->post('nama_jabatan'),
                'gaji' => $this->input->post('gaji')
			);
 
		    $this->db->insert('jabatan', $insert);
        }
        
        public function showJabatan()
        {
            $this->db->select("jabatan.id_jabatan, jabatan.nama_jabatan,jabatan.gaji");
            $this->db->order_by('nama_jabatan', 'desc');
            $query = $this->db->get('jabatan');
            return $query->result();
        }
        public function getJabatanById($id_jabatan)
        {
            $this->db->select("id_jabatan, nama_jabatan, gaji");
            $this->db->where('id_jabatan', $id_jabatan);
            $query = $this->db->get('jabatan');
            return $query->result();
        }
        public function editJabatan($id_jabatan)
        {
            $edit = array(
                'nama_jabatan' => $this->input->post('nama_jabatan'),
                'gaji' => $this->input->post('gaji') 
            );
            $this->db->where('id_jabatan', $id_jabatan);
            $this->db->update('jabatan', $edit);
        }
	
        public function deleteJabatan($id_jabatan)
        {
            $this->db->where('id_jabatan', $id_jabatan);
            $this->db->delete('jabatan');
        }
        
        function jabatanTerdaftar($id_jabatan) {
            $this->db->select('id_jabatan');
            $this->db->from('jabatan');
            $this->db->where('id_jabatan', $id_jabatan);
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

    }
    
    /* End of file Jabatan_model.php */
    
?>