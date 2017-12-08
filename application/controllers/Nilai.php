<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_nilai');
        $this->load->model('M_anggota');

    }
    public function index()
    {
      //  $this->load->view('sidebar');
    }

    public function reset_penilaian(){
        $this->M_nilai->reset_penilaian();
        $this->M_nilai->reset_stat_penilaian();
        $this->session->set_flashdata('sukses', 'Data berhasil diproses');
        redirect(site_url('C_data_anggota/view_majelis'));
    }
    public function view_penilaian()
    {
       // $this->load->view('sidebar_g');

        $data['dbview_kopi'] = $this->M_nilai->view_penilaian();
        $this->load->view('form/penilaian', $data);
    }
    public function penilaian($id){
       // $this->load->view('sidebar_g');
        $data['sub'] = $this->M_nilai->get_sub();
        $data['anggota']=$this->M_nilai->select_penilaian($id)->row();
        $data['krit1']=$this->M_nilai->select_kriteria1()->row();
        $data['krit2']=$this->M_nilai->select_kriteria2()->row();
        $data['krit3']=$this->M_nilai->select_kriteria3()->row();
        $data['krit4']=$this->M_nilai->select_kriteria4()->row();
        $data['krit5']=$this->M_nilai->select_kriteria5()->row();

        $this->load->view('form/penilaian_kopi', $data);
    }

    function ranking()
    {
       // $this->load->view('sidebar_g');

            $data['rank'] = $this->M_nilai->ranking();
            $this->load->view('form/ranking', $data);

    }
    function rekap() //======================================================================== Rev
    {
        $this->load->view('sidebar_g');
        $data['rank'] = $this->M_nilai->rekap();
        $this->load->view('form/rekap', $data);
    }
    function ranking2(){
        $this->load->view('sidebar_user');
        $data['rk'] = $this->M_anggota->majelis_u();
        $this->load->view('form/majelis_u', $data);
        $this->load->view('form/login');
    }

    function proses_penilaian($id){
        $data['id']             = $this->input->post('id');
        $data['name']           = $this->input->post('name');
        $data['k1']             = $this->input->post('k1');
        $data['k2']             = $this->input->post('k2');
        $data['k3']             = $this->input->post('k3');
        $data['k4']             = $this->input->post('k4');
        $data['k5']             = $this->input->post('k5');
        $data['krit1']          = $this->input->post('krit1');
        $data['krit2']          = $this->input->post('krit2');
        $data['krit3']          = $this->input->post('krit3');
        $data['krit4']          = $this->input->post('krit4');
        $data['krit5']          = $this->input->post('krit5');


        $nilai=(($data['k1']*$data['krit1'])+($data['k2']*$data['krit2'])+($data['k3']*$data['krit3'])+($data['k4']*$data['krit4'])+($data['k5']*$data['krit5']));
        // print_r($data);
        // print_r($nilai);
        $this->M_nilai->update_nilai($id, $nilai);

        $this->session->set_flashdata('sukses', 'Data berhasil diproses');
        redirect(site_url('Nilai/view_penilaian'));
    }
}
?>
