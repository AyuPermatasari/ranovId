<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Supplier extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Supplier_model');
            
        } 

        public function index()
        {
            $data['title'] = "Data supplier";
            $data['data_supplier'] = $this->Supplier_model->showSupplier();
            $this->load->view('headerAdmin/header',$data);
            $this->load->view('supplier/supplier',$data);
            $this->load->view('footerAdmin/footer',$data);
        }
        
        public function add()
        {
            $data['title'] = "Add supplier";
            $this->form_validation->set_rules('nama_supplier', 'nama_supplier', 'trim|required');
            
            $data['data_supplier'] = $this->Supplier_model->showSupplier();
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('supplier/supplier');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $this->Supplier_model->insertSupplier();
                $this->session->set_flashdata('sudah_input', 'supplier sudah ditambah!');	
                redirect('supplier','refresh');
            }
        }

        public function edit($id_supplier)
        {
            $data['title'] = "Edit supplier";
            $data['get_supplier']=$this->Supplier_model->getSupplierById($id_supplier);
            $this->form_validation->set_rules('nama_supplier', 'nama_supplier', 'trim|required');
            

            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('supplier/edit_supplier');
                $this->load->view('footerAdmin/footer', $data);
            }else{
                $this->Supplier_model->editSupplier($id_supplier);
                redirect('supplier','refresh');
            }
        }

        public function delete($id_supplier)
        {
                $terdaftar=$this->Supplier_model->supplierTerdaftar($id_supplier);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'supplier Berhasil Dihapus');
                    $this->Supplier_model->deleteSupplier($id_supplier);
                    redirect('supplier', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, supplier tersebut telah terdaftar! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('supplier','refresh');
                    
                }
        }

    }
    
    /* End of file supplier.php */
    

?>