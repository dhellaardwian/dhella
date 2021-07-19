<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login_pelanggan
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('m_pelanggan');
    }

    public function login($email, $pass)
    {
        $cek = $this->ci->m_pelanggan->login_pelanggan($email, $pass);
        if ($cek) {
            $idPelanggan = $cek->idPelanggan; 
            $namaPelanggan = $cek->namaPelanggan;
            $email = $cek->email;
           //buat session
           $this->ci->session->set_userdata('idPelanggan', $idPelanggan);
           $this->ci->session->set_userdata('namaPelanggan', $namaPelanggan);
           $this->ci->session->set_userdata('email', $email);
           redirect('keranjang');
        }else {
            //jika salah 
            $this->ci->session->set_flashdata('error', 'Email Atau Password Salah');
            redirect('pelanggan/login');
        }
    }

    public function proteksi_halaman()
    {
        if ( $this->ci->session->userdata('namaPelanggan') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('pelanggan/login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('idPelanggan');
        $this->ci->session->unset_userdata('namaPelanggan');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout !!!');
        redirect('pelanggan/login');
    }
}

/* End of file User_login.php */
