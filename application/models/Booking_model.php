<?php
class Booking_model extends CI_Model {

        public function __construct()
        {
        	$this->load->database();
        	$this->load->helper('url');
        	$this->load->library('session');
        }

        public function get_all_booking()
        {
        	$query = $this->db->get_where('booking',array('status_booking'=>"menunggu konfirmasi"));
        	return $query->result_array();
        }

        public function get_all_confirm_booking()
        {
        	$query = $this->db->get_where('booking',array('status_booking'=>"selesai"));
        	return $query->result_array();
        }

        public function konfirmasi_bayar() {
                $data = array(
                        'dp' => $this->input->post('dp'),
                        'status_booking' => "menunggu konfirmasi" 
                );

                $this->db->where('id', $this->input->post('id_booking'));
                $this->db->update('booking', $data);
        }

        public function get_bookingan()
        {
        	$username = $this->session->userdata('username');

        	$this->db->select('*');
        	$this->db->where('nama_pemboking', $username);
        	$this->db->from('booking');
        	$this->db->order_by('id','desc');
        	$query = $this->db->get();
        	
        	return $query->result_array();
        }
        public function delete($id, $username)
        {
        	$msg = array(
				'send_to'=>$username,
				'title'=>'bookingan',
				'msg'=>'maaf bookingan anda kami Tolak, terima kasih',
			);

			$this->db->insert('message',$msg);

			return $this->db->delete('booking', array('id'=>$id));
        }

        public function delete_per_booking($id)
        {
        	return $this->db->delete('booking', array('id'=>$id));
        }
	
	public function booking_tempat()
	{
                $this->db->select_max('no_tagihan_booking');
                $no_tagihan = $this->db->get('booking');

                if($no_tagihan->num_rows() > 0) {
                        $kode = substr($no_tagihan->row()->no_tagihan_booking, 2);
                        if(substr($kode, 0, 4) == date('md')) {
                                $kode = substr($kode, 2);
                                $kode +=1;
                                $kode = date("m").$kode;
                        }else {
                                $kode = date("md").'001';
                        }
                }else{
                        $kode = date("md").'001';
                }

		$username = $this->session->userdata('username');
		$data = array(
                        'no_tagihan_booking'=> 'BK'.$kode,
			'nama_pemboking'=>$username,
                        'jenis' => $this->input->post('type'),
			'orang'=>$this->input->post('orang'),
			'tanggal'=>$this->input->post('tanggal'),
			'jam'=>$this->input->post('jam'),
			'pesanan_khusus'=>$this->input->post('khusus'),
                        'status_booking' => "belum bayar"
		);

		$this->db->insert('booking',$data);

		$msg = array(
			'send_to'=>'admin',
			'title'=>'admin/booking',
			'msg'=>$username.' booking tempat '
		);

		$this->db->insert('message',$msg);
	}

	
	public function update_booking($id, $username)
	{
		
		$this->db->insert('message', array('send_to'=>$username,'title'=>'bookingan','msg'=>'bookingan anda telah di konfirm'));
		
		$this->db->where('id',$id);

		$this->db->update('booking',array('status_booking'=>"selesai"));
	}

        public function batal($id) {
                $this->db->delete('booking', array('id'=>$id));
        }
}