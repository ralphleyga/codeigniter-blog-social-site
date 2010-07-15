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
?>

<div id="left">
<h2>Registration Form</h2>
<p>Note: Enter the correct information. Thank you!</p>
<br><br>
    <?php
        echo form_open('register');
    ?>
<table width="500" border="0" cellpadding=0 cellspacing=0>
  <tr>
    <th width="150" id="td">Fields</th>
    <th width="350" id="td">Your Information</th>
  </tr>
  <tr>
    <td width="150" valign="top">Username</td>
    <td width="350"><input type="text" class="input" name="username" value="<?php echo set_value('username'); ?>" size="55" maxlength=15""/>
    <span class="style1"><?php echo form_error('username'); ?></span>
</td>
  </tr>
    <tr>
    <td width="150" valign="top">Password</td>
    <td width="350"><input type="password" class="input" name="password" value="<?php echo set_value('password'); ?>" size="55"/>
        <span class="style1"><?php echo form_error('password'); ?></span></td>
  </tr>
    <tr>
    <td width="150" valign="top">Password Config</td>
    <td width="350"><input type="password" class="input" name="passconf" value="<?php echo set_value('passconf'); ?>" size="55"/>
        <span class="style1"><?php echo form_error('passconf'); ?></span></td>
  </tr>
    <tr>
    <td width="150" valign="top">Email:</td>
    <td width="350"><input type="text" class="input" name="email" value="<?php echo set_value('email'); ?>" size="55"/>
        <span class="style1"><?php echo form_error('email'); ?></span></td>
  </tr>
</table>

<br>
    <p>Enter the text below:</p>
    <?php
    	echo 'Submit the word you see below:<br>';
	echo $cap['image'];
	echo '<br><br><input type="text" name="captcha" value="" class="input" />';        
        ?>
        <input type="hidden" class="input" name="conf_captcha" value="<?php echo $cap['word']; ?>" size="55"/>
        <span class="style1"><?php echo form_error('captcha'); ?></span>
    <br>
    <input type="submit" class="submit" value="Register"/>
</form>
<br />
<br /><br />
</div>