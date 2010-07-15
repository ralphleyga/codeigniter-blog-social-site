<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php echo link_tag('style.css'); ?>
<title>Welcome to Blogkoto!-Administrator</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv='expires' content='-1' />
<meta http-equiv= 'pragma' content='no-cache' />

</head>
<body>
<div id="wrap">
<div id="header">
<div class="headings">
<h1><a href="http://blogkoto.phpnet.us">BLOGSAKAN! - Admin</a></h1>
<h2>Administrator Panel!</h2>
</div>
<div class="nav">
    
<ul>
<li><?php echo anchor('admin','Home'); ?></li> 
<li><?php echo anchor('','Members'); ?></li>
<li><?php echo anchor('','Entries'); ?></li>
<li><?php echo anchor('','Messages'); ?></li>
<li><?php echo anchor('','Inactive'); ?></li>
<li><?php echo anchor('','Comments'); ?></li>
</ul>
</div>
</div>