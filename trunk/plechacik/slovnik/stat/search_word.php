<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?
//search_word.php
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


$request = trim($request);									//orezanie medzier (f-cia trim); zobrazovanie specialnych znakov z vystupu (f-cia htmlspecialchars)
$sql_word = isset($sql_word);

	$name_db = "slovnik";
	$name_user = "sully";
	$name_host = "localhost";
	$passwd = "";

	function sort_ipecka($sort){						//f-cia na triedenie podla IP adresy (zabezpecuje vzostupnost/zostupnost)
		if (!$sort){$sort=1;}
		if ($sort == 1){
			$sort = 2;
		}else{
			$sort = 1;
		}
		return $sort;
	}
//----------------------------	
	function sort_word_sql($sort){
		if (!$sort){$sort=9;}
		if ($sort == 9){
			$sort = 10;
		}else{
			$sort = 9;
		}
		return $sort;
	}
//----------------------------
	function sort_by($sort){							//f-cia sluzi ako info o tom ake je zvolene triedenie
		switch ($sort){
			case 1: {$sortik = "IP address/ascending"; return $sortik; break;}
			case 2: {$sortik = "IP address/descending"; return $sortik; break;}
			case 3: {$sortik = "date/ascending"; return $sortik; break;}
			case 4: {$sortik = "date/descending"; return $sortik; break;}
			case 5: {$sortik = "time/ascending"; return $sortik; break;}
			case 6: {$sortik = "time/descending"; return $sortik; break;}
			case 7: {$sortik = "translation/ascending"; return $sortik; break;}
			case 8: {$sortik = "translation/descending"; return $sortik; break;}
			case 9: {$sortik = "expression/ascending"; return $sortik; break;}
			case 10: {$sortik = "expression/descending"; return $sortik; break;}
		}
	}
//------------------------------
	function href($stlpec, $sort_function){				//f-cia na zobrazenie odkazov v hlavicke, ktore sluzia na triedenie
		global $request, $sort, $num, $sql_word;					//$sort_funkcion - pri volani f-cie sa namiesto toho pise funkcia ktora sa ma volat na triedenie (sort_datum, sort_cas, sort_preklad....)
		if ($num > 1){									//podmienka kedy sa ma zobrazovat/byt aktivne triedenie. 
			$href =  "<a href=\"search_word.php?request=" . urlencode(stripslashes($request)) . "&sort=" . $sort_function($sort) . href_sql_word($sql_word) . "\" class=\"hlavicka\" title=\"Sort by " . sort_by($sort_function($sort)) . "\">$stlpec</a>";
			return $href;
		}else{
			$href = $stlpec;
			return $href;
		}
	}
//------------------------------
	function word_href($stlpec){				//f-cia na zobrazenie odkazu Word na triedenie - triedit bude iba vtedy ked je vstup $ipecka so znamienkami pre SQL hladanie
		global $request, $sort, $num, $sql_word;
		if (($num > 1) && ($sql_word) && (ereg('[\_\%]{1,}', $request))){									//podmienka kedy sa ma zobrazovat/byt aktivne triedenie. 
			$href =  "<a href=\"search_word.php?request=" . urlencode(stripslashes($request)) . "&sort=" . sort_word_sql($sort) . "&sql_word=1\" class=\"hlavicka\" title=\"Sort by " . sort_by(sort_word_sql($sort)) . "\">$stlpec</a>";
			return $href;
		}else{
			$href = $stlpec;
			return $href;
		}
	}
