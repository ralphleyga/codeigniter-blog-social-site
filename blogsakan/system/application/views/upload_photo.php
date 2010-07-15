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
    <?php    
    echo $error;
    echo form_open_multipart('upload/do_upload');
    ?>
    <input type="file" class="submit" name="userfile" size="20">
    <br /><br />
    <input type="submit" class="submit" value="upload">
    </form>

</div>
<?php
$this->load->view('home/right_side');
$this->load->view('footer');
?>
