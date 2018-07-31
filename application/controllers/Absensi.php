<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Absensi extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Absensi_model');
            
        } 

        public function index()
        {
            $data['title'] = "Data absensi";
            $data['pegawai']=$this->Absensi_model->getPegawai(); //get id pegawai
            $data['data_absensi'] = $this->Absensi_model->showAbsensi();
            $this->load->view('headerAdmin/header',$data);
            $this->load->view('absensi/absensi',$data);
            $this->load->view('footerAdmin/footer',$data);
        }
        
        public function add()
        {
            $data['title'] = "Add absensi";

            // $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required'); //wajib ada
            // $this->form_validation->set_rules('status', 'status', 'trim|required'); // wajib ada
            $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim|required'); //wajib ada

            $data['pegawai']=$this->Absensi_model->getPegawai();   //get id pegawai     
            $data['data_absensi'] = $this->Absensi_model->showAbsensi();

            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('absensi/absensi');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $this->Absensi_model->insertAbsensi();
                $this->session->set_flashdata('sudah_input', 'absensi sudah ditambah!');	
                redirect('absensi','refresh');
            }
        }

        public function edit($id_absensi)
        {
            $data['title'] = "Edit absensi";
            $data['get_absensi']=$this->Absensi_model->getAbsensiById($id_absensi);
            $data['pegawai']=$this->Absensi_model->getPegawai(); //wajib ada

            // $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required'); //wajib ada
            // $this->form_validation->set_rules('status', 'status', 'trim|required'); // wajib ada
            $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim|required'); //wajib ada

            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('absensi/edit_absensi');
                $this->load->view('footerAdmin/footer', $data);
            }else{
                $this->Absensi_model->editAbsensi($id_absensi);
                redirect('absensi','refresh');
            }
        }

        public function delete($id_absensi)
        {
                $terdaftar=$this->Absensi_model->absensiTerdaftar($id_absensi);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'absensi Berhasil Dihapus');
                    $this->Absensi_model->deleteAbsensi($id_absensi);
                    redirect('absensi', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, absensi tersebut telah terdaftar! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('absensi','refresh');
                    
                    
                }
        }

    }
    
    /* End of file absensi.php */
    

?>