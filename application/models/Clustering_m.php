<?php defined('BASEPATH') or exit('No direct script access allowed');

class Clustering_m extends CI_Model
{
    public function set($start_date, $end_date)
    {
            $this->db->select('*, count(customer.customer_id) as total, sum(sale_transaction.final_price) as total_price, max(date) as trans_date');
            $this->db->from('sale_transaction');
            $this->db->join('customer', 'sale_transaction.customer_id = customer.customer_id');
            $this->db->where('date >=', $start_date);
            $this->db->where('date <=', $end_date);
            $this->db->group_by('sale_transaction.customer_id');
            $this->db->order_by('total', 'total_price', 'trans_date', 'desc');
            $query = $this->db->get();
            return $query->result_array();
    }
  
   
}
