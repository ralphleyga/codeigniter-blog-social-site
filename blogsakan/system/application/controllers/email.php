<?php
    class Email extends Controller {
        function Email()
        {
            parent::Controller();
        }
        function index()
        {
            $this->load->library('email');
            $this->email->from('you@yourdomain', 'Your Name');
            $this->email->to('someone@example.com');            
            $this->email->subject('Email Test');
            $this->email->message('Testing the email class.');
            if ( ! $this->email->send())
            {
                echo 'failed';
            }
        }
    }

?>