<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_data_kopi extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_anggota');

    }
    public function index()
    {
       //$this->load->view('data_kopi');
    }
    public function view_kopi()
    {

        $data['dbview_kopi'] = $this->M_anggota->view_kopi();
        $this->load->view('form/data_kopi',$data);
    }

    public function view_kopi1()
    {

        $data['dbview_kopi'] = $this->M_anggota->view_kopi();
        $this->load->view('form/datakopi_op',$data);
    }
    public function edit_anggota($id)
    {
       // $this->load->view('sidebar');
        $data['keluarga'] = $this->M_anggota->get_stat_kekeluargaan();
        $data['user'] = $this->M_anggota->get_kk();
        $data['anggota'] = $this->M_anggota->select_by_id($id)->row();

        $this->load->view('form/edit_anggota', $data);
    }

    public function proses_edit_anggota($id){
        $data['name']               = $this->input->post('name');
        $data['tlpn']            	= $this->input->post('tlpn');
        $data['alamat']             = $this->input->post('alamat');
        $data['ultah']              = $this->input->post('ultah');
        $data['id_stat_keluarga']   = $this->input->post('id_stat_keluarga');
        $data['id_keluarga']        = $this->input->post('keluarga');
        $data['no_babtis']          = $this->input->post('no_babtis');
        $data2['umum']              = $this->input->post('umum');
        $data2['pemuda']            = $this->input->post('pemuda');
        $data2['remaja']            = $this->input->post('remaja');
        $data2['wanita']            = $this->input->post('wanita');
        $data2['pasutri']           = $this->input->post('pasutri');
        $data2['usianda']           = $this->input->post('usianda');
        $data2['sm']                = $this->input->post('sm');

        $this->M_anggota->update_anggota($id, $data);
        $this->M_anggota->update_data_pers($id, $data2);
        $this->session->set_flashdata('sukses', 'Data berhasil diproses');
        redirect(site_url('C_data_kopi/view_anggota'));
    }

    public function delete_anggota($id){

        $this->M_anggota->delete_anggota($id);
        $this->session->set_flashdata('nonaktif', 'Status Jemaat di Non Aktifkan.');
        redirect(site_url('C_data_kopi/view_anggota'));
    }
    public function aktif_anggota($id){

        $this->M_anggota->aktif_anggota($id);
        $this->session->set_flashdata('aktif', 'Status Jemaat di Aktifkan.');
        redirect(site_url('C_data_kopi/view_anggota'));
    }
    public function tambah_kopi(){
//        $this->load->view('sidebar');
//        $data['keluarga'] = $this->M_anggota->get_stat_kekeluargaan();
//        $data['user'] = $this->M_anggota->get_kk();
//        $data['stat'] = $this->M_anggota->get_stat();
        $this->load->view('form/tambah_kopi');
    }

    public function proses_tambah_kopi(){

      //  $data['id']           		        = $this->input->post('id');
        $data['jenis_kopi']                 = $this->input->post('jenis_kopi');
        $data['daerah']             	    = $this->input->post('daerah');
        $data['tanggal']                    = $this->input->post('tanggal');

//
            $this->M_anggota->insert_kopi($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diproses');
            redirect(site_url('C_data_kopi/view_kopi'));
    }
    public function keluarga()
    {
        $this->load->view('sidebar');
        $data['keluarga']=$this->M_anggota->view_keluarga();
        $this->load->view('form/data_keluarga', $data);
    }
    function edit_keluarga($id)
    {
        $this->load->view('sidebar');
        $data['kel']=$this->M_anggota->select_kk($id)->row();
        $this->load->view('form/edit_keluarga',$data);
    }
    public function tambah_kk()
    {
        $this->load->view('sidebar');
        $this->load->view('form/tambah_kk');
    }
    public function proses_tambah_kk()
    {
        $data['id_keluarga']        = $this->input->post('id_keluarga');
        $data['kepala_keluarga']    = $this->input->post('kepala_keluarga');
        $this->M_anggota->insert_kk($data);
        $this->session->set_flashdata('sukses', 'Data berhasil diproses');
        redirect(site_url('C_data_kopi/keluarga'));
    }
    public function proses_edit_kk($id){
        $data['id_keluarga']        = $this->input->post('id_keluarga');
        $data['kepala_keluarga']    = $this->input->post('kepala_keluarga');

        $this->M_anggota->update_kk($id, $data);
        $this->session->set_flashdata('sukses', 'Data berhasil diproses');
        redirect(site_url('C_data_kopi/keluarga'));
    }
    public function info_keluarga($id)
    {
        $this->load->view('sidebar');
        $data['kk'] = $this->M_anggota->select_idkk($id);
        $this->load->view('form/info_keluarga', $data);
    }
    function delete_keluarga($id)
    {
        $this->M_anggota->delete_keluarga($id);
        $this->session->set_flashdata('result', 'Data keluarga berhasil dihapus.');
        redirect(site_url('C_data_kopi/keluarga'));
    }
    public function info_jemaat($id)
    {
        $this->load->view('sidebar_g');
        $data['mjl'] = $this->M_anggota->select_by_id($id)->row();
        $this->load->view('form/info_jemaat', $data);
    }

}
?>
