<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kurir extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Kurir_model');
            
        } 

        public function index()
        {
            $data['title'] = "Data Kurir";
            $data['pegawai']=$this->Kurir_model->getPegawai(); //get id pegawai
            $data['data_kurir'] = $this->Kurir_model->showKurir();
            $this->load->view('headerAdmin/header',$data);
            $this->load->view('kurir/kurir',$data);
            $this->load->view('footerAdmin/footer',$data);
        }
        
        public function add()
        {
            $data['title'] = "Add Kurir";

            // $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required'); //wajib ada
            // $this->form_validation->set_rules('status', 'status', 'trim|required'); // wajib ada
            $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim|required'); //wajib ada

            $data['pegawai']=$this->Kurir_model->getPegawai();   //get id pegawai     
            $data['data_kurir'] = $this->Kurir_model->showKurir();

            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('kurir/kurir');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $this->Kurir_model->insertKurir();
                $this->session->set_flashdata('sudah_input', 'kurir sudah ditambah!');	
                redirect('kurir','refresh');
            }
        }

        public function edit($id_kurir)
        {
            $data['title'] = "Edit kurir";
            $data['get_kurir']=$this->Kurir_model->getKurirById($id_kurir);
            $data['pegawai']=$this->Kurir_model->getPegawai();

            // $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required'); //wajib ada
            // $this->form_validation->set_rules('status', 'status', 'trim|required'); // wajib ada
            $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim|required'); //wajib ada

            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('kurir/edit_kurir');
                $this->load->view('footerAdmin/footer', $data);
            }else{
                $this->Kurir_model->editKurir($id_kurir);
                redirect('kurir','refresh');
            }
        }

        public function delete($id_kurir)
        {
                $terdaftar=$this->Kurir_model->kurirTerdaftar($id_kurir);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'Kurir Berhasil Dihapus');
                    $this->Kurir_model->deleteKurir($id_kurir);
                    redirect('Kurir', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Kurir tersebut telah terdaftar! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('kurir','refresh');
                }
        }
    
    }
    
    /* End of file Kurir.php */
    
?>