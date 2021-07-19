<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekeningpelapak extends CI_Controller {

	function __construct()
	{
		parent::__construct();
            $this->load->library('session');
			$this->load->model('m_rekeningpelapak');
			$this->load->model('m_pelapakumkm');
			$this->load->helper('url');
	}

	public function index() {
		$data['rekeningpelapak'] = $this->m_rekeningpelapak->tampil_rekeningpelapak();
		$this->load->view('layout_backend/header', $data);
		$this->load->view('admin/rekeningpelapak', $data);
		$this->load->view('layout_backend/footer', $data);
	}

	public function add()
    {
        $data = array(
          'idPelapak' => $this->input->post('idPelapak'),
          'namaBank' => $this->input->post('namaBank'),
          'noRek' => $this->input->post('noRek'),
          'namaRek' => $this->input->post('namaRek'),  
        );
        $this->m_rekeningpelapak->add($data);
        redirect('rekeningpelapak');
    } 
	public function edit( $idRekening = NULL )
    {
        $data = array(
            'idRekening' => $idRekening,
            'namaBank' => $this->input->post('namaBank'),
            'noRek' => $this->input->post('noRek'),
            'namaRek' => $this->input->post('namaRek'),

        );

        $this->m_rekeningpelapak->edit($data);
         $this->session->set_flashdata('pesan', 'Data Berhasil Diubah !!!');
        redirect('rekeningpelapak');
    }

	public function delete( $idRekening = NULL )
    {
        $data = array('idRekening' => $idRekening);
        $this->m_rekeningpelapak->delete($data);
        redirect('rekeningpelapak');
    }	
}
