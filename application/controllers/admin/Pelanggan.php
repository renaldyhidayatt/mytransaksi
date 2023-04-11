<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_m');
        $this->load->model('auth_m');
    }

    public function index()
    {
        $data['pelanggan'] = $this->pelanggan_m->findall();
        $data['subview'] = 'admin/pelanggan/index';

        $this->load->view('admin/_layout', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama Pelanggan',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Pelanggan Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Pelanggan Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Alamat Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Alamat Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'no_telepon',
            'NomorTelepon',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>NomorTelepon Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>NomorTelepon Terlalu Pendek</div>"
            ]
        );

        if ($this->form_validation->run() != true) {
            $data['subview'] = 'admin/pelanggan/create';
            $this->load->view('admin/_layout', $data);
        } else {
            $nama_pelanggan = $this->input->post('nama_pelanggan');
            $alamat = $this->input->post('alamat');
            $no_telpn = $this->input->post('no_telepon');
            $uid = $this->session->userdata('user_id');
            if ($this->pelanggan_m->create($nama_pelanggan, $alamat, $no_telpn, $uid) == true) {
                $this->session->set_flashdata('success_pelanggan', 'Proses membuat pelanggan Berhasil');
                redirect("admin/nominal");
            } else {
                $this->session->set_flashdata('error_pelanggan', 'Error pembuatan Pelanggan');
                redirect("admin/nominal", 'refresh');
            }
        }
    }

    public function edit($id = null)
    {
        $this->auth_m->isAdmin() == true || redirect("admin/pelanggan");

        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama Pelanggan',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Pelanggan Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Pelanggan Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Alamat Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Alamat Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'no_telepon',
            'NomorTelepon',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>NomorTelepon Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>NomorTelepon Terlalu Pendek</div>"
            ]
        );

        if ($this->form_validation->run() != true) {
            $where = array('id_pelanggan' => $id);

            $data['pelanggan'] = $this->pelanggan_m->findById($where, 'tbl_pelanggan')->result();
            $data['subview'] = 'admin/pelanggan/edit';

            $this->load->view('admin/_layout', $data);
        } else {
            $id = $this->input->post('id');
            $nama_pelanggan = $this->input->post('nama_pelanggan');
            $alamat = $this->input->post('alamat');
            $no_telpn = $this->input->post('no_telepon');
            $uid = $this->session->userdata('user_id');

            if ($this->pelanggan_m->update($id, $nama_pelanggan, $alamat, $no_telpn, $uid) == true) {
                $this->session->set_flashdata('success_pelanggan', 'Proses Update pelanggan Berhasil');
                redirect("admin/pelanggan");
            } else {
                $this->session->set_flashdata('error_pelanggan', 'Error Update pelanggan');
                redirect("admin/pelanggan", 'refresh');
            }
        }
    }

    public function delete($id)
    {
        $this->auth_m->isAdmin() == true || redirect("admin/pelanggan");

        if ($this->nominal_m->delete($id) == true) {
            $this->session->set_flashdata('success_pelanggan', 'Proses Delete pelanggan Berhasil');
            redirect("admin/pelanggan");
        } else {
            $this->session->set_flashdata('error_pelanggan', 'Error Delete pelanggan, undefined id');
            redirect("admin/pelanggan", 'refresh');
        }
    }
}
