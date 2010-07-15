<?php
    $this->load->view('header');
    ?>
    <div id="left">
        <?php $this->load->view('login'); ?>
        <?php $this->load->view('userpanel'); ?>
        <h2>Add New Topic to Forum</h2>
        
    <?php
        echo form_open('entries/save_topic');
    ?>

    <table width="500" border="0" cellpadding=0 cellspacing=0>
    <tr>
      <th width="100" valign="top">Topic</th>
      <td width="400" valign="top">
        <input type="text" class="input" name="topic" value="<?php echo set_value('topic'); ?>" size="65"/>
        <span class="style1"><?php echo form_error('topic'); ?></span>
      </td>
    </tr>
    <tr>
      <th width="100" valign="top">Body</th>
      <td width="400" valign="top">
        <textarea name="body" class="textarea" cols="62" rows="10"><?php echo set_value('body'); ?></textarea>
        <span class="style1"><?php echo form_error('body'); ?></span>
      </td>
    </tr>
    </table>
    <br>
<div align="center">
<input type="submit" class="submit" value="Save"/> | 
<strong> 
<?php echo anchor('entries/entry_manager','Click here to Cancel'); ?>
</strong>
</div>
</form>
        </div>
    <?php
    $this->load->view('home/right_side');
    $this->load->view('footer');

?>