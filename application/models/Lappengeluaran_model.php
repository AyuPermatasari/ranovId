<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Lappengeluaran_model extends CI_Model {
    
        public function insertLappengeluaran()
	    {
		    $insert = array(
                'id_lappenggajian' => $this->input->post('id_lappenggajian'),
                'id_transaksibhn' => $this->input->post('id_transaksibhn'),
                'id_produksi' => $this->input->post('id_produksi'),
                'tgl_pengeluaran' => $this->input->post('tgl_pengeluaran')
			);
 
		    $this->db->insert('laporan_pengeluaran', $insert);
        }
        
        public function showLappengeluaran()
        {
            $this->db->select("laporan_pengeluaran.id_lappengeluaran, laporan_pengeluaran.id_lappenggajian, laporan_pengeluaran.id_transaksibhn, laporan_pengeluaran.id_produksi, laporan_pengeluaran.tgl_pengeluaran, laporan_penggajian.id_lappenggajian, transaksi_bahan.id_transaksibhn, produksi.id_produksi");


            $this->db->join('laporan_penggajian', 'laporan_pengeluaran.id_lappenggajian = laporan_penggajian.id_lappenggajian', 'left');
            $this->db->join('transaksi_bahan', 'laporan_pengeluaran.id_transaksibhn = transaksi_bahan.id_transaksibhn', 'left');
            $this->db->join('produksi', 'laporan_pengeluaran.id_produksi = produksi.id_produksi', 'left');


            $query = $this->db->get('laporan_pengeluaran');
            return $query->result();
        }

        public function getLappenggajian()
        {
            $this->db->select("id_lappenggajian, totalgaji");
            $query = $this->db->get('laporan_penggajian');
            return $query->result();
        }
        public function getTransaksibhn()
        {
            $this->db->select("id_transaksibhn, totalharga");
            $query = $this->db->get('transaksi_bahan');
            return $query->result();
        }
        public function getProduksi()
        {
            $this->db->select("id_produksi");
            $query = $this->db->get('produksi');
            return $query->result();
        }

        public function getLappengeluaranById($id_lappengeluaran)
        {
            $this->db->select("id_lappengeluaran, id_lappenggajian, id_transaksibhn, id_produksi, tgl_pengeluaran");
            $this->db->where('id_lappengeluaran', $id_lappengeluaran);
            $query = $this->db->get('laporan_pengeluaran');
            return $query->result();
        }
        public function editLappengeluaran($id_lappengeluaran)
        {
            $edit = array(
                'id_lappenggajian' => $this->input->post('id_lappenggajian'),
                'id_transaksibhn' => $this->input->post('id_transaksibhn'),
                'id_produksi' => $this->input->post('id_produksi'),
                'tgl_pengeluaran' => $this->input->post('tgl_pengeluaran')
            );
            $this->db->where('id_lappengeluaran', $id_lappengeluaran);
            $this->db->update('laporan_pengeluaran', $edit);
        }
	
        public function deleteLappengeluaran($id_lappengeluaran)
        {
            $this->db->where('id_lappengeluaran', $id_lappengeluaran);
            $this->db->delete('laporan_pengeluaran');
        }
        
        function lappengeluaranTerdaftar($id_lappengeluaran) {
            $this->db->select('id_lappengeluaran');
            $this->db->from('laporan_pengeluaran');
            $this->db->where('id_lappengeluaran', $id_lappengeluaran);
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

    }
    
    /* End of file lappengeluaran_model.php */
    
?>