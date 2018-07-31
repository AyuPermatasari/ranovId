<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Produksi_model extends CI_Model {
    
        public function insertProduksi()
	    {
		    $insert = array(
                'id_bahan' => $this->input->post('id_bahan'),
                'id_produk' => $this->input->post('id_produk'),
                'tanggal_produksi' => $this->input->post('tanggal_produksi'),
                'biaya' => $this->input->post('biaya'),
                'hasil' => $this->input->post('hasil')
			);
 
		    $this->db->insert('produksi', $insert);
        }
        
        public function showProduksi()
        {
            $this->db->select("produksi.id_produksi, produksi.id_bahan,produksi.id_produk,produksi.tanggal_produksi,produksi.biaya, produksi.hasil, bahan.id_bahan, bahan.nama_bahan, produk.id_produk, produk.nama_produk");
           $this->db->join('bahan', 'produksi.id_bahan = bahan.id_bahan', 'left');
           $this->db->join('produk', 'produksi.id_produk = produk.id_produk', 'left');
            $query = $this->db->get('produksi');
            return $query->result();
        }

        public function getBahan()
        {
            $this->db->select("id_bahan, nama_bahan");
            $query = $this->db->get('bahan');
            return $query->result();
        }

        public function getProduk()
        {
            $this->db->select("id_produk, nama_produk");
            $query = $this->db->get('produk');
            return $query->result();
        }

        public function getProduksiById($id_produksi)
        {
            $this->db->select("produksi.id_produksi, produksi.id_bahan,produksi.id_produk,produksi.tanggal_produksi,produksi.biaya, produksi.hasil");
            $this->db->where('id_produksi', $id_produksi);
            $query = $this->db->get('produksi');
            return $query->result();
        }
        public function editProduksi($id_produksi)
        {
            $edit = array(
               'id_bahan' => $this->input->post('id_bahan'),
                'id_produk' => $this->input->post('id_produk'),
                'tanggal_produksi' => $this->input->post('tanggal_produksi'),
                'biaya' => $this->input->post('biaya'),
                'hasil' => $this->input->post('hasil') 
            );
            $this->db->where('id_produksi', $id_produksi);
            $this->db->update('produksi', $edit);
        }
	
        public function deleteProduksi($id_produksi)
        {
            $this->db->where('id_produksi', $id_produksi);
            $this->db->delete('produksi');
        }
        
        function produksiTerdaftar($id_produksi) {
            $this->db->select('id_produksi');
            $this->db->from('produksi');
            $this->db->where('id_produksi', $id_produksi);
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