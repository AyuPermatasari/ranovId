<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Produk_model extends CI_Model {
    
        public function insertProduk()
	    {
		    $insert = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'foto' => $this->upload->data('file_name'),
			);
 
		    $this->db->insert('produk', $insert);
        }
        
        public function showProduk()
        {
            $this->db->select("produk.id_produk, produk.nama_produk,produk.harga, produk.stok, produk.foto");
            $this->db->order_by('nama_produk', 'desc');
            $query = $this->db->get('produk');
            return $query->result();
        }
        public function getProdukById($id_produk)
        {
            $this->db->select("produk.id_produk, produk.nama_produk,produk.harga, produk.stok");
            $this->db->where('id_produk', $id_produk);
            $query = $this->db->get('produk');
            return $query->result();
        }
        public function editProduk($id_produk)
        {
            $edit = array(
                 'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'foto' => $this->upload->data('file_name'),
            );
            $this->db->where('id_produk', $id_produk);
            $this->db->update('produk', $edit);
        }
	
        public function deleteProduk($id_produk)
        {
            $this->db->where('id_produk', $id_produk);
            $this->db->delete('produk');
        }
        
        function produkTerdaftar($id_produk) {
            $this->db->select('id_produk');
            $this->db->from('produk');
            $this->db->where('id_produk', $id_produk);
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

    }
    
    /* End of file produk_model.php */
    
?>