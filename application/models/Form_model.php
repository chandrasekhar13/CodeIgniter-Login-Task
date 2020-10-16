<?php
class Form_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function auth_check($data)
    {
        $query = $this->db->get_where('users', $data);

        if($query){   
         return $query->row();
        }
        return false;
    }
     
}