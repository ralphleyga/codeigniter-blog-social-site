<?php
$this->load->view('header');
?>
    <div id="left">
        <?php $this->load->view('login'); ?>
        <?php $this->load->view('userpanel'); ?>
            <h2>Message sent to <?php echo $this->uri->segment(3); ?></h2>
            <p>You have successfully send your message...</p>
    </div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');
?>