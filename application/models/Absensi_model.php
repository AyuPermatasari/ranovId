<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Absensi_model extends CI_Model {
    
        public function insertAbsensi()
	    {
		    $insert = array(
                'tanggal' => $this->input->post('tanggal'),
                'status' => $this->input->post('status'),
                'id_pegawai' => $this->input->post('id_pegawai'),
			);
 
		    $this->db->insert('absensi', $insert);
        }
        
        public function showAbsensi()
        {
            $this->db->select("absensi.id_absensi, absensi.id_pegawai,absensi.tanggal,absensi.status, pegawai.id_pegawai, pegawai.nama_pegawai");
            $this->db->join('pegawai', 'pegawai.id_pegawai = absensi.id_pegawai', 'left');
            $query = $this->db->get('absensi');
            return $query->result();
        }

        public function getPegawai()
        {
            $this->db->select("id_pegawai, nama_pegawai");
            $query = $this->db->get('pegawai');
            return $query->result();
        }

        public function getAbsensiById($id_absensi)
        {
            $this->db->select("absensi.id_absensi, absensi.id_pegawai,absensi.tanggal,absensi.status");
            $this->db->where('id_absensi', $id_absensi);
            $query = $this->db->get('absensi');
            return $query->result();
        }
        public function editAbsensi($id_absensi)
        {
            $edit = array(
                'id_pegawai' => $this->input->post('id_pegawai'),
                'tanggal' => $this->input->post('tanggal'),
                'status' => $this->input->post('status') 
            );
            $this->db->where('id_absensi', $id_absensi);
            $this->db->update('absensi', $edit);
        }
	
        public function deleteAbsensi($id_absensi)
        {
            $this->db->where('id_absensi', $id_absensi);
            $this->db->delete('absensi');
        }
        
        function absensiTerdaftar($id_absensi) {
            $this->db->select('id_absensi');
            $this->db->from('absensi');
            $this->db->where('id_absensi', $id_absensi);
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

    }
    
    /* End of file absensi_model.php */
    
?>