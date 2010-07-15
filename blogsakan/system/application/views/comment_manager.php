<?php
$this->load->view('header');
?>
<div id="left">
<?php $this->load->view('login'); ?>
            <?php $this->load->view('userpanel'); ?>
    <p>This page allow you to approve comments from the other user or surfer
    in the world.  In this page, your authorized to delete a message.</p>
      <?php
          $this->db->where('username', $this->session->userdata('username'));
          $count=$this->db->count_all_results('tbl_forum_comment');
        $config['base_url'] = 'http://localhost/bsim/index.php/comments/get';
        $config['total_rows'] = $count;
        $config['per_page'] = '10';
        
        $this->pagination->initialize($config);
        
        echo $this->pagination->create_links();

    ?><h2>Comments (<?php echo $count ?>)</h2><br>
    <table width="500" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th width="500" valign="top">List of Comments</th>
  </tr>
  <?php

    $query=$this->Commentsmodel->get_comment();
   foreach($query as $row_comment)
        {
  ?>
  <tr>
    <td>
        <?php
        $this->db->select('id,topic,body,datepost,username');
            $this->db->from('tbl_forum_topic');
            $this->db->where('id',$row_comment->topic_id);
            $this->db->order_by("datepost", "desc");
            $this->db->order_by("topic", "asc"); 
           $query_topic=$this->db->get();
            
            
        foreach($query_topic->result() as $row_topic)
        {
    ?>
    
    <h2><?php echo anchor('entries/topic/'.$row_topic->id,$row_topic->topic); ?></h2>
      <?php } ?>
        <p>Author:<strong><?php echo $row_comment->author; ?></strong></p>
        <p>Date of Comment:<strong><?php echo $row_comment->datecomment; ?></strong></p>
        <p>Status:<strong><?php
        $stat=$row_comment->active;
        if ($stat=='1')
        {
            echo 'Approved';
        }
        else
        {
            echo 'Unapproved';
        }
        ?></strong></p>
        <p>Comment:</p>
        <?php echo $row_comment->comment; ?>
            <br><br>
        <?php echo anchor('comments/approve/'. $row_comment->id,img ('images/lock_open.png').'Approve'); ?>|
        <?php echo anchor('comments/unapprove/'. $row_comment->id,img ('images/lock.png').'Unpprove'); ?>|
        <?php echo anchor('entries/delete_comment/'. $row_comment->id,img ('images/delete.png').'Delete'); ?>
    </td>
    </tr>
<?php } ?>
    </table>
        <br>
      <?php
          $this->db->where('username', $this->session->userdata('username'));
          $count=$this->db->count_all_results('tbl_forum_comment');
        $config['base_url'] = 'http://localhost/bsim/index.php/comments/get';
        $config['total_rows'] = $count;
        $config['per_page'] = '10';
        
        $this->pagination->initialize($config);
        
        echo $this->pagination->create_links();

    ?><br>
    </div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');
?>