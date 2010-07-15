<?php
    $this->load->view('header');
    
    
    ?>
    <script type="text/javascript">
function validate_required()
{
var r=confirm("Are you sure you want to post you comment?");
if (r==true)
  {
  return true;
  }
else
  {
  return false;
  }
}
</script>
    <div id="left">
        
        <?php $this->load->view('userpanel');
            ?>
        <?php
        $query=$this->Forummodel->topic_page();
        foreach($query as $row)
        {

            $username=$row->username;
            ?>
        <h2><?php echo $row->topic; ?></h2>
        <p><?php echo img('images/user_red.png').'Author:'. anchor('profile/user/'.$row->username,$row->username).' '.img('images/calendar.png').'Date Created:'. $row->datepost.' '.img('images/comments.png').'Comment'; ?></p><br>
        <p><?php echo $row->body; ?></p>
        
        <br>
            <code>Note:  If you are interested in this topic, kindly put respect in the comment.
            The author of this topic can easily delete your comments.  Thank you!  Feel free.
            </code>
            <br>
                
    <h2>Comments:</h2>
<table width="500" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <th>Author</th>
        <th>Comment</th>
        </tr>
        <?php
        $query_comment=$this->Forummodel->get_comment();
        foreach($query_comment as $row_comment)
        {
    ?>
    <tr>
        <td width="100" valign="top">

    
    <p>Author: <?php echo $row_comment->author; ?></p>
    <p>Posted:<?php echo character_limiter($row_comment->datecomment, 1); ?></p>
    </td>
<td width="400" valign="top">
        
    <p><?php echo $row_comment->comment; ?></p>
    <br>




        </td>
            
        </tr><?php } ?>
    </table>
<br/>
<h2>Send Comment:</h2>
    <?php
        echo form_open('entries/topic/'. $this->uri->segment(3));
        
        echo form_hidden('topic_id', $this->uri->segment(3));
    ?>

    <table width="500" border="0">
    <tr>
      <th width="100" valign="top">Name</th>
      <td width="400" valign="top">
        <input type="hidden" class="input" name="username" value="<?php echo $username; ?>" size="65"/>
        <input type="text" class="input" name="author" value="<?php echo set_value('author'); ?>" size="65"/>
        <span class="style1"><?php echo form_error('author'); ?></span>
      </td>
    </tr>
    <tr>
      <th width="100" valign="top">Comment</th>
      <td width="400" valign="top">
        <textarea name="comment" class="textarea" cols="62" rows="10"><?php echo set_value('comment'); ?></textarea>
    <span class="style1"><?php echo form_error('comment'); ?></span>
      </td>
    </tr>
    <tr>
        <th width="100" valign="top">Validation</th>
        <td>
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
        <input type="hidden" name="conf_captcha" value="<?php echo $cap['word']; ?>" class="input" />
        <span class="style1"><?php echo form_error('captcha'); ?></span>
        </td>
        </tr>
    </table>
<input type="submit" onclick="return validate_required()" class="submit" value="Submit"/>
</form>
<?php } ?>
        </div>
    <?php
    $this->load->view('home/right_side');
    $this->load->view('footer');
?>