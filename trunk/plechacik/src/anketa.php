<script language="JavaScript">
function vote()
{
window.open("./src/anketa_send.php","","toolbar=no,status=no,width=460,height=270");
}
</script>
<?
require_once('./setup.php');
if(isset($HTTP_X_FORWARDED_FOR)) $REMOTE_ADDR=$HTTP_X_FORWARDED_FOR;
	$ip_address = $REMOTE_ADDR;

if (@!($link = mysql_pconnect($db_host, $db_user, $db_passwd))){
	exit;
}
if (@!mysql_select_db($db_name, $link)){
	exit;
}

if (@!($link = mysql_pconnect($db_host, $db_user, $db_passwd))){
	exit;
}
if (@!mysql_select_db($db_name, $link)){
	exit;
}
//----------------- hlasovanie - zaciatok --------------------------------------
if (!empty($hlas)){
	$stlpecPocet = array(1=>"pocet_1", "pocet_2", "pocet_3", "pocet_4");
	$stmt = "select " . $stlpecPocet[$hlas] . " from anketa where id='" . $id . "'";
	if (@!($result = mysql_query($stmt, $link))){
		exit;
	}
	$row = mysql_fetch_array($result);
	$pocetHlasov = $row[0];
	$pocetHlasov++;
	
	$stmt = "update anketa SET " . $stlpecPocet[$hlas] . "='" . $pocetHlasov . "' where id='" . $id . "'";
	if (@!mysql_query($stmt, $link)){
		exit;
	}
	
	$stmt = "insert into ip_no SET ip_address = '" . $ip_address . "', id_anketa = '" . $id . "'"; 
	if (@!mysql_query($stmt, $link)){
		exit;
	}
}
//----------------- hlasovanie - koniec --------------------------------------
//----------------- zistenie aktualnej ankety - zaciatok ---------------------
$currentDate = date("Y-m-d");
$stmt = "select id, platnost_od, platnost_do from anketa";
if (@!($result = mysql_query($stmt, $link))){
	exit;
}
$celkovyPocet = mysql_num_rows($result);

if ($celkovyPocet != 0){
	while ($row = mysql_fetch_object($result)){
		if ($currentDate>=$row->platnost_od && $currentDate<=$row->platnost_do){
			$id = $row->id;
			$numPom = 1;
		}else $num = 0;
	}
	$num = $numPom;
//----------------- zistenie aktualnej ankety - koniec ---------------------
	if ($num != 0){
		$stmt = "select * from anketa where id='" . $id . "'";
		if (@!($result = mysql_query($stmt, $link))){
			exit;
		}
		$num = mysql_num_rows($result);
	}else{$num = 0;}
}else{#if/celkovyPocet
	$num = 0;
}

if ($num != 0){

$row = mysql_fetch_object($result);
$id = $row->id;

$count_ip = 0;
$stmt = "select * from ip_no where ip_address = '" . $ip_address . "' and id_anketa = " . $id . "";
if (@!($result_ip = mysql_query($stmt, $link))){
	exit;
}
$count_ip = mysql_num_rows($result_ip);

$farba = array(1=>"./imgs/anketa_red.gif", "./imgs/anketa_green.gif", "./imgs/anketa_yellow.gif", "./imgs/anketa_orange.gif");
$pocetOdp = array(1=>$row->pocet_1, $row->pocet_2, $row->pocet_3, $row->pocet_4);
$odpovede = array(1=>$row->odpoved_1, $row->odpoved_2, $row->odpoved_3, $row->odpoved_4);
$max = max($pocetOdp);
$sum = array_sum($pocetOdp);

if ($max != 0) $konst = 100/$max;
else $konst = 0;
echo "<td background=\"./imgs/back_table.gif\" width=\"176\" height=\"*\"><div class=\"anketa\">" . $row->otazka . "</div><span class=\"small\"><br></span>";

for ($i=1; $i<=4; $i++){
	if ($count_ip > 0) {	
		echo "<div class=\"odpovede\">" . $odpovede[$i] . "<br>";
		echo "<img src=\"" . $farba[$i] . "\" align=\"absmiddle\" width=\"" . ceil($pocetOdp[$i]*$konst+2) . "\" height=\"6\" border=\"0\">";	
	} else {
		echo "<div class=\"odpovede\"><a href=\"?menu=" . $menu . "&hlas=" . $i . "&id=" . $id . "\" class=\"odpovede\">" . $odpovede[$i] . "</a><br>";
		echo "<a href=\"?menu=" . $menu . "&hlas=" . $i . "&id=" . $id . "\" class=\"odpovede\"><img src=\"" . $farba[$i] . "\" align=\"absmiddle\" width=\"" . ceil($pocetOdp[$i]*$konst+2) . "\" height=\"6\" border=\"0\"></a>";
	}
//  echo "&nbsp;&nbsp;";
  echo "<span class=\"poll\">[".@round($pocetOdp[$i]/$sum*100)."%]</span><span class=\"small\">&nbsp;</span></div>";
}
echo "<span class=\"small\"><br><br><br></span><div class=\"odpovede\">Po�et hlasuj�cich: $sum</div>&nbsp;<span class=\"send\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"JavaScript:vote()\" class=\"send\" title=\"Posla� ot�zku do ankety...\">Va�a ot�zka...</a></span><span class=\"small\"><br><br></span></td>";

} else {	#if/num
echo "<td background=\"./imgs/back_table.gif\" width=\"176\" height=\"*\">
				<br><br><div class=\"send\" style=\"padding-left:5px;padding-right:8px\"><a href=\"JavaScript:vote()\" class=\"send\">Do�li mi n�pady na ot�zky. Ak m�te nejak� po�lite mi ich. </a><br><br><a href=\"JavaScript:vote()\" class=\"send\">V�aka, webmaster </a>&nbsp;<img src=\"./imgs/smiles/wink.gif\"></div><br><br>
			</td>";
}
?>