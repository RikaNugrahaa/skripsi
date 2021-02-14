<?php defined('BASEPATH') or exit('No direct script access allowed');

class SMS_Marketing_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('message');
        if ($id != null) {
            $this->db->where('message_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'phone' => $post['recipient'],
            'detail' => $post['message'],
        ];
        $this->db->insert('message', $params);
    }

    public function del($id)
    {
        $this->db->where('message_id', $id);
        $this->db->delete('message');
    }
}
