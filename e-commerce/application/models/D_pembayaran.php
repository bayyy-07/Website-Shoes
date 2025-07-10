<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');
class D_pembayaran extends CI_Model {
     //manip table pinjam
    public function simpanPembayaran($data) {
        $this->db->insert('pembayaran', $data); 
    }

    public function selectData($table, $where) {
        return $this->db->get($table, $where); }

    public function updateData($data, $where) {
        $this->db->update('pembayaran', $data, $where); 
    }

    public function deleteData($tabel, $where) {
        $this->db->delete($tabel, $where); 
    }

    public function joinData()
    {
        $this->db->select('*'); 
        $this->db->from('pembayaran'); 
        $this->db->join('detail_pembayaran', 'detail_pembayaran.no_bayar=pembayaran.no_bayar', 'Right'); 
        return $this->db->get()->result_array();

}

//manip tabel detai pinjam
public function simpanDetail($idkeranjang, $nobayar) {
    $sql = "INSERT INTO detail_pembayaran (no_bayar,id_produkT) 
    SELECT pembayaran.no_bayar,keranjang_detail.id_produkT 
    FROM pembayaran, keranjang_detail
    WHERE keranjang_detail.id_pesan=$idkeranjang AND pembayaran.no_bayar='$nobayar'";
    $this->db->query($sql); }



}