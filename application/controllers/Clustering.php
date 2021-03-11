<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clustering extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Clustering_m', 'Sale_m']);
       
    }

   
    public function index()
    {

        ini_set('max_execution_time', 0); 
        ini_set('memory_limit','2048M');
        
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
                'required' => 'Tentukan tanggal terlebih dahulu.'
            ]
        );
        $this->form_validation->set_rules(
            'jumlah_cluster',
            'Jumlah Cluster',
            'trim|required',
            [
                'required' => 'Tentukan jumlah cluster terlebih dahulu.'
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'clustering/clustering_data');
        } else {

            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $this->Clustering_m->set($start_date, $end_date);
            $data['rfm'] = $this->Clustering_m->set($start_date, $end_date);
            // $data = array(
            //     'cluster_id'=>$_POST['cluster_id'],
            //     'customer_id'=>$_POST['customer_id'],
            //     'cluster'=>$_POST['cluster']
            // );


            if (empty($data['rfm'])) {
                $this->session->set_flashdata('pesan', 'data tidak ditemukan.');
                $this->template->load('template', 'clustering/clustering_data');
            } else {
                $data['hasil']=$this->Clustering_m->total_cluster();
                $this->template->load('template', 'clustering/clustering_result',$data);
            }
              
            
        }
    }

}
