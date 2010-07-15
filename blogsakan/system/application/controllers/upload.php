<?php
 class Upload extends Controller {
    function Upload()
    {
        parent::Controller();
            $this->load->helper('url');
	    $this->load->helper('form');
	    $this->load->helper('file');
            $this->load->model('Accountmodel');
            $this->load->model('Rightside');
    }
    function index()
    {
        $data['error']="Upload your primary photo:";
        $this->load->view('upload_photo',$data);
    }
    function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '200';
        $config['max_width'] = '2000';
        $config['max_height'] = '4000';
        $config['encrypt_name'] = TRUE;
            
        $this->load->library('Upload', $config);
            
        if ( ! $this->upload->do_upload())
            {
                    $error=array('error' => $this->upload->display_errors());
                    $this->load->view('upload_photo', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    $this->load->view('upload_success', $data);
            }
    }
 }

?>