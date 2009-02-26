<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Obec Plechotice</title>
<META HTTP-Equiv="Content-Type" Content="text/html; charset=windows-1250">
<META HTTP-EQUIV='author' CONTENT='projected by Ivan Stefko'>
<META HTTP-EQUIV='Keywords' CONTENT='plechotice, trebisov, obec, novy ruskov, internet, sully'>
<META HTTP-EQUIV='copyright' CONTENT='(c) 2003, Plechotice'>
<META HTTP-EQUIV='Reply-to' CONTENT='webmaster@plechotice.sk'> 
<LINK REL="stylesheet" TYPE="text/css" HREF="./plechacik.css">
<script language="JavaScript">
function showTranslator(width, height)
{
window.open("./slovnik/index.php","","toolbar=no,status=no,width=" + width + ",height=" + height);
}
</script>
</head>

<?
if(isset($HTTP_X_FORWARDED_FOR)) $REMOTE_ADDR=$HTTP_X_FORWARDED_FOR;
	$ipaddress = $REMOTE_ADDR;

if (empty($menu))
	$menu = 0;

require_once("./common.php");

$arr_spam = array("10.10.10.246");

if (in_array($ipaddress, $arr_spam)){
	echo "Tvoje prispevky v knihe navstev porusili kodex etickeho spravania. Pristup na tuto stranku ti bude zamietnuty!"; 
	echo "<br/><br/>";
	exit;
}

?>
<body bottommargin="0" leftmargin="0" topmargin="0" rightmargin="0" marginheight="0" marginwidth="0" onload="JavaScript:preload()" bgcolor="#ffffff">

<div id="textInLoad" style="position:absolute;top:50%;left:42%"></div><script language=javascript>textInLoad.innerHTML="<DIV style='border:1px solid black;background-color:#E8EDFA;padding:10px;position:absolute;top:50%;left:36%;font-family:verdana;font-size:8pt'><center><b style='font-weight:bold;font-size:7pt;'>Plechotice.sk</b><br>Stránka&nbsp;sa&nbsp;načítava&nbsp;...<br><img src=./imgs/loading.gif></center></div>"</script>

<!-- hlavna tabulka - jeden riadok/jeden stlpec - zaciatok -->
<table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%">
	<tr>
		<td width="100%" height="135"><? require_once("./top.php"); ?></td>
	</tr>
	<tr>
		<td width="100%" height="100%">

