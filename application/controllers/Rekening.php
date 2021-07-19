<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->library('session');
			$this->load->model('m_rekening');
			$this->load->helper('url');
	}

	public function index() {
		$data['rekening'] = $this->m_rekening->tampil_rekening();
		$this->load->view('layout_backend/header', $data);
		$this->load->view('admin/rekening', $data);
		$this->load->view('layout_backend/footer', $data);
	}

	public function add()
    {
        $data = array(
            'namaBank' => $this->input->post('namaBank'),
            'nomorRek' => $this->input->post('nomorRek'),
            'namaRek' => $this->input->post('namaRek'),
        );
        $this->m_rekening->add($data);
        redirect('rekening');
    } 
	public function edit( $idRekening = NULL )
    {
        $data = array(
            'idRekening' => $idRekening,
            'namaBank' => $this->input->post('namaBank'),
            'nomorRek' => $this->input->post('nomorRek'),
            'namaRek' => $this->input->post('namaRek'),
        );
        $this->m_rekening->edit($data);
        redirect('rekening');
    }

	public function delete( $idRekening = NULL )
    {
        $data = array('idRekening' => $idRekening);
        $this->m_rekening->delete($data);
        redirect('rekening');
    }	
}
