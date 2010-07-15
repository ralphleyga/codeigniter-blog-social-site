<?php
$this->load->view('header');
?>
<div id="left">
    <?php $this->load->view('userpanel');
                            if ($this->session->userdata('logged_in') != TRUE)
            { ?>
                <?php echo anchor('register','<h1>Register now!</h1><br>'); ?>
                <h1>Gawang Pinoy!</h1>
            <?php
            }
            ?>
   <br>
<h2>You have successfully save your primary photo.</h2>

<?php 
	$this->load->helper('file');
	foreach($upload_data as $item=> $value)
    {
        echo $item; ?>:<?php echo $value;
		?><br><?php
    }

        $query_photo=$this->Accountmodel->get_profile();
        foreach($query_photo as $row_photo)
        {
        $image_properties = array(
          'src' => './uploads/'.$row_photo->picture,
          'class' => 'post_images',
          'width' => '200',
          'height' => '267',
          'title' => 'Primary Photo',
          'rel' => 'lightbox',
            );
        if ($row_photo->picture!="user.jpg")
        {
            unlink($image_properties['src']);
        }
        }
        
        ?>
        
    <?php
    echo $upload_data['file_name'];
    
        $data = array(
                        'picture' => $upload_data['file_name']
                        );
            $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('tbl_user', $data);
    //echo anchor('upload', 'Upload again');
	//delete_files('./uploads/');
    ?>
</div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');
?>