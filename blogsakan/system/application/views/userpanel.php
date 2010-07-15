 <?php
            if ($this->session->userdata('logged_in') != TRUE)
            {
                
            }
            else
            {
                ?>
                <h2><?php echo $this->session->userdata('username'); ?>'s BLOGSAKAN! Account</h2>
                Welcome to your <strong>BLOGSAKAN! Account</strong>, here in this website
                you can post a forum,  Post your products, Send message to members and
                gain cash without any advertising fee.  Enjoy using it.  Feel free.
                <br>
                                <h2>User Panel</h2>
                    <?php echo anchor('comments',img('images/comments.png').'Comments'); ?>
                    <?php echo anchor('entries/entry_manager',img('images/page_white_copy.png').'Entry Manager'); ?>
                     <?php echo anchor('message/inbox',img('images/folder.png').'Inbox'); ?>
                     <?php echo anchor('upload',img('images/folder_picture.png').'Upload Photo'); ?>
                     <?php echo anchor('contacts',img('images/group.png').'Contacts'); ?>
                     <?php echo anchor('contacts',img('images/group.png').' Files '); ?>
                     <?php echo anchor('account/signoff',img('images/user_delete.png').'Sign Out'); ?>
                    <br>
            <?php
    } ?>
