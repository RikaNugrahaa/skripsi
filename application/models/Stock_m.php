<?php defined('BASEPATH') or exit('No direct script access allowed');

class Stock_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('stock');
        if($id != null) {
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query; 
    }

    public function get_stock_in()
    {
        $this->db->select('stock.stock_id, item_stock.item_id,
        item_stock.name as item_name, qty, date, 
        supplier.name as supplier_name, item_stock.item_id');
        $this->db->from('stock');
        $this->db->join('item_stock', 'stock.item_id = item_stock.item_id');
        $this->db->join('supplier', 'stock.supplier_id = supplier.supplier_id', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;

    }

    public function get_stock_out()
    {
        $this->db->select('stock.stock_id, item_stock.item_id,
        item_stock.name as item_name, qty, detail, date, item_stock.item_id');
        $this->db->from('stock');
        $this->db->join('item_stock', 'stock.item_id = item_stock.item_id');
        $this->db->where('type', 'out');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;

    }
    
    public function stock_in_add($post)
    {
        $params = [
            'item_id' => $post['item_id'],
            'type' => 'in',
            'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('stock', $params);
    }

    public function stock_out_add($post)
    {
        $params = [
            'item_id' => $post['item_id'],
            'type' => 'out',
            'qty' => $post['qty'],
            'date' => $post['date'],
            'detail' => $post['detail'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('stock', $params);
    }

    public function del($id)
    {
        $this->db->where('stock_id', $id);
        $this->db->delete('stock');
    }

    
}
