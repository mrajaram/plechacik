<?php
function authUser($login, $session_password) {
  require_once("./setup.php");
	$session_password = MD5($session_password);
  if(!(@$link=mysql_pconnect($db_host,$db_user,$db_passwd))) {
    echo "Server problems, try to log in later."; exit;
	}
	
  if(!@mysql_select_db($db_name,$link)){
    echo "Server problems, try to log in later."; exit;
  }
  //@$session_password = mcrypt_cbc(MCRYPT_TripleDES, "lietadlo", serialize($session_password), MCRYPT_ENCRYPT);
  //$session_password = bin2hex($session_password);
  if(!(@$result=mysql_query("select * from users where login='$login' and password='$session_password'", $link))) {
    echo "Server problems, try to log in later."; exit;
  }
  else {
    @$row=mysql_fetch_object($result);
		mysql_free_result($result);
	if($row->login == $login) {
	  return array($row->privilege, $row->email);
	}
	else {
	  return false;
	}
  }
}
?>