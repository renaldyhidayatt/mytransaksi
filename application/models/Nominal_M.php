<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nominal_M extends CI_Model{
    public function findAll(){
        return $this->db->get('tbl_nominal')->result();
    }

    public function create($nominal, $uid){
        $data = [
            'nominal' => $nominal,
            'uid' => $uid
        ];

        return $this->db->insert('tbl_nominal', $data);
    }

    public function findById($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update($id_nominal,$nominal, $uid){
        $this->db->where('id_nominal', $id_nominal);
        $data = [
            'nominal' => $nominal,
            'uid' => $uid
        ];
        $this->db->update('tbl_nominal', $data);

        return true;
    }

    public function delete($id){
        $this->db->where('id_nominal', $id);

        $this->db->delete('tbl_nominal');

        return true;
    }
}