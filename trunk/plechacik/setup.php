<?php
//------------------ DB settings -----------------------
if ($_SERVER["SERVER_NAME"] == "www.plechotice.sk"){
	$db_name="plech";
	$db_user="plech";
	$db_host="localhost";
	$db_passwd="jsj33ss";
	$page = "http://www.plechotice.sk";
}else{
	$db_user="root";
	$db_passwd="";
	$db_host="localhost";
	$db_name = "plechacik";
	$page = "http://localhost/home";
}
//------------------------------------------------------
?>