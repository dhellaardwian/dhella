<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('admin');
	}

	
	function aksi_login()
	{
		$username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		$pass = htmlspecialchars($this->input->post('pass', TRUE), ENT_QUOTES);
		$where = array(
			'username' => $username,
			'pass' => MD5($pass)
		);
		$cek = $this->m_login->cek_login("user_2", $where);
		if ($cek->num_rows() > 0) {
			$row = $cek->row();
			$data_session = array(
				'idUser' => $row->idUser,
				'nama' => $row->namaPengguna,
				'user' => $username,
				'level' => $row->level
			);
			if ($row->level == 'Pelapak') {
				$this->db->select('*');
		        $this->db->from('pelapakumkm');
		        $this->db->join('kategori', 'kategori.idkategori = pelapakumkm.idkategori', 'left');
		        $this->db->where('idUser', $row->idUser);
		        $dataPelapak = $this->db->get()->row_array();
		        $data_session = array_merge($data_session, $dataPelapak);
		        print_r($data_session);
			}
			$this->session->set_userdata($data_session);
			if ($row->level == "Admin") {
				redirect(base_url('beranda2'));
			} else {
				redirect(base_url('beranda'));
			}
		} else {
			echo '<script language="javascript">';
			echo 'alert("Login Anda Tidak Berhasil!");';
			echo 'window.location = "../admin";</script>';
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}
}
