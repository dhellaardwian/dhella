<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penarikan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
            $this->load->library('session');
			$this->load->model('m_pelapakumkm');
			$this->load->model('m_transaksi');
			$this->load->helper('url');
	}

	public function index() {
		$data['penarikan'] = $this->m_transaksi->tampil_penarikan();
		$this->load->view('layout_backend/header', $data);
		$this->load->view('admin/penarikan', $data);
		$this->load->view('layout_backend/footer', $data);
	}

	public function add()
	{
		$data = $this->input->post();
		$dataSave = [
			'idPelapak'	=> $data['idPelapak'],
			'penarikan_saldo'		=> $data['saldo'],
			'penarikan_tanggal'  	=> date('Y-m-d H:i:s')
		];
		$simpan = $this->db->insert('penarikandana', $dataSave);
		if ($simpan) {
			$dataPelapak = $this->db->where(['idPelapak' => $data['idPelapak']])->get('pelapakumkm')->row_array();
			if ($dataPelapak) {
				$saldoOld = $dataPelapak['totalSaldo'];
				$saldoNew = $saldoOld - $data['saldo'];
				$updateSaldo = $this->db->where(['idPelapak' => $data['idPelapak']])->update('pelapakumkm', ['totalSaldo' => $saldoNew]);
			}
		}
        redirect('penarikan');
	}
}