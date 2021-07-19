<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class keranjang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model([
			'm_produk',
			'm_keranjang',
		]);
	}

    // List all your items
    public function index()
    {
    	if ($this->session->userdata('idPelanggan')) {
	    	$dataKeranjang = $this->m_keranjang->get_keranjang();
	        $data = array(
	            'title' => 'Keranjang Pembelian',
	            'isi' 	=> 'user/keranjang',
	            'data'	=> [
	            	'dataKeranjang' => $dataKeranjang
	            ]
	        );
	        $this->load->view('layout_frontend/wrapper', $data, FALSE);
    	}else{
    		redirect('pelanggan/login');
    	}
    }

    public function input()
    {
    	$data = varPost();
    	if ($this->session->userdata('idPelanggan')) {
	    	if (isset($data['idProduk']) && isset($data['quantity'])) {
	    		$cekKeranjang = $this->m_keranjang->cek_keranjang($data['idProduk']);
	    		if ($cekKeranjang) {
	    			$qty = $data['quantity'] + $cekKeranjang['qty'];
	    			$subTotal = $qty * $cekKeranjang['total'];
	    			$dataKeranjang = [
						'idProduk'		=> $cekKeranjang['idProduk'],
						'idPelapak'		=> $cekKeranjang['idPelapak'],
						'idPelanggan'	=> $this->session->userdata('idPelanggan'),
						'qty'			=> $qty,
						'total'			=> $cekKeranjang['total'],
						'subTotal'		=> $subTotal
	    			];
	    			$this->m_keranjang->edit(['idCart' => $cekKeranjang['idCart']],$dataKeranjang);
	    		}else{
		    		$dataProduk = (array)$this->m_produk->tampil_produk($data['idProduk']);
		    		if ($dataProduk) {
		    			$ambilKeranjang = $this->m_keranjang->get_keranjang();
		    			if ($ambilKeranjang) {
		    				$sampleKeranjang = $ambilKeranjang[0];
		    				if ($sampleKeranjang['idPelapak'] != $dataProduk['idPelapak']) {
		    					echo '<script type="text/javascript">alert("Keranjang hanya dapat dimasukan jika masih 1 umkm !");window.location.href = "'.base_url('keranjang').'"</script>';
		    					return false;
		    				}
		    			}
		    			$dataKeranjang = [
							'idProduk'		=> $dataProduk['idProduk'],
							'idPelapak'		=> $dataProduk['idPelapak'],
							'idPelanggan'	=> $this->session->userdata('idPelanggan'),
							'qty'			=> $data['quantity'],
							'total'			=> $dataProduk['hargaProduk'],
							'subTotal'		=> $data['quantity'] * $dataProduk['hargaProduk']
		    			];
		    			$this->m_keranjang->add($dataKeranjang);
		    		}
	    		}
	    	}
    		redirect('/keranjang');
    	}else{
    		redirect('/pelanggan/login');
    	}
    }

    public function hapus($idCart)
    {
    	$this->m_keranjang->delete(['idCart'=>$idCart]);
    	redirect('keranjang');
    }

    public function update_qty()
    {
    	$data = varPost();
    	if (isset($data['ids_cart']) && isset($data['quantity'])) {
    		foreach ($data['ids_cart'] as $key => $value) {
    			$cekKeranjang = $this->m_keranjang->detail_keranjang($value);
	    		if ($cekKeranjang) {
	    			$qty = $data['quantity'][$key];
	    			$subTotal = $qty * $cekKeranjang['total'];
	    			$dataKeranjang = [
						'idProduk'		=> $cekKeranjang['idProduk'],
						'idPelapak'		=> $cekKeranjang['idPelapak'],
						'idPelanggan'	=> $this->session->userdata('idPelanggan'),
						'qty'			=> $qty,
						'total'			=> $cekKeranjang['total'],
						'subTotal'		=> $subTotal
	    			];
	    			$this->m_keranjang->edit(['idCart' => $cekKeranjang['idCart']],$dataKeranjang);
	    		}
    		}
    		redirect('keranjang');
    	}else{
    		redirect('keranjang');
    	}
    }

    public function mini()
    {
    	$operation = [
    		'success' => false,
    		'data'	  => null
    	];
    	if ($this->session->userdata('idPelanggan')) {
	    	$data = $this->m_keranjang->get_keranjang();
	    	if ($data) {
	    		$operation = [
	    			'success'	=> true,
	    			'data'		=> [
	    				'total_keranjang'	=> count($data),
	    				'subtotal_keranjang'=> array_sum(array_column($data, 'subTotal')),
	    				'data_keranjang'	=> $data
	    			]
	    		];
	    	}
    	}
    	echo json_encode($operation);
    	die;
    }
}