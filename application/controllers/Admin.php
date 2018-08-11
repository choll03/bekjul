<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pdf');
		$this->load->library('cart');
		$this->load->model(array(['pesanan_model', 'booking_model', 'item_model','image_model','laporan_model','login_model']));
		if($this->session->userdata('username')!= 'admin'){
			redirect('/');
		}
	}

	public function index()
	{
		// $data['pesanan'] = $this->pesanan_model->get_pesanan_belum();
		// $data['proses'] = $this->pesanan_model->get_pesanan_proses();
		$data['pesanan'] = $this->pesanan_model->get_invoice_admin('menunggu konfirmasi');
		$data['proses'] = $this->pesanan_model->get_invoice_admin('proses pengiriman');
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('admin/pesanan', $data);
		$this->load->view('template/footer');
	}

	public function view($id) {
		$data['detail'] = $this->pesanan_model->get_detail($id);
		$data['invoice'] = $this->pesanan_model->get_once_invoice($id);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pages/page_detail',$data);
		$this->load->view('template/footer');
	}

	public function delete_pesanan($id, $username)
	{
		$this->pesanan_model->deletePesanan($id, $username);
		redirect('admin');
	}

	public function update_pesanan($id, $username)
	{
		$this->pesanan_model->update_pesanan($id, $username);
		redirect('admin');
	}

	public function delete_per_pesanan($id)
	{
		$this->pesanan_model->delete_per_pesanan($id);
		redirect('admin');
	}

	public function booking()
	{
		
		$data['booking'] = $this->booking_model->get_all_booking();
		$data['confirm_booking'] = $this->booking_model->get_all_confirm_booking();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('admin/booking',$data);
		$this->load->view('template/footer');
	}

	public function update_booking($id, $username)
	{
		$this->booking_model->update_booking($id, $username);
		redirect('admin/booking');
	}

	public function delete_booking($id, $username)
	{
		$this->booking_model->delete($id, $username);
		redirect('admin/booking');
	}

	public function delete_per_booking($id)
	{
		$this->booking_model->delete_per_booking($id);
		redirect('admin/booking');
	}
	public function item()
	{
		$data['item'] = $this->item_model->get_item();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('admin/item',$data);
		$this->load->view('template/footer');
	}

	public function create_item()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('admin/item_create');
		$this->load->view('template/footer');
	}

	public function proses_create_item()
	{
		$this->item_model->create_item();
		redirect('admin/item');
	}

	public function update_item($id)
	{
		$this->session->set_userdata('referred_from', current_url());
		$data['item'] = $this->item_model->get_once_item($id);
		$data['image'] = $this->image_model->get_image($id);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('admin/item_update', $data);
		$this->load->view('template/footer');
	}

	public function proses_update_item($id)
	{
		$this->item_model->update_item($id);
		redirect('admin/item');
	}

	public function delete_item($id)
	{

		$data = $this->item_model->get_once_item($id);
		$this->pesanan_model->deleteItemPesanan($data['id']);
		$this->item_model->delete_item($id);
		$image = $this->image_model->get_image($id);
		foreach ($image as $img) {
			unlink($img['path']);
        	$this->image_model->delete($img['id']);
		}
		redirect('admin/item');
	}

	public function laporan()
	{
		$data['bulanan'] = $this->laporan_model->getBulanan();
		$data['laporan'] = $this->session->flashdata('laporan');
		$data['cetak'] = $this->session->flashdata('cetak');
		// $data['laporan'] = $this->laporan->model->getLaporan();
		// print_r($data['bulanan']);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('admin/laporan',$data);
		$this->load->view('template/footer');
	}

	public function print_laporan() {
		$laporan = $this->laporan_model->getLaporan();
		$this->session->set_flashdata('laporan',$laporan);
		$this->session->set_flashdata('cetak',$this->input->post('bulanan'));
		redirect('admin/laporan');
	}

	public function cetak($bulanan = null) {
		$pdf = new FPDF('l', 'mm', 'Letter');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(270,30,'Laporan Penjualan Bekjul Cafe',0,1,'C');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10);
		$pdf->Cell(40,10,'Tanggal',1,0,'C');
		$pdf->Cell(40,10,'item',1,0,'C');
		$pdf->Cell(40,10,'Pembeli',1,0,'C');
		$pdf->Cell(40,10,'harga',1,0,'C');
		$pdf->Cell(40,10,'Quantity',1,0,'C');
		$pdf->Cell(40,10,'Subtotal',1,1,'C');
		$pdf->Cell(10);
		$pdf->SetFont('Arial','',10);

		if($bulanan != null){
			$data = $this->laporan_model->printLaporan($bulanan);
			$total=0;
			foreach ($data as $d) {
				$pdf->Cell(40,8,$d['date'],1,0);
				$pdf->Cell(40,8,$d['nama'],1,0);
				$pdf->Cell(40,8,$d['username'],1,0);
				$pdf->Cell(40,8,'Rp. '.number_format($d['harga']),1,0,'R');
				$pdf->Cell(40,8,$d['qty'],1,0,'C');
				$pdf->Cell(40,8,'Rp. '.number_format($d['total']),1,1,'R');
				$pdf->Cell(10);
				$total+=$d['total'];
			}
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(200,10,"JUMLAH",1,0,'C');
			$pdf->Cell(40,10,'Rp. '.number_format($total),1,0,'R');
		}
		$pdf->Output();
		
	}

	public function users() {
		$data['users'] = $this->login_model->getUsers();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('admin/users',$data);
		$this->load->view('template/footer');
	}

	public function edit_user() {
		$this->login_model->update_user();
		redirect('admin/users');
	}

}