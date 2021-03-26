<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Report_m');

    }
    public function sale_data()
	{
        $data['tahun'] = $this->Report_m->get_sale_by_year();

        $this->template->load('template', 'report/sale/sale_report', $data);
		
	}

	public function sale_detail_data()
	{
        $data['tahun'] = $this->Report_m->get_detail_by_year();

        $this->template->load('template', 'report/sale_detail/sale_detail_report', $data);
		
	}
	


    public function sale_filter(){
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalakhir = $this->input->post('tanggalakhir');
		$tahun1 = $this->input->post('tahun1');
		$bulanawal = $this->input->post('bulanawal');
		$bulanakhir = $this->input->post('bulanakhir');
		$tahun2 = $this->input->post('tahun2');
		$nilaifilter = $this->input->post('nilaifilter');
		


		if ($nilaifilter == 1) {
			
			$data['title'] = "Laporan Transaksi Penjualan";
			$data['subtitle'] = "Dari tanggal : ".indo_date($tanggalawal).' Sampai tanggal : '.indo_date($tanggalakhir);
			$data['datafilter'] = $this->Report_m->sale_filter_by_date($tanggalawal,$tanggalakhir);
			$data['sum'] = $this->Report_m->sum_total_by_date($tanggalawal,$tanggalakhir);
			
			$this->load->view('report/sale/sale_report_print', $data);
			

		}elseif ($nilaifilter == 2) {
			
			$data['title'] = "Laporan Transaksi Penjualan";
			$data['subtitle'] = "Dari bulan : ".$bulanawal. ' sampai bulan : '.$bulanakhir.' Tahun : '.$tahun1;
			$data['datafilter'] = $this->Report_m->sale_filter_by_month($tahun1,$bulanawal,$bulanakhir);
			$data['sum'] = $this->Report_m->sum_total_by_month($tahun1,$bulanawal,$bulanakhir);

			$this->load->view('report/sale/sale_report_print', $data);

		}elseif ($nilaifilter == 3) {
			
			$data['title'] = "Laporan Transaksi Penjualan";
			$data['subtitle'] = ' Tahun : '.$tahun2;
			$data['datafilter'] = $this->Report_m->sale_filter_by_year($tahun2);
			$data['sum'] = $this->Report_m->sum_total_by_year($tahun2);

			$this->load->view('report/sale/sale_report_print', $data);

		}

	}

	public function sale_detail_filter(){
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalakhir = $this->input->post('tanggalakhir');
		$tahun1 = $this->input->post('tahun1');
		$bulanawal = $this->input->post('bulanawal');
		$bulanakhir = $this->input->post('bulanakhir');
		$tahun2 = $this->input->post('tahun2');
		$nilaifilter = $this->input->post('nilaifilter');
		


		if ($nilaifilter == 1) {
			
			$data['title'] = "Laporan Detail Penjualan";
			$data['subtitle'] = "Dari tanggal : ".indo_date($tanggalawal).' Sampai tanggal : '.indo_date($tanggalakhir);
			$data['datafilter'] = $this->Report_m->detail_filter_by_date($tanggalawal,$tanggalakhir);
			$data['sum'] = $this->Report_m->sum_total_detail_by_date($tanggalawal,$tanggalakhir);
			
			$this->load->view('report/sale_detail/sale_detail_report_print', $data);
			

		}elseif ($nilaifilter == 2) {
			
			$data['title'] = "Laporan Detail Penjualan";
			$data['subtitle'] = "Dari bulan : ".$bulanawal. ' sampai bulan : '.$bulanakhir.' Tahun : '.$tahun1;
			$data['datafilter'] = $this->Report_m->detail_filter_by_month($tahun1,$bulanawal,$bulanakhir);
			$data['sum'] = $this->Report_m->sum_total_detail_by_month($tahun1,$bulanawal,$bulanakhir);

			$this->load->view('report/sale_detail/sale_detail_report_print', $data);

		}elseif ($nilaifilter == 3) {
			
			$data['title'] = "Laporan Detail Penjualan";
			$data['subtitle'] = ' Tahun : '.$tahun2;
			$data['datafilter'] = $this->Report_m->detail_filter_by_year($tahun2);
			$data['sum'] = $this->Report_m->sum_total_detail_by_year($tahun2);

			$this->load->view('report/sale_detail/sale_detail_report_print', $data);

		}

	}
    
    
}