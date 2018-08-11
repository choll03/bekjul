<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('file');
		$this->load->model('image_model');
	}

	public function index()
	{
		// if (!empty($_FILES))
		// {
	 //        $tempFile = $_FILES['file']['tmp_name'];
  //       	$fileName = $_FILES['file']['name'];
	 //        $targetPath = getcwd() . '/upload-foto/';
	 //        $targetFile = $targetPath . $fileName ;
	 //        move_uploaded_file($tempFile, $targetFile);
	 //    }
		$item_id = $this->input->post('item_id');

		$config['upload_path'] = './upload-foto/'; 
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')){
            $gbr = $this->upload->data();
            $config['image_library']='gd2';
            $config['source_image']='./upload-foto/'.$gbr['file_name'];
            $config['width']= 340;
            $config['height']= 240;
            $config['new_image']='./upload-foto/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $data = array(
            	'item_id'=>$item_id,
            	'file_name'=>$gbr['file_name'],
            	'path'=>'./upload-foto/'.$gbr['file_name']
            );

            $img = $this->db->insert('image_upload', $data);
            $data += ['id'=>$this->db->insert_id()];
            echo json_encode($data);
        }
                 
    
    }
    public function delete($id)
    {
        $img = $this->image_model->find($id);
        unlink($img['path']);
        $this->image_model->delete($id);
        redirect($this->session->userdata('referred_from'),'refresh');
    }

}
