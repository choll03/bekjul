<?php
class Pesanan_model extends CI_Model {

        public function __construct()
        {
        	$this->load->database();
        	$this->load->library('session');
                $this->load->helper('url');
        }

        public function getPesanan()
        {
        	$username = $this->session->userdata('username');

        	$this->db->select('
                        pesanan.id, 
                        items.id AS item,
                        pesanan.item_id,
                        qty,
                        kode_pesanan,
                        total,
                        nama,
                        harga,
                        status,
                        tanggal,
                        jam,
                        alamat
                ');
        	$this->db->from('pesanan');
                $this->db->where('username',$username);
                $this->db->order_by('id','desc');
        	$this->db->join('items','pesanan.item_id = items.id','left');

        	$query = $this->db->get();
        	return $query->result_array();
        }
      
	public function insert_pesanan()
	{

		$username = $this->session->userdata('username');
                $tanggal = date('d-m-Y');
                $jam = date('h:i a');
                $kode_pesanan = time();
		$item_id = $this->input->post('item_id');
		$qty = $this->input->post('qty');
                $alamat = $this->input->post('alamat');
                $total = $this->input->post('harga')*$qty;

		$data = array(
                        'kode_pesanan'=>$kode_pesanan,
			'username'=>$username,
                        'tanggal'=>$tanggal,
                        'jam'=>$jam,
			'item_id'=>$item_id,
                        'qty'=>$qty,
                        'total'=>$total,
                        'alamat'=>$alamat,
			'status'=>'menunggu'
		);

                $msg = array(
                        'send_to'=>'admin',
                        'title'=>'admin',
                        'msg'=>$username.' memesan sesuatu'
                );

                $this->db->insert('message', $msg);
		return $this->db->insert('pesanan', $data);

        }
        
        public function deletePesananMember($id)
        {
                $this->db->delete('pesanan',array('invoice_id' =>$id ));
                $this->db->delete('invoices', array('id' =>$id ));
        }

        public function deletePesanan($id, $username)
        {
                $data = array(
                        'send_to'=>$username,
                        'title'=>'pesanan',
                        'msg'=>'maaf pesanan anda kami Tolak, terima kasih',
                );
                
                $this->db->insert('message', $data);

                $this->db->delete('invoices',array('id'=>$id));
                $this->db->delete('pesanan',array('invoice_id'=>$id));
        }

        public function delete_per_pesanan($id)
        {
                $this->db->where('id', $id);
                $this->db->update('invoices', array('status'=>'selesai'));
        }

        public function deleteItemPesanan($id)
        {
                return $this->db->delete('pesanan',array('item_id'=>$id));
        }

        public function get_pesanan_belum()
        {
                $this->db->select('
                pesanan.id, 
                items.id AS item,
                pesanan.item_id,
                qty,
                nama,
                kode_pesanan,
                harga,
                status,
                username,
                tanggal,
                jam,
                alamat
        ');
        $this->db->from('pesanan');
        $this->db->where('status','menunggu');
        $this->db->join('items','pesanan.item_id = items.id','left');

                $query = $this->db->get();
                return $query->result_array();
        }

        public function get_pesanan_proses()
        {
                $this->db->select('
                        pesanan.id, 
                        items.id AS item,
                        pesanan.item_id,
                        qty,
                        nama,
                        harga,
                        kode_pesanan,
                        status,
                        username,
                        tanggal,
                        jam,
                        alamat
                ');
                $this->db->from('pesanan');
                $this->db->where('status !=','menunggu');
                $this->db->join('items','pesanan.item_id = items.id','left');

                $query = $this->db->get();
                return $query->result_array();
        }

        public function update_pesanan($id, $username)
        {
                $this->db->where('id',$id);
                $this->db->update('invoices', array('status'=>'proses pengiriman'));
                $data = array(
                        'send_to'=>$username,
                        'title'=>'pesanan',
                        'msg'=>'pesanan anda telah kami konfirmasi, terima kasih',
                );

                $this->db->insert('message', $data);
        }

        public function detailPesanan($data) {
                $this->db->select('
                        qty,
                        nama,
                        kode_pesanan,
                        harga,
                        username,
                        tanggal,
                        total
                ');

                $this->db->from('pesanan');
                $this->db->where('pesanan.kode_pesanan',$data);
                $this->db->join('items','pesanan.item_id = items.id','left');
                $query = $this->db->get();
                return $query->row();
        }

        public function is_proccess() {
                $username = $this->session->userdata('username');

                $invoice = array(
                        'no_tagihan' => $this->input->post('no_tagihan'),
                        'date' => date("Y-m-d H:i:s"),
                        'username' => $username,
                        'total' => $this->cart->total(),
                        'pengirim' => $this->input->post('pengirim'),
                        'alamat' => $this->input->post('alamat'),
                        'status' => 'menunggu konfirmasi'
                );

                $this->db->insert('invoices', $invoice);
                $invoice_id = $this->db->insert_id();

                foreach ($this->cart->contents() as $value) {
                        $data = array(
                                'invoice_id' => $invoice_id,
                                'item_id' => $value['id'],
                                'qty' => $value['qty'],
                                'total' => $value['subtotal'] 
                        );

                        $this->db->insert('pesanan', $data);
                }

                $msg = array(
                        'send_to'=>'admin',
                        'title'=>'admin',
                        'msg'=>$username.' memesan sesuatu'
                );

                $this->db->insert('message', $msg);

                return true;
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
        public function get_invoice_admin($param) {
                $this->db->where('status', $param);
                $this->db->order_by('date','desc');
                $query = $this->db->get('invoices');
                return $query->result_array();
        }

        public function get_invoice() {
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->order_by('date','desc');
                $query = $this->db->get('invoices');
                if($query->num_rows() > 0){
                        return $query->result_array();
                }else {
                        return false;
                }
        }

        public function get_once_invoice($id) {
                
                $query = $this->db->get_where('invoices', array('id'=>$id));
                return $query->row();
        }

        public function get_detail($id) {
                $this->db->select('pesanan.*,items.*');
                $this->db->from('pesanan');
                $this->db->join('items','pesanan.item_id = items.id','left');
                $this->db->where('pesanan.invoice_id',$id);
                $query = $this->db->get();

                return $query->result_array();
        }

}