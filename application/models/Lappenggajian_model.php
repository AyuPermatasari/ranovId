<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Lappenggajian_model extends CI_Model {
    
        public function insertLappenggajian()
	    {
		    $insert = array(
                
                'id_pegawai' => $this->input->post('id_pegawai'),
                // 'id_jabatan' => $this->input->post('id_jabatan'),
                'tgl_penggajian' => $this->input->post('tgl_penggajian'),
                'totalgaji' => $this->input->post('totalgaji')

			);
 
		    $this->db->insert('laporan_penggajian', $insert);
        }
        
        public function showLappenggajian()
        {
            $this->db->select("laporan_penggajian.id_lappenggajian, laporan_penggajian.id_pegawai,  laporan_penggajian.tgl_penggajian, laporan_penggajian.totalgaji, pegawai.id_pegawai, pegawai.nama_pegawai");

            // $this->db->join('jabatan', 'laporan_penggajian.id_jabatan = jabatan.id_jabatan', 'left');
            $this->db->join('pegawai', 'laporan_penggajian.id_pegawai = pegawai.id_pegawai', 'left');

            $query = $this->db->get('laporan_penggajian');
            return $query->result();
        }

        // public function getJabatan()
        // {
        //     $this->db->select("id_jabatan, nama_jabatan");
        //     $query = $this->db->get('jabatan');
        //     return $query->result();
        // }

        public function getPegawai()
    {
        $this->db->select("id_pegawai, nama_pegawai");
        $query = $this->db->get('pegawai');
        return $query->result();
    }
    
        public function getLappenggajianById($id_lappenggajian)
        {
            $this->db->select("id_lappenggajian, id_pegawai, tgl_penggajian, totalgaji");
            $this->db->where('id_lappenggajian', $id_lappenggajian);
            $query = $this->db->get('laporan_penggajian');
            return $query->result();
        }
        public function editLappenggajian($id_lappenggajian)
        {
            $edit = array(
               'id_pegawai' => $this->input->post('id_pegawai'),
               // 'id_jabatan' => $this->input->post('id_jabatan'),
                'tgl_penggajian' => $this->input->post('tgl_penggajian'),
                'totalgaji' => $this->input->post('totalgaji') 
            );
            $this->db->where('id_lappenggajian', $id_lappenggajian);
            $this->db->update('laporan_penggajian', $edit);
        }
	
        public function deleteLappenggajian($id_lappenggajian)
        {
            $this->db->where('id_lappenggajian', $id_lappenggajian);
            $this->db->delete('laporan_penggajian');
        }
        
        function lappenggajianTerdaftar($id_lappenggajian) {
            $this->db->select('id_lappenggajian');
            $this->db->from('laporan_penggajian');
            $this->db->where('id_lappenggajian', $id_lappenggajian);
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

    }
    
    /* End of file lappenggajian_model.php */
    
?>