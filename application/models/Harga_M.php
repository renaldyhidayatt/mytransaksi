<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga_M extends CI_Model{
    public function findAll(){
        return $this->db->get('tbl_harga')->result();
    }

    public function create($harga, $uid){
        $data = [
            'harga' => $harga,
            'uid' => $uid,
        ];

        return $this->db->insert('tbl_harga', $data);
    }

    public function findById($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update($id_harga,$harga, $uid){
        $this->db->where('id_harga', $id_harga);
        $data = [
            'harga' => $harga,
            'uid' => $uid
        ];
        $this->db->update('tbl_harga', $data);

        return true;
    }

    public function delete($id){
        $this->db->where('id_harga', $id);

        $this->db->delete('tbl_harga');

        return true;
    }
}