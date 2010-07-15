<h2>Latest Entries</h2>
<h5>Newest Entries by Blogsakers:</h5>
<table width=500 border=0 cellpadding=0 cellspacing=0>
            <?php
        $query=$this->Forummodel->latest_topic();
        foreach($query as $row)
        {
        ?><tr>          
            <td width="500" valign="top">
            <h2><?php echo anchor('entries/topic/'. $row->id , $row->topic); ?></h2>
            <?php
            $this->db->where('topic_id',$row->id);
            $count=$this->db->count_all_results('tbl_forum_comment')
            
            ?>
            <p><?php echo img('images/user_red.png').'Author:'.anchor('profile/user/'.$row->username,$row->username).' '.img('images/calendar.png').'Date Created:'. $row->datepost.' '.img('images/comments.png').'Comment('.$count.')'; ?></p><br>
        <p><?php echo character_limiter($row->body,200); ?></p>
        <?php echo anchor('entries/topic/'. $row->id , img('images/zoom.png').'Read More!'); ?>
        <br>
            </td>
            </tr><?php } ?>
    </table>
<br />