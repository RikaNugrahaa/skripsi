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


    
//     public function get_cluster()
//     {
//         $query= $this->db->query('SELECT cluster, phone FROM cluster_temp INNER JOIN customer
//         ON customer.customer_id=cluster_temp.customer_id WHERE iteration IN (SELECT MAX(iteration) FROM cluster_temp GROUP BY cluster) ORDER BY cluster ASC ');  
      
//       return $query;
//    }

public function getCluster()
{
    $this->db->select('*, GROUP_CONCAT(phone)as phones',false);
    $this->db->from('cluster_result');
    $this->db->group_by('cluster');
    $this->db->order_by('cluster', 'asc');
    $query=$this->db->get();
    return $query;
    
}

// public function getRecords($cluster)
// {
//     $this->db->select('*');
//     $this->db->from('cluster_result');
//     $this->db->where(['cluster' =>$cluster]);
//     $query=$this->db->get();
//     return $query->result();
// }

    public function print_excel()
    {
        $query= $this->db->query('SELECT customer.name, customer.phone, cluster FROM cluster_temp INNER JOIN customer
        ON customer.customer_id=cluster_temp.customer_id WHERE iteration IN (SELECT MAX(iteration) FROM cluster_temp GROUP BY customer.name) ORDER BY cluster ASC');
		
        return $query;
    }


   
}
