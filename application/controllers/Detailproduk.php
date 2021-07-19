<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Detailproduk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model([
			'm_produk',
		]);
	}
    // List all your items
    public function index($id=null)
    {
    	if ($id) { //cek apakah ada id pelapak, jika iya masuk ke halaman pelapak jika tidak arahakan ke home

    		if ($id) {
    			$getProduk = $this->m_produk->tampil_produk_by_detailproduk($id);
		        $data = array(
		            'title' => 'Pelapak UMKM',
		            'isi' 	=> 'user/detailproduk',
		            'data'	=> [
		            	'Produk'	=> $getProduk
		            ]
		        );

    		}else{
    			$data = array(
		            'title' => 'Detail Produk UMKM',
		            'isi' 	=> 'layout_frontend/error',
		            'data'	=> [
		            	'message' => 'Data Pelapak Tidak Ditemukan'
		            ]
		        );
    		}
	        $this->load->view('layout_frontend/wrapper', $data, FALSE);
    	}else{
    		redirect('/umkm');
    	}
    }
}