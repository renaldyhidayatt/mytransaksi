<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nominal extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('nominal_m');
        $this->load->model('auth_m');
    }

    public function index(){
        $data['nominal'] = $this->nominal_m->findall();
        $data['subview'] = 'admin/nominal/index';

        $this->load->view('admin/_layout', $data);
    }

    public function create(){
        $this->form_validation->set_rules(
            'nominal',
            'Nominal',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nominal Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nominal Terlalu Pendek</div>"
            ]
        );

        if($this->form_validation->run() != true){
            $data['subview']= 'admin/nominal/create';
            $this->load->view('admin/_layout', $data);
        }else{
            $nominal = $this->input->post('nominal');
            $uid = $this->session->userdata('user_id');
            if($this->nominal_m->create($nominal, $uid) == true){
                $this->session->set_flashdata('success_nominal','Proses membuat nominal Berhasil');
                redirect("admin/nominal");
            }else{
                $this->session->set_flashdata('error_nominal','Error pembuatan nominal');
                redirect("admin/nominal", 'refresh');
            }
        }
    }

    public function edit($id=null){
        // $this->auth_m->isAdmin() == true || redirect("admin/nominal");

        $this->form_validation->set_rules(
            'nominal',
            'Nominal',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nominal Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nominal Terlalu Pendek</div>"
            ]
        );

        if($this->form_validation->run() != true){
            $where = array('id_nominal' => $id);

            $data['nominal'] = $this->nominal_m->findById($where, 'tbl_nominal')->result();
            $data['subview'] = 'admin/nominal/edit';

            $this->load->view('admin/_layout', $data);
        }else{
            $id = $this->input->post('id');
            $nominal = $this->input->post('nominal');
            $uid = $this->session->userdata('user_id');

            if($this->nominal_m->update($id, $nominal, $uid) == true){
                $this->session->set_flashdata('success_nominal','Proses Update nominal Berhasil');
                redirect("admin/nominal");
            }else{
                $this->session->set_flashdata('error_nominal','Error Update nominal');
                redirect("admin/nominal", 'refresh');
            }
        }
        
    }

    public function delete($id){
        $this->auth_m->isAdmin() == true || redirect("admin/nominal");

        if($this->nominal_m->delete($id) == true){
            $this->session->set_flashdata('success_nominal','Proses Delete nominal Berhasil');
            redirect("admin/nominal");
        }else{
            $this->session->set_flashdata('error_nominal','Error Delete nominal, undefined id' );
            redirect("admin/nominal", 'refresh');
        }
    }
}