<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    // List all your items
    
	public function __construct()
	{
		parent::__construct();
        $this->load->model('m_pelapakumkm');
		$this->load->model('m_kategori');
        $this->load->model('m_keranjang');
	} 

    public function index()
    {
    
        $data = array(
            'title' => 'Home',
            'isi' => 'user/home',
        );
        $this->load->view('layout_frontend/wrapper', $data, FALSE);
    }

    public function lokasi()
    {
        $dataPelapak = $this->m_pelapakumkm->tampil_pelapakumkm(true);
        $dataKategori = $this->m_kategori->tampil_kategori(true); //ambil data kategori
        foreach ($dataKategori as $k => $v) {
            // hitung ada berapa lapak di kategori tersebut
            $countLapak = $this->db->where(['idkategori' => $v['idkategori']])->count_all_results('pelapakumkm');
            $dataKategori[$k]['total_lapak'] = $countLapak;
        }
        $data = array(
            'title' => 'Lokasi',
            'pelapakumkm' => $dataPelapak,
            'kategori' =>  $dataKategori, //parsing data kategori ke view
            'isi' => 'user/lokasi',
        );
        $this->load->view('layout_frontend/wrapper', $data, FALSE);
    }

    public function get_lapak_by_kategori($idkategori)
    {
        $dataPelapak = $this->m_pelapakumkm->tampil_pelapakumkm_by_kategori($idkategori);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($dataPelapak,JSON_UNESCAPED_UNICODE));
    }
}