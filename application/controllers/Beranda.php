<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index() {
		$this->load->view('layout_backend/header');
		$this->load->view('admin/beranda');
		$this->load->view('layout_backend/footer');
	}
}
