<?php
$this->load->view('header');
?>
<div id="left">
    <h2>Error found...</h2>
        <p>Author is required...</p>
        <p>Comment is required...</p>
        <p>Validation Code is required...</p>
        <p>Validation must be correct...</p>
        <strong>
        <?php echo anchor('forum/topic/'. $topic_id,'Back'); ?>
        </strong>
    </div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');
?>