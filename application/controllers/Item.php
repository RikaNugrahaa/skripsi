<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		check_not_login();
        $this->load->model(['item_m']);
	}
	
	function get_item() {
        $list = $this->item_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item_stock) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item_stock->name;
            $row[] = indo_currency($item_stock->price);
            $row[] = $item_stock->stock;
            // add html for action
            $row[] = '<a href="'.site_url('item/edit/'.$item_stock->item_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                   <a href="'.site_url('item/del/'.$item_stock->item_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->item_m->count_all(),
                    "recordsFiltered" => $this->item_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
		$data['row'] = $this->item_m->get();
		$this->template->load('template', 'inventory/item_stock/item_data', $data);
	}

	public function add()
	{
		$item_stock = new stdClass();
		$item_stock->item_id = null;
		$item_stock->name = null;
		$item_stock->price = null;
		$item_stock->stock = null;
		$data = array(
			'page' => 'add', 
			'show' => 'tambah',
			'row'=> $item_stock,
		);
		$this->template->load('template', 'inventory/item_stock/item_form', $data);
    }
    
	public function edit($id)
	{
		$query = $this->item_m->get($id);
		if($query->num_rows() > 0) {
			$item_stock = $query->row();
			$data = array(
				'page' => 'edit', 
				'show' => 'edit',
				'row'=> $item_stock,
			);
			$this->template->load('template', 'inventory/item_stock/item_form', $data);
		} else {
			echo "<script>alert('data tidak ditemukan');";
			echo "window.location='".site_url('item_stock')."';</script>";
		}
	}
	 
	public function process()
	{
        $post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->item_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->item_m->edit($post);
		}
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock-In berhasil disimpan');
            }
            redirect('item'); 
        }

	public function del($id)
	{
		$this->item_m->del($id);
		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('item');  
	}
}