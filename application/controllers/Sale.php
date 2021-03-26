<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('sale_m');
    }

	public function index()
	{
        $this->load->model(['customer_m', 'product_m', 'therapist_m']);
		$product = $this->product_m->get()->result();
		$customer = $this->customer_m->get()->result();
        $therapist = $this->therapist_m->get()->result();
        $cart = $this->sale_m->get_cart();
        $data = array( 
            'customer' => $customer,
            'product' => $product,
            'therapist' => $therapist,
            'cart'=> $cart,
            'invoice' => $this->sale_m->invoice_no(),
        
        );
        $this->template->load('template', 'sale/sale_form', $data);
    }

    public function cart_data()
    {
        $cart = $this->sale_m->get_cart();
        $data['cart'] = $cart;
        $this->load->view('sale/cart_data', $data);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);

        if(isset($_POST['add_cart'])) {
                $this->sale_m->add_cart($data);
            
             if($this->db->affected_rows() > 0) {
                 $params = array("success" => true);
             } else {
                 $params = array("success" => false);
             }
             echo json_encode($params);
        }

        if(isset($_POST['edit_cart'])) {
            $this->sale_m->edit_cart($data);

            if($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if(isset($_POST['process_payment'])) {
            $sale_id = $this->sale_m->add_sale($data);
            $cart = $this->sale_m->get_cart()->result();
            $row =[];
            foreach($cart as $c => $value) {
                array_push($row, array(
                    'sale_id' => $sale_id,
                    'product_id' => $value->product_id,
                    'price' => $value->price,
                    'therapist_id' => $value->therapist_id,
                    'discount_product' => $value->discount_product,
                    'total' => $value->total,
                )
                );
            }
            $this->sale_m->add_sale_detail($row);
            $this->sale_m->cart_del(['user_id' => $this->session->userdata('userid')]);
            
            if($this->db->affected_rows() > 0) {
                $params = array("success" => true, "sale_id" =>$sale_id);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }


    public function cart_del()
    {
        if(isset($_POST['cancel_payment'])) {
            $this->sale_m->cart_del(['user_id' => $this->session->userdata('userid')]);
        } else {
            $cart_id = $this->input->post('cart_id');
            $this->sale_m->cart_del(['cart_id' => $cart_id]);
        }

        if($this->db->affected_rows() > 0) {
            $params = array("success" => true);
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);
    }

    public function print($id)
    {
        $data = array(
            'sale' => $this->sale_m->get_sale($id)->row(),
            'sale_detail' => $this->sale_m->get_sale_detail($id)->result(),
        );
        $this->load->view('sale/receipt_print', $data);

    }
    
}