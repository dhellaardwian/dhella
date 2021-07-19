<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lokasi extends CI_Controller {

	public function __construct()
	{
	parent::__construct();
        $this->load->library('session');
        $this->load->model([
			'm_produk',
			'm_keranjang',
			'm_pelapakumkm']);

		
	}
	public function index() {
		$data['pelapakumkm'] = $this->m_pelapakumkm->tampil_pelapakumkm(true);
		$this->load->view('layout_backend/header');
		$this->load->view('admin/lokasi', $data);
		$this->load->view('layout_backend/footer');
	}
}
