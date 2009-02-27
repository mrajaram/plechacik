<?
session_start();
require_once("./auth.php");
if(isset($login) && isset($session_password)) {
  $sessionAuthorized = FALSE;
  session_register("login_details");
  if($login_details = authUser($login, $session_password)) {
    session_register("sessionAuthorized");
    $sessionAuthorized = $login;
  }
  Header("Location: $PHP_SELF");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Obec Plechotice - Administratorska sekcia</title>
	<META HTTP-Equiv="Content-Type" Content="text/html; charset=windows-1250">
	<META HTTP-EQUIV='author' CONTENT='projected by Ivan Stefko'>
	<META HTTP-EQUIV='Keywords' CONTENT='plechotice, trebisov, obec, novy ruskov, internet, sully'>
	<META HTTP-EQUIV='copyright' CONTENT='� 2003, Plechotice'>
	<META HTTP-EQUIV='Reply-to' CONTENT='webmaster@plechotice.sk'> 
	<LINK REL="stylesheet" TYPE="text/css" HREF="../plechacik.css">
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" marginheight="0" marginwidth="0">
<script type="text/javascript" language="JavaScript1.2" src="./admin.js"></script>
<script type="text/javascript" language="JavaScript1.2" src="./datapicker.js"></script>
<?php
if(!isset($sessionAuthorized) || !$sessionAuthorized || isset($logout)) {
  if(isset($logout)) {
    $sessionAuthorized = FALSE;
    session_unregister("sessionAuthorized");
		session_unregister("login_details");
    @session_destroy();
  } 
?>

  <form method="post" name="formlogin" action="<?php echo $PHP_SELF; ?>">
  <table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
	<td valign="middle" align="center">
	  <table cellpadding="0" cellspacing="1" border="0" bgcolor="#00008C">
        <tr>
	    <td><table cellpadding="6" cellspacing="0" border="0" bgcolor="#BAE3FC">
              <tr>
			  <td colspan="2" class="texttable" bgcolor="#00008C"><b>Login to admin section:</b></td>
			  </tr>
			  <tr>
              <td align="right" class="cisla"><b>Login:</b></td><td><input type="text" name="login" maxlength="20"></td>
              </tr>
              <tr>
		      <td align="right" class="cisla"><b>Password:</b></td><td><input type="password" name="session_password" maxlength="16"></td>
		      </tr>
              <tr>
		      <td align="right" colspan="2"><input type="submit" style="background:#00008C;color:#FFFFFF;font-weight:bold;cursor:hand;border-color:#FFFFFF" value="Login"></td>
		      </tr>
			  <? if(isset($login_details) && empty($login_details)) {
			       echo "<tr><td colspan=\"2\" class=\"texttable\" bgcolor=\"#00008C\"><b>Login or password incorrect.</b></td></tr>";
				}?>
	        </table></td>
	    </tr>
      </table>
	</td>
	</tr>
  </table>
  </form>

<script language="JavaScript" type="text/javascript">
<!-- 
		self.document.forms.formlogin.login.focus();
// -->
</script>
<?
}
else {
require_once("../setup.php");
require_once("../common.php");

 if(!(@$link=mysql_pconnect($db_host,$db_user,$db_passwd))) {
    echo "Server problems, try to log in later."; exit;
  }
  if(!@mysql_select_db($db_name,$link)){
    echo "Server problems, try to log in later."; exit;
  }
	$stmt = "select privilege from users where login='$sessionAuthorized'";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba";	exit;
	}
	$row = mysql_fetch_object($result);
	$privilege_user = $row->privilege;			// 1-admin, 2-fara/oznamy, 3-oznamy/news

?>
<br>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td width="180" valign="top"><br><br><br>
			<? if ($privilege_user == 1 || $privilege_user == 2) { echo "<a href=\"?action=9\" class=\"button\"" . style_color(9) . ">Aktualita - nov�</a><br>"; } ?>
			<? if ($privilege_user == 1 || $privilege_user == 2) { echo "<a href=\"?action=10\" class=\"button\"" . style_color(10) . ">Aktuality - edituj</a><br>"; } ?>
			<? if ($privilege_user == 1 || $privilege_user == 3 || $privilege_user == 2) { echo "<a href=\"?action=1\" class=\"button\"" .  style_color(1) . ">Oznam obec - nov�</a><br>"; } ?>
			<? if ($privilege_user == 1 || $privilege_user == 3 || $privilege_user == 2) { echo "<a href=\"?action=2\" class=\"button\"" .  style_color(2) . ">Oznam obec - edituj</a><br>"; } ?>
			<? if ($privilege_user == 1 || $privilege_user == 2) { echo "<a href=\"?action=6\" class=\"button\"" . style_color(6) . ">Farsk� oznam - nov�</a><br>";} ?>
			<? if ($privilege_user == 1 || $privilege_user == 2) { echo "<a href=\"?action=7\" class=\"button\"" . style_color(7) . ">Farsk� oznam - edituj</a><br>"; } ?>
			<? if ($privilege_user == 1 || $privilege_user == 2) { echo "<a href=\"?action=8\" class=\"button\"" . style_color(8) . ">sv. Om�e</a><br>"; } ?>
			<? if ($privilege_user == 1 || $privilege_user == 2) { echo "<a href=\"?action=11\" class=\"button\"" . style_color(11) . ">My�lienka na t��de�</a><br>";} ?>
			<? if ($privilege_user == 1 || $privilege_user == 2) { echo "<a href=\"?action=3\" class=\"button\"" .  style_color(3) . ">Anketa - nov�</a><br>"; } ?>
			<? if ($privilege_user == 1 || $privilege_user == 2) { echo "<a href=\"?action=4\" class=\"button\"" .  style_color(4) . ">Anketa - edituj</a><br>"; } ?>
			<? if ($privilege_user == 1 || $privilege_user == 2) { echo "<a href=\"?action=14\" class=\"button\"" .  style_color(14) . ">Futbalov� klub - edituj</a><br>"; } ?>
			<? if ($privilege_user == 1 || $privilege_user == 2) { echo "<a href=\"?action=13\" class=\"button\"" . style_color(13) . ">Zmaza� hist�riu v chate</a><br>"; } ?>
			<? if ($privilege_user == 1 || $privilege_user == 2) { echo "<a href=\"?action=12\" class=\"button\"" . style_color(12) . ">Kniha n�v�tev</a><br>"; } ?>
			<? if ($privilege_user == 1) { echo "<a href=\"?action=5\" class=\"button\"" . style_color(5) . ">Nov� user</a><br>"; } ?>
			<br>
			<a href="<? echo $page; ?>" class="button">Domov</a><br>
			<a href="<? echo $PHP_SELF."?logout=1"; ?>" class="button">Logout</a><br>
		</td>
		<td width="*">
		<?
		if ($action){
			switch ($action){
				case 1: $go = "./src/new_message.php"; break;
				case 2: $go = "./src/edit_message.php"; break;
				case 3: $go = "./src/new_anketa.php"; break;
				case 4: $go = "./src/edit_anketa.php"; break;
				case 5: $go = "./src/new_user.php"; break;
				case 6: $go = "./src/new_fara.php"; break;
				case 7: $go = "./src/edit_fara.php"; break;
				case 8: $go = "./src/omsa.php"; break;
				case 9: $go = "./src/new_aktuality.php"; break;
				case 10: $go = "./src/edit_aktuality.php"; break;
				case 11: $go = "./src/myslienka.php"; break;
				case 12: $go = "./src/gb_admin.php"; break;
				case 13: $go = "./src/del_history_chat.php"; break;
				case 14: $go = "./src/futbalovy_klub.php"; break;
			}
			require_once($go);
		}else {
			echo "<br><br><div align=\"center\" class=\"cisla\">VITAJ ��FE &nbsp;&nbsp;<img src=\"../imgs/smiles/grin.gif\"></div>";
		}
?>
		</td>
	</tr>
</table>

<?
}#else/authorization
?>
<br>
</body>
</html>
