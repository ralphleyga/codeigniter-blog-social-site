    <h2>New Registered Members</h2>
    <div class="newmembers">
    <ul>
    <?php

    $this->load->model('Rightside');
    $query=$this->Rightside->get_new_members();
   foreach ($query as $row)
   {
    ?><li><?php
        echo anchor('profile/user/'.$row->username, $row->username.' ('.$row->dateregister.')');
        ?></li><?php
    }

    ?>
    </ul>
    </div>
    <?php $this->load->view('rightside/loglately'); ?>
    <h2>Links</h2>
    <div class="link">
    <ul>
    <li><?php echo anchor('http://www.ndmc.edu.ph','Notre Dame of Midsayap College, First Notre Dame in Asia'); ?>
        </li>
    <li><?php echo anchor('http://www.rleyga.tk','Ralph Leyga IT World'); ?>
        </li>
    <li><?php echo anchor('http://www.pscode.com','Planet SourceCode'); ?>
        </li>
    <li><?php echo anchor('http://www.psits.tk','Philippine Society of Information Technolohgy Students (PSITS)'); ?>
        </li>
    </ul></div>