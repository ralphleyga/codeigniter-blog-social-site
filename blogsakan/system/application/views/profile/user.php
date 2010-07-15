<?php
$this->load->view('header');
?>
<div id="left">
        <?php $this->load->view('userpanel');
    ?>
<h2><?php echo $this->uri->segment(3); ?> Profile</h2>
<?php
        $query_photo=$this->Profilemodel->view_user();
        foreach($query_photo as $row_photo)
        {
        $image_properties = array(
          'src' => './uploads/'.$row_photo->picture,
          'class' => 'post_images',
          'width' => '200',
          'height' => '267',
          'title' => 'Primary Photo',
          'rel' => 'lightbox'
);
        
        ?>
<table width="500" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td width="200" valign="top">
            <?php echo img($image_properties); ?>
            
        </td>
        <td width="300" valign="top" align="left">
        <p>Name: <?php echo $row_photo->username; ?></p>
        <p>E-mail: <?php echo $row_photo->email; ?></p>
        <p>Member since: <?php echo $row_photo->dateregister; ?></p>
        <?php
        
        
    if ($this->session->userdata('logged_in') != TRUE)
    {
        ?><code>Note:<br>Register to send message to him/her.</code><?php
    }
    else
    {
        if ($this->session->userdata('username')!=$this->uri->segment(3))
        {
        echo anchor('message/user/'.$this->uri->segment(3),img('images/email.png').' Send Message<br>');
        echo anchor('contacts/add/'.$this->uri->segment(3),img('images/user_add.png').' Add to Contact');
        }
    }

    ?>
    <br><br>
        </td>
    </tr>
</table>
<?php
    $this->db->where('username',$row_photo->username);
    $count_entries=$this->db->count_all_results('tbl_forum_topic');
    ?>
<h2>All Entries(<?php echo $count_entries ?>) of <?php echo $this->uri->segment(3) ?>:</h2>
<table width="500" border="0" cellpadding="0" cellspacing="0">
            <?php
        $query_photo=$this->Profilemodel->user_entries();
        foreach($query_photo as $row_entries)
        { ?>
    <tr>
        <td width="500" valign="top" align="left">

<?php
            $this->db->where('topic_id',$row_entries->id);
            $count=$this->db->count_all_results('tbl_forum_comment');
            echo anchor('entries/topic/'.$row_entries->id,img('images/page_white_copy.png').$row_entries->topic.' '.img('images/comments.png').'Comment('.$count.')<br>');
?>
                </td>
    </tr>
    <?php } ?>
</table>
<?php }
        ?>
<?php $this->load->view('home/top_post'); ?>
</div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');
?>
