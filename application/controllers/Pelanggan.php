<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
	 public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
    }
    
    public function register()
    {
        $this->form_validation->set_rules('namaPelanggan', 'Nama Pelanggan', 'required', array('required' => '%s Harus Diisi !!!')    
        );
        $this->form_validation->set_rules('email', 'Email', 'required', array('required|is_unique[pelanggan.email]' => '%s Harus Diisi !!!',
        'is_unique' => '%s Email Ini Sudah Terdaftar ..!'
        ));

        $this->form_validation->set_rules('noTelepon', 'No Telepon', 'required', array('required' => '%s Harus Diisi !!!')    
        );
        $this->form_validation->set_rules('pass', 'Password', 'required', array('required' => '%s Harus Diisi !!!')    
        );
        $this->form_validation->set_rules('ulangi_pass', 'Confirm Password', 'required|matches[pass]', array('required' => '%s Harus Diisi !!!',
        'matches' => '%s Password Tidak Sama'
        ));
         if ($this->form_validation->run() == FALSE) {
   			$this->load->view('user/register' );
             
         }else{
            $data = array(
                'namaPelanggan' => $this->input->post('namaPelanggan'),
                'email' => $this->input->post('email'),
                'noTelepon' => $this->input->post('noTelepon'),
                'pass' => $this->input->post('pass'),
            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Selamat Anda Register Berhasil, Silahkan Login Terlebih Dahulu !!');
            redirect('pelanggan/login');
         } 
    }

    public function login()
    {
       
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            $ceklogin = $this->m_pelanggan->login_pelanggan($email, $pass);
            if ($ceklogin) {
                $this->session->set_userdata((array)$ceklogin);
                redirect('home');
            }
        
        $this->load->view('user/login_pelanggan');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

}