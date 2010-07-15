<?php
$this->load->plugin('captcha');
$this->load->helper('file');
delete_files('./captcha/');
	$vals = array(
			'img_path'	 => './captcha/',
			'img_url'	 => 'http://localhost/bsim/captcha/',
                        'img_width'	 => '150',
			'img_height' => 30,
			'expiration' => 7200
			);
	
	$cap = create_captcha($vals);
		
	echo 'Submit the word you see below:<br>';
	echo $cap['image'];
	echo '<br><br><input type="text" name="captcha" value="" class="input" />';
        ?>