<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('sale_m');
    }

	public function index()
	{
		$data['sale_detail']= $this->sale_m->get_last_detail();
		
		$this->template->load('template', 'dashboard',$data);
	}
	

}

