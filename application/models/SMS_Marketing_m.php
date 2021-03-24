<?php defined('BASEPATH') or exit('No direct script access allowed');

class SMS_Marketing_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('messages.*');
        $this->db->from('messages');
        
        if ($id != null) {
            $this->db->where('message_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getRecord()
    {
        $query = $this->db->get('messages');
        if($query->num_rows() >0){
            return $query->result();
        }
    }
   
    public function select(){

        $this->db->order_by('result_id', 'ASC');

        $query = $this->db->get('cluster_result');

        return $query;

}

    public function insert($data){

        $this->db->query('truncate table cluster_result');
        $this->db->insert_batch('cluster_result', $data);
        

}

    public function add($post)
    {
        
            $params = [
                'phone' => $post['recipient'],
                'detail' => $post['message'],
                
            ];
            $this->db->insert('messages', $params);
        

    }

    public function del($id)
    {
        $this->db->where('message_id', $id);
        $this->db->delete('messages');
    }
}
