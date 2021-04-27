<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		check_not_login();
		check_admin();
        $this->load->model(['Product_m', 'Category_m']);
	}
	
	function get_product() {
        $list = $this->Product_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $product) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $product->product_code;
            $row[] = $product->name;
            $row[] = $product->category_name;
            $row[] = indo_currency($product->price);
            // add html for action
            $row[] = '<a href="'.site_url('Product/edit/'.$product->product_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                   <a href="'.site_url('Product/del/'.$product->product_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->Product_m->count_all(),
                    "recordsFiltered" => $this->Product_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
		$data['row'] = $this->Product_m->get();
		$this->template->load('template', 'service/product/product_data', $data);
	}

	public function add()
	{
		$product = new stdClass();
		$product->product_id = null;
		$product->product_code = null;
		$product->name = null;
		$product->price = null;
		$product->category_id = null;

		$query_category = $this->Category_m->get();

		$data = array(
			'page' => 'add', 
			'show' => 'tambah',
			'row'=> $product,
			'category'=> $query_category,
		);
		$this->template->load('template', 'service/product/product_form', $data);
	}

	public function edit($id)
	{
		$query = $this->Product_m->get($id);
		if($query->num_rows() > 0) {
			$product = $query->row();
			$query_category = $this->Category_m->get();

			$data = array(
				'page' => 'edit', 
				'show' => 'edit',
				'row'=> $product,
				'category'=> $query_category,
			);
			$this->template->load('template', 'service/product/product_form', $data);
		} else {
			echo "<script>alert('data tidak ditemukan');";
			echo "window.location='".site_url('Product')."';</script>";
		}
	}
	 
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			if($this->Product_m->check_no_product($post['product_code'])->num_rows() > 0) {
				$this->session->set_flashdata('error', "Kode produk $post[product_code] sudah dipakai produk layanan lain");
				redirect('Product/add');
			} else {
				$this->Product_m->add($post);
			}
		} else if(isset($_POST['edit'])) {
			if($this->Product_m->check_no_product($post['product_code'], $post['id'])->num_rows() > 0) {
				$this->session->set_flashdata('error', "Kode produk $post[product_code] sudah dipakai produk layanan lain");
				redirect('Product/edit/' .$post['id']);
			} else {
				$this->Product_m->edit($post);
			}
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
		redirect('Product');   
	}

	public function del($id)
	{
		$this->Product_m->del($id);
		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('Product');  
	}
}