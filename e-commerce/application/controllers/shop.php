<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

//fungsi Default pada controllers 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('D_produk');
        $this->load->model('D_user');

        $this->load->model('D_keranjang');
    }
        
    



    public function index() {
    $data = [
        'queryAllPdk' => $this->D_produk->tampilProdukShop()->result(),];
            //jika sudah login dan jika belum login
            if ($this->session->userdata('email')) 
            {
                $user = $this->D_user->cekData(['email' => $this->session->userdata('email')])->row_array(); 

                $data['user'] = $user['nama'];
                $this->load->view('Shop/template/header' );   
                $this->load->view('Shop/template/sidebar' );   
                
                $this->load->view('Shop/template/topbar' ); 
                $this->load->view('Shop/index', $data);
                $this->load->view('Shop/template/footer' );

            } else {
                $data['user'] = 'customer';
                $this->load->view('Shop/template/header', );   
                $this->load->view('Shop/template/sidebar', );   
                
                $this->load->view('Shop/template/topbar', ); 
                $this->load->view('Shop/index', $data);
                $this->load->view('Shop/template/footer', );
            }
                
                    



    }

    public function kategori_brand($id_brand) {
        
        $brand = $this->D_produk->get_produk_brand($id_brand);
        $DATA = array('prdk' => $brand);

        $this->load->view('Shop/template/header', );   
        $this->load->view('Shop/template/sidebar', );   
         
        $this->load->view('Shop/template/topbar', ); 
        $this->load->view('Shop/brand_selection', $DATA);
        $this->load->view('Shop/template/footer', );


    }

    
    public function kategori_hargaDown() {
        
        $harga = $this->D_produk->get_kategori_hargaDown();
        $hrg = array('allPdkharga' => $harga);

        $this->load->view('Shop/template/header', );   
        $this->load->view('Shop/template/sidebar', );   
         
        $this->load->view('Shop/template/topbar', ); 
        $this->load->view('Shop/harga_down', $hrg);
        $this->load->view('Shop/template/footer', );


    }
    public function kategori_hargaUP() {
        
        $harga = $this->D_produk->get_kategori_hargaUP();
        $hrg = array('allPdkhargaUP' => $harga);

        $this->load->view('Shop/template/header', );   
        $this->load->view('Shop/template/sidebar', );   
         
        $this->load->view('Shop/template/topbar', ); 
        $this->load->view('Shop/harga_up', $hrg);
        $this->load->view('Shop/template/footer', );


    }




    public function kategori_warna($id_warna) {
        
        $warna = $this->D_produk->get_produk_warna($id_warna);
        $MBS = array('allPdkwarna' => $warna);

        $this->load->view('Shop/template/header', );   
        $this->load->view('Shop/template/sidebar', );   
         
        $this->load->view('Shop/template/topbar', ); 
        $this->load->view('Shop/warna_selection', $MBS);
        $this->load->view('Shop/template/footer', );


    }

// Ambil Data Search
public function search(){
	
	$keyword = $this->input->post('keyword');
	$data['Search']= $this->D_produk->get_produk_keyword($keyword);
	$this->load->view('Shop/template/header', );   
    $this->load->view('Shop/template/sidebar', );  
	$this->load->view('Shop/template/topbar', );

    $this->load->view('Shop/search', $data);
	$this->load->view('Shop/template/footer', );
}





    



}