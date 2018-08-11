<?php
class Message_model extends CI_Model {

        public function __construct()
        {
        	$this->load->database();
        	$this->load->helper('url');
        	$this->load->library('session');
        }

        public function get()
        {

                $username = $this->session->userdata('username');

                if($this->input->post('view') != ''){
                        $this->db->where('send_to',$username);
                        $this->db->set('status',1);
                        $this->db->update('message');
                }
                $this->db->order_by('id','desc');
        	$query = $this->db->get_where('message', array('send_to'=>$username));

        	return $query;
        }

        public function get_status()
        {
                $username = $this->session->userdata('username');
                $query = $this->db->get_where('message', array('send_to'=>$username, 'status'=>0));
                return $query;
        }

        public function delete($username)
        {
                return $this->db->delete('message',array('send_to'=>$username));
        }
}
?>