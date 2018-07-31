<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Produk extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Produk_model');
            
        } 

        public function index()
        {
            $data['title'] = "Data produk";
            $data['data_produk'] = $this->Produk_model->showProduk();
            $this->load->view('headerAdmin/header',$data);
            $this->load->view('produk/produk',$data);
            $this->load->view('footerAdmin/footer',$data);
        }
        
        public function add()
        {
            $data['title'] = "Add produk";
            $this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required');
            
            $data['data_produk'] = $this->Produk_model->showProduk();
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('produk/produk');
                $this->load->view('footerAdmin/footer', $data);
            } else { 
                $config['upload_path'] = './assets/uploads/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']  = 100000;
                $config['max_width']  = 200000;
                $config['max_height']  = 100000;
                
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('userfile')){
                    $data['error'] = $this->upload->display_errors();
                    redirect('produk','refresh');
                }
                else{
                    $image_data = $this->upload->data();

                    $configer = array (
                        'image_library' => 'gd2',
                        'source_image' => $image_data['full_path'],
                        'maintain_ratio' => TRUE,
                        'width' => 500,
                        'height' => 768,
                        );

                    $this->load->library('image_lib', $config);
                    $this->image_lib->clear();
                    $this->image_lib->initialize($configer);
                    $this->image_lib->resize();

                $this->Produk_model->insertProduk();
                $this->session->set_flashdata('sudah_input', 'produk sudah ditambah!');	
                redirect('produk','refresh');
            }

            }


        }

        public function edit($id_produk)
        {
            $data['title'] = "Edit produk";
            $data['get_produk']=$this->Produk_model->getProdukById($id_produk);
            $this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required');
            // $this->form_validation->set_rules('gaji', 'gaji', 'trim|required');

            if($this->form_validation->run()==FALSE){
                $this->load->view('headerAdmin/header', $data);
                $this->load->view('produk/edit_produk');
                $this->load->view('footerAdmin/footer', $data);


            }else{
                $config['upload_path'] = './assets/uploads/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']  = 100000;
                $config['max_width']  = 200000;
                $config['max_height']  = 100000;
                
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('userfile')){
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('produk/edit_produk', $data);
                }
                else{
                    $image_data = $this->upload->data();

                    $configer = array (
                        'image_library' => 'gd2',
                        'source_image' => $image_data['full_path'],
                        'maintain_ratio' => TRUE,
                        'width' => 500,
                        'height' => 768,
                        );

                    $this->load->library('image_lib', $config);
                    $this->image_lib->clear();
                    $this->image_lib->initialize($configer);
                    $this->image_lib->resize();

                    $this->Produk_model->editProduk($id_produk);
                    redirect('produk','refresh');
                }
            }
        }

        public function delete($id_produk,$foto)
        {
                $terdaftar=$this->Produk_model->produkTerdaftar($id_produk);
                if ($terdaftar) {
                    $this->session->set_flashdata('terhapus', 'produk Berhasil Dihapus');
                    $this->Produk_model->deleteProduk($id_produk);
                    redirect('produk', 'refresh');
                   
                } else {
                     $this->session->set_flashdata('fail', 'Tidak dapat menghapus, produk tersebut telah terdaftar! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('produk','refresh');   
                }
        }

    }
    
    /* End of file produk.php */
    

?>