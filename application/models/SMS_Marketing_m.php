<?php defined('BASEPATH') or exit('No direct script access allowed');

class SMS_Marketing_m extends CI_Model
{
    public function add($post)
    {    
            $params = [
                'phone' => $post['recipient'],
                'detail' => $post['message'],
                
            ];
            $this->db->insert('messages', $params);
        

    }

}
