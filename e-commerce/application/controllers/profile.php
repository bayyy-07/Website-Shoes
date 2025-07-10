<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {

    public function index(){

         // Untuk Menampung data User pada Session
    $data['User'] = $this->db->get_where('User', ['email' =>
    $this->session->userdata('email')])->row_array();
 
 
    $this->load->view('Profile/template/header', );   
    $this->load->view('Profile/template/sidebar', );   
     
    $this->load->view('Profile/template/topbar',  ); 
    $this->load->view('Profile/index', $data  );
    $this->load->view('Profile/template/footer',  );
    }




}
