        <h2>Welcome

<?php echo $this->session->userdata('username'); ?></h2>    
        <ul>
        <p><?php
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
        echo img($image_properties);
        }
        ?>
        
        </p>
        
       <p><strong>Primary Photo</strong></p>
       </form>
        </ul>