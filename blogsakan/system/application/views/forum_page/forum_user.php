<?php
    $this->load->view('header');
    ?>
    <div id="left">
        <?php $this->load->view('login'); ?>
        <?php $this->load->view('userpanel');
        $this->db->where('username', $this->session->userdata('username'));
        $count=$this->db->count_all_results('tbl_forum_topic');
        ?>
        <code>Warning:Avoid any malicious topics.Thank you!</code>
    <h2>Entries (<?php echo $count ?>)</h2>
    <?php echo anchor('entries/add_topic',img('images/comment_add.png').' CLICK HERE to ADD NEW TOPIC<br>'); ?>
    <br>
    <table width="500" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <th width="400" valign="top">Topics.</th>
      <th width="50" valign="top"></th>
      <th width="50" valign="top"></th>
    </tr>
    <?php
    $query=$this->Forummodel->get_forum();
    foreach($query as $row)
    { ?>
    <tr>
            <?php
            $this->db->where('topic_id',$row->id);
            $count=$this->db->count_all_results('tbl_forum_comment')
            
            ?>
      <td width="300" valign="top"><p><?php echo anchor('entries/topic/'.$row->id,img('images/folder_star.png').' '.$row->topic.' '.img('images/comments.png').'Comments('.$count.')'); ?></p>
      
      </td>
      <td width="80" valign="top">
        
      <?php echo anchor('entries/modify/'.$row->id, img('images/comment_edit.png').' Modify'); ?></td>
      <td width="80" valign="top">
      <?php echo anchor('entries/delete_topic/'.$row->id, img('images/comment_delete.png').' Delete'); ?>
        </td>

    </tr>
    <?php } ?>
    </table>
        <br>    
        </div>
    <?php
    $this->load->view('home/right_side');
    $this->load->view('footer');

?>