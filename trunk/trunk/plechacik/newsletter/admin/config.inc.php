<?php

#######################
/*********************
*database connection *
**********************/
#######################

$host= "localhost";

$username= "plech";
$password= "jsj33ss";

$dbname = "plech";
$dbTable = "newsletter";

mysql_connect($host,$username,$password) OR die("Can't connect to database");
mysql_select_db("$dbname") or die("Unable to select database");

#######################
/**********************
*mailer configuration *
**********************/
#######################
$mailer = "smtp";						// choose 'internal' for php-owned mailer -> chosse 'smtp' for direct connection to a smtp-server
$smtpHost = "localhost";					// host to connect over smtp

/*
$mailer = "internal";						// or use this to send the mails with the php mail() function
*/

####################
/*******************
*page informations *
********************/
####################

$pagetitle = "your page title";						//choose a title

$admin_mail = "$SERVER_ADMIN";  					//this is the default admin email adress on yout server. you can change this to your email
$password = "xzy33";							//this password is required to send the newsletter

$sender = "you@yourdomain.com";						//define the sender
$replayer = "you@yourdomain.com";					//define the replayer

$unsubscribe = "unsubscribe: url to unsubscribe on your site";		//tell them how to unsubscribe

$path_to_reloader_admin = "/server/path/to/reloader/admin/";		//you need this to import email textfiles

###############
/*************
*site design *
**************/
###############

$bgcolor = "6699CC";		
$text = "000000";
$link = "000000";
$vlink = "000000";
$alink = "000000";
$leftmargin = "20";
$topmargin = "10";
$marginwidth = "0";
$marginheight = "0";
$content_table = "99ccff";

###########
/*********
*credits *
**********/
###########
$credits = "<!-- programming and concepting by WWW.WEBLOTION.COM // contact@weblotion.com -->\n\n\n"; 
//pls. do not change this!!!
echo $credits;

?>
