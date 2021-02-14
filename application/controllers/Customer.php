<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('customer_m');
	}
	
	function get_customer() {
        $list = $this->customer_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $customer) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $customer->name;
            $row[] = $customer->phone;
            $row[] = $customer->gender;
        
            // add html for action
            $row[] ='<a href="'.site_url('customer/edit/'.$customer->customer_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                   <a href="'.site_url('customer/del/'.$customer->customer_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->customer_m->count_all(),
                    "recordsFiltered" => $this->customer_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }


	public function index()
	{
		$data['row'] = $this->customer_m->get();
		$this->template->load('template', 'customer/customer_data', $data);
	}

	public function add()
	{
		check_kasir();
		$customer = new stdClass();
		$customer->customer_id = null;
		$customer->name = null;
		$customer->phone = null;
		$customer->gender = null;
		$data = array(
			'page' => 'add', 
			'show' => 'tambah',
			'row'=> $customer
		);
		$this->template->load('template', 'customer/customer_form', $data);
	}

	public function edit($id)
	{
		check_admin();
		$query = $this->customer_m->get($id);
		if($query->num_rows() > 0) {
			$customer = $query->row();
			$data = array(
				'page' => 'edit', 
				'show' => 'edit',
				'row'=> $customer
			);
			$this->template->load('template', 'customer/customer_form', $data);
		} else {
			echo "<script>alert('data tidak ditemukan');";
			echo "window.location='".site_url('customer')."';</script>";
		}
	}
	 
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->customer_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->customer_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('customer');
	}

	public function del($id)
	{
		check_admin();
		$this->customer_m->del($id);
		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('customer');
	}
}

