<?php
class M_anggota extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function view_kopi(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('kopi');

        $dbview_kopi=$this->db->get();
        return $dbview_kopi->result();
    }
    function view_kopi1(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('kopi');

        $dbview_kopi=$this->db->get();
        return $dbview_kopi->result();
    }
//    function anggotaperstat($id_stat_jemaat){
//        $this->load->database();
//        $this->db->select('*');
//        $this->db->join('stat_jemaat', 'user.id_stat_jemaat=stat_jemaat.id_stat_jemaat','left');
//        $this->db->from('user');
//        $this->db->where('user.id_stat_jemaat', $id_stat_jemaat);
//
//        $dbview_anggota=$this->db->get();
//        return $dbview_anggota->result();
//    }

    function select_all(){
        $this->db->select('*');
        $this->db->from('kopi');
        return $this->db->get();
    }
    function select_by_id($id){
        $this->db->select('*');
        $this->db->from('kopi');
//        $this->db->join('persekutuan', 'user.id=persekutuan.id_user');
//        $this->db->join('stat_kekeluargaan', 'user.id_stat_keluarga=stat_kekeluargaan.id_stat_keluarga', 'left');
//        $this->db->join('keluarga', 'user.id_keluarga=keluarga.id_keluarga','left');
        $this->db->where('kopi', $id);
        return $this->db->get();
    }
    function insert_kopi($data){
        $this->db->insert('kopi', $data);
    }

    function update_anggota($id, $data){
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
    function update_data_pers($id, $data2){
        $this->db->where('id_user', $id);
        $this->db->update('persekutuan', $data2);
    }
    function delete_anggota($id){
        $this->db->where('id', $id);
        $this->db->set('id_stat_jemaat', '3');
        $this->db->update('user');
    }
    function aktif_anggota($id){
        $this->db->where('id', $id);
        $this->db->set('id_stat_jemaat', '2');
        $this->db->update('user');
    }
    public function get_stat_kekeluargaan(){
        return $this->db->get("stat_kekeluargaan");
    }
    public function get_kk(){
        $this->db->select('*');
        $this->db->from('keluarga');
        $this->db->order_by('kepala_keluarga','asc');
        return $this->db->get();
    }
    public function get_stat(){
        $this->db->select('*');
        $this->db->from('stat_jemaat');
        return $this->db->get();
    }
    function view_keluarga(){
        $this->db->select('*');
        $this->db->from('keluarga');
        $this->db->order_by('kepala_keluarga','asc');
        $keluarga=$this->db->get();
        return $keluarga->result();
    }
    function select_kk($id){
        $this->db->select('*');
        $this->db->from('keluarga');
        $this->db->where('id_keluarga', $id);
        return $this->db->get();
    }
    function insert_kk($data)
    {
        $this->db->insert('keluarga', $data);
    }
    function update_kk($id, $data){
        $this->db->where('id_keluarga', $id);
        $this->db->SET('kepala_keluarga', $data['kepala_keluarga']);
        $this->db->update('keluarga');
    }
    function select_idkk($id){
        $this->db->where('keluarga.id_keluarga', $id);
        $this->db->from('user');
        $this->db->join('keluarga','user.id_keluarga=keluarga.id_keluarga');
        $this->db->join('stat_kekeluargaan', 'user.id_stat_keluarga=stat_kekeluargaan.id_stat_keluarga');
        $kk=$this->db->get();
        return $kk->result();
    }
    function delete_keluarga($id){
        $this->db->where('id', $id);
        $this->db->set('id_keluarga', '0');
        $this->db->update('user');
    }

    function tambah_pers($data3){
        $this->db->insert('persekutuan', $data3);
    }

    function update_pers($data3){
        $this->db->where('id_user', $data3['id']);
        $this->db->update('persekutuan', $data3);
    }
}
?>