<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OfficialStore extends CI_Controller {

//fungsi Default pada controllers 
    public function __construct()
    {
        parent::__construct();
        
        
    }



    public function index() {
        // ['OfficialStore'] = 'OfficialStore';
        // ['e-commerce'] = $this->Model_produk->cekData(['id' => $this->session->userdata('email')])->row_array();
        // ['anggota'] = $this->Mode_produk->getUserLimit()->result_array();

        // ['produk'] = $this->Model_produk->getProduk()->result_array();
        
        $this->load->view('OfficialStore/template/header', );   
        $this->load->view('OfficialStore/template/sidebar', );   
         
        $this->load->view('OfficialStore/template/topbar', ); 
        $this->load->view('OfficialStore/index', );
        $this->load->view('OfficialStore/template/footer', );



    }



}