<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
		$this->load->model('Accountmodel');
		$this->load->model('Forummodel');
	}
	
	function index()
	{
		$this->load->view('welcome_home');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */