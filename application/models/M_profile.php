<?php 

class M_profile extends CI_Model{
	
  function tampil_data($idUser){
        return $this->db->get_where("user_2", array("idUser" => $idUser));

    }
    function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function cek_password($idUser, $pass){
        $query = $this->db->get_where('user_2', array('idUser' => $idUser, 'pass' => md5($pass)));
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

}
