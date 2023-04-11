<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_M extends CI_Model
{
    public function findAll()
    {
        $uid=$this->session->userdata('user_id');
        return $this->db->query("SELECT tbl_transaksi.id_transaksi,tbl_transaksi.kode_transaksi,tbl_transaksi.no_telp,tbl_pelanggan.nama_pelanggan,tbl_pelanggan.alamat,tbl_pelanggan.no_telpn,tbl_nominal.nominal,tbl_harga.harga,
            tbl_transaksi.status,tbl_transaksi.tgl_transaksi,tbl_transaksi.tgl_tempo,tbl_transaksi.tgl_bayar,tbl_transaksi.uid
            FROM tbl_transaksi INNER JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan = tbl_pelanggan.id_pelanggan INNER JOIN tbl_nominal ON tbl_transaksi.id_nominal = tbl_nominal.id_nominal 
            INNER JOIN tbl_harga ON tbl_transaksi.id_harga = tbl_harga.id_harga WHERE tbl_transaksi.uid=$uid ORDER BY tbl_transaksi.id_transaksi DESC")->result();
    }

    public function create($kode_transaksi, $no_telp, $id_pelanggan, $id_nominal, $id_harga, $status, $tgl_tempo, $uid)
    {
        $data = [
            'kode_transaksi' => $kode_transaksi,
            'no_telp' => $no_telp,
            'id_pelanggan' => $id_pelanggan,
            'id_nominal' => $id_nominal,
            'id_harga' => $id_harga,
            'status' => $status,
            'tgl_tempo' => $tgl_tempo,
            'uid' => $uid
        ];

        return $this->db->insert('tbl_transaksi', $data);
    }

    public function findById($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update($kode_transaksi, $no_telp, $id_pelanggan, $id_nominal, $id_harga, $status, $tgl_transaksi, $tgl_tempo, $tgl_bayar, $uid)
    {
        $data = [
            'kode_transaksi' => $kode_transaksi,
            'no_telp' => $no_telp,
            'id_pelanggan' => $id_pelanggan,
            'id_nominal' => $id_nominal,
            'id_harga' => $id_harga,
            'status' => $status,
            'tgl_transaksi' => $tgl_transaksi,
            'tgl_temp' => $tgl_tempo,
            'tgl_bayar' => $tgl_bayar,
            'uid' => $uid
        ];
        $this->db->update('tbl_transaksi', $data);

        return true;
    }

    public function delete($id)
    {
        $this->db->where('id_transaksi', $id);

        $this->db->delete('tbl_transaksi');

        return true;
    }



    function get_transaksi_lunas()
    {
        $uid = $this->session->userdata('user_id');
        return $this->db->query("SELECT tbl_transaksi.id_transaksi,tbl_transaksi.kode_transaksi,tbl_transaksi.no_telp,tbl_pelanggan.nama_pelanggan,tbl_pelanggan.alamat,tbl_pelanggan.no_telpn,tbl_nominal.nominal,tbl_harga.harga,
            tbl_transaksi.status,tbl_transaksi.tgl_transaksi,tbl_transaksi.tgl_tempo,tbl_transaksi.tgl_bayar,tbl_transaksi.uid
            FROM tbl_transaksi INNER JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan = tbl_pelanggan.id_pelanggan INNER JOIN tbl_nominal ON tbl_transaksi.id_nominal = tbl_nominal.id_nominal 
            INNER JOIN tbl_harga ON tbl_transaksi.id_harga = tbl_harga.id_harga WHERE tbl_transaksi.uid=$uid AND tbl_transaksi.status='LUNAS' ORDER BY tbl_transaksi.id_transaksi DESC")->result();
    }

    function get_transaksi_hutang()
    {
        $uid = $this->session->userdata('user_id');
        return $this->db->query("SELECT tbl_transaksi.id_transaksi,tbl_transaksi.kode_transaksi,tbl_transaksi.no_telp,tbl_pelanggan.nama_pelanggan,tbl_pelanggan.alamat,tbl_pelanggan.no_telpn,tbl_nominal.nominal,tbl_harga.harga,
            tbl_transaksi.status,tbl_transaksi.tgl_transaksi,tbl_transaksi.tgl_tempo,tbl_transaksi.tgl_bayar,tbl_transaksi.uid
            FROM tbl_transaksi INNER JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan = tbl_pelanggan.id_pelanggan INNER JOIN tbl_nominal ON tbl_transaksi.id_nominal = tbl_nominal.id_nominal 
            INNER JOIN tbl_harga ON tbl_transaksi.id_harga = tbl_harga.id_harga WHERE tbl_transaksi.uid=$uid AND tbl_transaksi.status='HUTANG' ORDER BY tbl_transaksi.id_transaksi DESC")->result();
    }

    function kdotomatis($uid) {
        $jenis = $uid.date('ym');
        $query = $this->db->query("SELECT max(kode_transaksi) as maxID FROM tbl_transaksi WHERE kode_transaksi LIKE '$jenis%'");
        $data = $query->row_array();
        $idMax = $data['maxID'];
        $noUrut = (int) substr($idMax, 6, 3);
        $noUrut++;
        $newID = $jenis . sprintf("%03s", $noUrut);
        return $newID;
    }
}
