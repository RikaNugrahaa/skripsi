<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item_m extends CI_Model {

     // start datatables
     var $column_order = array(null, 'name', 'price', 'stock'); //set column field database for datatable orderable
     var $column_search = array('name', 'price', 'stock'); //set column field database for datatable searchable
     var $order = array('item_id' => 'asc'); // default order
  
     private function _get_datatables_query() {
         $this->db->select('item_stock.*, name');
         $this->db->from('item_stock');
         $i = 0;
         foreach ($this->column_search as $item_stock) { // loop column
             if(@$_POST['search']['value']) { // if datatable send POST for search
                 if($i===0) { // first loop
                     $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                     $this->db->like($item_stock, $_POST['search']['value']);
                 } else {
                     $this->db->or_like($item_stock, $_POST['search']['value']);
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
         $this->db->from('item_stock');
         return $this->db->count_all_results();
     }
     // end datatables

    public function get($id = null)
    {
        $this->db->from('item_stock');
        if($id != null) {   
            $this->db->where('item_id', $id);
        }
        $query = $this->db->get();
        return $query;
    } 
   
    public function add($post)
    {
        $params = [
            'name' => $post['item_name'],
            'price' => $post['item_price'],
            
        ];
        $this->db->insert('item_stock', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['item_name'],
            'price' => $post['item_price'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('item_id', $post['id']);
        $this->db->update('item_stock', $params);
    }

    public function del($id)
	{
        $this->db->where('item_id', $id);
        $this->db->delete('item_stock');
    } 
    
    function stock_in_update($data)
    {
        $qty = $data['qty'];
        $item_id = $data['item_id'];
        $sql = "UPDATE item_stock SET stock = stock + '$qty' WHERE item_id = '$item_id'";
        $this->db->query($sql);
    }

    function stock_out_update($data)
    {
        $qty = $data['qty'];
        $item_id = $data['item_id'];
        $sql = "UPDATE item_stock SET stock = stock - '$qty' WHERE item_id = '$item_id'";
        $this->db->query($sql);
    }
}