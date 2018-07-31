<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Bahan extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Bahan_model');
            
        } 

        public function index()
        {
            $data['title'] = "Data bahan";
            $data['data_bahan'] = $this->Bahan_model->showBahan();
            $this->load->view('headerAdmin/header',$data);
            $this->load->view('bahan/bahan',$data);
            $this->load->view('footerAdmin/footer',$data);
        }
        
        public function add()
        {
            $data['title'] = "Add bahan";
            $this->form_validation->set_rules('nama_bahan', 'nama_bahan', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
            $data['data_bahan'] = $this->Bahan_model->showBahan();
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('bahan/bahan');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $this->Bahan_model->insertBahan();
                $this->session->set_flashdata('sudah_input', 'bahan sudah ditambah!');	
                redirect('bahan','refresh');
            }
        }

        public function edit($id_bahan)
        {
            $data['title'] = "Edit bahan";
            $data['get_bahan']=$this->Bahan_model->getBahanById($id_bahan);
            $this->form_validation->set_rules('nama_bahan', 'nama_bahan', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');

            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('bahan/edit_bahan');
                $this->load->view('footerAdmin/footer', $data);
            }else{
                $this->Bahan_model->editBahan($id_bahan);
                redirect('bahan','refresh');
            }
        }

        public function delete($id_bahan)
        {
                $terdaftar=$this->Bahan_model->bahanTerdaftar($id_bahan);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'bahan Berhasil Dihapus');
                    $this->Bahan_model->deleteBahan($id_bahan);
                    redirect('bahan', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, bahan tersebut telah terdaftar! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('bahan','refresh');
                }
        }

    }
    
    /* End of file bahan.php */
    

?>