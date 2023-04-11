<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_m');
        $this->load->model('harga_m');
        $this->load->model('pelanggan_m');
        $this->load->model('nominal_m');
        $this->load->model('auth_m');
    }

    public function index()
    {
        $data['transaksi'] = $this->transaksi_m->findall();
        $data['subview'] = 'admin/transaksi/index';

        $this->load->view('admin/_layout', $data);
    }


    public function create()
    {

        $this->form_validation->set_rules(
            'no_telp',
            'NoTelp',
            'required|min_length[4]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nomor Telepon Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nomor Telepon Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'id_pelanggan',
            'Pelanggan Id',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Pelanggan id Harus di Isi</div>",
            ]
        );
        $this->form_validation->set_rules(
            'id_nominal',
            'Nominal Id',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nominal id Harus di Isi</div>",
            ]
        );
        $this->form_validation->set_rules(
            'id_harga',
            'Harga Id',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Harga id Harus di Isi</div>",
            ]
        );
        $this->form_validation->set_rules(
            'status',
            'Status',
            'required|min_length[4]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Status Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Status Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'tgl_tempo',
            'Tanggal-Tempo',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Tanggal Tempo id Harus di Isi</div>",
            ]
        );

        if ($this->form_validation->run() != true) {
            $data['subview'] = 'admin/transaksi/create';
            $data['pelanggan'] = $this->pelanggan_m->findAll();
            $data['nominal'] = $this->nominal_m->findAll();
            $data['harga'] = $this->harga_m->findAll();
            $this->load->view('admin/_layout', $data);
        } else {
            $uid = $this->session->userdata('user_id');
            $no_telp = $this->input->post('no_telp');
            $id_pelanggan = $this->input->post('id_pelanggan');
            $id_nominal = $this->input->post('id_nominal');
            $id_harga = $this->input->post('id_harga');
            $status = $this->input->post('status');
            $tgl_temp = $this->input->post('tgl_tempo');
            $kode_transaksi = $this->transaksi_m->kdotomatis($uid);

            if ($this->transaksi_m->create($kode_transaksi, $no_telp, $id_pelanggan, $id_nominal, $id_harga, $status, $tgl_temp, $uid)) {
                $this->session->set_flashdata('success_transaksi', 'Proses membuat transksi Berhasil');
                redirect("admin/transaksi");
            } else {
                $this->session->set_flashdata('error_transaksi', 'Error pembuatan transaksi');
                redirect("admin/transaksi", 'refresh');
            }
        }
    }
    public function edit($id=null){
        $this->form_validation->set_rules(
            'no_telp',
            'NoTelp',
            'required|min_length[4]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nomor Telepon Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nomor Telepon Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'id_pelanggan',
            'Pelanggan Id',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Pelanggan id Harus di Isi</div>",
            ]
        );
        $this->form_validation->set_rules(
            'id_nominal',
            'Nominal Id',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nominal id Harus di Isi</div>",
            ]
        );
        $this->form_validation->set_rules(
            'id_harga',
            'Harga Id',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Harga id Harus di Isi</div>",
            ]
        );
        $this->form_validation->set_rules(
            'status',
            'Status',
            'required|min_length[4]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Status Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Status Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'tgl_tempo',
            'Tanggal-Tempo',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Tanggal Tempo id Harus di Isi</div>",
            ]
        );

        if($this->form_validation->run() != true){
            $where = array('id_transaksi' => $id);

            $data['transaksi'] = $this->transaksi_m->findById($where, 'tbl_transaksi')->result();
            $data['pelanggan'] = $this->pelanggan_m->findAll();
            $data['nominal'] = $this->nominal_m->findAll();
            $data['harga'] = $this->harga_m->findAll();
            $data['subview'] = 'admin/transaksi/edit';

            $this->load->view('admin/_layout', $data);
        }else{
            $id = $this->input->post('id');
            $uid = $this->session->userdata('user_id');
            $no_telp = $this->input->post('no_telp');
            $id_pelanggan = $this->input->post('id_pelanggan');
            $id_nominal = $this->input->post('id_nominal');
            $id_harga = $this->input->post('id_harga');
            $status = $this->input->post('status');
            $tgl_temp = $this->input->post('tgl_tempo');
            $kode_transaksi = $this->transaksi_m->kdotomatis($uid);

            if ($this->transaksi_m->update($id,$kode_transaksi, $no_telp, $id_pelanggan, $id_nominal, $id_harga, $status, $tgl_temp, $uid)) {
                $this->session->set_flashdata('success_transaksi', 'Proses update transksi Berhasil');
                redirect("admin/transaksi");
            } else {
                $this->session->set_flashdata('error_transaksi', 'Error update transaksi');
                redirect("admin/transaksi", 'refresh');
            }
        }
    }

    public function delete($id){
        $this->auth_m->isAdmin() == true || redirect('admin/transaksi');

        if($this->transaksi_m->delete($id) == true){
            $this->session->set_flashdata('success_transaksi','Proses Delete transaksi Berhasil');
            redirect("admin/transaksi");
        }else{
            $this->session->set_flashdata('error_transaksi','Error Delete transaksi, undefined id' );
            redirect("admin/transaksi", 'refresh');
        }
    }


    public function listHutang(){
        $data['transaksi'] = $this->transaksi_m->get_transaksi_hutang();
        $data['subview'] = 'admin/transaksi/hutang';

        $this->load->view('admin/_layout', $data);
    }

    public function listLunas(){
        $data['transaksi'] = $this->transaksi_m->get_transaksi_lunas();
        $data['subview'] = 'admin/transaksi/lunas';

        $this->load->view('admin/_layout', $data);
    }
}
