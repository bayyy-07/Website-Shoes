<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed'); 
date_default_timezone_set('Asia/Jakarta');
use Midtrans\Config;
use Midtrans\Snap;
class keranjang extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('D_keranjang', 'D_user');
        cek_login();

        $this->load->helper('url');
        
        // Debugging path
        if (!file_exists(FCPATH . 'vendor/autoload.php')) {
            show_error('Autoload file not found at ' . FCPATH . 'vendor/autoload.php');
        }

        // Load Composer autoload
        require_once FCPATH . 'vendor/autoload.php';
    }
    
    public function index()
    {
        
       
        $id = ['keranjang.id_user' => $this->uri->segment(3)];
        
        // Check if id_user is correctly retrieved from session
        $id_user = $this->session->userdata('id_user');
        if (!$id_user) {
            log_message('error', 'id_user not found in session');
            show_error('Session data not found. Please log in.');
            return;}
            
            
            $id_user = $this->session->userdata('id_user');
            $data['keranjang'] = $this->D_keranjang->joinOrder($id)->result();
            
            
            $user  = $this->D_user->cekData(['email' => $this->session->userdata('email')])->row_array();

            // Total Belanja-Midtrans
            $totalQuery = $this->db->query("SELECT SUM(harga) AS totalHarga FROM temp WHERE id_user='$id_user'");
            $totalRow = $totalQuery->row();
            $totalAmount = isset($totalRow->totalHarga) ? (float)$totalRow->totalHarga : 0;
            
            // Midtrans
            // Set your Merchant Server Key
        Config::$serverKey = 'SB-Mid-server-dVl9d44cDu4UY9KrFEZQK3Jy';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

$nama = $this->session->userdata('nama');
$alamat = $this->session->userdata('alamat');
$email = $this->session->userdata('email');

$items_query = $this->db->query("SELECT * FROM temp WHERE id_user='$id_user'");
$items = $items_query->result();

$items_array = [];

foreach ($items as $item) {
    $items_array[] = [
        'id'       => $item->id_user,
        'price'    => $item->harga,
        'quantity' => 1, // Replace with the actual quantity if available
        'name'     => $item->nama_produk
    ];
}
        
        
   
    


// Populate customer's billing address
$billing_address = array(
    'first_name'   => " $nama ",  
    'address'      => "$alamat ",
    
    
    'phone'        => "081322311801",
    'country_code' => 'IDN'
);

// Populate customer's shipping address
$shipping_address = array(
    'first_name'   => " $nama ",  
    
    'address'      => "$alamat ",
    
    
    'phone'        => "081322311801",
    'country_code' => 'IDN'
);

// Populate customer's info
$customer_details = array(
    'first_name'       => "$nama ",
    'email'            => "$email",
    'phone'            => "081322311801",
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
);

        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                
                'gross_amount' => $totalAmount,
            ),
            'item_details'        => $items_array,
            'customer_details'    => $customer_details
        );

            foreach ($user as $a) 
            { $data = [
                'image' => $user['image'], 
                'user' => $user['nama'],
                'email' => $user['email'],
                'tanggal_input' => $user['tanggal_input'],
                'snapToken' => Snap::getSnapToken($params)
            ];
            }
            $dtb = $this->D_keranjang->showtemp(['id_user' => $id_user])->num_rows();
            // TOTAL HARGA
            $data['totalHarga'] = $this->db->query("SELECT sum(harga) as totalHarga FROM temp Where id_user ='$id_user'");

    if ($dtb < 1) 
    {
        $this->session->set_flashdata('pesan', '<div class="alert alert- massege alert-danger" role="alert">Tidak Ada produk dikeranjang</div>');
    redirect(base_url());
    } else {
        $data['temp'] = $this->db->query("select image, nama_produk, id_user, harga, keterangan,id_produk from temp where id_user='$id_user'")->result_array();
    }

    

   

    $data['judul'] = "Data keranjang";
    $this->load->view('Keranjang/template/header', $data);   
    $this->load->view('Keranjang/template/sidebar', $data);   
     
    $this->load->view('Keranjang/template/topbar', $data ); 
    $this->load->view('Keranjang/index', $data, );
    $this->load->view('Keranjang/template/footer', $data, );
    
    }


    public function tambahKeranjang() {
        $id_produk = $this->uri->segment(3);
        // memilih data produk yang untuk dimasukkan ke dalam tabel temp/keranjang melalui variabel $isi
        $d = $this->db->query("Select*from produk where id_produk='$id_produk'")->row();
        
        // berupa data yang akan disimpan ke dalam tabel temp/keranjang
        $isi = [
            'id_produk' => $id_produk,
            'nama_produk' => $d->nama_produk,
            'id_user' => $this->session->userdata('id_user'),  // Menggunakan id_user dari sesi
            'email_user' => $this->session->userdata('email'),
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'image' => $d->image,
            'harga' => $d->harga,
            'keterangan' => $d->keterangan,
            'size' => $d->size
            
            

        ];

        
        // Melakukan pengecekan apakah produk sudah ada di keranjang
        $temp = $this->D_keranjang->getDataWhere('temp', ['id_produk' => $id_produk])->num_rows();
        
        $userid = $this->session->userdata('id_user');
        //cek jika sudah memasukan 10 produk untuk dibooking dalam keranjang
        $tempuser = $this->db->query("select*from temp where id_user ='$userid'")->num_rows();
        // Melakukan pengecekan apakah sudah ada produk yang dipesan sebelumnya
        $datapesan = $this->db->query("SELECT * FROM keranjang WHERE id_user='$userid'")->num_rows();
        
        
        
        if ($datapesan > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Masih Ada pesanan produk sebelumnya yang belum diambil.<br> ambil produk yang dibooking atau tunggu 1x24 Jam untuk bisa pesan kembali </div>');
            redirect(base_url());
        }
    
        // Jika produk yang diklik pesan sudah ada di keranjang
        if ($temp > 0) {
             
            redirect(base_url() . 'dashboard');
        }
    
        // Jika produk yang akan dipesan sudah mencapai 10 item
        if ($tempuser == 10)  {
            
            redirect(base_url() . 'dashboard');
        }
    
        // Membuat tabel temp jika belum ada
        $this->D_keranjang->createTemp(); 
        $this->D_keranjang->insertData('temp', $isi);
    
        // Pesan ketika berhasil memasukkan produk ke keranjang
        
        redirect(base_url() . 'dashboard');
    }
    

    public function hapusProduk() {
        $id_produk = $this->uri->segment(3);
        $id_user = $this->session->userdata('id_user');
        $this->D_keranjang->deleteData(['id_produk' => $id_produk], 'temp');
        $kosong = $this->db->query("select*from temp where id_user='$id_user'")->num_rows();
        if ($kosong < 1) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-
        massege alert-danger" role="alert">Tidak Ada Buku dikeranjang</div>'); redirect(base_url());
        } else {
        redirect(base_url() . 'keranjang');
        } }

    public function total_harga() {
            $id_produk = $this->uri->segment(3);
            $id_user = $this->session->userdata('id_user');
            $this->D_keranjang->select_sum(['id_produk' => $id_produk], 'temp');
            $Total ['total'] = $this->db->query("select*from temp where id_user='$id_user'")->num_rows();
            
            $this->load->view('Keranjang/template/header', );   
            $this->load->view('Keranjang/template/sidebar', );   
     
            $this->load->view('Keranjang/template/topbar', ); 
            $this->load->view('Keranjang/index', $Total, );
    
        
    }

    



}