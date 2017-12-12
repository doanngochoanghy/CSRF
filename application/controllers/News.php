<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function index()
	{
		//List tin tuc
		if (empty($this->session->userdata('loggedin'))) {
			$this->session->set_flashdata('message', 'You must login!');
			redirect('./Users/Login');
		}
		$list=$this->news_model->list();
		$data = array('list' => $list );
		// var_dump($list);
		$this->load->view('templates/header');
		$this->load->view('News/list.php',$data);
		$this->load->view('templates/footer');
	}

	public function Create()
	{
		//Create tin tuc
		if (!empty($this->session->userdata('loggedin'))) {
			if ($this->session->userdata('is_admin')==1) {
				if ($this->input->post('title')!=NULL&&$this->input->post('content')!=NULL) {
				$this->news_model->Create($this->session->userdata('user_id'),$this->input->post('title'),$this->input->post('content'));
					redirect(base_url().'News','');
				} else {
				$this->load->view('templates/header');
				$this->load->view('News/create_form');
				$this->load->view('templates/footer');
			}
			} else {
				redirect('./');
			}
			
		} else {
			$this->session->set_flashdata('message', 'You must login!');
			redirect('./Users/Login');
		}
		
	}

	public function Edit($post_id)
	{
		//Edit tin tuc
		if (empty($this->session->userdata('loggedin'))) {
			$this->session->set_flashdata('message', 'You must login!');
			redirect(base_url().'Users/login');
		} else {
			$post=$this->news_model->Get_post($post_id,$this->session->userdata('user_id'));
			if (count($post)>0) {
				if ($this->input->post('title')!=NULL&&$this->input->post('content')) {
					$this->news_model->Edit($post_id,$this->input->post('title'),$this->input->post('content'));
					redirect(base_url().'News');

				} else {
					$this->load->view('templates/header');
					$this->load->view('News/edit_form',array( 'post' =>$post[0]));
					$this->load->view('templates/footer');
				}
				
			} else {
				redirect(base_url().'News');
			}
			
		}
		
	}

	public function Delete($post_id)	
	{
		//Delete
		if (empty($this->session->userdata('loggedin'))) {
			$this->session->set_flashdata('message', 'You must login!');
			redirect(base_url().'Users/login');
		} else {
			$post=$this->news_model->Get_post($post_id,$this->session->userdata('user_id'));
			if (count($post)>0) {
				$this->news_model->Delete($post_id);
				$this->session->set_flashdata('message', 'Deleted post.');
				redirect(base_url().'News');
			} else {
				redirect(base_url().'News');
			}
			
		}
		
	}
}

/* End of file news.php */
/* Location: ./application/controllers/news.php */