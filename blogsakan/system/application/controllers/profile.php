<?php
    class Profile extends Controller {
	function Profile()
	{
	    parent::Controller();
	    $this->load->model('Rightside');
            $this->load->library('session');
	    $this->load->model('Accountmodel');
	    $this->load->model('Profilemodel');
	    $this->load->model('Forummodel');
	}
	function index()
	{
	    redirect('profile/user');
	}
	function user()
	{
	    $this->load->view('profile/user');
	}
    }
?>