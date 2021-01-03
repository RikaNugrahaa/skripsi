<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Campaign extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('SMS_Campaign_m');
	}

	public function index()
	{
		$data['row'] = $this->SMS_Campaign_m->get()->result();
		$this->template->load('template', 'sms_campaign/sms_campaign_data', $data);
	}

	public function add()
	{
		// $message = new stdClass();
		// $message->message_id = null;
        // $message->phone = null;
        // $message->detail = null;
		
		// $data = array(
		// 	'page' => 'add', 
		// 	'show' => 'tambah',
		// 	'row'=> $message
		// );
		$this->template->load('template', 'sms_campaign/sms_campaign_form');
	}

	public function sendSMS()
	{	
				
		$post = $this->input->post(null, TRUE);
	
		if (isset($_POST["add"])) {
			$this->SMS_Campaign_m->add($post);
		
		$email_api = urlencode("rikanugraha88@gmail.com");
		$passkey_api = urlencode("Hm123123");
		$no_hp_tujuan = urlencode($_POST["recipient"]);
		$isi_pesan = urlencode($_POST["message"]);

		$url = "https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=" . $email_api . "&passkey=" . $passkey_api . "&no_tujuan=" . $no_hp_tujuan . "&pesan=" . $isi_pesan;
		$result = file_get_contents($url);
		$data = explode("~~~", $result);
		
		
		if (!$data) {
			
			echo "<script>alert('pesan gagal terkirim');";
		}else {
			
			echo "<script>alert('pesan berhasil terkirim');";
			echo "window.location='".site_url('campaign')."';</script>";
		}
		}	
	}

	public function del($id)
	{
		$this->SMS_Campaign_m->del($id);
		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('campaign');  
	}
}