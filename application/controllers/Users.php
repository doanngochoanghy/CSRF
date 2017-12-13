<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('loggedin')) {
			redirect(base_url(),'')	;
		}
		else{
			redirect(base_url().'Users/login');
		}
	}
	public function login()
	{
		if ($this->session->userdata('loggedin')) {
			redirect(base_url(),'')	;
		}
		else
		{
			$this->form_validation->set_rules('username', 'Name', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/header');
				$this->load->view('Users/login');
				$this->load->view('templates/footer');
			} else {
				$username=htmlspecialchars($this->input->post('username'),ENT_QUOTES);
				$password=md5($this->input->post('password'));
				$user_data=$this->users_model->login($username,$password);
				if ($user_data!=FALSE) {
					$user_data=(array)$user_data;
					$user_data["loggedin"] = true;
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('message', 'Welcome <b>'.$this->session->userdata('username').'</b>. You are logged in.');
					redirect(base_url(),'');
				} else {
					$this->session->set_flashdata('message', 'Login is invalid.');
					redirect('Users/login','');
				}
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(),'');
	}
	public function register()
	{
		//Kiểm tra dữ liệu nhập vào.

		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]',array('is_unique'=>'Username already exist'));
		$this->form_validation->set_rules('password', 'Password','required');
		$this->form_validation->set_rules('password2', 'Password Confirm', 'matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('Users/register');
			$this->load->view('templates/footer');
		} else {
			$data = array('username' => htmlspecialchars($this->input->post('username'),ENT_QUOTES),'password' => md5($this->input->post('password')),
				);
			$this->users_model->register($data);
			$this->session->set_flashdata('message', 'You are registered. You can login');
			redirect(base_url()."Users/login",'');
		}
	}
	public function change_password()
	{
		if (!$this->session->userdata('loggedin')) {
			redirect('Users/Login');
		}
		else
		{
			$this->form_validation->set_rules('new_password', 'New Password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/header');
				$this->load->view('Users/change_password');
				$this->load->view('templates/footer');
			}
			else
			{
				$new_password=md5($this->input->post("new_password"));
				$this->users_model->change_password($this->session->userdata('user_id'),$new_password);
				$this->session->set_flashdata('message', 'Password changed!');
				redirect('');
			}
		}
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */