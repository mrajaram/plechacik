<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?
//info.php
?>
<html>
<head>
	<title>Informacie o slovicku: <?echo $request;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<link rel="stylesheet" type="text/css" href="stat.css">
</head>

<body bgcolor="#F0EAD4">
<?
require("./common.php");
require_once("./setup.php");

//------------------------------
	function sort_ipecka($sort){
		if (!$sort){$sort=1;}
		if ($sort == 1){
			$sort = 2;
		}else{
			$sort = 1;
		}
		return $sort;
	}
//--------------
	function sort_by($sort){
		switch ($sort){
			case 1: {$sortik = "IP address/ascending"; return $sortik; break;}
			case 2: {$sortik = "IP address/descending"; return $sortik; break;}
			case 3: {$sortik = "date/ascending"; return $sortik; break;}
			case 4: {$sortik = "date/descending"; return $sortik; break;}
			case 5: {$sortik = "time/ascending"; return $sortik; break;}
			case 6: {$sortik = "time/descending"; return $sortik; break;}
		}
	}
	
//-----------------------------
	function href($stlpec, $sort_function){
		global $request, $pom, $sort, $num;
		if ($num > 1){
			$href =  "<a href=\"info.php?request=" . urlencode(stripslashes($request)) . "&pom=$pom&sort=" . $sort_function($sort) . "\" class=\"hlavicka\" title=\"Sort by " . sort_by($sort_function($sort)) . "\">$stlpec</a>";
			return $href;
		}else{
			$href = $stlpec;
			return $href;
		}
	}
//----------------------------
	if (!($link = mysql_pconnect($db_host,$db_user,$db_passwd))){
		errMessage(sprintf("Nepodarilo sa nadviazat spojenie s SQL serverom pre host: %s, user: %s", $name_host, $name_user));
		exit();
	}
	
	if (!mysql_select_db($db_name, $link)){
		errMessage("Nepodarilo sa vybrat pozadovanu databazu");
		exit();
	}
	
		if (!$sort){$sort = 2;}
	switch ($sort){
		case 1: {$stmt = "select * from info_stat where info_stat.slovicko='$request' and info_stat.pom='$pom' order by ipecka asc"; break;}
		case 2: {$stmt = "select * from info_stat where info_stat.slovicko='$request' and info_stat.pom='$pom' order by ipecka desc"; break;}
		case 3: {$stmt = "select * from info_stat where info_stat.slovicko='$request' and info_stat.pom='$pom' order by datum asc"; break;}
		case 4: {$stmt = "select * from info_stat where info_stat.slovicko='$request' and info_stat.pom='$pom' order by datum desc"; break;}
		case 5: {$stmt = "select * from info_stat where info_stat.slovicko='$request' and info_stat.pom='$pom' order by cas asc"; break;}
		case 6: {$stmt = "select * from info_stat where info_stat.slovicko='$request' and info_stat.pom='$pom' order by cas desc"; break;}
	}

	if (!($result = mysql_query($stmt, $link))){
		errMessage("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt);
		exit();
	}
	$num = mysql_num_rows($result);
?>
<center>
<span class="detailnazov">Detailed info about searched expression: <i><?echo htmlspecialchars(stripslashes($request));?></i></span>
</center>
<br>
<br>
<span class="info">
Expression: <i><?echo htmlspecialchars(stripslashes($request));?></i><br>
Request(s): <?echo "<i>$num</i>";?><br>
Translation mode: <?echo "<i>" . preklad_info($pom)  . "</i>";?><br>
<?
if ($num > 1){
	echo "Sorted by: <i>" . sort_by($sort) . "</i><br>";
}
?>
</span>
<hr width="35%" align="left" noshade color="#000000" size="1">
<center>
<br>
<br>
<table cellpadding="1" cellspacing="0" border="0" width="715" bordercolordark="#866f60" bordercolorlight="#fffef9">
	<tr bgcolor="#b49c94">
		<td width="*" align="center" height="20"><span class="hlavicka">#</span></td>
		<td width="200" align="center" height="20"><span class="hlavicka">Expression</span></td>
		<td width="280" align="center" height="20"><span class="hlavicka"><?echo arrow_show(1,2) . href("IP address (Host name)", "sort_ipecka");?></span></td>
		<td width="110" align="center" height="20"><span class="hlavicka"><?echo arrow_show(3,4) . href("Date", "sort_datum");?></span></td>
		<td width="90" align="center" height="20"><span class="hlavicka"><?echo arrow_show(5,6) . href("Time", "sort_cas");?></span></td>
	</tr>
<?
if (!$num){
	echo "</table>";
	echo "<center><span class=\"oznam\">not found...</span></center><br><br><br>";
}else{									//zaciatok else*
	$j = 0;	
	$color = "#ddcccc";
	while ($row = mysql_fetch_object($result)){
	$j++;
	ereg('^([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})$', $row->datum, $datumik);
	$date =  "$datumik[3] - $datumik[2] - $datumik[1]";
	if(gethostbyaddr($row->ipecka) == $row->ipecka){
		$host_name = $row->ipecka . " (not resolved)";
	}else {$host_name = $row->ipecka . " (" . gethostbyaddr($row->ipecka) . ")";}
	printf("<tr bgcolor=\"$color\">
				<td align=\"right\" style=\"padding-left:5px;padding-right:8px\" bgcolor=\"#ddcccc\"><span class=\"number\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"left\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
			</tr>",$j . ".", htmlspecialchars($row->slovicko), $host_name, $date, $row->cas);
			if ($j%2 == 0){
				$color = "#ddcccc";
			}else{ $color = "#f0e6e8";}
	}
mysql_free_result($result);
?>
</table>
<br>
<br>
<?
}										//koniec else*
?>
<form action="index.php" method="post">
<input type="Submit" value="Back" style="background:#f0e6e8;color:#000000" onmouseover="this.style.background='#b09c90';this.style.color='#fff8e0'" onmouseout="this.style.background='#f0e6e8';this.style.color='#000000'">
</form>
</center>
</body>
</html>
