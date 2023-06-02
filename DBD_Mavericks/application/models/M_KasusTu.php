<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_KasusTu extends CI_Model{
    public function getAll(){
        $query = $this->db->query("select * from t_kasus_tu");
        return $query->result();
    }
    public function getAlljoin(){
        $query = $this->db->query("SELECT
        t_tahun.tahun, 
        t_kab_kota.kode_kab, 
        t_kab_kota.nama_kab, 
        t_tingkat_umur.jenis_tingkat, 
        t_kasus_tu.jumlah_kasus_tu
    FROM
        t_kasus_tu
        INNER JOIN
        t_tahun
        ON 
            t_kasus_tu.id_tahun = t_tahun.id_tahun
        INNER JOIN
        t_kab_kota
        ON 
            t_kasus_tu.id_kota = t_kab_kota.id_kab
        INNER JOIN
        t_tingkat_umur
        ON 
            t_kasus_tu.id_tingkat = t_tingkat_umur.id_tingkat
    ORDER BY
        t_kasus_tu.id_kota ASC, 
        t_kasus_tu.id_tahun ASC");
        return $query->result();
    }

    public function updateTU($data, $id)
	{
		$this->db->where('t_kasus_tu',$id);
		$this->db->update('t_kasus_tu',$data);
	}

    public function insertTU($data)
	{
		$this->db->insert('t_kasus_tu',$data);
	}

    public function deleteTU($id)
	{
		$this->db->where('id_kasus_tu',$id);
		$this->db->delete('t_kasus_tu');
	}

    public function getTU($id)
	{
		$this->db->where('id_kasus_tu',$id);
		$query = $this->db->get('t_kasus_tu');
		return $query->row();
	}
}
