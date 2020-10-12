<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('SMS_Campaign_m');
	}

	public function index()
	{

		$this->template->load('template', 'sms_campaign/sms_campaign_data');
	}

	public function add()
	{
		$this->template->load('template', 'sms_campaign/sms_campaign_form');
	}

}

