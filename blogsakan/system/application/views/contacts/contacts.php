<?php
$this->load->view('header'); ?>
<div id="left">
<?php $this->load->view('userpanel');?>
<?php
$this->db->where('username', $this->session->userdata('username'));
        $count=$this->db->count_all_results('tbl_contact'); ?>
<h2>Contacts(<?php echo $count; ?>)</h2>
            <table width=500 border=0 cellpadding=0 cellspacing=0>
                <?php
                
                $query=$this->Contactsmodel->view_contacts();
                foreach($query as $row)
                {
                ?>
                <tr>
                    <td width=150 valign=top>
                    <?php echo anchor('profile/user/'.$row->contact,img('images/user.png').$row->contact); ?>
                    </td>
                    <td  width=350 valign=top><?php echo anchor('/contacts/delete/'. $row->id,img('images/delete.png').'Delete'); ?>
                    </td>
                    </tr>
                <?php } ?>
                </table>
</div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');
?>