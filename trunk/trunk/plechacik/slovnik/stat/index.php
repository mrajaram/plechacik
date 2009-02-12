<?
$koma_stat++;
setcookie("koma_stat", $koma_stat);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?
//index.php
//
require ("common.php");
require_once("./setup.php");


//$key = GetHostByADDR($REMOTE_ADDR); 			//mal by vracat host na zaklade ip adresy

	$name_db = "slovnik";
/*
	$name_user = "sully";
	$name_host = "localhost";
	$passwd = "";
*/
	
//if (!policko(3,152, 156)){
if (!control_ip("all")){									//kontrola pristupu na www.intrak.sk/translator/stat
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"stat.css\">";
		echo "<body bgcolor=\"#fff8e0\"><center><span class=\"nadpis\">Access denied<br><br>Only for authorized personnel</span><br><br><span class=\"nazov\"><a href=\"mailto:webmaster@plechotice.sk?subject=Statistics\" class=\"nazov\">&#169&nbsp;Ivan &#138tefko</a></span><br><br><br>";
		echo "<input type=\"Button\" onclick=\"history.back()\" value=\"Back\" style=\"background:#f0e6e8;color:#000000\" onmouseover=\"this.style.background='#b09c90';this.style.color='#fff8e0'\" onmouseout=\"this.style.background='#f0e6e8';this.style.color='#000000'\"></center></body>";
		exit();
}
	
//------------------------------
	function pom($i){
		switch($i){
			case 0:{$pom = 1; return $pom;}
			case 1:{$pom = 3; return $pom;}
			case 2:{$pom = 2; return $pom;}
			case 3:{$pom = 4; return $pom;}
			case 4:{$pom = 6; return $pom;}
			case 5:{$pom = 5; return $pom;}
		}
	}
//------------------------------
	
	function table($i){
		switch ($i){
			case 0:{$result = "english_svk"; return $result; break;}
			case 1:{$result = "german_svk"; return $result; break;}
			case 2:{$result = "french_svk"; return $result; break;}
			case 3:{$result = "italian_svk"; return $result; break;}
			case 4:{$result = "spanish_svk"; return $result; break;}
			case 5:{$result = "slovak_other"; return $result; break;}
		}
	}
	
//--------------------------------
?>
<html>
<head>
	<title>Statistics in www.intrak.sk/translator</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<link rel="stylesheet" type="text/css" href="stat.css">

<script language="JavaScript">
<!--
function cursor(){
	document.formular1.ipecka.focus();
	return true;
}
//"#fff8e0"
//-->
</script>
</head>

<body bgcolor="#F0EAD4" onload="cursor()">
<?
	if (!($link = mysql_pconnect($db_host,$db_user,$db_passwd))){
		errMessage(sprintf("Nepodarilo sa nadviazat spojenie s SQL serverom pre host: %s, user: %s", $name_host, $name_user));
		exit();
	}
	
	if (!mysql_select_db($db_name, $link)){
		errMessage("Nepodarilo sa vybrat pozadovanu databazu");
		exit();
	}
	
	$stmt = "select * from update_stat";
	if (!($result = mysql_query($stmt, $link))){
		errMessage(sprintf("Nepodarilo sa vykonat prikaz: %s", $stmt));
		exit();
	}

//-------------------------    PREVOD DATUMIKU - ZACIATOK   ---------------------------
	$row = mysql_fetch_object($result);
	$date = $row->datum;
	ereg('^([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})$', $date, $datumik);
	$date =  "$datumik[3]-$datumik[2]-$datumik[1]";
//-------------------------    PREVOD DATUMIKU - KONIEC    ---------------------------
	
