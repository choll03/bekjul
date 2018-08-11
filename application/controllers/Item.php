<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('cart');
	}

	public function index()
	{
		$this->load->library('pagination');

		$config['base_url'] = base_url().'menu/page/';
		$config['total_rows'] = $this->item_model->get_total();
		$config['per_page'] = 6;
		$from = $this->uri->segment(3);
         
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
         
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';

        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';

        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

		$this->pagination->initialize($config);

		$data['menus'] = $this->item_model->get_page($config['per_page'],$from);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pages/page_menu',$data);
		$this->load->view('template/footer');
	}

	public function view($kategori = NULL)
	{
		$data['menu'] = $this->item_model->get_item($kategori);
		$this->load->view('template/header');
		$this->load->view('pages/page_kategori', $data);
		$this->load->view('template/footer');
	}

}
