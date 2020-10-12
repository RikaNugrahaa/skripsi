<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends CI_Model {


     // start datatables
     var $column_order = array(null, 'name', 'phone', 'gender'); //set column field database for datatable orderable
     var $column_search = array('name', 'phone', 'gender'); //set column field database for datatable searchable
     var $order = array('customer_id' => 'asc'); // default order
  
     private function _get_datatables_query() {
         $this->db->select('customer.*, name');
         $this->db->from('customer');
         $i = 0;
         foreach ($this->column_search as $customer) { // loop column
             if(@$_POST['search']['value']) { // if datatable send POST for search
                 if($i===0) { // first loop
                     $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                     $this->db->like($customer, $_POST['search']['value']);
                 } else {
                     $this->db->or_like($customer, $_POST['search']['value']);
                 }
                 if(count($this->column_search) - 1 == $i) //last loop
                     $this->db->group_end(); //close bracket
             }
             $i++;
         }
          
         if(isset($_POST['order'])) { // here order processing
             $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
         }  else if(isset($this->order)) {
             $order = $this->order;
             $this->db->order_by(key($order), $order[key($order)]);
         }
     }
     function get_datatables() {
         $this->_get_datatables_query();
         if(@$_POST['length'] != -1)
         $this->db->limit(@$_POST['length'], @$_POST['start']);
         $query = $this->db->get();
         return $query->result();
     }
     function count_filtered() {
         $this->_get_datatables_query();
         $query = $this->db->get();
         return $query->num_rows();
     }
     function count_all() {
         $this->db->from('customer');
         return $this->db->count_all_results();
     }
     // end datatables


    public function get($id = null)
    {
        $this->db->from('customer');
        if($id != null) {   
            $this->db->where('customer_id', $id);
        }
        $query = $this->db->get();
        return $query;
    } 
   
    public function add($post)
    {
        $params = [
            'name' => $post['customer_name'],
            'phone' => $post['phone'],
            'gender' => $post['gender'], 
        ];
        $this->db->insert('customer', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['customer_name'],
            'phone' => $post['phone'],
            'gender' => $post['gender'],    
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('customer_id', $post['id']);
        $this->db->update('customer', $params);
    }

    public function del($id)
	{
        $this->db->where('customer_id', $id);
        $this->db->delete('customer');
    } 
   
}