<?php
class M_nilai extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function view_penilaian(){
        $dbview_anggota = $this->db->query("SELECT * FROM `kopi` LEFT JOIN `nilai` ON `kopi`.`id`=`nilai`.`id_kopi");
        // $dbview_anggota=$this->db->get();
        return $dbview_anggota->result();
    }
    function view_penilaian2(){
        $dbview_anggota = $this->db->query("SELECT * FROM `kopi` LEFT JOIN `nilai` ON `kopi`.`id`=`nilai`.`id_kopi");
        //$dbview_anggota=$this->db->get();
        return $dbview_anggota->result();
    }
     function view_penilaian3(){
         $dbview_anggota = $this->db->query("SELECT * FROM `kopi` LEFT JOIN `nilai` ON `kopi`.`id`=`nilai`.`id_kopi");
         //$dbview_anggota=$this->db->get();
         return $dbview_anggota->result();
     }
    function reset_penilaian(){
        $this->db->SET('nilai', '0');

        $this->db->update('nilai');
    }
    function reset_stat_penilaian(){
        $this->db->SET('id', '1');
        $this->db->update('kopi');
    }

    function select_penilaian($id){
        $this->db->select('*');
        $this->db->from('kopi');
        $this->db->where('id', $id);
        return $this->db->get();
    }
    public function get_sub(){
        return $this->db->get("sub_kriteria");
    }
    public function ranking(){
        $this->db->select('*');
        $this->db->order_by('nilai', 'desc');
        $this->db->from('kopi');
        $this->db->join('nilai','kopi.id=nilai.id_kopi');
        $ranking=$this->db->get();
        return $ranking->result();
    }
    public function ranking2(){
        $this->db->select('*');
        $this->db->order_by('nilai2', 'desc');
        $this->db->from('user');
        $this->db->join('nilai','user.id=nilai.id_user');
        $ranking=$this->db->get();
        return $ranking->result();
    }
    public function ranking3(){
        $this->db->select('*');
        $this->db->order_by('nilai3', 'desc');
        $this->db->from('user');
        $this->db->join('nilai','user.id=nilai.id_user');
        $ranking=$this->db->get();
        return $ranking->result();
    }
    public function rekap(){
        $ranking = $this->db->query("SELECT id, name, nilai1, nilai2, nilai3, round(((nilai1+nilai2+nilai3)/3),3) as rata2 FROM user join nilai on user.id=nilai.id_user where user.id_stat_jemaat=2 and user.id_pilih<2 and user.id_keluarga<> ALL (SELECT id_keluarga FROM user WHERE id_pilih=2 and id_keluarga <>0 group by id_keluarga) order by rata2 desc");
        return $ranking->result();
    }
    public function select_kriteria1(){
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where('id_kriteria', '1');
        return $this->db->get();
    }
    public function select_kriteria2(){
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where('id_kriteria', '2');
        return $this->db->get();
    }
    public function select_kriteria3(){
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where('id_kriteria', '3');
        return $this->db->get();
    }
    public function select_kriteria4(){
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where('id_kriteria', '4');
        return $this->db->get();
    }
    public function select_kriteria5(){
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where('id_kriteria', '5');
        return $this->db->get();
    }

    function update_nilai($id, $nilai){ //revisi
        $this->db->where('id', $id);
        $this->db->SET('nilai', $nilai);
        $this->db->update('nilai');
    }
    function update_nilai2($id, $nilai){ //revisi
        $this->db->where('id_user', $id);
        $this->db->SET('nilai2', $nilai);
        $this->db->update('nilai');
    }
    function update_nilai3($id, $nilai){ //revisi
        $this->db->where('id_user', $id);
        $this->db->SET('nilai3', $nilai);
        $this->db->update('nilai');
    }
}
?>