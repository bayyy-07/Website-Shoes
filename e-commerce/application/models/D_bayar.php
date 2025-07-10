<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed'); 

class D_bayar extends CI_Model 

{ //manip table pinjam 

	public function simpanPinjam($data) 

{ 

	$this->db->insert('pinjam', $data); 

} 

	public function selectData($table, $where) 

{ 

	return $this->db->get($table, $where); 

} 

	public function updateData($data, $where) 

{ 

	$this->db->update('pinjam', $data, $where); 

} 

	public function deleteData($tabel, $where)

{ 

	$this->db->delete($tabel, $where); 

} 

	public function joinData() 

{ 

	$this->db->select('*'); 

	$this->db->from('pinjam'); 

	$this->db->join('detail_pembayaran', 'detail_pembayaran.no_bayar=pembayaran.no_bayar', 'Right'); 

	return $this->db->get()->result_array(); 

} 

//manip tabel detai pinjam 

	public function simpanDetail($idpesan, $nobayar) 

{ 

	$sql = "INSERT INTO detail_pembayaran (no_bayar,id_produk) SELECT pembayaran.no_bayar,keranjang_detail.id_produk FROM pembayaran, keranjang_detail WHERE keranjang_detail.id_pesan=$idpesan AND pembayaran.no_pembayaran='$nobayar'"; 

	$this->db->query($sql); 

} 

}