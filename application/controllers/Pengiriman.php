<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pengiriman extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Pengiriman_model');
            
        } 

        public function index()
        {
            $data['title'] = "Data pengiriman";
            $data['transaksi']=$this->Pengiriman_model->getTransaksi();
            $data['kurir']=$this->Pengiriman_model->getKurir();
            $data['data_pengiriman'] = $this->Pengiriman_model->showPengiriman();
            $this->load->view('headerAdmin/header',$data);
            $this->load->view('pengiriman/pengiriman',$data);
            $this->load->view('footerAdmin/footer',$data);
        }
        
        public function add()
        {
            $data['title'] = "Add pengiriman";
            // $this->form_validation->set_rules('nama_pengiriman', 'nama_pengiriman', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
            $this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim|required');
            $this->form_validation->set_rules('id_kurir', 'id_kurir', 'trim|required');

            $data['data_pengiriman'] = $this->Pengiriman_model->showPengiriman();
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('pengiriman/pengiriman');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $this->Pengiriman_model->insertPengiriman();
                $this->session->set_flashdata('sudah_input', 'pengiriman sudah ditambah!');	
                redirect('pengiriman','refresh');
            }
        }

        public function edit($id_pengiriman)
        {
            $data['title'] = "Edit pengiriman";
            $data['get_pengiriman']=$this->Pengiriman_model->getPengirimanById($id_pengiriman);
            // $this->form_validation->set_rules('nama_pengiriman', 'nama_pengiriman', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
            $this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim|required');
            $this->form_validation->set_rules('id_kurir', 'id_kurir', 'trim|required');

            $data['transaksi']=$this->Pengiriman_model->getTransaksi();
            $data['kurir']=$this->Pengiriman_model->getKurir();

            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('pengiriman/edit_pengiriman');
                $this->load->view('footerAdmin/footer', $data);
            }else{
                $this->Pengiriman_model->editPengiriman($id_pengiriman);
                redirect('pengiriman','refresh');
            }
        }

        public function delete($id_pengiriman)
        {
                $terdaftar=$this->Pengiriman_model->pengirimanTerdaftar($id_pengiriman);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'pengiriman Berhasil Dihapus');
                    $this->Pengiriman_model->deletePengiriman($id_pengiriman);
                    redirect('pengiriman', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, pengiriman tersebut telah terdaftar! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('pengiriman','refresh');
                    
                    
                }
        }

    }
    
    /* End of file pengiriman.php */
    

?>