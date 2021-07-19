<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelapakumkm extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_pelapakumkm');
		$this->load->model('m_kategori');
		$this->load->model('m_pengguna');
		$this->load->helper('url');
	}
	public function index() {
		$data['pelapakumkm'] = $this->m_pelapakumkm->tampil_pelapakumkm();
		$this->load->view('layout_backend/header', $data);
		$this->load->view('admin/pelapakumkm', $data);
		$this->load->view('layout_backend/footer', $data);
	}
	
	public function add() {
	$this->form_validation->set_rules('namaUmkm', 'Nama UMKM', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('NIB', 'NIB', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('namaPmlk', 'Nama Pelapak', 'required',  array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('Kecamatan', 'Kecamatan', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('Kelurahan', 'Kelurahan', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('LatitudeAlamat', 'Latitude Alamat', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('LongitudeAlamat', 'Longitude Alamat', 'required', array('required' => '%s Harus Diisi !!!')
	);
	$this->form_validation->set_rules('noTelepon', 'No Telepon', 'required', array('required' => '%s Harus Diisi !!!')
	);
		if ($this->form_validation->run()== FALSE) {
			$this->load->view('layout_backend/header');
			$this->load->view('admin/inputpelapakumkm');
			$this->load->view('layout_backend/footer');
		} else {
			  $data = array(
	          'namaUmkm' => $this->input->post('namaUmkm'),
	          'idUser' => $this->input->post('idUser'),
	          'idkategori' => $this->input->post('idkategori'),
	          'NIB' => $this->input->post('NIB'),
	          'deskripsi' => $this->input->post('deskripsi'),
	          'namaPmlk' => $this->input->post('namaPmlk'),
	          'Kecamatan' => $this->input->post('Kecamatan'),
	          'Kelurahan' => $this->input->post('Kelurahan'),
	          'alamat' => $this->input->post('alamat'),
	          'LatitudeAlamat' => $this->input->post('LatitudeAlamat'),
	          'LongitudeAlamat' => $this->input->post('LongitudeAlamat'),
	          'noTelepon' => $this->input->post('noTelepon'),
	          'idProvince'		=> $this->input->post('idProvince'),
	          'idCity'			=> $this->input->post('idCity'),
	          'provinceName'	=> $this->input->post('provinceName'),
	          'cityName'		=> $this->input->post('cityName'),
	          'totalSaldo'		=> 0,
		); 
				
			$this->m_pelapakumkm->simpan($data);
			redirect('pelapakumkm/add');
		}
		
	}

	public function edit( $idPelapak = NULL )
    {
	$this->form_validation->set_rules('namaUmkm', 'Nama UMKM', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('NIB', 'NIB', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('namaPmlk', 'Nama Pelapak', 'required',  array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('Kecamatan', 'Kecamatan', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('Kelurahan', 'Kelurahan', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('LatitudeAlamat', 'Latitude Alamat', 'required', array('required' => '%s Harus Diisi !!!'));
	$this->form_validation->set_rules('LongitudeAlamat', 'Longitude Alamat', 'required', array('required' => '%s Harus Diisi !!!')
	);
	$this->form_validation->set_rules('noTelepon', 'No Telepon', 'required', array('required' => '%s Harus Diisi !!!')
	);
	if ($this->form_validation->run()== FALSE) {
			$data = $this->m_pelapakumkm->tampil_pelapak($idPelapak);
			$this->load->view('layout_backend/header');
			$this->load->view('admin/editpelapakumkm', ['pelapakumkm' => $data]);
			$this->load->view('layout_backend/footer');
		} else {
        $data = array(
        	  'idPelapak'		=> $idPelapak,
	          'namaUmkm' 		=> $this->input->post('namaUmkm'),
	          'idUser' 			=> $this->input->post('idUser'),
	          'idkategori' 		=> $this->input->post('idkategori'),
	          'NIB' 			=> $this->input->post('NIB'),
	          'deskripsi'		=> $this->input->post('deskripsi'),
	          'namaPmlk' 		=> $this->input->post('namaPmlk'),
	          'Kecamatan' 		=> $this->input->post('Kecamatan'),
	          'Kelurahan'		=> $this->input->post('Kelurahan'),
	          'alamat' 			=> $this->input->post('alamat'),
	          'LatitudeAlamat' 	=> $this->input->post('LatitudeAlamat'),
	          'LongitudeAlamat' => $this->input->post('LongitudeAlamat'),
	          'noTelepon' 		=> $this->input->post('noTelepon'),
        );
        $this->m_pelapakumkm->edit($data);
        redirect('pelapakumkm');
    	}
	}

	public function delete( $idPelapak = NULL )
    {
        $data = array('idPelapak' => $idPelapak);
        $this->m_pelapakumkm->delete($data);
        redirect('pelapakumkm');
    }	
	
}
