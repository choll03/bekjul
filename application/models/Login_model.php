<?php
class Login_model extends CI_Model {

    public function __construct()
    {
    	$this->load->database();
    }

    public function login($username, $password)
    {
    	$this->db->select('username,password,level');
    	$this->db->from('users');
    	$this->db->where('username', $username);
    	$this->db->where('password', $password);
    	$this->db->limit(1);


    	$query = $this->db->get();

    	if($query->num_rows() >= 1){
    		return $query->result();
    	}else{
    		return false;
    	}
    }

    public function register()
    {
        $this->load->helper('url');
        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('username', $this->input->post('username'));
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 0){
            $data = array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password'),
                'email'=>$this->input->post('email'),
                'phone'=>$this->input->post('phone'),
                'level'=>'member'
            );

            $this->db->insert('users', $data);
            return true;
        }else{
            return false;
        }
    }

    public function getUsers()
    {
        $this->db->order_by('username');
        $query = $this->db->get('users');
        return $query->result();
    }

    public function update_user(){
        $this->load->helper('url');
        $user_id = $this->input->post('user_id');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $level = $this->input->post('level');
        
        $data = array(
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'level' => $level 
        );
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }


}