<?php
$this->load->view('header');
?>
    <div id="left">
        <?php
            $query=$this->Messagemodel->get_user();
            $query as $row;
        ?>
        <h2>Send Message to <?php echo $row->username; ?></h2>
    </div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');
?>