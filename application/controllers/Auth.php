<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');

		if($this->session->has_userdata('username')){
			redirect('/');
		}

	}

	public function login()
	{
		$data['msg'] = $this->session->flashdata('msg');
		$this->load->view('template/header');
		$this->load->view('auth/login',$data);
		$this->load->view('template/footer');
	}

	public function register()
	{
		$this->load->view('template/header');
		$this->load->view('auth/register');
		$this->load->view('template/footer');
	}

	public function prosses_login(){
		$username = $this->input->post('username');
		$pass = $this->input->post('password');

		$check = $this->login_model->login($username, $pass);

		if($check){
			foreach ($check as $data);
			$this->session->set_userdata('username', $data->username);
			$this->session->set_userdata('level', $data->level);
			redirect('/');
		}else{
			$data['pesan'] = "username dan password tidak sesuai";
			$this->load->view('template/header');
			$this->load->view('auth/login',$data);
			$this->load->view('template/footer');
		}
	}

	public function prosses_register(){

		$check = $this->login_model->register();

		if($check){
			redirect('login');
		}else{
			$data['pesan'] = "username sudah di pakai";
			$this->load->view('template/header');
			$this->load->view('auth/register',$data);
			$this->load->view('template/footer');
		}

		
	}
}
