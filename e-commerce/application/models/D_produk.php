<?php
defined('BASEPATH') or exit('No direct script access allowed');
class D_produk extends CI_Model
{
    // Fungsi Tampil Produk halaman Dashboard secara acak
    public function tampilProduk(){
        // tampilkan secara acak
        $this->db->limit(6,0);
        $this->db->order_by("RAND ()");
        // Method Tampilkan Barang
        $query = $this->db->get('produk');
        return $query->result();
    }
    
    // Fungsi Tampil Produk halaman Shop
    public function tampilProdukShop(){
        return $this->db->get('produk');          
    }

    public function produkWhere($where)
    {
        return $this->db->get_where('produk', $where); 
    }

    public function simpanProduk($data = null) {
        $this->db->insert('produk', $data); }

// manajemen brand
public function getBrand()
{
return $this->db->get('brand');
}

public function brandWhere($where)
{
return $this->db->get_where('brand', $where); }

public function simpanKategori($data = null) {
    $this->db->insert('brand', $data); 
}



// Fungsi Filter kategori  -----------------------------------------------

// Fungsi menampilkan isi pada table brand
public function get_kategori(){
    $this->db->select('*');
    $this->db->from('brand');

    $this->db->order_by('id_brand', 'desc');
    return $this->db->get()->result();
   
    
    
}
// Fungsi menampilkan isi pada table brand bedasarkan id_brand
public function kategori($id_brand){
    $this->db->select('*');
    $this->db->from('brand');
    $this->db->where('id_brand', $id_brand);

    
    return $this->db->get()->row();
   
    
    
}

// Fungsi menampilkan pruduk bedasarkan brand
public function get_produk_brand($id_brand){

    $this->db->SELECT('*');
    $this->db->FROM('produk');
    $this->db->join('brand', 'brand.id_brand = produk.id_brand', 
    'left');
    $this->db->where('produk.id_brand', $id_brand);
    return $this->db->get()->result();
    
    
}
// Fungsi Filter kategori Harga -----------------------------------------------
public function get_kategori_hargaDown(){
    $this->db->select('*');
    $this->db->from('produk');

    $this->db->order_by('harga', 'desc');
    return $this->db->get()->result();
   
    
    
}
public function get_kategori_hargaUP(){
    $this->db->select('*');
    $this->db->from('produk');

    $this->db->order_by('harga', 'asc');
    return $this->db->get()->result();
   
    
    
}


// Fungsi Filter kategori Warna -----------------------------------------------

// Fungsi menampilkan produk bedasarkan id_Warna
public function get_kategori_warna(){
    $this->db->select('*');
    $this->db->from('warna');

    $this->db->order_by('id_warna', 'desc');
    return $this->db->get()->result();
}

// Fungsi menampilkan warna pada table warna bedasarkan id_warna
public function kategori_warna($id_warna){
    $this->db->select('*');
    $this->db->from('warna');
    $this->db->where('id_warna', $id_warna);

    
    return $this->db->get()->row();
   
    
    
}


// Fungsi untuk menggabungkan field id_warna antar tabel
public function get_produk_warna($id_warna){

    $this->db->SELECT('*');
    $this->db->FROM('produk');
    $this->db->join('warna', 'warna.id_warna = produk.id_warna', 
    'left');
    $this->db->where('produk.id_warna', $id_warna);
    return $this->db->get()->result();
    
    
}

// SEARCH 
public function get_produk_keyword($keyword){
    $this->db->select('*');
    $this->db->from('produk');
    $this->db->like('id_produk', $keyword);
    $this->db->or_like('nama_produk', $keyword);

    return $this->db->get()->result();
}

public function find($id){
    $result = $this->db->where('id_produk', $id)
                        ->limit(1)
                        ->get('produk');
    if($result->num_rows() > 0) {
        return $result->row();

    }else {
        return array();
    }


}


public function joinKategoriProduk($where)
    {

$this->db->select('*'); 
$this->db->from('produk'); 
$this->db->join('brand','brand.id_brand = produk.id_brand');
$this->db->join('warna','warna.id_warna = produk.id_warna');
$this->db->where($where);
return $this->db->get(); }


}

