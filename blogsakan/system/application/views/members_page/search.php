    <h2>Search</h2>
    <ul>
        
    <?php
        echo form_open('members/search/');
    ?>
    <p>Search Members: <input type="text" class="input" name="search" value="<?php echo set_value('search'); ?>" size="15" maxlength=15""/></p>
    <span class="style1"><?php echo form_error('search'); ?></span>
    <input type="submit" class="submit" value="Search"/>
    </form>
    </ul>