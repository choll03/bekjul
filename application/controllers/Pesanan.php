<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pesanan_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pdf');
		$this->load->library('cart');
		$this->load->helper('form');

		if(!$this->session->has_userdata('username')){
			$this->session->set_flashdata('msg',1);
			redirect('login');
		}
	}

	public function index()
	{
		$data['pesanan'] = $this->pesanan_model->get_invoice();
		$data['msg'] = $this->session->flashdata('msg');
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pages/page_pesanan', $data);
		$this->load->view('template/footer');
	}

	public function proses_pesanan()
	{
		// $this->pesanan_model->insert_pesanan();
		if($this->pesanan_model->is_proccess()) {
			$this->cart->destroy();
			$this->session->set_flashdata('msg',1);
			redirect('pesanan');
		}
		
	}

	public function delete($id)
	{
		$this->pesanan_model->deletePesananMember($id);
		redirect('pesanan');
	}

	public function cetak($data = null)
	{
		$item = $this->pesanan_model->get_detail($data);
		$invoice = $this->pesanan_model->get_once_invoice($data);

		$pdf = new FPDF('P', 'mm', array(150,150));
		$pdf->AddPage();
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(130,5,'CAFE',0,1,'C');
		$pdf->Cell(130,5,'Jl.RAYA POMAD KOTA BOGOR, JAWA-BARAT',0,1,'C');
		$pdf->Cell(130,5,'TELP : 02199101090',0,1,'C');
		$pdf->Cell(130,0,'',1,1);
		$pdf->Cell(130,5,'',0,2);
		$pdf->SetFont('Times','',10);
		$pdf->Cell(5);
		$pdf->Cell(30,5,'No. Tagihan',0,0);
		$pdf->Cell(5,5,':',0,0);
		$pdf->Cell(30,5,$invoice->no_tagihan,0,1);
		$pdf->Cell(5);
		$pdf->Cell(30,5,'Tanggal',0,0);
		$pdf->Cell(5,5,':',0,0);
		$pdf->Cell(30,5,substr($invoice->date,0,10),0,1);
		$pdf->Cell(5);
		$pdf->Cell(30,5,'jam',0,0);
		$pdf->Cell(5,5,':',0,0);
		$pdf->Cell(30,5,substr($invoice->date,10,14),0,1);
		$pdf->Cell(5);
		$pdf->Cell(30,5,'Pemesan',0,0);
		$pdf->Cell(5,5,':',0,0);
		$pdf->Cell(30,5,$invoice->username,0,1);
		$pdf->Cell(5);
		$pdf->Cell(30,5,'Alamat',0,0);
		$pdf->Cell(5,5,':',0,0);
		$pdf->Cell(30,5,$invoice->alamat,0,1);

		$pdf->Cell(130,5,'',0,1);

		$pdf->Cell(5);
		$pdf->Cell(10,5,'no',1,0,'C');
		$pdf->Cell(30,5,'Item',1,0,'C');
		$pdf->Cell(25,5,'quantity',1,0,'C');
		$pdf->Cell(30,5,'harga',1,0,'C');
		$pdf->Cell(30,5,'Subtotal',1,1,'C');

		if($data != null) {
			$i = 0;$total =0;
			foreach ($item as $value) {
				$i++;$total+=$value['total'];
				$pdf->Cell(5);
				$pdf->Cell(10,5,$i,1,0,'C');
				$pdf->Cell(30,5,$value['nama'],1,0,'C');
				$pdf->Cell(25,5,$value['qty'],1,0,'C');
				$pdf->Cell(30,5,"Rp. ".number_format($value['harga']),1,0,'C');
				$pdf->Cell(30,5,"Rp. ".number_format($value['total']),1,1,'C');
			}
			$pdf->Cell(5);
			$pdf->Cell(95,5,"Total",1,0,'C');
			$pdf->Cell(30,5,"Rp. ".number_format($total),1,1,'C');
		}

		$pdf->Cell(130,5,'',0,1);
		$pdf->Cell(130,0,'',1,1);
		$pdf->Cell(130,2,'',0,1);
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(130,5,'.:: TERIMA KASIH ::.',0,1,'C');

		$pdf->Output();
	}

	public function cart() {
		$data['cart'] = $this->cart->contents();
		$data['no_tagihan'] = $this->randomString();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pages/page_cart', $data);
		$this->load->view('template/footer');
	}

	public function cart_added () {
		
		$data = array(
			'id'      => $this->input->post('item_id'),
			'qty'     => $this->input->post('qty'),
			'price'   => $this->input->post('item_harga'),
			'name'    => $this->input->post('item_nama')
		);

		$this->cart->insert($data);
		echo $this->cart->total_items();
	}

	public function cart_remove($rowid) {
		$this->cart->remove($rowid);
		redirect('pesanan/cart');
	}

	public function detail($id) {
		$data['detail'] = $this->pesanan_model->get_detail($id);
		$data['invoice'] = $this->pesanan_model->get_once_invoice($id);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('pages/page_detail',$data);
		$this->load->view('template/footer');
	}

	public function cart_clear()
	{
		$this->cart->destroy();
		redirect('pesanan/cart');
	}

	function randomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $str .= $characters[$rand];
        }
        return $str;
    }
}
