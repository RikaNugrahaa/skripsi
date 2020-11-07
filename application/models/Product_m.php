<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_m extends CI_Model {

     // start datatables
     var $column_order = array(null, 'product_code', 'product.name', 'category_name', 'price'); //set column field database for datatable orderable
     var $column_search = array('product_code', 'product.name', 'price'); //set column field database for datatable searchable
     var $order = array('product_id' => 'asc'); // default order
  
     private function _get_datatables_query() {
         $this->db->select('product.*, category.name as category_name');
         $this->db->from('product');
         $this->db->join('category', 'product.category_id = category.category_id');
         $i = 0;
         foreach ($this->column_search as $product) { // loop column
             if(@$_POST['search']['value']) { // if datatable send POST for search
                 if($i===0) { // first loop
                     $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                     $this->db->like($product, $_POST['search']['value']);
                 } else {
                     $this->db->or_like($product, $_POST['search']['value']);
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
         $this->db->from('product');
         return $this->db->count_all_results();
     }
     // end datatables

    public function get($id = null)
    {
        $this->db->select('product.*, category.name as category');
        $this->db->from('product');
        $this->db->join('category', 'category.category_id = product.category_id');
        if($id != null) {   
            $this->db->where('product_id', $id);
        }
        $query = $this->db->get();
        return $query;
    } 
   
    public function add($post)
    {
        $params = [
            'product_code' => $post['product_code'],
            'name' => $post['product_name'],
            'category_id' => $post['category'],
            'price' => $post['product_price'],
            
        ];
        $this->db->insert('product', $params);
    }

    public function edit($post)
    {
        $params = [
            'product_code' =>$post['product_code'],
            'name' => $post['product_name'],  
            'category_id' => $post['category'],
            'price' => $post['product_price'],  
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('product_id', $post['id']);
        $this->db->update('product', $params);
    }

    function check_no_product($code, $id= null) {
        $this->db->from('product');
        $this->db->where('product_code', $code);
        if($id != null){
            $this->db->where('product_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
	{
        $this->db->where('product_id', $id);
        $this->db->delete('product');
    } 
   
}
