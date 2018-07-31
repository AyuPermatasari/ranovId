<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Transaksibhn extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Transaksibhn_model');
            
        } 

        public function index()
        {
            $data['title'] = "Data transaksibhn";
            $data['supplier']=$this->Transaksibhn_model->getSupplier();
            $data["bahan"] = $this->Transaksibhn_model->getBahan();
            $data['data_transaksibhn'] = $this->Transaksibhn_model->showTransaksibhn();
            $this->load->view('headerAdmin/header',$data);
            $this->load->view('transaksibhn/transaksibhn',$data);
            $this->load->view('footerAdmin/footer',$data);
        }
        
        public function add()
        {
            $data['title'] = "Add transaksibhn";
            // $this->form_validation->set_rules('nama_transaksibhn', 'nama_transaksibhn', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
            $this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim|required');
            $this->form_validation->set_rules('id_bahan', 'id_bahan', 'trim|required');
            $data['data_transaksibhn'] = $this->Transaksibhn_model->showTransaksibhn();
             $data['supplier']=$this->Transaksibhn_model->getSupplier();
            $data["bahan"] = $this->Transaksibhn_model->getBahan();

            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('transaksibhn/transaksibhn');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $this->Transaksibhn_model->insertTransaksibhn();
                $this->session->set_flashdata('sudah_input', 'transaksibhn sudah ditambah!');	
                redirect('transaksibhn','refresh');
            }
        }

        public function edit($id_transaksibhn)
        {
            $data['title'] = "Edit transaksibhn";
            $data['get_transaksibhn']=$this->Transaksibhn_model->getTransaksibhnById($id_transaksibhn);
            $this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim|required');
            $this->form_validation->set_rules('id_bahan', 'id_bahan', 'trim|required');
            // $this->form_validation->set_rules('nama_transaksibhn', 'nama_transaksibhn', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
             $data['supplier']=$this->Transaksibhn_model->getSupplier();
            $data["bahan"] = $this->Transaksibhn_model->getBahan();

            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('transaksibhn/edit_transaksibhn');
                $this->load->view('footerAdmin/footer', $data);
            }else{
                $this->Transaksibhn_model->editTransaksibhn($id_transaksibhn);
                redirect('transaksibhn','refresh');
            }
        }

        public function delete($id_transaksibhn)
        {
                $terdaftar=$this->Transaksibhn_model->transaksibhnTerdaftar($id_transaksibhn);
                if ($terdaftar) {
                     $this->session->set_flashdata('terhapus', 'transaksibhn Berhasil Dihapus');
                    $this->Transaksibhn_model->deleteTransaksibhn($id_transaksibhn);
                    redirect('transaksibhn', 'refresh');
                    
                    
                } else {
                   $this->session->set_flashdata('fail', 'Tidak dapat menghapus, transaksibhn tersebut telah terdaftar! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('transaksibhn','refresh');
                }
        }

    }
    
    /* End of file transaksibhn.php */
    

?>