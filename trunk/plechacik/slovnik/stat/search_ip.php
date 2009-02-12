<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?
//search_ip.php
?>
<html>
<head>
	<title>Detail - search</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<link rel="stylesheet" type="text/css" href="stat.css">
</head>

<body bgcolor="#F0EAD4">
<?
require("common.php");
require_once("./setup.php");


$ipecka = htmlspecialchars(trim($ipecka));						//orezanie medzier (f-cia trim); zobrazovanie specialnych znakov z vystupu (f-cia htmlspecialchars)
$sql_ip = isset($sql_ip);

	$name_db = "slovnik";
	$name_user = "sully";
	$name_host = "localhost";
	$passwd = "";

	function sort_slovicko($sort){				//f-cia na triedenie podla slovicka (zabezpecuje vzostupnost/zostupnost)
		if (!$sort){$sort=1;}
		if ($sort == 1){
			$sort = 2;
		}else{
			$sort = 1;
		}
		return $sort;
	}
//----------------------------
	function sort_ip_sql($sort){
		if (!$sort){$sort=9;}
		if ($sort == 9){
			$sort = 10;
		}else{
			$sort = 9;
		}
		return $sort;
	}
//----------------------------
	function sort_by($sort){					//f-cia sluzi ako info o tom ake je zvolene triedenie
		switch ($sort){
			case 1: {$sortik = "expressions/ascending"; return $sortik; break;}
			case 2: {$sortik = "expressions/descending"; return $sortik; break;}
			case 3: {$sortik = "date/ascending"; return $sortik; break;}
			case 4: {$sortik = "date/descending"; return $sortik; break;}
			case 5: {$sortik = "time/ascending"; return $sortik; break;}
			case 6: {$sortik = "time/descending"; return $sortik; break;}
			case 7: {$sortik = "translation/ascending"; return $sortik; break;}
			case 8: {$sortik = "translation/descending"; return $sortik; break;}
			case 9: {$sortik = "IP address/ascending"; return $sortik; break;}
			case 10: {$sortik = "IP address/descending"; return $sortik; break;}
		}
	}
//----------------------------
	function href($stlpec, $sort_function){			//f-cia na zobrazenie odkazov v hlavicke, ktore sluzia na triedenie
		global $ipecka, $sort, $num, $sql_ip;				//$sort_funkcion - pri volani f-cie sa namiesto toho pise funkcia ktora sa ma volat na triedenie (sort_datum, sort_cas, sort_preklad....)
		if ($num > 1){								//podmienka kedy sa ma zobrazovat/byt aktivne triedenie. 
			$href =  "<a href=\"search_ip.php?ipecka=$ipecka&sort=" . $sort_function($sort) . href_sql_ip($sql_ip) . "\" class=\"hlavicka\" title=\"Sort by " . sort_by($sort_function($sort)) . "\">$stlpec</a>";
			return $href;
		}else{
			$href = $stlpec;
			return $href;
		}
	}
//----------------------------
	function ip_href($stlpec){			//f-cia na zobrazenie odkazu IPadresy na triedenie - triedit bude iba vtedy ked je vstup $ipecka so znamienkami pre SQL hladanie
		global $ipecka, $sort, $num, $sql_ip;
		if (($num > 1) && ($sql_ip) && ereg('[\%\_]{1,}', $ipecka)){								//podmienka kedy sa ma zobrazovat/byt aktivne triedenie. 
			$href =  "<a href=\"search_ip.php?ipecka=$ipecka&sort=" . sort_ip_sql($sort) . "&sql_ip=1\" class=\"hlavicka\" title=\"Sort by " . sort_by(sort_ip_sql($sort)) . "\">$stlpec</a>";
			return $href;
		}else{
			$href = $stlpec;
			return $href;
		}
	}
