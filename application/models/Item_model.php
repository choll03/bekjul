<?php
class Item_model extends CI_Model {

        public function __construct()
        {
        	$this->load->database();
        }

		public function get_item($kategori = FALSE)
		{
			if($kategori == FALSE){
			    $query = $this->db->get('items');
			    return $query->result_array();
			}

			$query = $this->db->get_where('items', array('kategori'=>$kategori));
			return $query->result_array();
		}

		public function get_page($number, $offset)
		{
			$this->db->select('
				items.id AS id,
				image_upload.id AS image_id,
				item_id,
				path,
				harga,
				diskon,
				file_name,
				nama
				');
			$this->db->join('image_upload','items.id = image_upload.item_id','left');
			$query = $this->db->get('items', $number, $offset);
			return $query->result_array();
		}

		public function create_item()
		{
			$this->load->helper('url');

			$nama = $this->input->post('nama');
			$kategori = $this->input->post('kategori');
			$harga = $this->input->post('harga');

			$data = array(
				'nama'=>$nama,
				'kategori'=>$kategori,
				'harga'=>$harga
			);

			$this->db->insert('items',$data);
		}

		public function get_once_item($id)
		{
			
			$query = $this->db->get_where('items', array('id'=>$id));
			return $query->row_array();
		}

		public function update_item($id)
		{
			$this->load->helper('url');

			$nama = $this->input->post('nama');
			$kategori = $this->input->post('kategori');
			$harga = $this->input->post('harga');

			$data = array(
				'nama'=>$nama,
				'kategori'=>$kategori,
				'harga'=>$harga
			);

			$this->db->where('id',$id);
			$this->db->update('items',$data);
		} 

		public function delete_item($id)
		{
			$this->db->delete('items', array('id'=>$id));
		}

		public function get_total()
		{
			return $this->db->count_all('items');
		}
	}