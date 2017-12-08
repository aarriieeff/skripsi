<?php
class M_user extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function view_user_u(){
        $this->load->database();
        $this->db->where('id_pilih','2');
        $this->db->from('user');
        $dbview_mjl=$this->db->get();
        return $dbview_mjl->result();
    }
    function view_user(){
        $this->load->database();
        $vuser=$this->db->get('login');
        return $vuser->result();
    }
    function select_user(){
        $this->db->select('*');
        $this->db->from('login');
        return $this->db->get();
    }
    function insert_user($id, $data){
        $this->db->where('id',$id);
        $this->db->set ('id_pilih', 2);
        $this->db->update('user');
    }
    function select_idmjl($id){
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('id', $id);
        return $this->db->get();
    }
    function update_user($id, $data){
        $this->db->where('id', $id);
        $this->db->update('login',$data);
    }
    function delete_user($id){
        $this->db->where('id', $id);
        $this->db->delete('login');
    }

    function tbh_user($id){
        $this->db->query("INSERT INTO login (id_user, level) VALUES ($id, '2')");
    }

    function user_u(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_pilih',2);
        $rk=$this->db->get();
        return $rk->result();
    }
    function info_user_u($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('persekutuan', 'user.id=persekutuan.id_user');
        $this->db->join('stat_kekeluargaan', 'user.id_stat_keluarga=stat_kekeluargaan.id_stat_keluarga', 'left');
        $this->db->join('keluarga', 'user.id_keluarga=keluarga.id_keluarga','left');
        $this->db->where('user.id', $id);
        return $this->db->get();
    }

}
?>