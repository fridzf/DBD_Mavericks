<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Mavericks extends CI_Controller {
	public function index(){
		$data_ks_jk = $this->M_KasusJk->getAlljoin();
		$temp['ks_jenkel'] = $data_ks_jk;
		$data_ks_tu = $this->M_KasusTu->getAlljoin();
		$temp['ks_tu'] = $data_ks_tu;
		$data_ks_koid = $this->M_KasusKs->getAlljoinK();
		$temp['ks_koid'] = $data_ks_koid;
		$data_ks_sembuh = $this->M_KasusKs->getAlljoinS();
		$temp['ks_sembuh'] = $data_ks_sembuh;
		$this->load->view('v_home',$temp);
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
		$temp['caption'] = "DAFTAR MITRA id_bln";
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
    
	public function gotoHome(){
		$data_ks_jk = $this->load->M_Kasusjk->getAlljoin();
		$temp['ks_jenkel'] = $data_ks_jk;
		$this->load->view('v_home',$temp);
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

	public function delkasusjk($id){
		$this->M_KasusJK->deleteJK($id);
		//mengarahkan kembali ke tampilan semula
		redirect (base_url('/index.php/C_Mavericks/........'));
	}

	public function updatekasusjk(){
		//mnampilkan data yang ada, engambil seluruh variabel pada form
		$id = $this->input->post('id_kasus');
		$bln = $this->input->post('id_bln');
		$tahun = $this->input->post('id_tahun');
		$kota = $this->input->post('id_kota');
		$ch = $this->input->post('id_ch');
		$jk = $this->input->post('id_jk');
		$jumlah_kasus_jk = $this->input->post('jumlah_kasus_jk');
		$jml_ch = $this->input->post('jml_ch');

		//memasukkan data kedalam array
		$updateaction = array(
			'id_bln' => $bln,
			'id_tahun' => $tahun,
			'id_kota' => $kota,
			'id_ch' => $ch,
			'id_jk' => $jk,
			'jumlah_kasus_jk' => $jumlah_kasus_jk,
			'jml_ch' => $jml_ch
		);

		$this->M_KasusJK->updateJK($updateaction, $id);
		redirect (base_url('/index.php/C_Mavericks/......'));
	}

	public function updatekasusks(){
		//mnampilkan data yang ada, engambil seluruh variabel pada form
		$id = $this->input->post('id_kasus_ks');
		$tahun = $this->input->post('id_tahun');
		$kota = $this->input->post('id_kota');
		$ks = $this->input->post('id_ks');
		$jumlah_kasus_ks = $this->input->post('jumlah_kasus_ks');

		//memasukkan data kedalam array
		$updateaction = array(
			'id_tahun' => $tahun,
			'id_kota' => $kota,
			'id_ch' => $ch,
			'id_ks' => $ks,
			'jumlah_kasus_ks' => $jumlah_kasus_ks,
		);

		$this->M_KasusKs->updateKS($updateaction, $id);
		redirect (base_url('/index.php/C_Mavericks/......'));
	}

	public function updatekasustu(){
		//mnampilkan data yang ada, engambil seluruh variabel pada form
		$id = $this->input->post('id_kasus_tu');
		$tahun = $this->input->post('id_tahun');
		$kota = $this->input->post('id_kota');
		$tingkat = $this->input->post('id_tingkat');
		$jumlah_kasus_tu = $this->input->post('jumlah_kasus_tu');

		//memasukkan data kedalam array
		$updateaction = array(
			'id_tahun' => $tahun,
			'id_kota' => $kota,
			'id_ch' => $ch,
			'id_tingkat' => $tingkat,
			'jumlah_kasus_tu' => $jumlah_kasus_tu,
		);

		$this->M_KasusTu->updateTU($updateaction, $id);
		redirect (base_url('/index.php/C_Mavericks/......'));
	}

	public function delkasusks($id){
		$this->M_KasusKs->deleteKS($id);
		//mengarahkan kembali ke tampilan semula
		redirect (base_url('/index.php/C_Mavericks/........'));
	}

	public function delkasustu($id){
		$this->M_KasusKTu->deleteTU($id);
		//mengarahkan kembali ke tampilan semula
		redirect (base_url('/index.php/C_Mavericks/........'));
	}

	public function createActionJK(){
		$id = $this->input->post('id_kasus');
		$bln = $this->input->post('id_bln');
		$tahun = $this->input->post('id_tahun');
		$kota = $this->input->post('id_kota');
		$ch = $this->input->post('id_ch');
		$jk = $this->input->post('id_jk');
		$jumlah_kasus_jk = $this->input->post('jumlah_kasus_jk');
		$jml_ch = $this->input->post('jml_ch');

		//memasukkan data kedalam array
		$createaction = array(
			'id_bln' => $bln,
			'id_tahun' => $tahun,
			'id_kota' => $kota,
			'id_ch' => $ch,
			'id_jk' => $jk,
			'jumlah_kasus_jk' => $jumlah_kasus_jk,
			'jml_ch' => $jml_ch
		);

		$this->M_KasusJK->insertJK($createaction, $id);
		redirect (base_url('/index.php/C_Mavericks/......'));
	}

	public function createActionKS(){
		//mnampilkan data yang ada, engambil seluruh variabel pada form
		$id = $this->input->post('id_kasus_ks');
		$tahun = $this->input->post('id_tahun');
		$kota = $this->input->post('id_kota');
		$ks = $this->input->post('id_ks');
		$jumlah_kasus_ks = $this->input->post('jumlah_kasus_ks');

		//memasukkan data kedalam array
		$createaction = array(
			'id_tahun' => $tahun,
			'id_kota' => $kota,
			'id_ch' => $ch,
			'id_ks' => $ks,
			'jumlah_kasus_ks' => $jumlah_kasus_ks,
		);

		$this->M_KasusKs->insertKS($createaction, $id);
		redirect (base_url('/index.php/C_Mavericks/......'));
	}


	public function createActionTU(){
		//mnampilkan data yang ada, engambil seluruh variabel pada form
		$id = $this->input->post('id_kasus_tu');
		$tahun = $this->input->post('id_tahun');
		$kota = $this->input->post('id_kota');
		$tingkat = $this->input->post('id_tingkat');
		$jumlah_kasus_tu = $this->input->post('jumlah_kasus_tu');

		//memasukkan data kedalam array
		$createaction = array(
			'id_tahun' => $tahun,
			'id_kota' => $kota,
			'id_ch' => $ch,
			'id_tingkat' => $tingkat,
			'jumlah_kasus_tu' => $jumlah_kasus_tu,
		);

		$this->M_KasusTu->insertTU($createaction, $id);
		redirect (base_url('/index.php/C_Mavericks/......'));
	}
}
