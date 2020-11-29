<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Caloline_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function set_user($data)
    {
        return $this->db->insert('members', $data);
    }

}    