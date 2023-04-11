<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
        $this->load->model('harga_m');
    }

    public function index(){
        $data['harga'] = $this->harga_m->findall();
        $data['subview'] = 'admin/harga/index';

        $this->load->view('admin/_layout', $data);
    }

    public function create(){
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Harga Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Harga Terlalu Pendek</div>"
            ]
        );

        if($this->form_validation->run() != true){
            $data['subview']= 'admin/harga/create';
            $this->load->view('admin/_layout', $data);
        }else{
            $harga = $this->input->post('harga');
            $uid = $this->session->userdata('user_id');
            if($this->harga_m->create($harga, $uid) == true){
                $this->session->set_flashdata('success_harga','Proses membuat harga Berhasil');
                redirect("admin/harga");
            }else{
                $this->session->set_flashdata('error_harga','Error pembuatan harga');
                redirect("admin/harga", 'refresh');
            }
        }
    }

    public function edit($id=null){
        $this->auth_m->isAdmin() == true || redirect("admin/harga");

        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required|min_length[3]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Harga Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Harga Terlalu Pendek</div>"
            ]
        );

        if($this->form_validation->run() != true){
            $where = array('id_harga' => $id);

            $data['harga'] = $this->harga_m->findById($where, 'tbl_harga')->result();
            $data['subview'] = 'admin/harga/edit';

            $this->load->view('admin/_layout', $data);
        }else{
            $id = $this->input->post('id');
            $harga = $this->input->post('harga');
            $uid = $this->session->userdata('user_id');

            if($this->harga_m->update($id, $harga, $uid) == true){
                $this->session->set_flashdata('success_harga','Proses Update harga Berhasil');
                redirect("admin/harga");
            }else{
                $this->session->set_flashdata('error_harga','Error Update harga');
                redirect("admin/harga", 'refresh');
            }
        }
        
    }

    public function delete($id){
        $this->auth_m->isAdmin() == true || redirect("admin/harga");

        if($this->harga_m->delete($id) == true){
            $this->session->set_flashdata('success_harga','Proses Delete harga Berhasil');
            redirect("admin/harga");
        }else{
            $this->session->set_flashdata('error_harga','Error Delete harga, undefined id' );
            redirect("admin/harga", 'refresh');
        }
    }
}