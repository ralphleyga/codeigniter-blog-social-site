<?php
    class Welcome_control extends Controller
    {
        function Welcome_control()
        {
            parent::Controller();
            $this->load->model('Rightside');
            $this->load->model('Accountmodel');
            $this->load->model('Forummodel');
        }
        function index()
        {
            $this->load->view('welcome_to_bsim');
        }
    }

?>