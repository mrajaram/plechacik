<br>
<div align="center" class="cisla">VYTVORI� NOV�HO U��VATE�A</div>
<br>

<?php

require_once("../common.php");

	if(!(@$link=mysql_pconnect($db_host,$db_user,$db_passwd))) {
    echo "Server problems, try to log in later."; exit;
  }
  if(!@mysql_select_db($db_name,$link)){
    echo "Server problems, try to log in later."; exit;
  }

	
if ($delete){						//zmanzanie uzivatela
	$stmt = "delete from users where id='$id'";
	if (@!mysql_query($stmt, $link)){
		echo "ta more chyba";	exit;
	}
}	
	
if ($register && !empty($login) && !empty($password)){
	$password = md5($password);
	$stmt = "insert into users SET login='$login', password='$password', privilege='$privilege', email='$email', meno='$meno'";
	if (@!($result = mysql_query($stmt, $link))){
		echo $stmt;
		echo "ta more chyba";	exit;
	}
	echo "<div class=\"cisla\" align=\"center\"><br><br><br>U��vate� bol �spe�ne vytvoren�.<br><br><br></div>";
}else{
?>
<form method="post" name="register_login" action="?action=5">
	<table align="center" cellpadding="1" cellspacing="1" border="0">
		<tr>
			<td align="right" class="cisla"><b>Meno:</b></td><td><input type="text" name="meno" maxlength="20"></td>
		</tr>
		<tr>
			<td align="right" class="cisla"><b>Login:</b></td><td><input type="text" name="login" maxlength="20"></td>
		</tr>
		<tr>
			<td align="right" class="cisla"><b>Password:</b></td><td><input type="password" name="password" maxlength="16"></td>
		</tr>
		<tr>
			<td align="right" class="cisla"><b>E-mail:</b></td><td><input type="text" name="email" maxlength="16"></td>
		</tr>
		<tr>
			<td align="right" class="cisla"><b>Privilege:</b></td><td><select name="privilege"><option value="1">admin</option><option value="2">fara-oznamy</option><option value="3">obec-oznamy/news</option></select></td>
		</tr>
		<tr>
	    <td align="right" colspan="2"><input type="submit" style="background:#00008C;color:#FFFFFF;font-weight:bold;cursor:hand;border-color:#FFFFFF" value="Register"></td>
	  </tr>
	</table>
	<input type="Hidden" name="register" value="1">
</form>

<?php
}

$stmt = "select * from users";
if (@!($result = mysql_query($stmt, $link))){
	echo $stmt;
	echo "ta more chyba";	exit;
}

echo "<table align=\"center\" cellpadding=\"5\" cellspacing=\"0\" border=\"2\" bordercolor=\"#ffffff\" bgcolor=\"#ECF1FB\">";
echo "	<tr>
					<td class=\"textmain\" style=\"text-align:center;\"><b><i>Meno</i></b></td>
					<td align=\"center\" class=\"textmain\" style=\"text-align:center;\"><b><i>Login</i></b></td>
					<td align=\"center\" class=\"textmain\" style=\"text-align:center;\"><b><i>Pr�va</i></b></td>
					<td align=\"center\" class=\"textmain\" style=\"text-align:center;\">&nbsp;</td>
				</tr>";

while ($row = mysql_fetch_object($result)){
	echo "
			<tr>
				<td class=\"textmain\" style=\"text-align:center;\">" . $row->meno . "</td>
				<td class=\"textmain\" style=\"text-align:center;\">" . $row->login . "</td>
				<td class=\"textmain\" style=\"text-align:center;\">" . return_privilege($row->privilege). "</td>
				<td> " . del_user($row->login, $row->id, $row->meno) . "</td>
			</tr>
		
		";		#echo

}
echo "</table>";

?>
