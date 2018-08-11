<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('image_model');
		$this->load->library('email');
		$this->load->library('cart');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('welcome_message');
		$this->load->view('template/footer');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}

	public function email()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$message = $this->input->post('message');

		$this->email->from($email, $name);
		$this->email->to('ismail15000000@gmail.com');

		$this->email->subject('Cafe tes');
		$this->email->message($message);

		$this->email->send();

		redirect('/');
	}
}
