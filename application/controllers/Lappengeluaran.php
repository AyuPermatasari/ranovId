<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Lappengeluaran extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Lappengeluaran_model');
            
        } 

        public function index()
        {
            $data['title'] = "Data lappengeluaran";
            $data['lappenggajian']=$this->Lappengeluaran_model->getLappenggajian();
            $data["transaksibhn"] = $this->Lappengeluaran_model->getTransaksibhn();
            $data["produksi"] = $this->Lappengeluaran_model->getProduksi();
            $data['data_lappengeluaran'] = $this->Lappengeluaran_model->showLappengeluaran();
            $this->load->view('headerAdmin/header',$data);
            $this->load->view('lappengeluaran/lappengeluaran',$data);
            $this->load->view('footerAdmin/footer',$data);
        }
        
        public function add()
        {
            $data['title'] = "Add lappengeluaran";
            // $this->form_validation->set_rules('nama_lappengeluaran', 'nama_lappengeluaran', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
            $this->form_validation->set_rules('id_lappenggajian', 'id_lappenggajian', 'trim|required');
            $this->form_validation->set_rules('id_transaksibhn', 'id_transaksibhn', 'trim|required');
            $this->form_validation->set_rules('id_produksi', 'id_produksi', 'trim|required');

            $data['data_lappengeluaran'] = $this->Lappengeluaran_model->showLappengeluaran();
            $data['lappenggajian']=$this->Lappengeluaran_model->getLappenggajian();
            $data["transaksibhn"] = $this->Lappengeluaran_model->getTransaksibhn();
            $data["produksi"] = $this->Lappengeluaran_model->getProduksi();

            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('lappengeluaran/lappengeluaran');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $this->Lappengeluaran_model->insertlappengeluaran();
                $this->session->set_flashdata('sudah_input', 'lappengeluaran sudah ditambah!');	
                redirect('lappengeluaran','refresh');
            }
        }

        public function edit($id_lappengeluaran)
        {
            $data['title'] = "Edit lappengeluaran";
            $data['get_lappengeluaran']=$this->Lappengeluaran_model->getlappengeluaranById($id_lappengeluaran);
            $this->form_validation->set_rules('id_lappenggajian', 'id_lappenggajian', 'trim|required');
            $this->form_validation->set_rules('id_transaksibhn', 'id_transaksibhn', 'trim|required');
            $this->form_validation->set_rules('id_produksi', 'id_produksi', 'trim|required');
            // $this->form_validation->set_rules('nama_lappengeluaran', 'nama_lappengeluaran', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
            $data['lappenggajian']=$this->Lappengeluaran_model->getLappenggajian();
            $data["transaksibhn"] = $this->Lappengeluaran_model->getTransaksibhn();
            $data["produksi"] = $this->Lappengeluaran_model->getProduksi();

            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('lappengeluaran/edit_lappengeluaran');
                $this->load->view('footerAdmin/footer', $data);
            }else{
                $this->Lappengeluaran_model->editLappengeluaran($id_lappengeluaran);
                redirect('lappengeluaran','refresh');
            }
        }

        public function delete($id_lappengeluaran)
        {
                $terdaftar=$this->Lappengeluaran_model->lappengeluaranTerdaftar($id_lappengeluaran);
                if ($terdaftar) {
                     $this->session->set_flashdata('terhapus', 'lappengeluaran Berhasil Dihapus');
                    $this->Lappengeluaran_model->deleteLappengeluaran($id_lappengeluaran);
                    redirect('lappengeluaran', 'refresh');
                    
                    
                } else {
                   $this->session->set_flashdata('fail', 'Tidak dapat menghapus, lappengeluaran tersebut telah terdaftar! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('lappengeluaran','refresh');
                }
        }

    }
    
    /* End of file lappengeluaran.php */
    

?>