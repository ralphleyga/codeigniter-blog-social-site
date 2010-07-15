<?php
    $this->load->view('header');
    ?>
    
    <div id="left">
        <?php
        $this->load->helper('smiley');
        $this->load->view('userpanel');
        ?>
        <h2>Welcome to Entries</h2>
        <br>
            <p>If you want to add a topic, register for free!
            Post your questions and suggestions in every topic.
            Be polite with the posting of topics for forum.
            Thank you! More power to all.
            </p>
            <code>Note:  If you are interested in any topic, kindly put respect in the comment.
            The author of this topic can easily delete your comments.  Thank you!  Feel free. :-)
            </code>
            <h2>Entries (<?php
    echo $this->db->count_all_results('tbl_forum_topic');
    ?>)</h2>
            <br>
    
        
        <?php
            $config['base_url'] = 'http://localhost/bsim/index.php/entries/page/';
                $config['total_rows'] = $this->db->count_all_results('tbl_forum_topic');
                $config['per_page'] = '10';
                
                $this->pagination->initialize($config);
                 echo $this->pagination->create_links();
                 ?><br><br>
        <table width=500 border=0 cellpadding=0 cellspacing=0>
        <tr>
            <th width="500" valign="top">Entries
                    </th>
            </tr>
            <?php
        $query=$this->Forummodel->get_topic();
        foreach($query as $row)
        {
        ?><tr>          
            <td width="500" valign="top">
            <h2><?php echo anchor('entries/topic/'. $row->id , $row->topic); ?></h2>
            <?php
            $this->db->where('topic_id',$row->id);
            $count=$this->db->count_all_results('tbl_forum_comment')
            
            ?>
            <p><?php echo img('images/user_red.png').'Author:'.anchor('profile/user/'.$row->username,$row->username).' '.img('images/calendar.png').'Date Created:'. $row->datepost.' '.img('images/comments.png').'Comment('. $count.')'; ?></p><br>
        <p><?php echo character_limiter($row->body,200); ?></p>
        <?php echo anchor('entries/topic/'. $row->id , img('images/zoom.png').'Read More!'); ?>
        <br>
            </td>
            
            </tr><?php } ?>
    </table>
    <?php
    echo $this->pagination->create_links();
    ?>
        </div>
    <?php
    $this->load->view('home/right_side');
    $this->load->view('footer');
?>