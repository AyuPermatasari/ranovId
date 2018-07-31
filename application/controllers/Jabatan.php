<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Jabatan extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Jabatan_model');
            
        } 

        public function index()
        {
            $data['title'] = "Data Jabatan";
            $data['data_jabatan'] = $this->Jabatan_model->showJabatan();
            $this->load->view('headerAdmin/header',$data);
            $this->load->view('jabatan/jabatan',$data);
            $this->load->view('footerAdmin/footer',$data);
        }
        
        public function add()
        {
            $data['title'] = "Add Jabatan";
            $this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'trim|required');
            $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');
            $data['data_jabatan'] = $this->Jabatan_model->showJabatan();
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('jabatan/jabatan');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $this->Jabatan_model->insertJabatan();
                $this->session->set_flashdata('sudah_input', 'Jabatan sudah ditambah!');	
                redirect('Jabatan','refresh');
            }
        }

        public function edit($id_jabatan)
        {
            $data['title'] = "Edit Jabatan";
            $data['get_jabatan']=$this->Jabatan_model->getJabatanById($id_jabatan);
            $this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'trim|required');
            $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');

            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('jabatan/edit_jabatan');
                $this->load->view('footerAdmin/footer', $data);
            }else{
                $this->Jabatan_model->editJabatan($id_jabatan);
                redirect('Jabatan','refresh');
            }
        }

        public function delete($id_jabatan)
        {
                $terdaftar=$this->Jabatan_model->jabatanTerdaftar($id_jabatan);
                if ($terdaftar) {
                     $this->session->set_flashdata('terhapus', 'Jabatan Berhasil Dihapus');
                    $this->Jabatan_model->deleteJabatan($id_jabatan);
                    redirect('Jabatan', 'refresh');
                    
                } else {
                   $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Jabatan tersebut telah terdaftar! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('Jabatan','refresh');
                }
        }

    }
    
    /* End of file Jabatan.php */
    

?>