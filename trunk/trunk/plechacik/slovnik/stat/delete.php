<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?
//delete.php

require("common.php");
require_once("./setup.php");
?>
<html>
<head>
	<title>Delete sicko</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<link rel="stylesheet" type="text/css" href="stat.css">
</head>

<body bgcolor="#F0EAD4">
<center>
<?
	$date = date("Y-m-d");

if (!control_ip("delete")){
	echo "<span class=\"nadpis\">Tvoja snaha sa ceni, ale radsej to nechaj tak...</span><br><br><span class=\"nazov\"><a href=\"mailto:webmaster@plechotice.sk?subject=Statistics\" class=\"nazov\">&#169&nbsp;Sully</a></span>";
	echo "<br><br><br><input type=\"button\" onclick=\"history.back()\" value=\"Back\" style=\"background:#f0e6e8;color:#000000\" onmouseover=\"this.style.background='#b09c90';this.style.color='#fff8e0'\" onmouseout=\"this.style.background='#f0e6e8';this.style.color='#000000'\">";
	exit();
}
	if (!($link = mysql_pconnect($db_host,$db_user,$db_passwd))){
		errMessage(sprintf("Nepodarilo sa nadviazat spojenie s SQL serverom pre host: %s, user: %s", $name_host, $name_user));
		exit();
	}
	
	if (!mysql_select_db($db_name, $link)){
		errMessage("Nepodarilo sa vybrat pozadovanu databazu");
		exit();
	}
		$stmt_update = "update update_stat SET datum='$date'";
	if (!mysql_query($stmt_update, $link)){
		errMessage(sprintf("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt_update));
		exit();
		}
		$stmt = "delete from english_svk";
	if (!(mysql_query($stmt, $link))){
		errMessage("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt);
		exit();
	}
	
		$stmt = "delete from german_svk";
	if (!(mysql_query($stmt, $link))){
		errMessage("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt);
		exit();
	}
	
		$stmt = "delete from french_svk";
	if (!(mysql_query($stmt, $link))){
		errMessage("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt);
		exit();
	}

		$stmt = "delete from italian_svk";
	if (!(mysql_query($stmt, $link))){
		errMessage("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt);
		exit();
	}
	
		$stmt = "delete from spanish_svk";
	if (!(mysql_query($stmt, $link))){
		errMessage("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt);
		exit();
	}
	
		$stmt = "delete from info_stat";
	if (!(mysql_query($stmt, $link))){
		errMessage("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt);
		exit();
	}
	
	
		$stmt = "delete from slovak_other";
	if (!(mysql_query($stmt, $link))){
		errMessage("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt);
		exit();
	}
	
	@error_log("Statistika na www/translator/stat bola uspesne zmazana z pocitaca: $host", 1, "webmaster@intrak.sk", "From: $host");
	
	echo "<span class=\"nadpis\">Statistika bola uspesne zmazana...</span>";

?>
<br>
<br>
<br>
<input type="button" onclick="history.back()" value="Back" style="background:#f0e6e8;color:#000000" onmouseover="this.style.background='#b09c90';this.style.color='#fff8e0'" onmouseout="this.style.background='#f0e6e8';this.style.color='#000000'">
</center>
</body>
</html>
