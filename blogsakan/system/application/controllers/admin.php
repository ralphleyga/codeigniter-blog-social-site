<?php
    class Admin extends Controller {
        function Admin()
        {
            parent::Controller();
        }
        function index()
        {
            $this->load->view('administrator/login');
        }
    }
?>