<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->library('session');
			$this->load->model('m_kategori');
			$this->load->helper('url');
	}

	public function index() {
		$data['kategori'] = $this->m_kategori->tampil_kategori();
		$this->load->view('layout_backend/header', $data);
		$this->load->view('admin/kategori', $data);
		$this->load->view('layout_backend/footer', $data);
	}

	public function add()
    {
        $data = array(
            'namakategori' => $this->input->post('namaKategori'),
        );
        $this->m_kategori->add($data);
         $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        redirect('kategori');
    } 
	public function edit( $idkategori = NULL )
    {
        $data = array(
            'idkategori' => $idkategori,
            'namaKategori' => $this->input->post('namaKategori'),
        );
        $this->m_kategori->edit($data);
         $this->session->set_flashdata('pesan', 'Data Berhasil Diubah !!!');
        redirect('kategori');
    }

	public function delete( $idkategori = NULL )
    {
        $data = array('idkategori' => $idkategori);
        $this->m_kategori->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
        redirect('kategori');
    }	
}
