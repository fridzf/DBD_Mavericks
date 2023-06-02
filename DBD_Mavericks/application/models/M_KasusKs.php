<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_KasusKs extends CI_Model{
    public function getAll(){
        $query = $this->db->query("select * from T_Mitra");
        return $query->result();
    }
    
    public function getAlljoinK(){
        $query = $this->db->query("SELECT
        t_tahun.tahun, 
        t_kab_kota.kode_kab, 
        t_kab_kota.nama_kab, 
        t_jenis_kasus.jenis_kasus, 
        t_kasus_ks.jumlah_kasus_ks
    FROM
        t_kasus_ks
        INNER JOIN
        t_tahun
        ON 
            t_kasus_ks.id_tahun = t_tahun.id_tahun
        INNER JOIN
        t_kab_kota
        ON 
            t_kasus_ks.id_kota = t_kab_kota.id_kab
        INNER JOIN
        t_jenis_kasus
        ON 
            t_kasus_ks.id_ks = t_jenis_kasus.id_kasus
    WHERE
        t_kasus_ks.id_ks = 1
    ORDER BY
        t_kasus_ks.id_kota ASC,
        t_kasus_ks.id_tahun ASC");
        return $query->result();
    }

    public function getAlljoinS(){
        $query = $this->db->query("SELECT
        t_tahun.tahun, 
        t_kab_kota.kode_kab, 
        t_kab_kota.nama_kab, 
        t_jenis_kasus.jenis_kasus, 
        t_kasus_ks.jumlah_kasus_ks
    FROM
        t_kasus_ks
        INNER JOIN
        t_tahun
        ON 
            t_kasus_ks.id_tahun = t_tahun.id_tahun
        INNER JOIN
        t_kab_kota
        ON 
            t_kasus_ks.id_kota = t_kab_kota.id_kab
        INNER JOIN
        t_jenis_kasus
        ON 
            t_kasus_ks.id_ks = t_jenis_kasus.id_kasus
    WHERE
        t_kasus_ks.id_ks = 2
    ORDER BY
        t_kasus_ks.id_kota ASC,
        t_kasus_ks.id_tahun ASC");
        return $query->result();
    }
    public function updateKS($data, $id)
	{
		$this->db->where('t_kasus_ks',$id);
		$this->db->update('t_kasus_ks',$data);
	}

    public function insertKS($data)
	{
		$this->db->insert('t_kasus_ks',$data);
	}

    public function deleteKS($id)
	{
		$this->db->where('id_kasus_ks',$id);
		$this->db->delete('t_kasus_ks');
	}

    public function getKS($id)
	{
		$this->db->where('id_kasus_ks',$id);
		$query = $this->db->get('t_kasus_ks');
		return $query->row();
	}
}
