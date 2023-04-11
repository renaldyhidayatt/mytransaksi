<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
        $this->load->model('dashboard_m');

        $this->auth_m->isLoggedIn() == true || redirect("auth/login");
    }

    public function index()
    {
        $data['subview'] = 'admin/index';
        $data['harga'] = $this->dashboard_m->sumHarga();
        $data['hutang'] = $this->dashboard_m->sumHutang();
        $data['lunas'] = $this->dashboard_m->sumLunas();
        $data['user'] = $this->dashboard_m->countUser();
        $data['transaksi'] = $this->dashboard_m->sum_transaksi();

        $this->load->view('admin/_layout', $data);
    }
}
