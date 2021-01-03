<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clustering extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Clustering_m', 'Sale_m']);

    }

    public function index()
	{

        $this->form_validation->set_rules(
            'start_date',
            'Dari Tanggal',
            'trim|required',
            [
                'required' => 'Tentukan tanggal terlebih dahulu.'
            ]
        );
        $this->form_validation->set_rules(
            'end_date',
            'Hingga Tanggal',
            'trim|required',
            [
                'required' => 'Tentukan tanggal terlebih dahulu,'
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'clustering/clustering_data');
        } else {
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $this->Clustering_m->set($start_date, $end_date);
            $data['rfm']=$this->Clustering_m->set($start_date, $end_date);
            if (empty($data['rfm'])) {
                $this->session->set_flashdata('pesan', 'data tidak ditemukan.');
                $this->template->load('template', 'clustering/clustering_data');
            } else {
                $this->template->load('template', 'clustering/clustering_data', $data);
            }

            
        }

    }

    // public function frequency()
    // {
    // $data['freq'] = $this->Clustering_m->frequency();

    // $this->template->load('template', 'clustering/clustering_data', $data);
    // }

}