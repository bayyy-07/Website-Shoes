<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class autentifikasi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('D_User');
        $this->load->library('form_validation');
        
    }

    public function index(){
        if($this->session->userdata('email')){
            redirect('dashboard');
        }
        
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus diisi!!',
            'valid_email' => 'Email Tidak Benar!!' ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diisi' ]);

            if($this->form_validation->run() == false) {
                $data['user'] = '';
                $this->load->view('Autentifikasi/login', $data);
                } else {
                    $this->_login();
                }
        

    }

   private function _login()
{
    $email = htmlspecialchars($this->input->post('email', true)); 
    $password = $this->input->post('password', true);

    $user = $this->D_user->cekData(['email' => $email])->row_array();

    // Jika usernya ada
    if ($user) {
        // Jika user sudah aktif
        if ($user['is_active'] == 1) {
            // Cek password
            if (password_verify($password, $user['password'])) { 
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id'],
                    'id_user' => $user['id'],
                    'alamat' => $user['alamat'], 
                    'nama' => $user['nama'] 
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else { 
                // Flashdata password salah
                $this->session->set_flashdata('error', 'Password salah');    
                redirect('autentifikasi');
            }
        } else {
            // Flashdata user belum diaktivasi
            $this->session->set_flashdata('not-activated', 'User belum diaktivasi!!');
            redirect('autentifikasi');
        }
    } else {
        // Flashdata email belum terdaftar
        $this->session->set_flashdata('email-error', 'Email belum terdaftar');
        redirect('autentifikasi');
    }
}


    public function register()
    {
        $this->form_validation->set_rules('nama', 'Name', 'required|trim', [
            'required' => 'Nama tidak boleh kosong',
            

        ]); 

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[User.email]',[
            'required' => 'Email tidak boleh kosong',
            'is_unique' => 'Email sudah dipakai'
        ]); 

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password1]', [
            'required' => 'Password tidak boleh kosong',
            'matches' => 'Password harus sama!',
            'min_length' => 'Password tidak boleh kurang dari 3 Karakter!'
            
            
            
        ]);
        
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password]', [
            'required' => 'Password tidak boleh kosong',
            'matches' => 'Password harus sama!',
            'min_length' => 'Password tidak boleh kurang dari 3 Karakter!'

        ]);

        if($this->form_validation->run() == false) {
            $this->load->view('autentifikasi/register');

        } 
        else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),

                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'tanggal_input' => time()
            ];
            $this->D_User->simpanData($data); //menggunakan model
    
            redirect ('autentifikasi');
        }

        

    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('autentifikasi');
    }


}






