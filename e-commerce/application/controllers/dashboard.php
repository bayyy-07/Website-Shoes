<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

//fungsi Default pada controllers 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('D_produk');
        
        
    }



    public function index() {
        // ['dashboard'] = 'Dashboard';
        // ['e-commerce'] = $this->Model_produk->cekData(['id' => $this->session->userdata('email')])->row_array();
        // ['anggota'] = $this->Mode_produk->getUserLimit()->result_array();

        $queryAllProduk = $this->D_produk->tampilProduk();
        $Data = array('queryAllPdk' =>$queryAllProduk);


        $this->load->view('Dashboard/template/header', );   
        $this->load->view('Dashboard/template/sidebar', );   
         
        $this->load->view('Dashboard/template/topbar', ); 
        $this->load->view('Dashboard/index', $Data);
        $this->load->view('Dashboard/template/footer', );



    }

    public function detailProduk() {
        $id = $this->uri->segment(3);
        $produk = $this->D_produk->joinKategoriProduk(['produk.id_produk' => $id])->result();
        $data['user'] = "Pengunjung"; 
        $data['title'] = "Detail Produk";
    
        foreach ($produk as $fields) {
            $data['nama_produk'] = $fields->nama_produk;
            $data['harga'] = $fields->harga;
            $data['warna'] = $fields->warna;
            $data['size'] = $fields->size;
            $data['image'] = $fields->image;
            $data['id'] = $id;
    }
    $this->load->view('Detail_produk/template/header', );   
    $this->load->view('Detail_produk/template/topbar', ); 
    $this->load->view('Detail_produk/index', $data);
    $this->load->view('Detail_produk/template/footer', ); 
}

    
}