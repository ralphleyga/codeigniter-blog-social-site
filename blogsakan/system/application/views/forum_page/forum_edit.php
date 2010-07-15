<?php
$this->load->view('header');
?>
<div id="left">
    <?php $this->load->view('login'); ?>
    <?php $this->load->view('userpanel');
                            if ($this->session->userdata('logged_in') != TRUE)
            { ?>
                <?php echo anchor('register','<h1>Register now!</h1><br>'); ?>
                <h1>Gawang Pinoy!</h1>
            <?php
            }
            ?>
<h2>Modify Forum</h2> 
<p>This page allows you to modify the forum/entries.</p><br>
<?php
        echo form_open('entries/modify/'.$this->uri->segment(3));
        $query=$this->Forummodel->topic_page();
        foreach($query as $row)
        {
    ?>

    <table width="500" border="0" cellpadding=0 cellspacing=0>
    <tr>
      <th width="100" valign="top">Topic</th>
      <td width="400" valign="top">
        <input type="text" class="input" name="topic" value="<?php echo $row->topic; ?>" size="65"/>
        <span class="style1"><?php echo form_error('topic'); ?></span>
      </td>
    </tr>
    <tr>
      <th width="100" valign="top">Body</th>
      <td width="400" valign="top">
        <textarea name="body" class="textarea" cols="62" rows="10"><?php echo $row->body; ?></textarea>
        <span class="style1"><?php echo form_error('body'); ?></span>
      </td>
    </tr>
    </table>
    <?php } ?>
    <div align="center">
<input type="submit" class="submit" value="Save"/>
</div>
</div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');
?>
