<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kurir_model extends CI_Model {
    
        public function insertKurir()
	{
		$insert = array(
				'id_pegawai' => $this->input->post('id_pegawai'),
			);
		$this->db->insert('kurir', $insert);
	}
	public function showKurir()
	{
		$this->db->select("kurir.id_kurir,  pegawai.id_pegawai, pegawai.nama_pegawai");
		$this->db->join('pegawai', 'pegawai.id_pegawai = kurir.id_pegawai', 'left');
		$this->db->order_by('nama_pegawai', 'desc');
		$query = $this->db->get('kurir');
		return $query->result();
	}
	public function getPegawai()
	{
		$this->db->select("id_pegawai, nama_pegawai");
		$query = $this->db->get('pegawai');
		return $query->result();
	}
	public function getKurirById($id_kurir)
	{
		$this->db->select("id_kurir, id_pegawai");
		$this->db->where('id_kurir', $id_kurir);
		$query = $this->db->get('kurir');
		return $query->result();
	}
	public function editKurir($id_kurir)
	{
		$edit = array(
			
			'id_pegawai' => $this->input->post('id_pegawai'),
		);
		$this->db->where('id_kurir', $id_kurir);
		$this->db->update('kurir', $edit);
	}
	
	public function deleteKurir($id_kurir)
    {
	 	$this->db->where('id_kurir', $id_kurir);
	 	$this->db->delete('kurir');
	}
	function kurirTerdaftar($id_kurir) {
	    $this->db->select('id_kurir');
	    $this->db->from('kurir');
	    $this->db->where('id_kurir', $id_kurir);
	    $query = $this->db->get();
	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
    
    }
    
    /* End of file Kurir_model.php */
    
?>