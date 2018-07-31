<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Supplier_model extends CI_Model {
    
        public function insertSupplier()
	    {
		    $insert = array(
                'nama_supplier' => $this->input->post('nama_supplier'),
                'alamat_supplier' => $this->input->post('alamat_supplier'),
                'telp_supplier' => $this->input->post('telp_supplier')
                
			);
 
		    $this->db->insert('supplier', $insert);
        }
        
        public function showSupplier()
        {
            $this->db->select("supplier.id_supplier, supplier.nama_supplier,supplier.alamat_supplier,supplier.telp_supplier");
           
            $query = $this->db->get('supplier');
            return $query->result();
        }
        public function getSupplierById($id_supplier)
        {
            $this->db->select("supplier.id_supplier, supplier.nama_supplier,supplier.alamat_supplier,supplier.telp_supplier");
            $this->db->where('id_supplier', $id_supplier);
            $query = $this->db->get('supplier');
            return $query->result();
        }
        public function editSupplier($id_supplier)
        {
            $edit = array(
                'nama_supplier' => $this->input->post('nama_supplier'),
                'alamat_supplier' => $this->input->post('alamat_supplier'),
                'telp_supplier' => $this->input->post('telp_supplier')
            );
            $this->db->where('id_supplier', $id_supplier);
            $this->db->update('supplier', $edit);
        }
	
        public function deletesupplier($id_supplier)
        {
            $this->db->where('id_supplier', $id_supplier);
            $this->db->delete('supplier');
        }
        
        function supplierTerdaftar($id_supplier) {
            $this->db->select('id_supplier');
            $this->db->from('supplier');
            $this->db->where('id_supplier', $id_supplier);
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