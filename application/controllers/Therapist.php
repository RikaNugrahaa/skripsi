<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Therapist extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('therapist_m');
    }

    public function index()
	{
		$data['row'] = $this->therapist_m->get();
		$this->template->load('template', 'therapist/therapist_data', $data);
    }
    
    public function add()
    {
        $therapist = new stdClass();
		$therapist->therapist_id = null;
        $therapist->name = null;
        $therapist->phone = null;
		$therapist->gender = null;
		$data = array(
			'page' => 'add', 
			'row'=> $therapist
		);
		$this->template->load('template', 'therapist/therapist_form', $data);
    }

    public function edit($id)
    {
        $query = $this->therapist_m->get($id);
		if($query->num_rows() > 0) {
			$therapist = $query->row();
			$data = array(
				'page' => 'edit', 
				'row'=> $therapist
			);
			$this->template->load('template', 'therapist/therapist_form', $data);
		} else {
			echo "<script>alert('data tidak ditemukan');";
			echo "window.location='".site_url('therapist')."';</script>";
		}
    }

    public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->therapist_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->therapist_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
		redirect('therapist');   
	}

	public function del($id)
	{
		$this->therapist_m->del($id);
		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('therapist');  
	}
}