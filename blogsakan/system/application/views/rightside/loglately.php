    <h2>Log In Lately</h2>
    <div class="newmembers">
    <ul>
        
        <?php

    $this->load->model('Rightside');
    $query=$this->Rightside->loglately();
   foreach ($query as $row)
   {
    ?><li><?php
        echo anchor('profile/user/'.$row->username, $row->username.' ('.$row->datelog.')');
        ?></li><?php
    }

    ?>
    
   </ul></div>