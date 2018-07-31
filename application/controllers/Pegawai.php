<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pegawai extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Pegawai_model');
        }

        public function index()
        {
            // $data['title'] = "Data Pegawai";
            $data["jabatan"] = $this->Pegawai_model->getJabatan();
            $data['data_pegawai'] = $this->Pegawai_model->showPegawai();
            $this->load->view('headerAdmin/header', $data);
            $this->load->view('pegawai/pegawai', $data);
            $this->load->view('footerAdmin/footer', $data);
        }

        public function add()
        {
            $data['title'] = "Add Pegawai";
            $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'trim|required');
            $this->form_validation->set_rules('alamat_pegawai', 'alamat_pegawai', 'trim|required');
            $this->form_validation->set_rules('nohp_pegawai', 'nohp_pegawai', 'trim|required|numeric');
            $data["jabatan"] = $this->Pegawai_model->getJabatan();
            $data['data_pegawai'] = $this->Pegawai_model->showPegawai();
    
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('pegawai/pegawai');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $this->Pegawai_model->insertPegawai();
                $this->session->set_flashdata('sudah_input', 'Pegawai sudah ditambah!');	
                redirect('Pegawai','refresh');
            }
        }

        public function edit($id_pegawai)
        {
            $data['title'] = "Edit Pegawai";
            $data['get_pegawai']=$this->Pegawai_model->getPegawaiById($id_pegawai);
            $data["jabatan"] = $this->Pegawai_model->getJabatan();
            $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'trim|required');
            $this->form_validation->set_rules('alamat_pegawai', 'alamat_pegawai', 'trim|required');
            $this->form_validation->set_rules('nohp_pegawai', 'nohp_pegawai', 'trim|required|numeric');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('pegawai/edit_pegawai');
                $this->load->view('footerAdmin/footer', $data);
            }else{
                $this->Pegawai_model->editPegawai($id_pegawai);
                redirect('Pegawai','refresh');
            }
        }

        public function delete($id_pegawai)
        {
            $terdaftar=$this->Pegawai_model->pegawaiTerdaftar($id_pegawai);
            if ($terdaftar) {
                $this->session->set_flashdata('fail', 'Tidak dapat menghapus, pegawai tersebut telah terdaftar dalam Pegawai! Silahkan hapus pegawai yang bersangkutan terlebih dahulu.');
                redirect('pegawai','refresh');
               
            } else {
                 $this->session->set_flashdata('terhapus', 'Pegawai Berhasil Dihapus');
                $this->Pegawai_model->deletePegawai($id_pegawai);
                redirect('Pegawai', 'refresh');
                
            }
        }

    
    }
    
    /* End of file Pegawai.php */
    
?>