<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clustering extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Clustering_m');

    }

    public function index()
	{
        $this->form_validation->set_rules('start_date', 'Dari Tanggal', 'trim|required');
        $this->form_validation->set_rules('end_date', 'Hingga Tanggal', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            // $data['total_customer']= $this->Clustering_m->freqCustomer();
            $this->template->load('template', 'clustering/clustering_data');
        }else {
            $start_date= $this->input->post('start_date');
            $end_date= $this->input->post('end_date');
            $return= $this->Clustering_m->set($start_date, $end_date);
            
            echo json_encode($return);
        }
		
	}

}