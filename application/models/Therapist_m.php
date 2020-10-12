<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Therapist_m extends CI_Model {
    public function get($id = null)
    {
        $this->db->from('therapist');
        if($id != null) {   
            $this->db->where('therapist_id', $id);
        }
        $query = $this->db->get();
        return $query;
    } 

    public function add($post)
    {
        $params = [
            'name' => $post['therapist_name'],
            'phone' => $post['phone'],
            'gender' => $post['gender'],
        ];
        $this->db->insert('therapist', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['therapist_name'], 
            'phone' => $post['phone'],
            'gender' => $post['gender'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('therapist_id', $post['id']);
        $this->db->update('therapist', $params);
    }

    public function del($id)
	{
        $this->db->where('therapist_id', $id);
        $this->db->delete('therapist');
    } 
}