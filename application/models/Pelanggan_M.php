<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_M extends CI_Model{
    public function findAll(){
        return $this->db->get('tbl_pelanggan')->result();
    }

    public function create($nama_pelanggan, $alamat, $telepon, $uid){
        $data = [
            'nama_pelanggan' => $nama_pelanggan,
            'alamat' => $alamat,
            'no_telpn' => $telepon,
            'uid' => $uid
        ];

        return $this->db->insert('tbl_pelanggan', $data);
    }

    public function findById($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update($id_pelanggan,$nama_pelanggan, $alamat, $telepon, $uid){
        $this->db->where('id_pelanggan', $id_pelanggan);
        $data = [
            'nama_pelanggan' => $nama_pelanggan,
            'alamat' => $alamat,
            'no_telpn' => $telepon,
            'uid' => $uid
        ];
        $this->db->update('tbl_pelanggan', $data);

        return true;
    }

    public function delete($id){
        $this->db->where('id_pelanggan', $id);

        $this->db->delete('tbl_pelanggan');

        return true;
    }
}