//----------------------------

	if (!check_ip($ipecka)){								//kontrola vstupu ci je spravne zadana IP adresa
		echo "<center><span class=\"nadpis\">IP adresa, ktorú si zadal(a) je neplatná</span><br><br>";
		echo "<input type=\"Button\" onclick=\"history.back()\" value=\"Back\" style=\"background:#f0e6e8;color:#000000\" onmouseover=\"this.style.background='#b09c90';this.style.color='#fff8e0'\" onmouseout=\"this.style.background='#f0e6e8';this.style.color='#000000'\"></center>";
		exit();
	}
	
	if (!($link = mysql_pconnect($db_host,$db_user,$db_passwd))){			//pripojenie k SQL serveru
		errMessage(sprintf("Nepodarilo sa nadviazat spojenie s SQL serverom pre host: %s, user: %s", $name_host, $name_user));
		exit();
	}
	
	if (!mysql_select_db($db_name, $link)){									//vyber Databazy
		errMessage("Nepodarilo sa vybrat pozadovanu databazu");
		exit();
	}
	
	if (!$sort){$sort = 4;}							//nastavenie sql dotazu aby sa triedilo na zaciatku podla datumu
	switch ($sort){									//vyber sql dotazu na zaklade premennej $sort
		case 1: {$stmt = "select * from info_stat where info_stat.ipecka " . sql($sql_ip) . " '$ipecka' order by slovicko asc"; break;}
		case 2: {$stmt = "select * from info_stat where info_stat.ipecka " . sql($sql_ip) . " '$ipecka' order by slovicko desc"; break;}
		case 3: {$stmt = "select * from info_stat where info_stat.ipecka " . sql($sql_ip) . " '$ipecka' order by datum asc"; break;}
		case 4: {$stmt = "select * from info_stat where info_stat.ipecka " . sql($sql_ip) . " '$ipecka' order by datum desc"; break;}
		case 5: {$stmt = "select * from info_stat where info_stat.ipecka " . sql($sql_ip) . " '$ipecka' order by cas asc"; break;}
		case 6: {$stmt = "select * from info_stat where info_stat.ipecka " . sql($sql_ip) . " '$ipecka' order by cas desc"; break;}
		case 7: {$stmt = "select * from info_stat where info_stat.ipecka " . sql($sql_ip) . " '$ipecka' order by pom asc"; break;}
		case 8: {$stmt = "select * from info_stat where info_stat.ipecka " . sql($sql_ip) . " '$ipecka' order by pom desc"; break;}
		case 9: {$stmt = "select * from info_stat where info_stat.ipecka " . sql($sql_ip) . " '$ipecka' order by ipecka asc"; break;}
		case 10: {$stmt = "select * from info_stat where info_stat.ipecka " . sql($sql_ip) . " '$ipecka' order by ipecka desc"; break;}
	}
	
	if (!($result = mysql_query($stmt, $link))){			//dotaz odoslany do SQL
		errMessage(sprintf("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt));
		exit();
	}
	$num = mysql_num_rows($result);							//zistenie kolko riadkov bude mat tabulka
	
	$stmt_count = "select pom, count(*) as countik from info_stat where ipecka like '$ipecka' group by pom";
		if (!($result_count = mysql_query($stmt_count, $link))){			//dotaz odoslany do SQL
			errMessage(sprintf("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt_count));
			exit();
		}
	while ($row_count = mysql_fetch_object($result_count)){	
	$spravicka .= sprintf("%s: %s, ", preklad($row_count->pom), $row_count->countik); 
	}
	$ok_spravicka = substr($spravicka, 0, strlen($spravicka)-2);				//odstranenie poslednej ciarky... - mozno sa to dalo aj lahsie ;o))
	mysql_free_result($result_count);
	unset($row_count);
?>
<center>
<span class="detailnazov">Searched expressions from IP address: <i><?echo $ipecka;?></i></span>
</center>
<br>
<br>
<span class="info">
<?
if ($sql_ip){
	echo "<i>&#187;&nbsp;Searching by SQL syntax</i><br><br>";
}
?>
IP address: <i><?echo $ipecka;?></i><br>
<?
if (!$sql_ip){
$hostik = gethostbyaddr($ipecka);
	if ($ipecka != $hostik){
	echo "Host name: <i>" . gethostbyaddr($ipecka) . "</i><br>";
	}
}
?>
No. of found expressions: <?echo "<i>$num</i>";?><br>
<?
if ($num >= 1){
	echo "No. of translations for: <i>$ok_spravicka</i><br>";
}
if ($num > 1){
	echo "Sort by: <i>" . sort_by($sort) . "</i><br>";
}
?>
</span>
<hr width="30%" align="left" noshade color="#000000" size="1">
<center>
<br>
<br>
<table cellpadding="1" cellspacing="0" border="0" width="705" bordercolordark="#866f60" bordercolorlight="#fffef9">
	<tr bgcolor="#b49c94">
		<td width="*" align="center" height="20"><span class="hlavicka">#</span></td>
		<td width="200" align="center" height="20"><span class="hlavicka"><?echo arrow_show(1,2) . href("Expressions", "sort_slovicko");?></span></td>
		<td width="120" align="center" height="20"><span class="hlavicka"><?echo arrow_show(9,10) . ip_href("IP address");?></span></td>
		<td width="100" align="center" height="20"><span class="hlavicka"><?echo arrow_show(3,4) . href("Date", "sort_datum");?></span></td>
		<td width="100" align="center" height="20"><span class="hlavicka"><?echo arrow_show(5,6) . href("Time", "sort_cas");?></span></td>
		<td width="150" align="center" height="20"><span class="hlavicka"><?echo arrow_show(7,8) . href("Translation (from)", "sort_preklad");?></span></td>
	</tr>
<?
if (!$num){
	echo "</table>";
	echo "<center><span class=\"oznam\">not found...</span></center><br><br><br>";
}else{							//zaciatok else*
	$j = 0;	
	$color = "#ddcccc";
	while ($row = mysql_fetch_object($result)){
	$j++;
	ereg('^([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})$', $row->datum, $datumik);
	$date =  "$datumik[3] - $datumik[2] - $datumik[1]";
	$language = preklad($row->pom);
	printf("<tr bgcolor=\"$color\">
				<td align=\"right\" style=\"padding-left:5px;padding-right:8px\" bgcolor=\"#ddcccc\"><span class=\"number\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span>%s</td>
			</tr>",$j . ".", htmlspecialchars($row->slovicko), $row->ipecka, $date, $row->cas, $language, check(htmlspecialchars($row->slovicko), convert($row->pom)));
			if ($j%2 == 0){
				$color = "#ddcccc";
			}else{ $color = "#f0e6e8";}
	}
mysql_free_result($result);				//uvolnenie pamate
?>
</table>
<br>
<br>
<?
}								//koniec else*
?>
<form action="index.php" method="post">
<input type="Submit" style="background:#f0e6e8;color:#000000" onmouseover="this.style.background='#b09c90';this.style.color='#fff8e0'" onmouseout="this.style.background='#f0e6e8';this.style.color='#000000'" value="Back">
</form>
</center>
</body>
</html>
