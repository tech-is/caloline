<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Caloline_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //会員登録
    public function set_user($data)
    {
        return $this->db->insert('members', $data);
    }

    //ログイン
    public function get_users_login($data)
    {
        $mail = $data['mail'];
        $password = $data['password'];
        $query = $this->db->get_where('members',[
            'mail' => $mail
        ]);
        $result = $query->row_array();
        if($query->num_rows() !== 1){
            return false;
        }
        if(password_verify($password,$result['password'])){
            return $result;
        }
        return false;
    }

    

}    