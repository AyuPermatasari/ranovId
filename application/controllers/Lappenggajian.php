<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Lappenggajian extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Lappenggajian_model');
            
        } 

        public function index()
        {
            $data['title'] = "Data lappenggajian";
            $data['pegawai']=$this->Lappenggajian_model->getPegawai();
            // $data["jabatan"] = $this->Lappenggajian_model->getJabatan();
            $data['data_lappenggajian'] = $this->Lappenggajian_model->showLappenggajian();
            $this->load->view('headerAdmin/header',$data);
            $this->load->view('lappenggajian/lappenggajian',$data);
            $this->load->view('footerAdmin/footer',$data);
        }
        
        public function add()
        {
            $data['title'] = "Add lappenggajian";
            // $this->form_validation->set_rules('nama_lappenggajian', 'nama_lappenggajian', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
            $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim|required');
            // $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'trim|required');
            $data['data_lappenggajian'] = $this->Lappenggajian_model->showLappenggajian();
            $data['pegawai']=$this->Lappenggajian_model->getPegawai();
            // $data["jabatan"] = $this->Lappenggajian_model->getJabatan();

            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('lappenggajian/lappenggajian');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $this->Lappenggajian_model->insertLappenggajian();
                $this->session->set_flashdata('sudah_input', 'lappenggajian sudah ditambah!');	
                redirect('lappenggajian','refresh');
            }
        }

        public function edit($id_lappenggajian)
        {
            $data['title'] = "Edit lappenggajian";
            $data['get_lappenggajian']=$this->Lappenggajian_model->getLappenggajianById($id_lappenggajian);
            $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim|required');
            // $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'trim|required');
            // $this->form_validation->set_rules('nama_lappenggajian', 'nama_lappenggajian', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
            $data['pegawai']=$this->Lappenggajian_model->getPegawai();
            // $data["jabatan"] = $this->Lappenggajian_model->getJabatan();

            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('lappenggajian/edit_lappenggajian');
                $this->load->view('footerAdmin/footer', $data);
            }else{
                $this->Lappenggajian_model->editLappenggajian($id_lappenggajian);
                redirect('lappenggajian','refresh');
            }
        }

        public function delete($id_lappenggajian)
        {
                $terdaftar=$this->Lappenggajian_model->lappenggajianTerdaftar($id_lappenggajian);
                if ($terdaftar) {
                     $this->session->set_flashdata('terhapus', 'lappenggajian Berhasil Dihapus');
                    $this->Lappenggajian_model->deleteLappenggajian($id_lappenggajian);
                    redirect('lappenggajian', 'refresh');
                    
                    
                } else {
                   $this->session->set_flashdata('fail', 'Tidak dapat menghapus, lappenggajian tersebut telah terdaftar! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('lappenggajian','refresh');
                }
        }

    }
    
    /* End of file lappenggajian.php */
    

?>