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


    
    public function get_cluster($id=null)
    {
        $this->db->select('cluster, customer.phone as customer_phone');
        $this->db->from('cluster_temp');
        $this->db->join('customer', 'cluster_temp.customer_id = customer.customer_id');
        $this->db->group_by('cluster');
        $this->db->order_by('cluster', 'asc');
        if($id != null){
            $this->db->where('sale_id', $id);
        }
        $query= $this->db->get();
        return $query;  
   }

   public function total_cluster()
    {
        // $this->db->query('SELECT cluster, COUNT(*) as total FROM cluster_temp WHERE iteration IN (SELECT MAX(iteration) FROM cluster_temp) GROUP BY cluster DESC ');
		
        
        $this->db->select('cluster, count(*) as total');
       
        $this->db->where_in('iteration', 'select max(iteration)');
        $this->db->group_by('cluster');
       
       
        
        return $this->db->from('cluster_temp')
          ->get()
          ->result();
    }


   
}
