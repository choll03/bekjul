<?php
class Image_model extends CI_Model {

        public function __construct()
        {
        	$this->load->database();
        }

        public function get_image($item_id = FALSE)
        {
        	if($item_id == FALSE){
	        	$query = $this->db->get('image_upload');
	        	return $query->result_array();
	        }

	        $query = $this->db->get_where('image_upload',array('item_id'=>$item_id));
	        return $query->result_array();
        }

        public function find($id)
        {
               $query = $this->db->get_where('image_upload', array('id'=>$id));

                return $query->row_array();
        }

        public function delete($id)
        {
                $this->db->delete('image_upload',array('id'=>$id));
        }
}