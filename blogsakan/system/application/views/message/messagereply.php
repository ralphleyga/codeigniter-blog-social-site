<?php
$this->load->view('header');
?>
    <div id="left">
        <?php $this->load->view('login'); ?>
        <?php $this->load->view('userpanel'); ?>
        <?php
            $query=$this->Messagemodel->get_user();
            foreach($query as $row)
            {
        ?>
        <h2>Send Message to <?php echo $this->uri->segment(3); ?></h2>
        <?php echo form_open('message/user/'. $row->username);
        ?>
        <p>Subject:<br><input type="text" name="subject" size="55" value="<?php echo set_value('subject'); ?>" class="input" /></p>
        <span class="style1"><?php echo form_error('subject'); ?></span>
        Message:<br>
        <textarea rows="20" cols="52" name="message" class="textarea"><?php echo set_value('message'); ?></textarea>
        <span class="style1"><?php echo form_error('message'); ?></span>
        <br><input type="submit" value="submit" name="submit"  class="submit" />
        <?php } ?>
    </div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');
?>