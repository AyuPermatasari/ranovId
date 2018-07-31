<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Lappemasukan_model extends CI_Model {
    
        public function insertLappemasukan()
	    {
		    $insert = array(
                'id_transaksi' => $this->input->post('id_transaksi'),
                'tgl_pemasukan' => $this->input->post('tgl_pemasukan')
			);
 
		    $this->db->insert('laporan_pemasukan', $insert);
        }
        
        public function showLappemasukan()
        {
            $this->db->select("laporan_pemasukan.id_lappemasukan,laporan_pemasukan.id_transaksi,laporan_pemasukan.tgl_pemasukan, transaksi.id_transaksi");

            $this->db->join('transaksi', 'laporan_pemasukan.id_transaksi = transaksi.id_transaksi', 'left');
            
            $query = $this->db->get('laporan_pemasukan');
            return $query->result();
        }

        public function getTransaksi()
        {
            $this->db->select("id_transaksi");
            $query = $this->db->get('transaksi');
            return $query->result();
        }
        
        public function getLappemasukanById($id_lappemasukan)
        {
            $this->db->select("id_lappemasukan,id_transaksi,tgl_pemasukan");
            $this->db->where('id_lappemasukan', $id_lappemasukan);
            $query = $this->db->get('laporan_pemasukan');
            return $query->result();
        }
        public function editLappemasukan($id_lappemasukan)
        {
            $edit = array(
                'id_transaksi' => $this->input->post('id_transaksi'),
                'tgl_pemasukan' => $this->input->post('tgl_pemasukan') 
            );
            $this->db->where('id_lappemasukan', $id_lappemasukan);
            $this->db->update('laporan_pemasukan', $edit);
        }
	
        public function deleteLappemasukan($id_lappemasukan)
        {
            $this->db->where('id_lappemasukan', $id_lappemasukan);
            $this->db->delete('laporan_pemasukan');
        }
        
        function lappemasukanTerdaftar($id_lappemasukan) {
            $this->db->select('id_lappemasukan');
            $this->db->from('laporan_pemasukan');
            $this->db->where('id_lappemasukan', $id_lappemasukan);
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

    }
    
    /* End of file lappemasukan_model.php */
    
?>