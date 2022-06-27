<?php

class Model_chart extends CI_Model
{

    public function siswaPertahun()
    {
        $query = "SELECT stok AS STOK, COUNT(*) AS total_stok FROM tbl_art
                    GROUP BY stok";
        $result = $this->db->query($query)->result();
        return $result;
    }
}

