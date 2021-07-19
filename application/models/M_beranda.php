<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_beranda extends CI_Model 
{
	function hitung_pelapak()
	{
		return $this->db->get('pelapakumkm')->num_rows();
	}

	function hitung_pengguna()
	{
		return $this->db->get('user_2')->num_rows();
	}

	function hitung_kategori()
	{
		return $this->db->get('kategori')->num_rows();
	}

}