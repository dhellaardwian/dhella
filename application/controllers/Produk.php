<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
			$this->load->library('session');
			$this->load->model('m_produk');
			$this->load->model('m_pelapakumkm');
			$this->load->helper('url');
	}

	public function index() {
		$data['produk'] = $this->m_produk->tampil_umkm();
		$this->load->view('layout_backend/header', $data);
		$this->load->view('admin/produk', $data);
		$this->load->view('layout_backend/footer', $data);
	}

	public function add()
	{
        $this->form_validation->set_rules('namaProduk', 'Nama Produk', 'required', 
            array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('hargaProduk', 'Harga Produk', 'required', 
            array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('beratProduk', 'Berat Produk', 'required', 
            array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('rincianProduk', 'Deskripsi Produk', 'required', 
            array('required' => '%s Harus Diisi !!!'));
         $this->form_validation->set_rules('stok', 'Stok', 'required', 
            array('required' => '%s Harus Diisi !!!'));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $this->load->view('layout_backend/header');
                $this->load->view('admin/inputproduk', FALSE);
                $this->load->view('layout_backend/footer');
            } else {
                $data = array (
                    'namaProduk' => $this->input->post('namaProduk'),
                    'idPelapak' => $this->input->post('idPelapak'),
                    'hargaProduk' => $this->input->post('hargaProduk'),
                    'beratProduk' => $this->input->post('beratProduk'),
                    'rincianProduk' => $this->input->post('rincianProduk'),
                    'gambar' => $this->upload->data('file_name'),
                    'stok' => $this->input->post('stok'),
                );
                $this->m_produk->add($data);
                redirect('produk');
            }
        }else{
            $this->load->view('layout_backend/header');
            $this->load->view('admin/inputproduk' , FALSE);
            $this->load->view('layout_backend/footer');
        }
		
	}

    public function edit($idProduk = NULL)
    {
       $this->form_validation->set_rules('namaProduk', 'Nama Produk', 'required', 
            array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('hargaProduk', 'Harga Produk', 'required', 
            array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('beratProduk', 'Berat Produk', 'required', 
            array('required' => '%s Harus Diisi !!!'));
         $this->form_validation->set_rules('stok', 'Stok', 'required', 
            array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('rincianProduk', 'Deskripsi Produk', 'required', 
            array('required' => '%s Harus Diisi !!!'));
        if ($this->form_validation->run() == TRUE) {
            if ($_FILES['gambar']) { // mengecek uploadan gambar jika sudah diupload
                $config['upload_path'] = './assets/gambar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2000';
                $this->upload->initialize($config);
                $field_name = "gambar";
                if (!$this->upload->do_upload($field_name)) { //jika upload gagal balik lg ke form
                    $this->load->view('layout_backend/header');
                    $this->load->view('admin/editproduk', FALSE);
                    $this->load->view('layout_backend/footer');
                } else { //jika berhasil buat variable nama gambar isi nya nama gambar diupload
                    $namaGambar = $this->upload->data('file_name');
                }    
            }
            // sett data untuk edit tanpa gambar
            $data = array(
                'idProduk' => $idProduk,
                'namaProduk' => $this->input->post('namaProduk'),
                'idPelapak' => $this->input->post('idPelapak'),
                'hargaProduk' => $this->input->post('hargaProduk'),
                'beratProduk' => $this->input->post('beratProduk'),
                'stok' => $this->input->post('stok'),
                'rincianProduk' => $this->input->post('rincianProduk'),
            );
            if ($namaGambar) { //cek apakah ada variable namagambar jika ada set data edit dengan gambar
                $data['gambar'] = $namaGambar;
            }
            $this->m_produk->edit($data);
            redirect('produk');
        }else{
            $data = $this->m_produk->tampil_produk($idProduk);
            $this->load->view('layout_backend/header');
            $this->load->view('admin/editproduk' , ['produk' => $data]);
            $this->load->view('layout_backend/footer');
        }
        
    }
	
    public function delete( $idProduk = NULL )
    {
        $data = array('idProduk' => $idProduk);
        $this->m_produk->delete($data);
        redirect('produk');
    }   
}
	
