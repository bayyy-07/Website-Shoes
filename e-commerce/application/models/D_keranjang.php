<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class D_keranjang extends CI_Model {


    public function getData($table) 
    {
        return $this->db->get($table)->row(); 
    }

    

    public function getDataWhere($table, $where) {
        $this->db->where($where);
        return $this->db->get($table); }

    public function getOrderByLimit($table, $order, $limit) {
        $this->db->order_by($order, 'desc'); 
        $this->db->limit($limit);
        return $this->db->get($table);
            }

    public function joinOrder($where)
    {
        $this->db->select('*');
        $this->db->from('keranjang ');
        $this->db->join('keranjang_detail ', 'keranjang_detail.id_pesan=keranjang.id_pesan'); 
        $this->db->join('produk ', 'produk.id_produk=keranjang_detail.id_produk'); 
        $this->db->where($where);
        return $this->db->get(); 
    }

    
        
    public function simpanDetail($where = null) {
        $sql = "INSERT INTO keranjang_detail (id_pesan,id_produk) 
        SELECT keranjang.id_pesan,temp.id_produk FROM keranjang,temp WHERE temp.id_user = keranjang.id_user 
        AND keranjang.id_user='$where'";
        return $this->db->query($sql); 
    }

    public function insertData($table, $data) 
    {
        return $this->db->insert($table, $data); 
    }

    public function updateData($table, $data, $where) 
    {
        return $this->db->update($table, $data, $where); 
    }

    public function deleteData($where, $table) {
        $this->db->where($where);
        $this->db->delete($table); 
    }

    
    



    public function find($where) {
        //Query mencari record berdasarkan ID-nya
        $this->db->limit(1);
        return $this->db->get('produk', $where); }

        public function kosongkanData($table) 
        {
            return $this->db->truncate($table); 
        }


        public function createTemp() {
            return $this->db->query
            ('CREATE TABLE IF NOT EXISTS temp(
                id_pesan varchar(12),
                tgl_pesan DATETIME, 
                email_user varchar(128), 
                nama_produk varchar(35), 
                id_produk int)' 
                );
            }

        public function selectJoin() {
                $this->db->select('*');
                $this->db->from('keranjang');
                $this->db->join('keranjang_detail', 'keranjang_detail.id_pesan=keranjang.id_pesan');
                $this->db->join('produk', 'keranjang_detail.id_produk=produk.id_produk');
                return $this->db->get(); }

        public function showtemp($where) {
            $this->db->where($where);
        return $this->db->get('temp'); 
            
            
        }


        public function kodeOtomatis($tabel, $key) {
            $this->db->select('right(' . $key . ',3) as kode', false); 
            $this->db->order_by($key, 'desc');
            $this->db->limit(1);
            $query = $this->db->get($tabel);
            if ($query->num_rows() <> 0) { $data = $query->row();
            $kode = intval($data->kode) + 1;
            } else { $kode = 1;
            
            }

            $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); 
            $kodejadi = date('dmY') . $kodemax;
                return $kodejadi;
            }

            

}