<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->library('form_validation');
    }
	public function index()
	{
		$this->form_validation->set_rules('sendTo', 'Mobile number', 'required');
		$this->form_validation->set_rules('message', 'Text Message', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('sms/message_form');	
		} 
		else 
		{
			$to = $this->input->post('sendTo');
			$message = $this->input->post('message');

			if($to) {

				if($this->msg91->send($to, $message) == TRUE)  {
					$this->session->set_flashdata('update_status', '
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong><i class="dripicons-checkmark"></i> Hooray!</strong> Message Sent.
					</div>');
					redirect('Welcome','refresh');
				}
				 else 
				 {
					$this->session->set_flashdata('update_status', '
						<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong><i class="dripicons-checkmark"></i> Oops!</strong> Message  not sent.
					</div>');
					redirect('Welcome','refresh');

				}
			}

			
		}

		
			
	}



	public function help()
	{
		$this->load->view('help_view');
	}
}
