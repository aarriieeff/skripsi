<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {  

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_login');
    }
	public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->model('M_login'); // load model_user
        $hasil = $this->M_login->cek_user($username, $password);
        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['level'] = $sess->level;
                $sess_data['id_user']= $sess->id_user;
                $sess_data['username'] = $sess->username;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('level')=='2') {
                redirect(site_url('C_halaman_admin'));
            }
            elseif ($this->session->userdata('level')=='1') {
                redirect(site_url('C_halaman_operator'));
            }  elseif ($this->session->userdata('level')=='3'){
                redirect(site_url('C_halaman_manager'));
            }
        }
        else {
            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
            
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());     
    }
}