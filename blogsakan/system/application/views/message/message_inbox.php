<?php
$this->load->view('header');
?>
    <div id="left">
        <?php $this->load->view('login'); ?>
        <?php $this->load->view('userpanel');
        $this->db->where('user_reciever', $this->session->userdata('username'));
        $count=$this->db->count_all_results('tbl_message');
        $config['base_url'] = 'http://localhost/bsim/index.php/message/inbox/';
        $config['total_rows'] = $count;
        $config['per_page'] = '20';
        
        $this->pagination->initialize($config);
        
        
        ?>
            <h2>Inbox (<?php echo $count ?>)</h2>
            
            <?php echo $this->pagination->create_links(); ?>
            <table width=500 border=0 cellpadding=0 cellspacing=0>
                <tr>
                    <th width=150 valign=top>Senders</th>
                    <th width=350 valign=top>Message</th>
                    </tr>
                <?php
                
                $query=$this->Messagemodel->get_inbox();
                foreach($query as $row)
                {
                ?>
                <tr>
                    <td width=150 valign=top>
                    <?php
                    echo anchor('profile/user/'.$row->user_sender,img('images/user.png').$row->user_sender); ?>
                    
                    
                    <br>
                    <?php
                    echo $row->datemessage;
                    ?>
                    </td>
                    <td  width=350 valign=top>
                        <p>Subject:</p><?php echo $row->subject; ?>
                        <p>Body:</p>
                    <?php echo $row->message; ?>
                    <br><?php echo anchor('/message/delete/'. $row->id,img('images/delete.png').'Delete'); ?>
                    | <?php echo anchor('/message/reply/'. $row->user_sender,img('images/user_go.png').'Reply'); ?>
                    <input type="hidden" name="id" value="<?php echo $row->id ?>" />
                    </td>
                    </tr>
                <?php } ?>
                </table>
                    <?php echo $this->pagination->create_links(); ?>
    </div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');
?>