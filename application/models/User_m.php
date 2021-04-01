<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
    
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', md5($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if($id != null) {   
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function check_oldpass($user_id, $old_password)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('password', $old_password);
        $query = $this->db->get('user');
        if($query->num_rows() >0) 
            return true;
        else
            return false;
        
    }

    public function update_password($user_id, $data){
        $this->db->set($data);
        $this->db->where('user_id', $user_id);
        $this->db->update('user');
        if($this->db->affected_rows() > 0)
            return true;
        else
        return false;
    }


    public function add($post)
    {
        $params ['name'] = $post['name'];
        $params ['username'] = $post['username'];
        $params ['password'] = md5($post['password']);
        $params ['address'] = $post['address'];
        $params ['level'] = $post['level'];
        $this->db->insert('user', $params);
    }
    public function edit($post)
    {
        $params ['name'] = $post['name'];
        $params ['username'] = $post['username'];
        if(!empty($post['password'])) {
            $params ['password'] = md5($post['password']);
        }
       
        $params ['address'] = $post['address'];
        $params ['level'] = $post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    // public function changePassword()
    // {
    //     $passwordbaru = $this->input->post('passwordbaru');
    //     $passwordhash =  md5($passwordbaru['password']);
    //     $this->db->set('password', $passwordhash);
    //     $this->db->where('user_id', $this->session->userdata('userid'));
      
    //     $this->db->update('user');
    // }

    public function update_user($id, $userdata)
    {
        $this->db->where('user_id', $id);
        $this->db->update('user', $userdata);
    }

    public function del($id)
	{
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    } 
}
