<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Obec Plechotice</title>
<META HTTP-Equiv="Content-Type" Content="text/html; charset=windows-1250">
<META HTTP-EQUIV='author' CONTENT='projected by Ivan Stefko'>
<META HTTP-EQUIV='Keywords' CONTENT='plechotice, trebisov, obec, novy ruskov, internet, sully'>
<META HTTP-EQUIV='copyright' CONTENT='© 2003, Plechotice'>
<META HTTP-EQUIV='Reply-to' CONTENT='webmaster@plechotice.sk'> 
<LINK REL="stylesheet" TYPE="text/css" HREF="../plechacik.css">	
</head>

<body>
<script>
javascript:window.print();
</script>
<?		
require_once('../setup.php');
require_once('../common.php');

	if (@!($link = mysql_pconnect($db_host, $db_user, $db_passwd))){
		exit;
	}
	if (@!mysql_select_db($db_name, $link)){
		exit;
	}

	switch ($category){
		case 1:
			$stmt = "select * from titles where locate=1";
			if (@!($result = mysql_query($stmt, $link))){
				echo "Chyba pri connecte na SQL server";	exit;
			}
			$row = mysql_fetch_object($result);
			$title_fara = $row->text;
			
			$stmt = "select * from fara_slavenie";
			if (@!($result = mysql_query($stmt, $link))){
				echo "ta more chyba";	exit;
			}
			$z = 1;
			while ($row = mysql_fetch_object($result)){
				$datum_omsa[$z] = $row->datum;
				$slavenie_omsa[$z] = $row->slavenie;
				$obetovana_omsa[$z] = $row->obetovana;
				$z++;
			}
?>
			<div class="oznamNazov" style="text-align:center;color:black;"><? echo $title_fara; ?>:</div><br>
			<table cellpadding="5" cellspacing="0" border="1" align="center" width="600" bordercolor="#000000" class="textmain" style="font-size:11px;">
				<tr style="color:black;">
					<td style="text-align:center;" width="80"><b><i>Deň</i></b></td>
					<td align="center" style="text-align:center;" width="170"><b><i>Slávenie</i></b></td>
					<td align="center" style="text-align:center;" width="100"><b><i>Obetovaná</i></b></td>
					<td align="center" style="text-align:center;" width="100"><b><i>Miesto</i></b></td>
					<td align="center" style="text-align:center;" width="50"><b><i>Čas</i></b></td>
				</tr>
				<tr>
					<td align="center"><b>Pondelok</b><br><? echo $datum_omsa[1]; ?></td>
					<td align="center"><? echo $slavenie_omsa[1]; ?></td>
					<td align="center"><? echo $obetovana_omsa[1]; ?></td>
					<td align="center"><? echo miesto_omsa(1); ?></td>
					<td align="center"><? echo cas_omsa(1); ?></td>
				</tr>
				<tr>
					<td align="center"><b>Utorok</b><br><? echo $datum_omsa[2]; ?></td>
					<td align="center"><? echo $slavenie_omsa[2]; ?></td>
					<td align="center"><? echo $obetovana_omsa[2]; ?></td>
					<td align="center"><? echo miesto_omsa(2); ?></td>
					<td align="center"><? echo cas_omsa(2); ?></td>
				</tr>
				<tr>
					<td align="center"><b>Streda</b><br><? echo $datum_omsa[3]; ?></td>
					<td align="center"><? echo $slavenie_omsa[3]; ?></td>
					<td align="center"><? echo $obetovana_omsa[3]; ?></td>
					<td align="center"><? echo miesto_omsa(3); ?></td>
					<td align="center"><? echo cas_omsa(3); ?></td>
				</tr>
				<tr>
					<td align="center"><b>Štvrtok</b><br><? echo $datum_omsa[4]; ?></td>
					<td align="center"><? echo $slavenie_omsa[4]; ?></td>
					<td align="center"><? echo $obetovana_omsa[4]; ?></td>
					<td align="center"><? echo miesto_omsa(4); ?></td>
					<td align="center"><? echo cas_omsa(4); ?></td>
				</tr>
				<tr>
					<td align="center"><b>Piatok</b><br><? echo $datum_omsa[5]; ?></td>
					<td align="center"><? echo $slavenie_omsa[5]; ?></td>
					<td align="center"><? echo $obetovana_omsa[5]; ?></td>
					<td align="center"><? echo miesto_omsa(5); ?></td>
					<td align="center"><? echo cas_omsa(5); ?></td>
				</tr>
				<tr>
					<td align="center"><b>Sobota</b><br><? echo $datum_omsa[6]; ?></td>
					<td align="center"><? echo $slavenie_omsa[6]; ?></td>
					<td align="center"><? echo $obetovana_omsa[6]; ?></td>
					<td align="center"><? echo miesto_omsa(6); ?></td>
					<td align="center"><? echo cas_omsa(6); ?></td>
				</tr>
				<tr>
					<td align="center"><b>Nedeľa</b><br><? echo $datum_omsa[7]; ?></td>
					<td align="center"><? echo $slavenie_omsa[7]; ?></td>
					<td align="center"><? echo $obetovana_omsa[7]; ?></td>
					<td align="center"><? echo miesto_omsa(7); ?></td>
					<td align="center"><? echo cas_omsa(7); ?></td>
				</tr>
			</table>
<?
			break; #case/1
	
	case 2: 
?>
<div class="oznamNazov" style="color:black;text-align:center;">VLAKOVÉ SPOJE</div><span class="small"><br><br></span>
<div align="right" class="textmain" style="font-size:10px;text-align:right;">Platnosť dát: 11.12.2005 - 9.12.2006</div>
<span class="small"><br></span>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="95%">
<tr>
	<td align="center" valign="top">
&nbsp;&nbsp;&nbsp;<span class="oznamNazov" style="color:black;">smer: Čeľovce->Košice</span><span class="small"><br><br></span>
		<table cellpadding="5" cellspacing="0" border="1" align="center" width="300" bordercolor="#000000" class="textmain" style="font-size:11px;">
			<tr style="color:black;">
				<td style="text-align:center;" width="60"><b><i>Čas (odchod)</i></b></td>
				<td align="center" style="text-align:center;" width="60"><b><i>Čas (príchod)</i></b></td>
				<td align="center" style="text-align:center;" width="*"><b><i>Poznámka</i></b></td>
			</tr>
			<tr>
				<td align="center"><b>04:54</b></td>
				<td align="center">05:31</td>
				<td align="center" style="font-size:9px;">ide od 9.1. v (1)-(6), nejde 15., 17.IV., 1.,6.V., 2.,16.IX., 18.XI</td>
			</tr>
			<tr>
				<td align="center"><b>06:30</b></td>
				<td align="center">07:07</td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center"><b>08:20</b></td>
				<td align="center">08:58</td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center"><b>10:55</b></td>
				<td align="center">11:34</td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center"><b>12:27</b></td>
				<td align="center">13:05</td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center"><b>16:36</b></td>
				<td align="center">17:13</td>
				<td align="center" style="font-size:9px;">ide do 13.IV. a od 17.IV.</td>
			</tr>
		</table>	
	</td>
	<td align="center" valign="top">
	&nbsp;&nbsp;&nbsp;<span class="oznamNazov" style="color:black;">smer: Košice->Čeľovce</span><span class="small"><br><br></span>
		<table cellpadding="5" cellspacing="0" border="1" align="center" width="300" bordercolor="#000000" class="textmain" style="font-size:11px;">
			<tr style="color:black;">
				<td style="text-align:center;" width="60"><b><i>Čas (odchod)</i></b></td>
				<td align="center" style="text-align:center;" width="60"><b><i>Čas (príchod)</i></b></td>
				<td align="center" style="text-align:center;" width="*"><b><i>Poznámka</i></b></td>
			</tr>
			<tr>
				<td align="center">10:55</td>
				<td align="center"><b>11:46</b></td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center">12:30</td>
				<td align="center"><b>13:09</b></td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center">15:15</td>
				<td align="center"><b>15:52</b></td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center">16:30</td>
				<td align="center"><b>17:06</b></td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center">18:56</td>
				<td align="center"><b>19:37</b></td>
				<td align="center" style="font-size:9px;">ide do 13.IV. a od 17.IV.</td>
			</tr>
			<tr>
				<td align="center">22:41</td>
				<td align="center"><b>23:17</b></td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
		</table>	
	</td>
</tr>
<tr>
	<td class="textmain" style="font-size:9px;">* cena cestovného lístka (Čeľovce-Košice) je 56,- Sk.<br><br><br></td>
</tr>
<tr>
	<td align="center" valign="top">
	<span class="oznamNazov" style="color:black;">smer: Čeľovce->Trebišov</span><span class="small"><br><br></span>
		<table cellpadding="5" cellspacing="0" border="1" align="center" width="300" bordercolor="#000000" class="textmain" style="font-size:11px;">
			<tr style="color:black;">
				<td style="text-align:center;" width="60"><b><i>Čas (odchod)</i></b></td>
				<td align="center" style="text-align:center;" width="60"><b><i>Čas (príchod)</i></b></td>
				<td align="center" style="text-align:center;" width="*"><b><i>Poznámka</i></b></td>
			</tr>
			<tr>
				<td align="center"><b>11:46</b></td>
				<td align="center">11:54</td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center"><b>13:10</b></td>
				<td align="center">13:17</td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center"><b>15:53</b></td>
				<td align="center">16:00</td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center"><b>17:06</b></td>
				<td align="center">17:14</td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center"><b>19:37</b></td>
				<td align="center">19:45</td>
				<td align="center" style="font-size:9px;">ide do 13.IV. a od 17.IV.</td>
			</tr>
			<tr>
				<td align="center"><b>23:17</b></td>
				<td align="center">23:24</td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
		</table>	
	</td>
	<td align="center" valign="top">
	&nbsp;&nbsp;&nbsp;<span class="oznamNazov" style="color:black">smer: Trebišov->Čeľovce</span><span class="small"><br><br></span>
		<table cellpadding="5" cellspacing="0" border="1" align="center" width="300" bordercolor="#000000" class="textmain" style="font-size:11px;">
			<tr style="color:black;">
				<td style="text-align:center;" width="60"><b><i>Čas (odchod)</i></b></td>
				<td align="center" style="text-align:center;" width="60"><b><i>Čas (príchod)</i></b></td>
				<td align="center" style="text-align:center;" width="*"><b><i>Poznámka</i></b></td>
			</tr>
			<tr>
				<td align="center">04:46</td>
				<td align="center"><b>04:53</b></td>
				<td align="center" style="font-size:9px;">ide od 9.1. v (1)-(6), nejde 15., 17.IV., 1.,6.V., 2.,16.IX., 18.XI</td>
			</tr>
			<tr>
				<td align="center">06:22</td>
				<td align="center"><b>06:29</b></td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center">08:12</td>
				<td align="center"><b>08:19</b></td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center">10:47</td>
				<td align="center"><b>10:54</b></td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center">12:19</td>
				<td align="center"><b>12:26</b></td>
				<td align="center" style="font-size:9px;">ide denne</td>
			</tr>
			<tr>
				<td align="center">16:28</td>
				<td align="center"><b>16:36</b></td>
				<td align="center" style="font-size:9px;">ide do 13.IV. a od 17.IV.</td>
			</tr>
		</table>	
	</td>
</tr>
<tr>
	<td class="textmain" style="font-size:9px;">* cena cestovného lístka (Čeľovce-Trebišov) je 12,- Sk.</td>
</tr>
</table>

<?
			break; #case/2
	}
?>
<br>
<br>
<table cellpadding="0" cellspacing="0"width="100%">
	<tr><td width="100%" height="17" valign="middle" align="center" class="copyrights" style="border:0px;">© 2004-<? echo date("Y"); ?>  <a href="mailto:webmaster@plechotice.sk" class="copyrightslink">Plechotice</a>. All Rights Reserved. Design by <span class="copyrightslink">sully</span>.</td></tr>
</table>
</body>
</html>
