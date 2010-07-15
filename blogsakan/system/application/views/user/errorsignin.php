<?php
$this->load->view('header');
?>
<div id="left">
    <h2>Error in signing in...</h2>
    <p>Be sure that your account is already activated.  Check your email if you forgot your account
    information.</p>
    <p><?php echo $msg ?></p>
    </div>

<?php
$this->load->view('home/right_side');
$this->load->view('home/welcome_home');
$this->load->view('footer');
?>