<?php
if ($this->session->userdata('logged_in') != TRUE)
            {
                redirect('');
            }
?>