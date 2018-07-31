<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class lappemasukan extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Lappemasukan_model');
            
        } 

        public function index()
        {
            $data['title'] = "Data lappemasukan";
            $data['transaksi']=$this->Lappemasukan_model->getTransaksi();
            // $data['kurir']=$this->lappemasukan_model->getKurir();
            $data['data_lappemasukan'] = $this->Lappemasukan_model->showLappemasukan();
            $this->load->view('headerAdmin/header',$data);
            $this->load->view('lappemasukan/lappemasukan',$data);
            $this->load->view('footerAdmin/footer',$data);
        }
        
        public function add()
        {
            $data['title'] = "Add lappemasukan";
            // $this->form_validation->set_rules('nama_lappemasukan', 'nama_lappemasukan', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
            $this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim|required');
            // $this->form_validation->set_rules('id_kurir', 'id_kurir', 'trim|required');

            $data['data_lappemasukan'] = $this->Lappemasukan_model->showLappemasukan();
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('lappemasukan/lappemasukan');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $this->Lappemasukan_model->insertLappemasukan();
                $this->session->set_flashdata('sudah_input', 'laporan pemasukan sudah ditambah!');	
                redirect('lappemasukan','refresh');
            }
        }

        public function edit($id_lappemasukan)
        {
            $data['title'] = "Edit lappemasukan";
            $data['get_lappemasukan']=$this->Lappemasukan_model->getLappemasukanById($id_lappemasukan);
            // $this->form_validation->set_rules('nama_lappemasukan', 'nama_lappemasukan', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
            $this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim|required');
            // $this->form_validation->set_rules('id_kurir', 'id_kurir', 'trim|required');

            $data['transaksi']=$this->Lappemasukan_model->getTransaksi();
            // $data['kurir']=$this->lappemasukan_model->getKurir();

            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('lappemasukan/edit_lappemasukan');
                $this->load->view('footerAdmin/footer', $data);
            }else{
                $this->Lappemasukan_model->editLappemasukan($id_lappemasukan);
                redirect('lappemasukan','refresh');
            }
        }

        public function delete($id_lappemasukan)
        {
                $terdaftar=$this->Lappemasukan_model->lappemasukanTerdaftar($id_lappemasukan);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'lappemasukan Berhasil Dihapus');
                    $this->Lappemasukan_model->deleteLappemasukan($id_lappemasukan);
                    redirect('lappemasukan', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, lappemasukan tersebut telah terdaftar! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('lappemasukan','refresh');
                    
                    
                }
        }

    }
    
    /* End of file lappemasukan.php */
    

?>