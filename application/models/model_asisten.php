<?php 

class Model_asisten extends CI_Model{
    public function tampil_data(){
        return $this->db->get('tbl_art');
    }

    public function tambah_asisten($data,$table){
        $this->db->insert($table,$data);
    }

    public function edit_asisten($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     }

     public function find($id)
     {
        $result = $this->db->where('id_art',$id)
                            ->limit(1)
                            ->get('tbl_art');
        if($result->num_rows()>0){
            return $result->row();
        }else{
            return array();
        }
     }

     public function detail_art($id_art)
     {
         $result = $this->db->where('id_art',$id_art)->get('
         tbl_art');
         if($result->num_rows() > 0 ){
             return $result->result();
         }else{
             return false;
         }
     }
}

