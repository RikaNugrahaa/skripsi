<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SMS_Marketing extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['SMS_Marketing_m', 'Clustering_m']);
	}

	public function index()
	{
		$data['row'] = $this->SMS_Marketing_m->get()->result();
		$this->template->load('template', 'sms_marketing/sms_marketing_data', $data);
	}

	public function add()
	{

		$cluster_temp = $this->Clustering_m->get_cluster()->result();
        $data = ['cluster_temp' => $cluster_temp];
		$this->template->load('template', 'sms_marketing/sms_marketing_form', $data);
	}

	
	public function sendSMS()
	{	
				
		$post = $this->input->post(null, TRUE);
		
	
		if (isset($_POST["add"])) {
			$this->SMS_Marketing_m->add($post);
		
		$email_api = urlencode("rikanugraha88@gmail.com");
		$passkey_api = urlencode("Hm123123");
		$no_hp_tujuan = urlencode($_POST["recipient"]);
		$isi_pesan = urlencode($_POST["message"]);

		$url = "https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=".$email_api."&passkey=".$passkey_api."&no_tujuan=".$no_hp_tujuan."&pesan=".$isi_pesan;
		$result = file_get_contents($url);
		$data = explode("~~~", $result);
		
		if ($data[0]==1) {
			
			echo "<script>alert('pesan berhasil terkirim');";
			echo "window.location='".site_url('sms_marketing')."';</script>";
        }else{
            echo "<script>alert('pesan gagal terkirim');";
			
		}
	}	
	}

	public function del($id)
	{
		$this->SMS_Marketing_m->del($id);
		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('sms_marketing');  
	}
}