//----------------------------
	if (!check_word($request)){							//kontrola vstupu ci tam nie su iba medzery
		echo "<center><span class=\"nadpis\">Nezadal(a) si ziadne slovo</span><br><br>";
		echo "<input type=\"Button\" onclick=\"history.back()\" value=\"Back\" style=\"background:#f0e6e8;color:#000000\" onmouseover=\"this.style.background='#b09c90';this.style.color='#fff8e0'\" onmouseout=\"this.style.background='#f0e6e8';this.style.color='#000000'\"></center>";
		exit();
	}
	
	if (!($link = mysql_pconnect($db_host,$db_user,$db_passwd))){			//pripojenie k SQL serveru
		errMessage(sprintf("Nepodarilo sa nadviazat spojenie s SQL serverom pre host: %s, user: %s", $name_host, $name_user));
		exit();
	}
	
	if (!mysql_select_db($db_name, $link)){								//vyber Databazy
		errMessage("Nepodarilo sa vybrat pozadovanu databazu");
		exit();
	}
	
		if (!$sort){$sort = 2;}					//nastavenie sql dotazu aby sa triedilo na zaciatku podla ipecky
	switch ($sort){								//vyber sql dotazu na zaklade premennej $sort
		case 1: {$stmt = "select * from info_stat where info_stat.slovicko " . sql($sql_word) ." '$request' order by ipecka asc"; break;}
		case 2: {$stmt = "select * from info_stat where info_stat.slovicko " . sql($sql_word) ." '$request' order by ipecka desc"; break;}
		case 3: {$stmt = "select * from info_stat where info_stat.slovicko " . sql($sql_word) ." '$request' order by datum asc"; break;}
		case 4: {$stmt = "select * from info_stat where info_stat.slovicko " . sql($sql_word) ." '$request' order by datum desc"; break;}
		case 5: {$stmt = "select * from info_stat where info_stat.slovicko " . sql($sql_word) ." '$request' order by cas asc"; break;}
		case 6: {$stmt = "select * from info_stat where info_stat.slovicko " . sql($sql_word) ." '$request' order by cas desc"; break;}
		case 7: {$stmt = "select * from info_stat where info_stat.slovicko " . sql($sql_word) ." '$request' order by pom asc"; break;}
		case 8: {$stmt = "select * from info_stat where info_stat.slovicko " . sql($sql_word) ." '$request' order by pom desc"; break;}
		case 9: {$stmt = "select * from info_stat where info_stat.slovicko " . sql($sql_word) ." '$request' order by slovicko asc"; break;}
		case 10: {$stmt = "select * from info_stat where info_stat.slovicko " . sql($sql_word) ." '$request' order by slovicko desc"; break;}
		default: {$stmt = "haluska";}
	}
	
	if (!($result = mysql_query($stmt, $link))){		//dotaz odoslany do SQL
		errMessage(sprintf("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt));
		exit();
	}
	
	$num = mysql_num_rows($result);						//zistenie kolko riadkov bude mat tabulka
?>
<center>
<span class="detailnazov">Info about users and searched expressions: <i><?echo htmlspecialchars(stripslashes($request));?></i></span>
</center>
<br>
<br>
<span class="info">
<?
if ($sql_word){
	echo "<i>&#187;&nbsp;Searching by SQL syntax</i><br><br>";
}
?>
Searched expression: <i><?echo htmlspecialchars(stripslashes($request));?></i><br>
Request(s): <?echo "<i>$num</i>";?><br>
<?
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
		<td width="200" align="center" height="20"><span class="hlavicka"><?echo arrow_show(9,10) . word_href("Expressions");?></span></td>
		<td width="120" align="center" height="20"><span class="hlavicka"><?echo arrow_show(1,2) . href("IP address", "sort_ipecka");?></span></td>
		<td width="100" align="center" height="20"><span class="hlavicka"><?echo arrow_show(3,4) . href("Date", "sort_datum");?></span></td>
		<td width="100" align="center" height="20"><span class="hlavicka"><?echo arrow_show(5,6) . href("Time", "sort_cas");?></span></td>
		<td width="150" align="center" height="20"><span class="hlavicka"><?echo arrow_show(7,8) . href("Translation (from)", "sort_preklad");?></span></td>
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
	$language = preklad($row->pom);
	printf("<tr bgcolor=\"$color\">
				<td align=\"right\" style=\"padding-left:5px;padding-right:8px\" bgcolor=\"#ddcccc\"><span class=\"number\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"center\" style=\"padding-left:5px;padding-right:5px\"><span class=\"text\">%s</span></td>
			</tr>",$j . ".", htmlspecialchars($row->slovicko), $row->ipecka, $date, $row->cas, $language);
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
}										//koniec else*
?>
<form action="index.php" method="post">
<input type="Submit" value="Back" style="background:#f0e6e8;color:#000000" onmouseover="this.style.background='#b09c90';this.style.color='#fff8e0'" onmouseout="this.style.background='#f0e6e8';this.style.color='#000000'">
</form>
</center>
</body>
</html>
