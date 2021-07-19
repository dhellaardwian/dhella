<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	function __construct()
	{
		parent::__construct();
			$this->load->library('session');
			$this->load->model('m_pengguna');
			$this->load->helper('url');
	}

	public function index() {
		$data['pengguna'] = $this->m_pengguna->tampil_pengguna();
		$this->load->view('layout_backend/header', $data);
		$this->load->view('admin/pengguna', $data);
		$this->load->view('layout_backend/footer', $data);
	}

	public function add()
    {
       $config['upload_path'] = './assets/foto/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "foto";
            if (!$this->upload->do_upload($field_name)) {
                $this->load->view('layout_backend/header');
                $this->load->view('admin/pengguna', FALSE);
                $this->load->view('layout_backend/footer');
            } else {
                $data = array (
					'namaPengguna' => $this->input->post('namaPengguna'),
					'username' => $this->input->post('username'),
					'pass' => MD5($this->input->post('pass')),
					'level' => $this->input->post('level'),
					'foto' => $this->upload->data('file_name'),
                );
               $this->m_pengguna->add($data);
        		redirect('pengguna');
            }
    } 

	public function edit( $idUser = NULL )
    {
        if ($_FILES['foto']) { // mengecek uploadan foto jika sudah diupload
                $config['upload_path'] = './assets/foto/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2000';
                $this->upload->initialize($config);
                $field_name = "foto";
                if (!$this->upload->do_upload($field_name)) { 
                    $this->load->view('layout_backend/header');
                    $this->load->view('admin/pengguna', FALSE);
                    $this->load->view('layout_backend/footer');
                } else { 
                    $namaGambar = $this->upload->data('file_name');
                }    
            }
		           $data = array (
		         	'idUser' => $idUser,
					'namaPengguna' => $this->input->post('namaPengguna'),
					'username' => $this->input->post('username'),
					'level' => $this->input->post('level'),
				);
            if ($namaGambar) { 
                $data['foto'] = $namaGambar;
            }
            $this->m_pengguna->edit($data);
            redirect('pengguna');
    }

	public function delete( $idUser = NULL )
    {
        $data = array('idUser' => $idUser);
        $this->m_pengguna->delete($data);
        redirect('pengguna');
    }	
}
