<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_M extends CI_Model{
  
    public function sumHarga(){
        $uid = $this->session->userdata('user_id');
        $this->db->query("SELECT SUM(tbl_harga.harga) AS harga FROM tbl_transaksi,tbl_harga WHERE tbl_transaksi.id_harga=tbl_harga.id_harga AND tbl_transaksi.uid=$uid ")->result();
    }

    public function sumHutang(){
        $uid = $this->session->userdata('user_id');
        $this->db->query("SELECT SUM(tbl_harga.harga) AS harga FROM tbl_transaksi,tbl_harga WHERE tbl_transaksi.id_harga=tbl_harga.id_harga AND tbl_transaksi.status='HUTANG' AND tbl_transaksi.uid=$uid ")->result();
    }

    public function sumLunas(){
        $uid = $this->session->userdata('user_id');
        $this->db->query("SELECT SUM(tbl_harga.harga) AS harga FROM tbl_transaksi,tbl_harga WHERE tbl_transaksi.id_harga=tbl_harga.id_harga AND tbl_transaksi.status='LUNAS' AND tbl_transaksi.uid=$uid ")->result();
    }

    public function countUser(){
        $this->db->get('tbl_user')->num_rows();
    }

    public function sum_transaksi(){
        $uid=$this->session->userdata('user_id');
        return $this->db->query("SELECT tbl_transaksi.id_transaksi,tbl_transaksi.kode_transaksi,tbl_transaksi.no_telp,tbl_pelanggan.nama_pelanggan,tbl_transaksi.status,tbl_transaksi.tgl_transaksi,tbl_transaksi.uid
            FROM tbl_transaksi INNER JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan = tbl_pelanggan.id_pelanggan 
            WHERE tbl_transaksi.uid=$uid ORDER BY tbl_transaksi.id_transaksi DESC LIMIT 10")->result();
    }
}