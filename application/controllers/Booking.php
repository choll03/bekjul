<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('booking_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('cart');
	}

	public function index()
	{
		$data['msg'] = $this->session->flashdata('msg');
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pages/page_booking_v2',$data);
		$this->load->view('template/footer');
	}

	public function booking_tempat()
	{
		if(!$this->session->has_userdata('username')){
			$this->session->set_flashdata('msg',1);
			redirect('login');
		}else {
			$this->booking_model->booking_tempat();
			// $this->session->set_flashdata('msg',1);
			redirect('bookingan');
		}
	}

	public function bookingan ()
	{

		$data['bookingan'] = $this->booking_model->get_bookingan();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pages/page_bookingan', $data);
		$this->load->view('template/footer');
	}

	public function proses_booking() {
		$this->booking_model->konfirmasi_bayar();
		redirect('bookingan');
	}

	public function batal_booking($id) {
		$this->booking_model->batal($id);
		redirect('bookingan');
	}

	public function payment($param) {
		if(!$this->session->has_userdata('username')){
			redirect('login');
		}else {
			$data['msg'] = $this->session->flashdata('msg');
			$data['param'] = $param;
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('pages/page_booking',$data);
			$this->load->view('template/footer');
		}
	}
}
