<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
    // List all your items
    public $helperOngkir;
    function __construct()
	{
		parent::__construct();
		$this->load->model([
			'm_produk',
            'm_pelapakumkm',
			'm_keranjang',
			'm_rekening',
			'm_transaksi',
		]);
		$this->load->library('RajaOngkir');
		$this->helperOngkir = new RajaOngkir();
	}

    public function index()
    {
       if ($this->session->userdata('idPelanggan')) {
	    	$dataKeranjang = $this->m_keranjang->get_keranjang();
	        $data = array(
	            'title' => 'Konfirmasi Pembelian',
	            'isi' 	=> 'user/pemesanan',
	            'data'	=> [
	            	'dataKeranjang' => $dataKeranjang
	            ]
	        );
	        $this->load->view('layout_frontend/wrapper', $data, FALSE);
    	}else{
    		redirect('');
    	}
    }

     public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $dataKeranjang = array(
            'idCart'      => $this->input->post('idCart'),
            'qty'     => $this->input->post('qty'),
            'total'   => $this->input->post('total'),
            'subTotal'    => $this->input->post('subTotal'),
        );
        $this->m_keranjang->add($data);
        
        redirect($redirect_page,'refresh');
            
    }

	public function checkout()
	{

        $this->form_validation->set_rules('provinceName', 'Provinsi', 'required', array('required' => '%s Harus Diisi !!!')    
        );
        $this->form_validation->set_rules('cityName', 'Kota', 'required', array('required' => '%s Harus Diisi !!!')    
        );
        $this->form_validation->set_rules('kurir', 'Ekspedisi', 'required', array('required' => '%s Harus Diisi !!!')    
        );
        $this->form_validation->set_rules('paket_nama',  'Nama', 'required', array('required' => '%s Harus Diisi !!!')    
        );
        $this->form_validation->set_rules('paket_harga', 'Harga',  'required', array('required' => '%s Harus Diisi !!!')    
        );
        $this->form_validation->set_rules('paket_etd', 'Estimasi',  'required', array('required' => '%s Harus Diisi !!!')    
        );

        if ($this->form_validation->run() == FALSE) {
        	$data = $this->m_keranjang->get_keranjang();
            $data = array(
                'title' => 'Konfirmasi Pembelian',
                'isi' => 'user/pemesanan',
            );
            $this->load->view('layout_frontend/wrapper', $data, FALSE);
        } else {
            //simpan ke tabel transaksi
            $data = array(
                'idPelapak' => $this->input->post('idPelapak'),
                'idPelanggan' => $this->session->userdata('idPelanggan'),
                'tglOrder' =>  date("Y-m-d H:i:s"),
                'idProvince' => $this->input->post('idProvince'),
                'idCity' => $this->input->post('idCity'),
                'provinceName' => $this->input->post('provinceName'),
                'cityName' => $this->input->post('cityName'),
                'alamat' => $this->input->post('alamat'),
                'kodepos' => $this->input->post('kodepos'),
                'nmPenerima' => $this->input->post('nmPenerima'),
                'noTelp' => $this->input->post('noTelp'),
                'kurir' => $this->input->post('kurir'),
                'paket_nama' => $this->input->post('paket_nama'),
                'paket_harga' => $this->input->post('paket_harga'),
                'paket_etd' => $this->input->post('paket_etd'),
                'ongkir' => $this->input->post('ongkir'),
                'totalBerat' => $this->input->post('totalBerat'),
                'subTotalBayar' => $this->input->post('subTotalBayar'),
                'totalBayar' => $this->input->post('totalBayar'), 
                'totalProduk' => $this->input->post('totalProduk'),
                'totalqty' => $this->input->post('totalqty'),
                'statusPembayaran' => '0',
                'statusOrder' => '0',
                'noOrder' => $this->gen_no_order(),
            );
            $simpan = $this->db->insert('transaksi', $data);
            if ($simpan) {
                $transaksi_id = $this->db->insert_id();
                $datapost = $this->input->post();
                if ($datapost['detail_idProduk']) {
                    foreach ($datapost['detail_idProduk'] as $key => $val) {
                        $dataDetail = [
                            'idTransaksi'   => $transaksi_id,
                            'idProduk'      => $datapost['detail_idProduk'][$key],
                            'harga'         => $datapost['detail_harga'][$key],
                            'qty'           => $datapost['detail_qty'][$key],
                            'subTotal'      => $datapost['detail_subTotal'][$key],
                        ];
                        $this->db->insert('detailtransaksi', $dataDetail);
                    }
                }
            }
            redirect('pemesanan/pesanansaya');
        }
             
    }

    public function detailtransaksi($idPelapak)
    {
        $data = array (
           
            'rekening' => $this->m_rekening->tampil_rekening(),
            'pesananmasuk' => $this->m_transaksi->detailmasuk($idPelapak),
            'packing' => $this->m_transaksi->detailpacking($idPelapak),
            'dikirim' => $this->m_transaksi->detailkirim($idPelapak),
            'selesai' => $this->m_transaksi->detailtransaksi($idPelapak),
        );
        $this->load->view('layout_backend/header', $data);
        $this->load->view('admin/detailtransaksi', $data);
        $this->load->view('layout_backend/footer', $data);
        
    } 

    public function pesanan_masuk()
    {
     	$dataPesanan = $this->m_transaksi->pesananmasuk(true);
        $data = array (
            'penarikan' => $this->m_transaksi->tampil_dana(),
            'rekening' => $this->m_rekening->tampil_rekening(),
            'pesananmasuk' => $dataPesanan,
            'packing' => $this->m_transaksi->packing(),
            'dikirim' => $this->m_transaksi->kirim(),
            'selesai' => $this->m_transaksi->pesanan_selesai(),
        );
        $this->load->view('layout_backend/header', $data);
        $this->load->view('admin/pesananmasuk', $data);
        $this->load->view('layout_backend/footer', $data);
        
    }

    public function packing($idTransaksi)
    {
        $dataPacking = $this->m_transaksi->packing(true);
        $data = array (
            'idTransaksi' => $idTransaksi,
            'statusOrder' => '1',
        );

        $this->m_transaksi->update_order($data);
        redirect('pemesanan/pesanan_masuk');
    }

    public function dikirim($idTransaksi)
    {
        $data = array(
            'idTransaksi' => $idTransaksi,
            'noresi' => $this->input->post('noresi'),
            'statusOrder' => '2',
        );
        $this->m_transaksi->update_order($data);
        redirect('pemesanan/pesanan_masuk');
    }

    public function pembayaran($idTransaksi=null)
    {
        if ($idTransaksi) { // cek apakah ada idtransaksi di url / parameter
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->where(['idTransaksi' => $idTransaksi, 'idPelanggan' => $this->session->userdata('idPelanggan')]);
            $get_transaksi = $this->db->get()->row(); // ambil data transaksi berdasarkan idtransaksi dan idpelanggan, jadi transaksi yg bisa dilihat hanya sesuai yg pelanggan login saja
            $this->form_validation->set_rules(
                'namaRek',
                'Nama Rekening',
                'required',
                array('required' => '%s Harus Diisi !!!')
            );
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './assets/buktiPembayaran/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2000';
                $this->upload->initialize($config);
                $field_name = "buktiPembayaran";
                if (!$this->upload->do_upload($field_name)) {
                    $data = array(
                        'title' => 'Pembayaran',
                        'pesanan' => $this->m_transaksi->detail_pesanan($idTransaksi),
                        'error_upload' => $this->upload->display_errors(),
                        'isi' => 'user/pembayaran',
                    );
                    $this->load->view('layout_frontend/wrapper', $data, FALSE);
                } else {
                    $data = array(
                        'idTransaksi' => $idTransaksi,
                        'namaRek' => $this->input->post('namaRek'),
                        'namaBank' => $this->input->post('namaBank'),
                        'noRek' => $this->input->post('noRek'),
                        'statusPembayaran' => '1',
                        'buktiPembayaran' => $this->upload->data('file_name'),
                    );
                    $this->m_transaksi->upload_buktibayar($data);
                    redirect('pemesanan/pesanansaya');
                }
            } else {
                $data = array(
                    'rekening' => $this->m_rekening->tampil_rekening(),
                    'pesanan' => $get_transaksi,
                    'title' => 'Pembayaran',
                    'isi' => 'user/pembayaran',
                );
                $this->load->view('layout_frontend/wrapper', $data, FALSE);
            }
            
        }else{
            echo '<script>'.base_url('pemesanan/pesanansaya').'</script>';
        }
    }

    public function pesanansaya () {
        $data = array (
            'belum_bayar' => $this->m_transaksi->belum_bayar(),
            'diproses' => $this->m_transaksi->diproses(),
            'dikirim' => $this->m_transaksi->dikirim(),
            'selesai' => $this->m_transaksi->selesai(),
            'title' => 'Konfirmasi Pembelian',
            'isi'   => 'user/pesanansaya',
            );
            $this->load->view('layout_frontend/wrapper', $data, FALSE);
    }

    public function sukses($idTransaksi)
    {
        $data = array(
            'idTransaksi' => $idTransaksi,
            'statusOrder' => '3',
        );
        $this->m_transaksi->update_order($data);
        redirect('pemesanan/pesanansaya');
    }

    

    
    public function get_location_shipping()
	{
		$data = $this->input->post();

		if ($data['type'] == 1) {
			$response = $this->helperOngkir->get_province();
		}elseif ($data['type'] == 2) {
			$response = $this->helperOngkir->get_city([
	            'province' => $data['parent_id']
	        ]);
		}
		$result = $response['data']['results'];
		$operation = [
            'success'   => true,
            'data'      => array_values($result),
            'total'     => count($result)
        ];
		$this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($operation,JSON_UNESCAPED_UNICODE));
	}

	public function get_cost()
	{
		$data = $this->input->post();

		$getPelapak = $this->db->where(['idPelapak' => $data['idPelapak']])->get('pelapakumkm')->row_array();
		$data_cost = $this->helperOngkir->get_cost([
            'courier' 		=> $data['courier'],
            'destination' 	=> $data['idCity'],
            'origin'		=> $getPelapak['idCity'],
            'weight'		=> $data['totalBerat']
        ]);
        $results = [];
		if ($data_cost['success']) {
			foreach ($data_cost['data']['results'] as $v_res) {
				if ($v_res['costs']) {
					foreach ($v_res['costs'] as $k_costs => $v_costs) {
						array_push($results, [
							'active'	=> 0,
							'code' 		=> $v_res['code'],
							'name' 		=> $data['courier'],
							'service'	=> $v_costs['service'],
							'value'		=> $v_costs['cost'][0]['value'],
							'etd'		=> $this->generate_etd($v_costs['cost'][0]['etd'], true),
							'date'		=> $this->generate_etd($v_costs['cost'][0]['etd'], false),
							'note'		=> $v_costs['cost'][0]['note'],
							'type'		=> 0,
						]);
					}
				}
			}
		}
		$operation = [
			'success' => false
		];
		if ($results) {
			$operation = [
				'success' => true,
				'data'    => $results
			];
		}
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($operation,JSON_UNESCAPED_UNICODE));
	}

	protected function generate_etd($val, $simple=true)
	{
		$data = explode('-', $val);
		$date_now = date('Y-m-d');
		if (count($data) > 1) {
			$temp = trim(preg_split('/\s+/', $data[1])[0]);
			if (!$temp) { $temp = 5; }
			$date_start = date('Y-m-d', strtotime($date_now . ' +1 day'));
			$date_end = date('Y-m-d', strtotime($date_start . ' +'.(int)$temp.' day'));
		}else{
			if (isset($data[0]) && !empty($data[0])) {
				$temp = trim(preg_split('/\s+/', $data[0])[0]);
				if (!$temp) { $temp = 5; }
				$date_start = date('Y-m-d', strtotime($date_now . ' +1 day'));
				$date_end = date('Y-m-d', strtotime($date_start . ' +'.(int)$temp.' day'));
			}else{
				$date_start = date('Y-m-d', strtotime($date_now . ' +1 day'));
				$date_end = date('Y-m-d', strtotime($date_start . ' +5 day'));
			}
		}
		if ($simple) {
			$result = date('d M', strtotime($date_start)) . ' - ' . date('d M', strtotime($date_end));
		}else{
			$result = date('Y-m-d', strtotime($date_start)) . '/' . date('Y-m-d', strtotime($date_end));
		}
		return $result;
	}

	public function gen_no_order()
    {
        $prefix = date('ymdGis');
        $lastTransaction = $this->db->order_by('noOrder', 'DESC')->get('transaksi')->row_array();
        if (!is_null($lastTransaction)) {
            $lastInvoiceNo = $lastTransaction['noOrder'];
            if (substr($lastInvoiceNo, 0, 6) == $prefix) {
                return ++$lastInvoiceNo;
            }
        }
        return $prefix.'0001';
    }

}