//-------------------------    POCITADLO PRE POCET PRISTUPOV NA STATISTIKU - ZACIATOK  ---------------------------
	if (empty($HTTP_COOKIE_VARS["koma_stat"])){
		$pocet_stat = $row->counter_stat;
		$pocet_stat++;
		$stmt = "update update_stat SET counter_stat='$pocet_stat'";
			if (!mysql_query($stmt, $link)){
				errMessage(sprintf("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt));
				exit();
			}
	}
	
	$stmt = "select counter_stat, counter_tran from update_stat";
	if (!($result = mysql_query($stmt, $link))){
		errMessage(sprintf("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt));
		exit();
	}
	$row = mysql_fetch_object($result);
//-------------------------    POCITADLO PRE POCET PRISTUPOV NA STATISTIKU - KONIEC  ---------------------------

	$pocitadlo_tran = $row->counter_tran;
	$pocitadlo_stat = $row->counter_stat;
	
	mysql_free_result($result);
	unset($row);
?>

<center>
<span class="nadpis">Lookup statistics for <a href="http://www.intrak.sk/translator" class="nadpis" target="_blank">www.intrak.sk/translator</a></span>
<br>
<br>
<br>
<span class="info">
<form action="search_ip.php" method="post" name="formular1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Display all searches for IP address: &nbsp;&nbsp;<input type="Text" name="ipecka">&nbsp;&nbsp;&nbsp;&nbsp;<input type="Submit" name="ip" value="Search" style="background:#f0e6e8;color:#000000" onmouseover="this.style.background='#b09c90';this.style.color='#fff8e0'" onmouseout="this.style.background='#f0e6e8';this.style.color='#000000'">&nbsp;&nbsp;&nbsp;<input type="Checkbox" name="sql_ip">&nbsp;&nbsp;**
</form>
<form action="search_word.php" method="post" name="formular2">
Display users searching for expression: &nbsp;&nbsp;<input type="Text" name="request">&nbsp;&nbsp;&nbsp;&nbsp;<input type="Submit" name="word" value="Search" style="background:#f0e6e8;color:#000000" onmouseover="this.style.background='#b09c90';this.style.color='#fff8e0'" onmouseout="this.style.background='#f0e6e8';this.style.color='#000000'">&nbsp;&nbsp;&nbsp;<input type="Checkbox" name="sql_word">&nbsp;&nbsp;**<br>
</form>
</span>
<span class="poznamka">
( ** - searching by SQL syntax => allowed symbols: "%" and "_" )
</span>
<hr width="50%" align="center" noshade color="#000000" size="1">
<br>
<span class="detailnazov"><i>Top 10 searched...</i></span>
<br>
<br>
<?
	$preklad = array("English &#187; Slovak", "German &#187; Slovak", "French &#187; Slovak", "Italian &#187; Slovak", "Spanish &#187; Slovak", "Slovak &#187; Others");
	for ($i=0; $i<=5; $i++){
?>
<span class="nazov"><?echo $preklad[$i];?></span>
<br>
<br>
<table cellpadding="1" cellspacing="0" border="0" width="435" bordercolordark="#866f60" bordercolorlight="#fffef9">
	<tr bgcolor="#b49c94">
		<td width="35" align="center" height="20"><span class="hlavicka">#</span></td>
		<td width="250" align="center" height="20"><span class="hlavicka">Word</span></td>
		<td width="75" align="center" height="20"><span class="hlavicka">Count</span></td>
		<td width="75" align="center" height="20"><span class="hlavicka">Detail</span></td>
	</tr>
<?
	$stmt = "select * from " . table($i) . " order by counter desc, request asc limit 0, 10";
	//order by counter desc, request asc => vnutorne triedenie - ak counter bude rovnaky pri dvoch requestoch tak v selecte bude skor zobrazeny ten request ktory je skor v abecede (request asc)
	if (!($result = mysql_query($stmt, $link))){
		errMessage(sprintf("Nepodarilo sa vykonat prikaz: %s", $stmt));
		exit();
	}
	$num = mysql_num_rows($result);
	
	if (!$num){
		echo ("</table>");
		echo ("<center><span class=\"oznam\">not found...</span></center><br><br><br>");
	}else{
	$j = 0;	
	$color = "#ddcccc";
while ($row = mysql_fetch_object($result)){
	$j++;
	printf("<tr bgcolor=\"$color\">
				<td align=\"right\" style=\"padding-left:5px;padding-right:8px\" bgcolor=\"#ddcccc\"><span class=\"number\">%s</span></td>
				<td align=\"center\" style=\"padding-left:8px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"center\" style=\"padding-left:8px;padding-right:5px\"><span class=\"text\">%s</span></td>
				<td align=\"center\"><span class=\"linky\"><a href=\"info.php?request=%s&pom=%s\" class=\"linky\" title=\"Detail info about word: %s\">info</a></span>%s</td>
			</tr>", $j . ".", htmlspecialchars($row->request), $row->counter, urlencode($row->request), $row->pom, $row->request, check(htmlspecialchars($row->request), $i*2));
	if ($j%2 == 0){
		$color = "#ddcccc";
	}else{ $color = "#f0e6e8";}
}
?>
</table>
<br>
<br>
<br>
<?
}
}
mysql_free_result($result);
?>

<!-- 			Zaciatok tabulky - The best three users			-->

<span class="nazov">Most frequent users</span>
<br>
<br>
<table cellpadding="1" cellspacing="0" border="0" width="*" bordercolordark="#866f60" bordercolorlight="#fffef9">
	<tr bgcolor="#b49c94">
		<td width="35" align="center" height="20"><span class="hlavicka">#</span></td>
		<td width="220" align="center" height="*"><span class="hlavicka">Host name</span></td>
		<td width="90" align="center" height="20"><span class="hlavicka">Request (s)</span></td>
		<td width="100" align="center" height="20"><span class="hlavicka">Detail</span></td>
	</tr>
<?
	$stmt =  "select ipecka, count(*) as jojo from info_stat group by ipecka order by jojo desc limit 3";
	if (!($result = mysql_query($stmt, $link))){
		echo "Nepodarilo sa vykonat prikaz";
		exit();
	}
	$j = 0;
	$color = "#ddcccc";
while ($row = mysql_fetch_object($result)){
	$j++;
	$hostik = gethostbyaddr($row->ipecka);
	printf("<tr bgcolor=\"$color\">
				<td align=\"right\" style=\"padding-left:5px;padding-right:8px\" bgcolor=\"#ddcccc\" height=\"21\"><span class=\"number\">%s</span></td>
				<td align=\"center\" height=\"21\" style=\"padding-left:5px;padding-right:8px\"><span class=\"text\">%s</span></td>
				<td align=\"center\" height=\"21\"><span class=\"text\">%s</span></td>
				<td align=\"center\" height=\"21\"><span class=\"link\"><a href=\"search_ip.php?ipecka=%s\" class=\"linky\" title=\"Detail info about best users: %s\">info</a></span></td>
			</tr>", $j . ".", $hostik, number_format($row->jojo,0,""," "), $row->ipecka, $row->ipecka);
	if ($j%2 == 0){
		$color = "#ddcccc";
	}else{ $color = "#f0e6e8";}
}
echo "</table>\n";
mysql_free_result($result);
?>

<!--			Koniec tabulky - The best three users			-->

<br>
<br>
<br>
<!--                    Zaciatok tabulky - Last searching                   -->
<span class="nazov">Last searched</span>
<br>
<br>
<table cellpadding="1" cellspacing="0" border="0" width="460" bordercolordark="#866f60" bordercolorlight="#fffef9">
        <tr bgcolor="#b49c94">
                <td width="35" align="center" height="20"><span class="hlavicka">#</span></td>
                <td width="250" align="center" height="20"><span class="hlavicka">Word</span></td>
                <td width="100" align="center" height="20"><span class="hlavicka">Time</span></td>
                <td width="75" align="center" height="20"><span class="hlavicka">Detail</span></td>
        </tr>
<?
        $stmt = "select * from info_stat order by datum desc, cas desc limit 10";
        if (!($result = mysql_query($stmt, $link))){
                errMessage(sprintf("Nepodarilo sa vykonat prikaz: %s", $stmt));
                exit();
        }
        $num = mysql_num_rows($result);

        if (!$num){
                echo ("</table>");
                echo ("<center><span class=\"oznam\">not found...</span></center><br><br><br>");
        }else{
        $j = 0;
        $color = "#ddcccc";
	while ($row = mysql_fetch_object($result)){
        	$j++;
	        printf("<tr bgcolor=\"$color\">
        		 <td align=\"right\" style=\"padding-left:5px;padding-right:8px\"bgcolor=\"#ddcccc\"><span class=\"number\">%s</span></td>
                         <td align=\"center\" style=\"padding-left:8px;padding-right:5px\"><span class=\"text\">%s</span></td>
                         <td align=\"center\" style=\"padding-left:8px;padding-right:5px\"><span class=\"text\">%s</span></td>
                         <td align=\"center\"><span class=\"linky\"><a href=\"info.php?request=%s&pom=%s\" class=\"linky\" title=\"Detail info about word: %s\">info</a></span>%s</td>
	        </tr>", $j . ".", htmlspecialchars($row->slovicko), $row->cas, urlencode($row->slovicko), $row->pom, $row->slovicko, check(htmlspecialchars($row->slovicko), convert($row->pom)));
        if ($j%2 == 0){
                $color = "#ddcccc";
        }else{ $color = "#f0e6e8";}
	}
	}
?>
</table>

<!--                   Koniec tabulky - Last searching                   -->

<br>
<br>
<br>

<!-- 			Zaciatok tabulky - Info/pristup			-->

<span class="nazov">Other No. ...</span>
<br>
<br>
<table cellpadding="1" cellspacing="0" border="0" width="445" bordercolordark="#866f60" bordercolorlight="#fffef9">
	<tr bgcolor="#b49c94">
		<td width="35" align="center" height="20"><span class="hlavicka">#</span></td>
		<td width="220" align="center" height="20"><span class="hlavicka">Translation mode</span></td>
		<td width="90" align="center" height="20"><span class="hlavicka">Request (s)</span></td>
		<td width="100" align="center" height="20"><span class="hlavicka">Count of DB</span></td>
	</tr>
<?
$count_db = array("403 760", "200 004", "100 115", "108 209", "106 060", "-");
$j = 0;
$color = "#ddcccc";
for ($i=0; $i<=5 ; $i++){
	$j++;
	$stmt =  "select count(*) from info_stat where pom=" . pom($i);
	if (!($result = mysql_query($stmt, $link))){
		echo "Nepodarilo sa vykonat prikaz";
		exit();
	}
	$row = mysql_fetch_row($result);
	printf("<tr bgcolor=\"$color\">
				<td align=\"right\" style=\"padding-left:5px;padding-right:8px\" bgcolor=\"#ddcccc\" height=\"21\"><span class=\"number\">%s</span></td>
				<td align=\"center\" height=\"21\"><span class=\"text\">%s</span></td>
				<td align=\"center\" height=\"21\"><span class=\"text\">%s</span></td>
				<td align=\"center\" height=\"21\"><span class=\"text\">%s</span></td>
			</tr>", $j . ".", $preklad[$i], number_format($row[0],0,""," "), $count_db[$i]);
	if ($j%2 == 0){
		$color = "#ddcccc";
	}else{ $color = "#f0e6e8";}
}
echo "</table>\n";
mysql_free_result($result);
?>

<!-- 			Koniec tabulky - Info/pristup			-->

<br>
<br>
<br>

<!-- 			Zaciatok tabulky - Info/naj			-->

<span class="nazov">Other info about www.intrak.sk/translator...</span>
<br>
<br>
<table cellpadding="1" cellspacing="0" border="0" width="*" bordercolordark="#866f60" bordercolorlight="#fffef9">
<?
	$stmt =  "select pom, count(*) as poctik from info_stat group by pom order by poctik desc limit 1";
	if (!($result = mysql_query($stmt, $link))){
		echo "Nepodarilo sa vykonat prikaz pre ziskanie infa o najpouzivanejsom preklade";
		exit();
	}
	$row_tran = mysql_result($result, 0);
	mysql_free_result($result);

	$stmt =  "select slovicko, pom, count(*) as poctik from info_stat group by slovicko, pom order by poctik desc, slovicko asc limit 1";
	//group by slovicko, pom => zoskupi iba slovicka ktore maju rovnake pom
	//order by poctik desc, slovicko asc => zotriedi njaprv podla 'poctik' a potom podla 'slovicka' - cize ak budu dve slovicka ktore maju rovnaky 'pocitk' tak prve z tych dvoch bude to 'slovicko' ktore je skor v abecede
	if (!($result = mysql_query($stmt, $link))){
		echo "Nepodarilo sa vykonat prikaz pre ziskanie infa o najpouzivanejsom slovicku/preklade";
		exit();
	}
	$row_word = mysql_fetch_object($result);
	mysql_free_result($result);

	$stmt =  "select count(*) from info_stat";
	if (!($result = mysql_query($stmt, $link))){
		echo "Nepodarilo sa vykonat prikaz pre ziskanie infa o pocte slovicok";
		exit();
	}
	$row_count = mysql_result($result, 0);
	mysql_free_result($result);

	$what = array("Top translation mode", "Top expression", "No. of searches");
	$this = array(preklad_info($row_tran), htmlspecialchars($row_word->slovicko) . " / " . preklad_info($row_word->pom) . "&nbsp;&nbsp;&nbsp;<a href=\"info.php?request=" . urlencode($row_word->slovicko) . "&pom=$row_word->pom\" title=\"Detail info\"><img src=\"obr/arrow_right.gif\" border=\"0\"></a>", number_format($row_count,0,""," "));
	
for ($i=0; $i <= 2; $i++){
	printf("<tr>
				<td align=\"left\" style=\"padding-left:5px;padding-right:8px\" height=\"23\" width=\"300\" bgcolor=\"#ddcccc\"><span class=\"oznam\">%s</span></td>
				<td align=\"left\" style=\"padding-left:5px;padding-right:8px\" height=\"23\" width=\"*\" bgcolor=\"#f0e6e8\"><span class=\"text\"><i>%s</i></span></td>
			</tr>", $what[$i], $this[$i]);
}
?>
</table>


<!-- 			Koniec tabulky - Info/naj			-->

<br>
<br>
<br>

<span class="oznam">
	Visits for www.intrak.sk/translator: # <?echo number_format($pocitadlo_tran,0,""," ");?><br>
	Visits for www.intrak.sk/translator/stat: # <?echo number_format($pocitadlo_stat,0,""," ");?>
</span>
<br>
<br>
<br>
<table cellpadding="1" cellspacing="0" border="1" width="400" bgcolor="#b66b6b">
	<tr bgcolor="#f0e6e8" align="left">
		<td align="center" width="250" height="20"><span class="logo">Monitoring started: &nbsp;<?echo $date;?></span></td>
		<td align="center" width="150" height="20"><span class="logo"><a href="mailto:webmaster@plechotice.sk?subject=Statistics of translator" class="logo" title="Send your comments...">&#169;&nbsp;Ivan &#138tefko</a></span></td>
	</tr>
</table>
<br>
<?
if (control_ip("delete")){
echo "<br><form action=\"delete.php\"><input type=\"Submit\" value=\"Delete statistics\" style=\"background:#f0e6e8;color:#000000\" onmouseover=\"this.style.background='#b09c90';this.style.color='#fff8e0'\" onmouseout=\"this.style.background='#f0e6e8';this.style.color='#000000'\"></form>";
}
?>
</center>
</body>
</html>
