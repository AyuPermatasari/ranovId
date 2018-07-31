<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pegawai_model extends CI_Model {

		public function insertPegawai()
		{
			$insert = array(
					'nama_pegawai' => $this->input->post('nama_pegawai'),
					'alamat_pegawai' => $this->input->post('alamat_pegawai'),
					'nohp_pegawai' => $this->input->post('nohp_pegawai'),
					'id_jabatan' => $this->input->post('id_jabatan')
				);
			$this->db->insert('pegawai', $insert);
		}

		public function showPegawai()
		{
			$this->db->select("pegawai.id_pegawai, pegawai.nama_pegawai, pegawai.alamat_pegawai, pegawai.nohp_pegawai, jabatan.id_jabatan, jabatan.nama_jabatan");
			$this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan', 'left');
			$this->db->order_by('nama_pegawai', 'desc');
			$query = $this->db->get('pegawai');
			return $query->result();
		}

		public function getJabatan()
		{
			$this->db->select("id_jabatan, nama_jabatan");
			$query = $this->db->get('jabatan');
			return $query->result();
		}

		public function getPegawaiById($id_pegawai)
		{
			$this->db->select("id_pegawai, nama_pegawai, alamat_pegawai, nohp_pegawai, id_jabatan");
			$this->db->where('id_pegawai', $id_pegawai);
			$query = $this->db->get('pegawai');
			return $query->result();
		}

		public function editPegawai($id_pegawai)
		{
			$edit = array(
				'nama_pegawai' => $this->input->post('nama_pegawai'), 
				'alamat_pegawai' => $this->input->post('alamat_pegawai'),
				'nohp_pegawai' => $this->input->post('nohp_pegawai'),
				'id_jabatan' => $this->input->post('id_jabatan'),
			);
			$this->db->where('id_pegawai', $id_pegawai);
			$this->db->update('pegawai', $edit);
		}

		public function deletePegawai($id_pegawai)
		{
			$this->db->where('id_pegawai', $id_pegawai);
			$this->db->delete('pegawai');
		}

		function pegawaiTerdaftar($id_pegawai) {
			$this->db->select('id_pegawai');
			$this->db->from('admin', 'laporan_penggajian', 'kurir', 'absensi');
			$this->db->where('id_pegawai', $id_pegawai);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

	}
?>
