<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda2 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model([
			'm_beranda',
		]);
	}

	public function index()
	 {
		$data['pelapakumkm'] = $this->m_beranda->hitung_pelapak(true);
		$data['pengguna'] = $this->m_beranda->hitung_pengguna(true);
		$data['kategori'] = $this->m_beranda->hitung_kategori(true);
		$this->load->view('layout_backend/header');
		$this->load->view('admin/beranda2', $data);
		$this->load->view('layout_backend/footer');
	}
		
	}

