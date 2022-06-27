<?php 

class Model_kategori extends CI_Model{
    public function data_pembantu(){
       return $this->db->get_where("tbl_art ",array('
       kategori' => 'pembantu'));
    }

    public function data_baby_sitter(){
       return $this->db->get_where("tbl_art ",array('
       kategori' => 'baby sitter'));
    } 

    public function data_tukang_kebun(){
       return $this->db->get_where("tbl_art ",array('
       kategori' => 'tukang kebun'));
    }

    public function data_satpam(){
       return $this->db->get_where("tbl_art ",array('
       kategori' => 'satpam'));
    }
}
?>