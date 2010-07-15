<?php

class Smileys extends Controller {

	function Smileys()
	{
		parent::Controller();
	}
	
	function index()
	{
		$this->load->helper('smiley');
		$this->load->library('table');
		
		$image_array = get_clickable_smileys('http://localhost/bsim/images/smileys/');

		$col_array = $this->table->make_columns($image_array, 8);		
			
		$data['smiley_table'] = $this->table->generate($col_array);
		
		$this->load->view('smiley_view', $data);
	}
	
}
?>