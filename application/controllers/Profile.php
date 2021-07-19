<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

		function __construct(){
		        parent::__construct();
		        $this->load->model('m_profile');
		        $this->load->helper('url');
		}

        public function index(){ 
                 if($this->session->userdata('level') == 'Admin'){
                        $data['user'] = $this->m_profile->tampil_data($this->session->userdata('idUser'));
                        $this->load->view('layout_backend/header', $data);
                        $this->load->view('admin/profile', $data);
                        $this->load->view('layout_backend/footer', $data);
                }else if($this->session->userdata('level') == 'Pelapak'){
                        $data['user'] = $this->m_profile->tampil_data($this->session->userdata('idUser'));

                        $this->load->view('layout_backend/header', $data);
                        $this->load->view('admin/profile', $data);
                        $this->load->view('layout_backend/footer', $data);
                }else{
                        echo "Halaman Tidak ditemukan";
                }   
        }

        public function simpan(){
                $radioubahPass = $this->input->post('ubahPass');
                $namaPengguna = $this->input->post('namaPengguna');
                $username = $this->input->post('username');
                $passLama = $this->input->post('passLama');
                $passBaru = $this->input->post('passBaru');
                $passBaru2 =$this->input->post('passBaru2');
                $idUser = $this->session->userdata('idUser');
                $where = array('idUser' => $idUser);

                if($radioubahPass == "rubah"){
                    if($this->m_profile->cek_password($idUser, $passLama) == TRUE){
                        if($passBaru == $passBaru2){
                            $data = array('namaPengguna' => $namaPengguna, 'username' => $username, 'pass' => md5($passBaru));
                            $this->m_profile->update_data($where, $data, 'user_2');
                            redirect('profile');
                        }
                    }else{
                            echo "
                            <script type='text/javascript'> 
                                    alert('pass tidak sesuai!');
                                    window.location.replace('../Profile');
                            </script>";
                    }
                    
                }else if($radioubahPass == "tidak"){
                    $data = array('namaPengguna' => $namaPengguna, 'username' => $username);
                    $this->m_profile->update_data($where, $data, 'user_2');
                    redirect('profile');
                }
        }
       
	
}
