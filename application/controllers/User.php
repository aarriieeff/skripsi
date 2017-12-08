<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_anggota');
        $this->load->model('M_user');

    }
    public function index()
    {
        $this->load->view('sidebar');
    }

    public function view_user(){
        //$this->load->view('sidebar');
        $data['vuser']=$this->M_user->view_user();
        $this->load->view('form/data_user', $data);
    }
    public function view_user_u(){
        $this->load->view('sidebar_user');
        $this->load->view('form/login');
        $data['dbview_mjl']=$this->M_user->view_user_u();
        $this->load->view('form/data_user_u', $data);
    }
    public function info_user($id)
    {
        $this->load->view('sidebar_g');
        $data['mjl'] = $this->M_anggota->select_by_id($id)->row();
        $this->load->view('form/info_user', $data);
    }
    public function info_user_fnl($id)
    {
        $this->load->view('sidebar_g');
        $data['mjl'] = $this->M_anggota->select_by_id($id)->row();
        $this->load->view('form/info_user_fnl', $data);
    }
    public function info_user_u($id)
    {
        $this->load->view('sidebar_user');
        $this->load->view('form/login');
        $data['mjl'] = $this->M_anggota->select_by_id($id)->row();
        $this->load->view('form/info_user_u', $data);
    }


    public function tambah_user($id){
        $data['id']             = $this->input->post('id');
        $data['id_pilih']       = $this->input->post('id_pilih');

        $this->M_user->insert_user($id, $data);
        $this->session->set_flashdata('sukses', 'Data berhasil diproses');
        redirect(site_url('Nilai/rekap'));
    }

    function update_user($id)
    {
        $this->load->view('sidebar');
        $data['mjl']=$this->M_anggota->select_idmjl($id)->row();
        $this->load->view('form/edit_user',$data);
    }

    function proses_update_user($id)
    {
        $data['id']             = $this->input->post('id');
        $data['username']       = $this->input->post('username');
        $data['password']       = $this->input->post('password');
        $data['level']          = $this->input->post('level');
        $this->M_user->update_user($id, $data);
        $this->session->set_flashdata('sukses', 'Data berhasil diproses');
        redirect(site_url('user/view_user'));
    }

    function delete_user($id)
    {
        $this->M_user->delete_user($id);
        $this->session->set_flashdata('sukses', 'Data berhasil diproses');

        redirect(site_url('user/view_user'));
    }
}
?>
