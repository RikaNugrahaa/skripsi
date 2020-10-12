<?php defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['supplier_m', 'item_m', 'stock_m']);
    }

    public function stock_in_data()
    {
        $data['row'] = $this->stock_m->get_stock_in()->result();
        $this->template->load('template', 'inventory/stock_in/stock_in_data', $data);
    }

    public function stock_out_data()
    {
        $data['row'] = $this->stock_m->get_stock_out()->result();
        $this->template->load('template', 'inventory/stock_out/stock_out_data', $data);
    }

    public function stock_in_add()
    {
        $item_stock = $this->item_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        $data = ['item_stock' => $item_stock, 'supplier' => $supplier];

        $this->template->load('template', 'inventory/stock_in/stock_in_form', $data);
    }

    public function stock_out_add()
    {
        $item_stock = $this->item_m->get()->result();
        $data = ['item_stock' => $item_stock];

        $this->template->load('template', 'inventory/stock_out/stock_out_form', $data);
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['stock_in_add'])) {
            $this->stock_m->stock_in_add($post);
            $this->item_m->stock_in_update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data barang masuk berhasil disimpan');
            }
            redirect('stock/in');
        }

        if (isset($_POST['stock_out_add'])) {
            $this->stock_m->stock_out_add($post);
            $this->item_m->stock_out_update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data barang keluar berhasil disimpan');
            }
            redirect('stock/out');
        }
    }

    public function stock_in_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->stock_out_update($data);
        $this->stock_m->del($stock_id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('stock/in');
    }

    public function stock_out_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->stock_in_update($data);
        $this->stock_m->del($stock_id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('stock/out');
    }
}
