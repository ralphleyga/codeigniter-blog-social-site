<?php
    class Notsignin extends Controller {
        function Notsignin()
        {
            parent::Controller();
            $this->load->model('Rightside');
            $this->load->model('Accountmodel');
        }
        function index()
        {
            $this->load->view('user/errorsignin');
        }
    }

?>