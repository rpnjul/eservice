<?php
class M_stok extends CI_Model{
 
    function get_kategori(){
        $hasil=$this->db->query("SELECT id,name FROM categories");
        return $hasil;
    }
 
    function get_subkategori($id){
        $hasil=$this->db->query("SELECT * FROM Stoks WHERE category_id='$id'");
        return $hasil->result();
    }
}