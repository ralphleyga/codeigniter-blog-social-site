<div id="right">
   <div class="latestarticles">
    <?php $this->load->view('members_page/search'); ?>
            <?php
                if ($this->session->userdata('logged_in') != TRUE)
            {
                $this->load->view('signin');
            }
            else
            {
                $this->load->view('user/user_signin');
                //$this->load->view('rightside/user_command');
            }
                //$this->load->view('rightside/calendar');
                $this->load->view('rightside/new_member');
            ?>
            
</div>

    </div>