<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Gelora extends CI_Controller {
	public function index()
	{
		$this->load->view('v_login');
	}

	public function gotoProduk()
	{
		$data_produk = $this->M_Produk->getAll();
		$temp['data'] = $data_produk;
		$temp['caption'] = "DAFTAR PRODUK";
		$this->load->view('v_produk', $temp);
	}

	public function gotoMitra()
	{
		$data_mitra = $this->M_Mitra->getAll();
		$temp['data'] = $data_mitra;
		$temp['caption'] = "DAFTAR MITRA PERUSAHAAN";
		$this->load->view('v_mitra', $temp);
	}
    
	public function gotoKarir()
	{
		$this->load->view('v_karir');
	}
    
	public function gotoTentang()
	{
		$this->load->view('v_tentang');
	}
    
	public function gotoHome()
	{
		$this->load->view('v_home');
	}

	public function cekLogin(){
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		// print_r($_POST);
		// exit();
		//cek
		if ($user=="xxx" && $pass=="yyy") {
			$this->gotoHome();
		} else {
			$this->index();
		}
	}	
}
