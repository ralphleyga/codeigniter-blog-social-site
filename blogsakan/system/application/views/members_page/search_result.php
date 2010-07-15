<?php
$this->load->view('header');
?>
<div id="left">
    <?php $this->load->view('userpanel');
    ?>
    <h2>Search Result for Members</h2>
            <table width=500 border=0 cellpadding=0 cellspacing=0>
                <?php
            foreach ($query->result() as $row)
                {
                ?>
                <tr>
                    <td width=150 valign=top>
                    <?php echo anchor('profile/user/'.$row->username,img('images/user.png').$row->username); ?>
                    </td>
                    </tr>
                <?php } ?>
                </table>
<br>
<?php
$this->load->view('home/top_post'); ?>
        
  </div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');

?>