<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Clustering extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
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
       
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'clustering/rfm_data');
        } else {

            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $this->Clustering_m->set($start_date, $end_date);
            $data['rfm'] = $this->Clustering_m->set($start_date, $end_date);

            if (empty($data['rfm'])) {
                $this->session->set_flashdata('pesan', 'data tidak ditemukan.');
                $this->template->load('template', 'clustering/rfm_data');

                
            } else {
               
                $this->template->load('template', 'clustering/rfm_data',$data);
            }
        }                             
    }

    public function clustering_process()
    {
       if (isset($_POST['proses'])) {
            $this->template->load('template', 'clustering/clustering_result');
           
        }
    }
    public function print_excel()
    {
        $cluster_temp = $this->Clustering_m->print_excel()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Name')
                    ->setCellValue('C1', 'Phone')
                    ->setCellValue('D1', 'R Norm')
                    ->setCellValue('E1', 'F Norm')
                    ->setCellValue('F1', 'M Norm')
                    ->setCellValue('G1', 'Cluster')
                   
                    ;                  

        $kolom = 2;
        $nomor = 1;
        foreach($cluster_temp as $ct) {

             $spreadsheet->setActiveSheetIndex(0)
                         ->setCellValue('A' . $kolom, $nomor)
                         ->setCellValue('B' . $kolom, $ct->name)
                         ->setCellValue('C' . $kolom, $ct->phone)
                         ->setCellValue('D' . $kolom, $ct->r_norm)
                         ->setCellValue('E' . $kolom, $ct->f_norm)
                         ->setCellValue('F' . $kolom, $ct->m_norm)
                         ->setCellValue('G' . $kolom, $ct->cluster);                                         

             $kolom++;
             $nomor++;

        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Cluster Result.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
   }

}
