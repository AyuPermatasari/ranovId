<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Bahan_model extends CI_Model {
    
        public function insertBahan()
	    {
		    $insert = array(
                'nama_bahan' => $this->input->post('nama_bahan'),
                'merk' => $this->input->post('merk'),
                'stok_bahan' => $this->input->post('stok_bahan'),
                'satuan' => $this->input->post('satuan'),
                'harga' => $this->input->post('harga'),
                'jmlutkproduksi' => $this->input->post('jmlutkproduksi')
			);
 
		    $this->db->insert('bahan', $insert);
        }
        
        public function showBahan()
        {
            $this->db->select("bahan.id_bahan, bahan.nama_bahan,bahan.merk,bahan.stok_bahan,bahan.satuan, bahan.harga, bahan.jmlutkproduksi");
           
            $query = $this->db->get('bahan');
            return $query->result();
        }
        public function getBahanById($id_bahan)
        {
            $this->db->select("bahan.id_bahan, bahan.nama_bahan,bahan.merk,bahan.stok_bahan,bahan.satuan, bahan.harga, bahan.jmlutkproduksi");
            $this->db->where('id_bahan', $id_bahan);
            $query = $this->db->get('bahan');
            return $query->result();
        }
        public function editBahan($id_bahan)
        {
            $edit = array(
                'nama_bahan' => $this->input->post('nama_bahan'),
                'merk' => $this->input->post('merk'),
                'stok_bahan' => $this->input->post('stok_bahan'),
                'satuan' => $this->input->post('satuan'),
                'harga' => $this->input->post('harga'),
                'jmlutkproduksi' => $this->input->post('jmlutkproduksi') 
            );
            $this->db->where('id_bahan', $id_bahan);
            $this->db->update('bahan', $edit);
        }
	
        public function deleteBahan($id_bahan)
        {
            $this->db->where('id_bahan', $id_bahan);
            $this->db->delete('bahan');
        }
        
        function bahanTerdaftar($id_bahan) {
            $this->db->select('id_bahan');
            $this->db->from('bahan');
            $this->db->where('id_bahan', $id_bahan);
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