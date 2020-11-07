<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clustering_m extends CI_Model {
    
    public function set($start_date, $end_date){

        $this->db->select('*');
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $this->db->from('sale_transaction');
        $this->db->group_by('sale_id', 'desc');
        $query=$this->db->get();
        return $query->result();
    }

    public function freqCustomer(){
        $this->db->select('customer.customer_id, count(customer.customer_id) as total');
        $this->db->join('customer','sale_transaction.customer_id = customer.customer_id');
        $this->db->group_by('customer_id');
        $query = $this->db->get('sale_transaction');
        if($query->num_rows()>0)
        {
            return $query->result();
        }
    }
}
