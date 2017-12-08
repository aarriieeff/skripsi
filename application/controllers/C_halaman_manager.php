<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_halaman_manager extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_anggota');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        //$this->load->view('sidebar_g');
        $this->load->view('welcome_mg');

    }

    public function dashboard_op()
    {
        // $this->load->view('sidebar_g');
        $this->load->view('welcome_mg');

    }
    public function kriteria_mutu(){
        //  $this->load->view('sidebar_g');
        $this->load->view('form/ktiteria_kopi');
    }
}
?>