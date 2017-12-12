<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if (empty($this->session->userdata('loggedin'))||$this->session->userdata('loggedin')==FALSE) {
			session_destroy();
		}
		$this->load->view('templates/header');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */