<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pengiriman_model extends CI_Model {
    
        public function insertPengiriman()
	    {
		    $insert = array(
                'id_transaksi' => $this->input->post('id_transaksi'),
                'id_kurir' => $this->input->post('id_kurir')
			);
 
		    $this->db->insert('pengiriman', $insert);
        }
        
        public function showPengiriman()
        {
            $this->db->select("pengiriman.id_pengiriman, pengiriman.id_transaksi,pengiriman.id_kurir, transaksi.id_transaksi, kurir.id_kurir");
            $this->db->join('transaksi', 'pengiriman.id_transaksi = transaksi.id_transaksi', 'left');
            $this->db->join('kurir', 'pengiriman.id_kurir = kurir.id_kurir', 'left');
            $query = $this->db->get('pengiriman');
            return $query->result();
        }

        public function getTransaksi()
        {
            $this->db->select("id_transaksi");
            $query = $this->db->get('transaksi');
            return $query->result();
        }

        public function getKurir()
        {
            $this->db->select("id_kurir");
            $query = $this->db->get('kurir');
            return $query->result();
        }

        public function getPengirimanById($id_pengiriman)
        {
            $this->db->select("pengiriman.id_pengiriman, pengiriman.id_transaksi,pengiriman.id_kurir");
            $this->db->where('id_pengiriman', $id_pengiriman);
            $query = $this->db->get('pengiriman');
            return $query->result();
        }
        public function editPengiriman($id_pengiriman)
        {
            $edit = array(
               'id_transaksi' => $this->input->post('id_transaksi'),
                'id_kurir' => $this->input->post('id_kurir'), 
            );
            $this->db->where('id_pengiriman', $id_pengiriman);
            $this->db->update('pengiriman', $edit);
        }
	
        public function deletePengiriman($id_pengiriman)
        {
            $this->db->where('id_pengiriman', $id_pengiriman);
            $this->db->delete('pengiriman');
        }
        
        function pengirimanTerdaftar($id_pengiriman) {
            $this->db->select('id_pengiriman');
            $this->db->from('pengiriman');
            $this->db->where('id_pengiriman', $id_pengiriman);
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

    }
    
    /* End of file pengiriman_model.php */
    
?>