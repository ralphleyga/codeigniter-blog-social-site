<?php
$this->load->view('header');
?>
<div id="left">
    <?php $this->load->view('userpanel');
    ?>
    <h2>BLOGSAKAN! Members (<?php
    echo $this->db->count_all_results('tbl_user');
    ?>)</h2>
    <p>If you want to send a message to a user, you must
    register to send any message.</p>

    <?php
        $config['base_url'] = 'http://localhost/bsim/index.php/members/get';
        $config['total_rows'] = $this->db->count_all_results('tbl_user');
        $config['per_page'] = '20';
        
        $this->pagination->initialize($config);
        
        echo $this->pagination->create_links();

    ?>
        <br>

    <?php foreach ($query->result() as $row)
   { ?>
   <div class="members">
        <li>
    <?php
    $image_properties = array(
          'src' => './uploads/'.$row->picture,
          'border' => '0',
          'width' => '100',
          'height' => '133',
          'rel' => 'lightbox',
);

$imgpath=img($image_properties);
echo anchor('profile/user/'.$row->username,$imgpath);
?>
    <strong>
    <?php echo anchor('profile/user/'.$row->username ,$row->username); ?></strong>
<?php
        
        
    if ($this->session->userdata('logged_in') != TRUE)
    {
        
    }
    else
    {
        echo anchor('message/user/'. $row->username,'Send Message');
    }

    ?>
      
    </li>
    </div>

   <?php } ?>

<br>

        
  </div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');

?>