<table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%">
	<tr>
		<td width="200" valign="top">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td width="100%" height="30" align="center">
						<table cellpadding="0" cellspacing="0" border="0" width="176">
							<tr>
								<td width="176" height="30"><br><img src="./imgs/vertical_menu.gif"></td>
							</tr>
							<tr>
								<td background="./imgs/back_table.gif" width="176" height="*" valign="top">
									<span class="small"><br><br></span>&nbsp;&nbsp;<? echo colorArrow(0); ?>&nbsp;<a href="?menu=0" class="menu">Domov</a>
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(6); ?>&nbsp;<a href="?menu=6" class="menu">Futbalový klub</a>
<!-- 									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(8); ?>&nbsp;<a href="?menu=8" class="menu">Statisticke udaje</a> -->
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(12); ?>&nbsp;<a href="?menu=12" class="menu">Mapa umiestnenia</a>
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(17); ?>&nbsp;<a href="?menu=17" class="menu">Letecká snímka</a>
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(9); ?>&nbsp;<a href="?menu=9" class="menu">Fotogaléria</a>
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(111); ?>&nbsp;<a href="http://www.plechotice.sk/chat/" class="menu" target="_blank">Chat</a>
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(14); ?>&nbsp;<a href="?menu=14" class="menu">Dôležité kontakty</a>
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(18); ?>&nbsp;<a href="http://www.zsplechotice.edupage.org" class="menu" target="_blank">Škola(y)</a>
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(19); ?>&nbsp;<a href="http://www.ruskov.net/" class="menu" target="_blank">Internetová sieť</a>
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(16); ?>&nbsp;<a href="?menu=16" class="menu">Spoje</a>
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(15); ?>&nbsp;<a href="?menu=15" class="menu">Divadlo</a>
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(10); ?>&nbsp;<a href="?menu=10" class="menu">Samospráva</a>
							<tr>
								<td background="./imgs/back_table.gif" align="center" width="176" height="*"><span class="small"><br><br></span><img src="./imgs/ciara_menu.gif"><span class="small"><br><br></span></td>
							</tr>
							<tr>
								<td background="./imgs/back_table.gif" width="176" height="*">
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(7); ?>&nbsp;<a href="?menu=7" class="menu">Zaujímavé www</a>
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(13); ?>&nbsp;<a href="?menu=13" class="menu">Spravodajstvo</a>
									<? if (control_ip("intranet") || control_ip("admin")){ ?>
									<span class="small"><br></span>&nbsp;&nbsp;<? echo colorArrow(11); ?>&nbsp;<a href="JavaScript:showTranslator('650','370')" class="menu">Slovník</a><span class="small"><br><br></span>
									<? } ?>
								</td>
							</tr>
							<tr>
								<td width="176"><img src="./imgs/bottom_table.gif"><br><br></td>
							</tr>
						</table>
						<table cellpadding="0" cellspacing="0" border="0" width="176">
							<tr>
								<td width="176" height="30"><img src="./imgs/info.gif"></td>
							</tr>
							<tr>
								<td background="./imgs/back_table.gif" width="176" height="100" class="texttable"><? echo "Dnes je " . datumik(); ?><br>Meniny má: <?echo "<i>" . meniny(date("n"), date("j")) . "</i>";?><br><br><div class="send"><a href="http://www.pohladnice.sk" class="send" title="Pošli pohľadnicu" target="_blank">pošli <? echo slovko(meniny(date("n"), date("j"))); ?> pohľadnicu</a></div></td>
							</tr>
							<tr>
								<td width="176"><img src="./imgs/bottom_table.gif"><br><br></td>
							</tr>
						</table>
						<table cellpadding="0" cellspacing="0" border="0" width="176">
							<tr>
								<td width="176" height="30"><img src="./imgs/lista_anketa.gif"></td>
							</tr>
							<tr>
								<? require_once("./src/anketa.php"); ?>
							</tr>
							<tr>
								<td width="176"><img src="./imgs/bottom_table.gif"><br><br></td>
							</tr>
						</table> 
						<table cellpadding="0" cellspacing="0" border="0" width="176">
							<tr>
								<td width="176" height="30"><img src="./imgs/lista_odpad.gif"></td>
							</tr>
							<tr>
								<td background="./imgs/back_table.gif"><? require_once("./src/kalendar.php"); ?></td>
							</tr>
							<tr>
								<td width="176"><img src="./imgs/bottom_table.gif"><br><br></td>
							</tr>
						</table> 
					</td>
				</tr>
			</table>
		</td>
		<td width="2" height="*" valign="top" background="./imgs/bodka.gif"><img src="./imgs/blank.gif"></td>
<?
//-----------------------------  Zaciatok body  ---------------------------
echo "<td width=\"*\" valign=\"top\">";

	switch ($menu){
		case 0: $fn = "body_uvod.php"; break;
		case 1: $fn = "body_history.php"; break; 
		case 2: $fn = "body_oznamy.php"; break;
		case 3: $fn = "body_fara.php"; break;
		case 4: $fn = "body_gb.php"; break;
		case 5: $fn = "body_kontakt.php"; break;
//		case 6: $fn = "body_sport_temp.php"; break;
		case 6: $fn = "body_sport_temp.php"; break;
		case 7: $fn = "body_www.php"; break;
		case 8: $fn = "body_stat.php"; break;
		case 9: $fn = "body_foto.php"; break;
		case 10: $fn = "body_thanks.php"; break;
		case 12: $fn = "body_mapa.php"; break;
		case 13: $fn = "body_spravy.php"; break;
		case 14: $fn = "body_dol_kontakt.php"; break;
		case 15: $fn = "body_divadlo.php"; break;
		case 16: $fn = "body_spoje.php"; break;
		case 17: $fn = "body_snimka.php"; break;
		default : $fn = "body_error.php";
	}



	require_once($fn);
echo "</td>";

//-----------------------------  Koniec body  ---------------------------
?>
</tr>
</table>

	</td>
</tr>
<tr>	
	<td height="17" width="100%">
<?
require_once("./bottom.php");
?>

		</td>																			<!-- koniec hlavnej tabulky -->
	</tr>
</table>
<script language=javascript>textInLoad.style.display="none"</script>
<?
//echo $ipaddress;
?>
</body>
</html>
