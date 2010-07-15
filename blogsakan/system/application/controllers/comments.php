<?php
    class Comments extends Controller {
        function Comments()
        {
            parent::Controller();
            $this->load->model('Rightside');
            $this->load->model('Commentsmodel');
            $this->load->model('Accountmodel');
            $this->load->library('pagination');
        }
        function index()
        {
            $this->load->view('comment_manager');
        }
        function get()
        {
            $this->load->view('comment_manager');
        }
        function approve()
        {
            $this->Commentsmodel->approve_comment();
            redirect('comments');
        }
        function unapprove()
        {
            $this->Commentsmodel->unapprove_comment();
            redirect('comments');
        }
    }
?>