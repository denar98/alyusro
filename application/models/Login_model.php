<?php

class Login_model extends CI_Model
{
    private $_table = "users";

    public function loginCheck($email,$password){

        $where = array('users.email' => $email, 'users.password' => $password);
        $user = $this->db->select('*')
                 ->from('users')
                 ->join('jemaah','users.id_jemaah = jemaah.id_jemaah')
                 ->where($where)
                 ->get()
                 ->row();

        if($user){
            $this->session->set_userdata(['user_logged' => $user]);
            $this->_updateLastLogin($user->id_user);
            return $user;
        }

        // login gagal
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($id_user){
        $sql = "UPDATE users SET terakhir_login=now() WHERE id_user=$id_user";
        $this->db->query($sql);
    }

}
