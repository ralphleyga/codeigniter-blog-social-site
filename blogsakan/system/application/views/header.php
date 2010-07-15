<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php echo link_tag('style.css'); ?>
<title>Welcome to Blogkoto!</title>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv='expires' content='-1' />
<meta http-equiv= 'pragma' content='no-cache' />
<!-- this script got from www.javascriptfreecode.com-Coded by: Krishna Eydatoula -->

<!-- Start of Typing Text Script -->
<!-- This types one letter at a time in the Status bar -->
<!-- Instructions: Just put this script anywhere on your webpage
	and you will have the typewriter effect on your messages
	displayed in the status bar.  
	
	To change the speed of your banner increase or decrease the
	value for 'var speed'.
	(Note: decreasing this value increases the speed of your banner.)
	
	To change the pause between each message change the value
	for 'var pause'.  
	(Note:  increase value to increase pause.)
-->
<!-- Script supplied with CoffeeCup HTML Editor -->
<!--             www.coffeecup.com              -->	
<SCRIPT LANGUAGE="JavaScript">

var speed = 100 
var pause = 1000 
var timerID = null
var texttype = false
var ar = new Array()

ar[0] = "This is the Typing Text Javascript"
ar[1] = "CoffeeCup Software is cool!"
ar[2] = "El HTML Editor++ es muy bueno!"

var msgnow = 0
var offset = 0

function stopBanner() {
        if (texttype)
                clearTimeout(timerID)
        texttype = false
}

function startBanner() {
        stopBanner()
        showBanner()
}

function showBanner() {
        var text = ar[msgnow]

        if (offset < text.length) {
                if (text.charAt(offset) == " ")
                        offset++                        

                var partialMessage = text.substring(0, offset + 1) 
                window.status = partialMessage
                offset++ 
                timerID = setTimeout("showBanner()", speed)
                texttype = true
        } else {
                offset = 0
                msgnow++
                if (msgnow == ar.length)
                        msgnow = 0

                timerID = setTimeout("showBanner()", pause)
                texttype = true
        }
}

</SCRIPT>
</head><BODY onLoad="startBanner()">
<body>
    
<div id="wrap">
<div id="header">
<div class="headings">
<h1><a href="http://blogkoto.phpnet.us">BLOGSAKAN! - beta</a></h1>
<h2>Overloading The Blog For Free!</h2>
</div>
<div class="nav">
<ul>
<li><?php echo anchor('','Home'); ?></li> 
<li><?php echo anchor('members','Members'); ?></li> 
<li><?php echo anchor('entries','Entries'); ?></li>
<li><?php

            if ($this->session->userdata('logged_in') != TRUE)
            {
                $menu="Register";
                echo anchor('register',$menu);
            }
            else
            {
                $menu="User Account";
                echo anchor('profile/user/'.$this->session->userdata('username'),$menu);
            }
            
?></li>

<li><?php echo anchor('http://www.rleyga.phpnet.us','About'); ?></li> 
</ul>
</div>
</div>