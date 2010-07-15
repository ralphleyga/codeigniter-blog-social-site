

    <h2>User Log In</h2>
    <ul>
    <?php
        echo form_open('account/');
    ?>
    <p>Username:
    <input type="text" class="input" name="username" value="<?php echo set_value('username'); ?>"/></p>
    <p>Password:
    <input type="password" class="input" name="password" value=""/></p>
    <p><input type="submit" class="submit" value="Sign In"/></p>
    <br>
    <?php echo anchor('register/','Click here to Register'); ?>
<br>
    <?php echo anchor('account/forgotpassword/','Click here Forgot Password'); ?>
    </form>
    </ul>