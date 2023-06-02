<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_KasusJk extends CI_Model{
    public function getAll(){
        $query = $this->db->query("select * from t_kasus_jk");
        return $query->result();
    }
    public function getAlljoin(){
        $query = $this->db->query("SELECT
        t_bulan.nama_bulan, 
        t_tahun.tahun, 
        t_kab_kota.kode_kab, 
        t_kab_kota.nama_kab, 
        t_jenis_kelamin.jenis_kelamin, 
        t_kasus_jk.jumlah_kasus_jk, 
        curah_hujan.tingkat_ch, 
        t_kasus_jk.jml_ch
    FROM
        t_bulan
        INNER JOIN
        t_kasus_jk
        ON 
            t_bulan.id_bulan = t_kasus_jk.id_bln
        INNER JOIN
        curah_hujan
        ON 
            t_kasus_jk.id_ch = curah_hujan.id_curah_hujan
        INNER JOIN
        t_tahun
        ON 
            t_kasus_jk.id_tahun = t_tahun.id_tahun
        INNER JOIN
        t_jenis_kelamin
        ON 
            t_kasus_jk.id_jk = t_jenis_kelamin.id_jenis_kelamin
        INNER JOIN
        t_kab_kota
        ON 
            t_kasus_jk.id_kota = t_kab_kota.id_kab");
        return $query->result();
    }
    public function updateJK($data, $id)
	{
		$this->db->where('t_kasus_jk',$id);
		$this->db->update('t_kasus_jk',$data);
	}

    public function insertJK($data)
	{
		$this->db->insert('t_kasus_jk',$data);
	}

    public function deleteJK($id)
	{
		$this->db->where('id_kasus',$id);
		$this->db->delete('t_kasus_jk');
	}

    public function getJK($id){
		$this->db->where('id_kasus',$id);
		$query = $this->db->get('t_kasus_jk');
		return $query->row();
	}
}
