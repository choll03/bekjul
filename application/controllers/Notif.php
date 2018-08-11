<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('message_model');
		$this->load->library('session');
	}
	public function index()
	{
		$msg = $this->message_model->get();
		$count = $this->message_model->get_status()->num_rows();
		$output = '';

		if($msg->num_rows() > 0){
			foreach ($msg->result_array() as $data) {
				$output .= '<li class="dropdown-item"><a href="'.base_url($data['title']).'">'.$data['msg'].'</a></li><div class="dropdown-divider"></div>';
			}
			$output.='<li class="dropdown-item text-center"><a href="'.base_url('notif/delete').'">Hapus Semua</a></li>';
		}else{
			$output .= '<li class="dropdown-item">kosong</li>';
		}
		$data = array(
				'notif'=>$output,
				'unssen_notif'=>$count
			);

		echo json_encode($data);
	}

	public function delete()
	{
		$this->message_model->delete($this->session->userdata('username'));
		redirect('/');
	}

}