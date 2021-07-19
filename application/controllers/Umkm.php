<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model([
			'm_pelapakumkm',
			'm_produk',
		]);
	}

    // List all your items
    public function index($id=null)
    {
    	if ($id) { //cek apakah ada id pelapak, jika iya masuk ke halaman pelapak jika tidak arahakan ke home

    		$getDataPelapak = $this->m_pelapakumkm->tampil_pelapak($id, true);
    		if ($getDataPelapak) {

    			$getProduk = $this->m_produk->tampil_produk_by_lapak($id);
		        $data = array(
		            'title' => 'Pelapak UMKM',
		            'isi' 	=> 'user/umkm',
		            'data'	=> [
		            	'dataPelapak'	=> $getDataPelapak,
		            	'dataProduk'	=> $getProduk
		            ]
		        );

    		}else{
    			$data = array(
		            'title' => 'Pelapak UMKM',
		            'isi' 	=> 'layout_frontend/error',
		            'data'	=> [
		            	'message' => 'Data Pelapak Tidak Ditemukan'
		            ]
		        );
    		}
	        $this->load->view('layout_frontend/wrapper', $data, FALSE);
    	}else{
    		redirect('/home');
    	}
    }
}