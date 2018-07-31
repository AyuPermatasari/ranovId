<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Produksi extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Produksi_model');
            
        } 

        public function index()
        {
            $data['title'] = "Data produksi";
             $data['bahan']=$this->Produksi_model->getBahan();
              $data['produk']=$this->Produksi_model->getProduk();
            $data['data_produksi'] = $this->Produksi_model->showProduksi();
            $this->load->view('headerAdmin/header',$data);
            $this->load->view('produksi/produksi',$data);
            $this->load->view('footerAdmin/footer',$data);
        }
        
        public function add()
        {
            $data['title'] = "Add produksi";
            // $this->form_validation->set_rules('nama_produksi', 'nama_produksi', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
             $this->form_validation->set_rules('id_produk', 'id_produk', 'trim|required');
              $this->form_validation->set_rules('id_bahan', 'id_bahan', 'trim|required');

            $data['data_produksi'] = $this->Produksi_model->showProduksi();
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('produksi/produksi');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $this->Produksi_model->insertProduksi();
                $this->session->set_flashdata('sudah_input', 'produksi sudah ditambah!');	
                redirect('produksi','refresh');
            }
        }

        public function edit($id_produksi)
        {
            $data['title'] = "Edit produksi";
            $data['get_produksi']=$this->Produksi_model->getProduksiById($id_produksi);
            // $this->form_validation->set_rules('nama_produksi', 'nama_produksi', 'trim|required');
            $this->form_validation->set_rules('id_produk', 'id_produk', 'trim|required');
              $this->form_validation->set_rules('id_bahan', 'id_bahan', 'trim|required');
               $data['bahan']=$this->Produksi_model->getBahan();
              $data['produk']=$this->Produksi_model->getProduk();
            
            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('produksi/edit_produksi');
                $this->load->view('footerAdmin/footer', $data);
            }else{
                $this->Produksi_model->editProduksi($id_produksi);
                redirect('produksi','refresh');
            }
        }

        public function delete($id_produksi)
        {
                $terdaftar=$this->Produksi_model->produksiTerdaftar($id_produksi);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'produksi Berhasil Dihapus');
                    $this->Produksi_model->deleteProduksi($id_produksi);
                    redirect('produksi', 'refresh');
                    
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, produksi tersebut telah terdaftar! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('produksi','refresh');
                }
        }

    }
    
    /* End of file produksi.php */
    

?>