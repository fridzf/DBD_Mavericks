<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Produk extends CI_Model{
    public function getAll(){
        $query = $this->db->query("select * from T_Produk");
        return $query->result();
    }
}
