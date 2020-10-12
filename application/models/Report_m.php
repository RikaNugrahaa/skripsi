<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_m extends CI_Model {
    public function __construct(){

        parent::__construct();
    }

    public function get_sale_by_year(){
        $this->db->select('year(date) as tahun');
        $this->db->from('sale_transaction');
        $this->db->group_by('year(date)');
        $this->db->order_by('date', 'asc');
        $query=$this->db->get();
        return $query->result();
    }

    public function get_detail_by_year(){
        $this->db->select('year(date) as tahun');
        $this->db->from('sale_detail');
        $this->db->join('sale_transaction', 'sale_detail.sale_id = sale_transaction.sale_id');
        $this->db->group_by('year(date)');
        $this->db->order_by('date', 'asc');
        $query=$this->db->get();
        return $query->result();
    }

    public function sum_total_by_date($tanggalawal, $tanggalakhir) {
       
        $this->db->select_sum('final_price');
        $this->db->where('date >=', $tanggalawal);
        $this->db->where('date <=', $tanggalakhir);
        $this->db->order_by('date', 'asc');
        $result = $this->db->get('sale_transaction')->row();  
        return $result->final_price;
           
    }

    public function sum_total_by_month($tahun1, $bulanawal, $bulanakhir) {
       
        $this->db->select_sum('final_price');
        $this->db->where('year(date)',$tahun1);
        $this->db->where('month(date) >=', $bulanawal);
        $this->db->where('month(date) <=', $bulanakhir);
        $this->db->order_by('date', 'asc');
        $result = $this->db->get('sale_transaction')->row();  
        return $result->final_price;
           
    }

    public function sum_total_by_year($tahun2) {
       
        $this->db->select_sum('final_price');
        $this->db->where('year(date)',$tahun2);
        $this->db->order_by('date', 'asc');
        $result = $this->db->get('sale_transaction')->row();  
        return $result->final_price;
           
    }

    public function sale_filter_by_date($tanggalawal, $tanggalakhir){
        
        $this->db->select('sale_transaction.*, customer.name as customer_name');
        $this->db->where('date >=', $tanggalawal);
        $this->db->where('date <=', $tanggalakhir);
        $this->db->where('sale_id=sale_transaction.sale_id');
        $this->db->join('customer', 'sale_transaction.customer_id = customer.customer_id', 'left');
        $this->db->group_by('invoice','date', 'customer_name', 'discount', 'final_price');
        $this->db->from('sale_transaction');
        $this->db->order_by('date', 'asc');
        $query=$this->db->get();
        return $query->result();
        
        
    } 

    public function sale_filter_by_month($tahun1, $bulanawal, $bulanakhir){
        $this->db->select('sale_transaction.*, customer.name as customer_name');
        $this->db->where('year(date)',$tahun1);
        $this->db->where('month(date) >=', $bulanawal);
        $this->db->where('month(date) <=', $bulanakhir);
        $this->db->from('sale_transaction');
        $this->db->join('customer', 'sale_transaction.customer_id = customer.customer_id', 'left');
        $this->db->order_by('date', 'asc');
        $query=$this->db->get();
        return $query->result();
    }

    public function sale_filter_by_year($tahun2){
        $this->db->select('sale_transaction.*, customer.name as customer_name');
        $this->db->where('year(date)',$tahun2);
        $this->db->from('sale_transaction');
        $this->db->join('customer', 'sale_transaction.customer_id = customer.customer_id', 'left');
        $this->db->order_by('date', 'asc');
        $query=$this->db->get();
        return $query->result();

    }

    public function getAll_stock(){
        
        $this->db->select('item_stock.*');
        
        $this->db->from('item_stock');
        $query = $this->db->get();
        return $query;
    } 
  
    public function detail_filter_by_date($tanggalawal, $tanggalakhir){
        
        $this->db->select('sale_detail.*, sale_transaction.invoice as invoice, sale_transaction.date as date, product.product_code as product_code, 
        therapist.name as therapist_name, total');
        $this->db->from('sale_detail');
        $this->db->where('date >=', $tanggalawal);
        $this->db->where('date <=', $tanggalakhir);
        $this->db->join('sale_transaction', 'sale_detail.sale_id = sale_transaction.sale_id');
        $this->db->join('therapist', 'sale_detail.therapist_id = therapist.therapist_id');
        $this->db->join('product', 'sale_detail.product_id = product.product_id');
        $this->db->group_by('detail_id','sale_id','invoice','date', 'therapist_id');
        $this->db->order_by('date', 'asc');
         $query=$this->db->get();
        return $query->result();
             
    } 

    public function detail_filter_by_month($tahun1, $bulanawal, $bulanakhir){
        
        $this->db->select('sale_detail.*, sale_transaction.invoice as invoice, sale_transaction.date as date, product.product_code as product_code, 
        therapist.name as therapist_name, total');
        $this->db->from('sale_detail');
        $this->db->where('year(date)',$tahun1);
        $this->db->where('month(date) >=', $bulanawal);
        $this->db->where('month(date) <=', $bulanakhir);
        $this->db->join('sale_transaction', 'sale_detail.sale_id = sale_transaction.sale_id');
        $this->db->join('therapist', 'sale_detail.therapist_id = therapist.therapist_id');
        $this->db->join('product', 'sale_detail.product_id = product.product_id');
        $this->db->group_by('detail_id','sale_id','invoice','date', 'therapist_id');
        $this->db->order_by('date', 'asc');
         $query=$this->db->get();
        return $query->result();
             
    } 

    public function detail_filter_by_year($tahun2){
        
        $this->db->select('sale_detail.*, sale_transaction.invoice as invoice, sale_transaction.date as date, product.product_code as product_code, 
        therapist.name as therapist_name, total');
        $this->db->from('sale_detail');
        $this->db->where('year(date)',$tahun2);
        $this->db->join('sale_transaction', 'sale_detail.sale_id = sale_transaction.sale_id');
        $this->db->join('therapist', 'sale_detail.therapist_id = therapist.therapist_id');
        $this->db->join('product', 'sale_detail.product_id = product.product_id');
        $this->db->group_by('detail_id','sale_id','invoice','date', 'therapist_id');
        $this->db->order_by('date', 'asc');
         $query=$this->db->get();
        return $query->result();
             
    }   

    public function sum_total_detail_by_date($tanggalawal, $tanggalakhir) {
       
        $this->db->select_sum('total');
        $this->db->where('date >=', $tanggalawal);
        $this->db->where('date <=', $tanggalakhir);
        $this->db->join('sale_transaction', 'sale_detail.sale_id = sale_transaction.sale_id');
        $this->db->order_by('date', 'asc');
        $result = $this->db->get('sale_detail')->row();  
        return $result->total;
           
    }

    public function sum_total_detail_by_month($tahun1, $bulanawal, $bulanakhir) {
       
        $this->db->select_sum('total');
        $this->db->where('year(date)',$tahun1);
        $this->db->where('month(date) >=', $bulanawal);
        $this->db->where('month(date) <=', $bulanakhir);
        $this->db->join('sale_transaction', 'sale_detail.sale_id = sale_transaction.sale_id');
        $this->db->order_by('date', 'asc');
        $result = $this->db->get('sale_detail')->row();  
        return $result->total;
           
    }

    public function sum_total_detail_by_year($tahun2) {
       
        $this->db->select_sum('total');
        $this->db->where('year(date)',$tahun2);
        $this->db->join('sale_transaction', 'sale_detail.sale_id = sale_transaction.sale_id');
        $this->db->order_by('date', 'asc');
        $result = $this->db->get('sale_detail')->row();  
        return $result->total;
           
    }
}
