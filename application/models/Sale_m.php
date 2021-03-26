<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sale_m extends CI_Model
{

    public function invoice_no(){
        $sql= "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
               FROM sale_transaction
               WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query= $this->db->query($sql);
        if($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $invoice = "CR".date('ymd').$no;
        return $invoice;
    }

    public function get_cart($params=null)
    {
        $this->db->select('*, product.name as product_name, therapist.name as therapist, cart_transaction.price as cart_price');
        $this->db->from('cart_transaction');
        $this->db->join('product', 'cart_transaction.product_id = product.product_id');
        $this->db->join('therapist', 'cart_transaction.therapist_id = therapist.therapist_id');
        if($params != null){
            $this->db->where($params);
        }
        $this->db->where('user_id', $this->session->userdata('userid'));
        $query= $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(cart_id) AS cart_no 
                                   FROM cart_transaction");
        if($query->num_rows() > 0){
            $row = $query->row();
            $car_no = ((int)$row->cart_no) +1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'cart_id' => $car_no,
            'product_id' => $post['product_id'],
            'price' => $post['price'],
            'therapist_id' => $post['therapist_id'],
            'total' => $post['price'],
            'user_id' => $this->session->userdata('userid') 
         );
        $this->db->insert('cart_transaction', $params);
    }

    public function cart_del($params =null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('cart_transaction');
    }

    public function edit_cart($post)
    {
        $params = array(
            'price' => $post['price'],
            // 'qty' => $post['qty'],
            'discount_product' => $post['discount'],
            'total' => $post['total'],
        );
        $this->db->where('cart_id', $post['cart_id']);
        $this->db->update('cart_transaction', $params);
    }

    public function add_sale($post)
    {
        $params = array(
            'invoice' => $this->invoice_no(),
            'customer_id' => $post['customer_id'] == '' ? null : $post['customer_id'],
            'total_price' => $post['subtotal'],
            'discount' => $post['discount'],
            'final_price' => $post['grandtotal'],
            'cash' => $post['cash'],
            'remaining' => $post['change'],
            'note' => $post['note'],
            // 'therapist_id' => $post['therapist_id'] == '' ? null : $post['therapist_id'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid')  
        );
        $this->db->insert('sale_transaction', $params);
        return $this->db->insert_id();
    }

    function add_sale_detail ($params) 
    {
        $this->db->insert_batch('sale_detail', $params);
    }
   
    public function get_sale($id=null)
    {
        $this->db->select('*, customer.name as customer_name, user.name as name, sale_transaction.created as sale_created');
        $this->db->from('sale_transaction');
        $this->db->join('customer', 'sale_transaction.customer_id = customer.customer_id', 'left');
        $this->db->join('user', 'sale_transaction.user_id = user.user_id');
        if($id != null){
            $this->db->where('sale_id', $id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function get_sale_detail($sale_id= null)
    {
        $this->db->from('sale_detail');
        $this->db->join('product', 'sale_detail.product_id = product.product_id');
        if($sale_id!= null){
            $this->db->where('sale_detail.sale_id', $sale_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_last_detail()
    {
               
        $this->db->select('sale_detail.*, product.product_code as product_code, sale_transaction.invoice as invoice,total');
        $this->db->from('sale_detail');
        $this->db->join('product', 'sale_detail.product_id = product.product_id');
        $this->db->join('sale_transaction', 'sale_detail.sale_id = sale_transaction.sale_id');
        
        $this->db->order_by('detail_id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
    }
}