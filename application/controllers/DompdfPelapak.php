<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DompdfPelapak extends CI_Controller {

	function __construct() {
		parent::__construct();	
		$this->load->model('m_laporanpelapak');
		$this->load->helper('url');
	}
	
    public function index()
	{
        $data['pelapakumkm'] = $this->m_laporanpelapak->tampil_data();
	    $this->load->library('pdf');
	    $this->pdf->setPaper('A4', 'landscape');
	    $this->pdf->filename = "Izin-Mikro.pdf";
		$this->pdf->load_view('lapPelapakPdf', $data);
	}
	
}