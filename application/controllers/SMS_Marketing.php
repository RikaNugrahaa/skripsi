<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require('./application/third_party/phpoffice/vendor/autoload.php');


// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Reader\Csv;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class SMS_Marketing extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['SMS_Marketing_m', 'Clustering_m']);
		$this->load->library('excel');
	}

	public function index()
	{
        $this->template->load('template', 'sms_marketing/sms_marketing_form');
	}

	public function form_broadcast()
	{
		$cluster_temp = $this->Clustering_m->getCluster()->result();
        $data = ['cluster_temp' => $cluster_temp];
		$this->template->load('template', 'sms_marketing/send_broadcast_form',$data);
	}

	public function sendSMS()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$email_api = urlencode("rikanugraha88@gmail.com");
			$passkey_api = urlencode("Hm123123");
			$no_hp_tujuan = urlencode($_POST["recipient"]);

			$isi_pesan = urlencode($_POST["message"]);
			$process=explode(",",$no_hp_tujuan);
			reset($process);
			$url = "https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=" . $email_api . "&passkey=" . $passkey_api . "&no_tujuan=" . $no_hp_tujuan . "&pesan=" . $isi_pesan ;
			$result = file_get_contents($url);
			$data = explode("~~~", $result);


			$this->SMS_Marketing_m->add($post);
			if ($data[0] == 1) {

				echo "<script>
			alert('pesan berhasil terkirim');
			";
				echo "window.location='" . site_url('sms_marketing') .
					"';
				</script>";
			} else {
				echo "<script>
			alert('pesan gagal terkirim');
			";
			}
		}
	
	}

	public function del($id)
	{
		$this->SMS_Marketing_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		redirect('sms_marketing');
	}

	public function fetch()
	{

		$data = $this->SMS_Marketing_m->select();

		$output = '
	
		
		<table class="tabel table-bordered table striped" >
         
			
		<tr>
		<th>No</th>
		<th>Nama Pelanggan</th>
		<th style="text-align:center">Phone</th>
        <th style="text-align:center">Kelompok Cluster</th>	
		 </tr>
	
		';
		$no = 1;
		foreach ($data->result() as $row) {

			$output .= '
			
	
		  <tr>
		  <td>' . $no++.'</td>
	
		  <td>' . $row->name . '</td>
	
		  <td style="text-align:center">' . $row->phone . '</td>

		  <td style="text-align:center">' . $row->cluster . '</td>
	
		  </tr>
	
		  ';
		}

		$output .= '</table>';

		echo $output;
	}



	public function import()
	{

		if (isset($_FILES["file"]["name"])) {

			$path = $_FILES["file"]["tmp_name"];

			$object = PHPExcel_IOFactory::load($path);

			foreach ($object->getWorksheetIterator() as $worksheet) {
				// $this->db->query('truncate table cluster_result');

				$highestRow = $worksheet->getHighestRow();

				$highestColumn = $worksheet->getHighestColumn();

				for ($row = 2; $row <= $highestRow; $row++) {
					
					
					
					$name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();

					$phone = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

					$cluster = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

					$data[] = array(

						'name'  => $name,

						'phone'   => $phone,

						'cluster' => $cluster

					);
				}
			}

			$this->SMS_Marketing_m->insert($data);
			

			echo 'Data Imported successfully';
		}
	}


	
}
