<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Transaksibhn_model extends CI_Model {
    
        public function inserttransaksibhn()
	    {
		    $insert = array(
                'id_supplier' => $this->input->post('id_supplier'),
                'id_bahan' => $this->input->post('id_bahan'),
                'totalharga' => $this->input->post('totalharga'),
                'tglbeli' => $this->input->post('tglbeli'),
			);
 
		    $this->db->insert('transaksi_bahan', $insert);
        }
        
        public function showTransaksibhn()
        {
            $this->db->select("transaksi_bahan.id_transaksibhn, transaksi_bahan.id_supplier, transaksi_bahan.id_bahan, transaksi_bahan.totalharga, transaksi_bahan.tglbeli, supplier.id_supplier, supplier.nama_supplier, bahan.id_bahan, bahan.nama_bahan");

             $this->db->join('supplier', 'transaksi_bahan.id_supplier = supplier.id_supplier', 'left');
            $this->db->join('bahan', 'transaksi_bahan.id_bahan = bahan.id_bahan', 'left');

            $query = $this->db->get('transaksi_bahan');
            return $query->result();
        }

        public function getSupplier()
        {
            $this->db->select("id_supplier, nama_supplier");
            $query = $this->db->get('supplier');
            return $query->result();
        }

        public function getBahan()
        {
            $this->db->select("id_bahan, nama_bahan");
            $query = $this->db->get('bahan');
            return $query->result();
        }

        public function getTransaksibhnById($id_transaksibhn)
        {
            $this->db->select("id_transaksibhn, id_supplier, id_bahan, totalharga, tglbeli");
            $this->db->where('id_transaksibhn', $id_transaksibhn);
            $query = $this->db->get('transaksi_bahan');
            return $query->result();
        }
        public function editTransaksibhn($id_transaksibhn)
        {
            $edit = array(
               'id_supplier' => $this->input->post('id_supplier'),
                'id_bahan' => $this->input->post('id_bahan'),
                'totalharga' => $this->input->post('totalharga'), 
                 'tglbeli' => $this->input->post('tglbeli'),
            );
            $this->db->where('id_transaksibhn', $id_transaksibhn);
            $this->db->update('transaksi_bahan', $edit);
        }
	
        public function deletetransaksibhn($id_transaksibhn)
        {
            $this->db->where('id_transaksibhn', $id_transaksibhn);
            $this->db->delete('transaksi_bahan');
        }
        
        function transaksibhnTerdaftar($id_transaksibhn) {
            $this->db->select('id_transaksibhn');
            $this->db->from('transaksi_bahan');
            $this->db->where('id_transaksibhn', $id_transaksibhn);
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

    }
    
    /* End of file transaksibhn_model.php */
    
?>