<?
require_once("../setup.php");
require_once("../common.php");
?>
<br>
<div align="center" class="cisla">EDITUJ ÈAS sv. OMŠÍ</div>
<br>
<br>

<?php

if ($zapis){
	if (empty($obet_pon)) $obet_pon = "-";
	$stmt = "UPDATE fara_slavenie SET slavenie='$slav_pon', datum='$dat_pon', obetovana='$obet_pon' WHERE id=1";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba/pondelok";	exit;
	}

	if (empty($obet_uto)) $obet_uto = "-";
	$stmt = "UPDATE fara_slavenie SET slavenie='$slav_uto', datum='$dat_uto', obetovana='$obet_uto' WHERE id=2";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba/utorok";	exit;
	}

	if (empty($obet_str)) $obet_str = "-";
	$stmt = "UPDATE fara_slavenie SET slavenie='$slav_str', datum='$dat_str', obetovana='$obet_str' WHERE id=3";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba/streda";	exit;
	}

	if (empty($obet_stv)) $obet_stv = "-";
	$stmt = "UPDATE fara_slavenie SET slavenie='$slav_stv', datum='$dat_stv', obetovana='$obet_stv' WHERE id=4";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba/stvrtok";	exit;
	}
	
	if (empty($obet_pia)) $obet_pia = "-";
	$stmt = "UPDATE fara_slavenie SET slavenie='$slav_pia', datum='$dat_pia', obetovana='$obet_pia' WHERE id=5";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba/piatok";	exit;
	}

	if (empty($obet_sob)) $obet_sob = "-";
	$stmt = "UPDATE fara_slavenie SET slavenie='$slav_sob', datum='$dat_sob', obetovana='$obet_sob' WHERE id=6";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba/sobota";	exit;
	}

	if (empty($obet_ned)) $obet_ned = "-";
	$stmt = "UPDATE fara_slavenie SET slavenie='$slav_ned', datum='$dat_ned', obetovana='$obet_ned' WHERE id=7";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba/nedela";	exit;
	}
	
	$stmt = "UPDATE titles SET text='$title_fara' WHERE locate=1";
//	echo $stmt;
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba/nedela";	exit;
	}
	
	
	echo "<div class=\"cisla\" align=\"center\"><br><br><br>Údaje boli úspešne zmenené<br><br><br></div>";

}else{

  if(!(@$link=mysql_pconnect($db_host,$db_user,$db_passwd))) {
    echo "Server problems, try to log in later."; exit;
  }
  if(!@mysql_select_db($db_name,$link)){
    echo "Server problems, try to log in later."; exit;
  }
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

	$stmt = "select * from titles where locate=1";
	if (@!($result = mysql_query($stmt, $link))){
		echo "Chyba pri connecte na SQL server";	exit;
	}
	$row = mysql_fetch_object($result);
	$title_fara = $row->text;
	
?>

<form action="?action=8" method="post">

<div align="center"><input type="text" name="title_fara" value="<? echo $title_fara; ?>" style="width:450px"></div><br>
<table cellpadding="0" cellspacing="5" border="0" align="center" width="450" bgcolor="#ECF1FB">
	<tr>
		<td class="textmain" style="text-align:center;" width="70"><b><i>Ïen</i></b></td>
		<td align="center" class="textmain" style="text-align:center;" width="100"><b><i>Dátum</i></b></td>
		<td align="center" class="textmain" style="text-align:center;" width="230"><b><i>Slávenie</i></b></td>
		<td align="center" class="textmain" style="text-align:center;" width="180"><b><i>Obetovaná za</i></b></td>
	</tr>
	<tr>
		<td align="right" class="textmain" style="text-align:right;"><b>Pondelok:</b></td>
		<td align="right"><input type="text" name="dat_pon" value="<? echo $datum_omsa[1]; ?>" style="width:100px"></td>
		<td align="right"><input type="text" name="slav_pon" value="<? echo $slavenie_omsa[1]; ?>" style="width:250px"></td>
		<td align="right"><input type="text" name="obet_pon" value="<? echo $obetovana_omsa[1]; ?>" style="width:180px"></td>
	</tr>
	<tr>
		<td align="right" class="textmain" style="text-align:right;"><b>Utorok:</b></td>
		<td align="right"><input type="text" name="dat_uto" value="<? echo $datum_omsa[2]; ?>" style="width:100px"></td>
		<td align="right"><input type="text" name="slav_uto" value="<? echo $slavenie_omsa[2]; ?>" style="width:250px"></td>
		<td align="right"><input type="text" name="obet_uto" value="<? echo $obetovana_omsa[2]; ?>" style="width:180px"></td>		
	</tr>
	<tr>
		<td align="right" class="textmain" style="text-align:right;"><b>Streda:</b></td>
		<td align="right"><input type="text" name="dat_str" value="<? echo $datum_omsa[3]; ?>" style="width:100px"></td>
		<td align="right"><input type="text" name="slav_str" value="<? echo $slavenie_omsa[3]; ?>" style="width:250px"></td>
		<td align="right"><input type="text" name="obet_str" value="<? echo $obetovana_omsa[3]; ?>" style="width:180px"></td>		
	</tr>
	<tr>
		<td align="right" class="textmain" style="text-align:right;"><b>Štvrtok:</b></td>
		<td align="right"><input type="text" name="dat_stv" value="<? echo $datum_omsa[4]; ?>" style="width:100px"></td>
		<td align="right"><input type="text" name="slav_stv" value="<? echo $slavenie_omsa[4]; ?>" style="width:250px"></td>
		<td align="right"><input type="text" name="obet_stv" value="<? echo $obetovana_omsa[4]; ?>" style="width:180px"></td>		
	</tr>
	<tr>
		<td align="right" class="textmain" style="text-align:right;"><b>Piatok:</b></td>
		<td align="right"><input type="text" name="dat_pia" value="<? echo $datum_omsa[5]; ?>" style="width:100px"></td>
		<td align="right"><input type="text" name="slav_pia" value="<? echo $slavenie_omsa[5]; ?>" style="width:250px"></td>
		<td align="right"><input type="text" name="obet_pia" value="<? echo $obetovana_omsa[5]; ?>" style="width:180px"></td>		
	</tr>
	<tr>
		<td align="right" class="textmain" style="text-align:right;"><b>Sobota:</b></td>
		<td align="right"><input type="text" name="dat_sob" value="<? echo $datum_omsa[6]; ?>" style="width:100px"></td>
		<td align="right"><input type="text" name="slav_sob" value="<? echo $slavenie_omsa[6]; ?>" style="width:250px"></td>
		<td align="right"><input type="text" name="obet_sob" value="<? echo $obetovana_omsa[6]; ?>" style="width:180px"></td>
	</tr>
	<tr>
		<td align="right" class="textmain" style="text-align:right;"><b>Nede¾a:</b></td>
		<td align="right"><input type="text" name="dat_ned" value="<? echo $datum_omsa[7]; ?>" style="width:100px"></td>
		<td align="right"><input type="text" name="slav_ned" value="<? echo $slavenie_omsa[7]; ?>" style="width:250px"></td>
		<td align="right"><input type="text" name="obet_ned" value="<? echo $obetovana_omsa[7]; ?>" style="width:180px"></td>		
	</tr>
	<tr>
		<td width="*" colspan="4" align="center"><br><input type="Submit" value="Ulož údaje"  style="width:115px" style="background:#D6E0F5;color:#003399" onmouseover="this.style.background='#6285df';this.style.color='#FFFFFF'" onmouseout="this.style.background='#D6E0F5';this.style.color='#003399'"></td>
	</tr>
</table>
<input type="Hidden" name="zapis" value="1">
</form>

<?php
} #else
?>

<br>
<br>

<?
//-------------------------------------------------------------------------------------------
if ($zapis_omsa){
	$stmt = "INSERT INTO fara_omse SET den='$den', miesto='$miesto', cas='$cas'";
	if (@!($result = mysql_query($stmt, $link))){
		echo "chyba pri inserte do fara_omse";	exit;
	}
}
//------------------------------------------------------------------------------------------
if ($delete){
	$stmt = "delete from fara_omse where id='$id'";
	if (@!mysql_query($stmt, $link)){
		echo "ta more chyba";	exit;
	}
}
//-----------------------------------------------------------------------------------------

$stmt = "SELECT * FROM fara_omse order by den asc";
if (@!($result = mysql_query($stmt, $link))){
	echo "chyba - select fara_omse";	exit;
}
$num = mysql_num_rows($result);
if ($num > 0) {
	$j = 0;
	echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"450\" align=\"center\" class=\"textmain\">";
	while ($row = mysql_fetch_object($result)){
		printf("<tr>
							<td width=\"100\" height=\"30\">%s</td>
							<td width=\"*\" height=\"30\">%s</td>
							<td width=\"100\" height=\"30\">%s</td>
							<td width=\"30\"><a href=\"?action=8&delete=1&id=%s\"><img src=\"../imgs/delete.gif\" border=\"0\" title=\"Zmazat tuto omsu\"></a></td>
						</tr>", vrat_den($row->den), vrat_miesto($row->miesto), $row->cas, $row->id);
	}
	echo "</table>";
}
?>

<form action="?action=8" method="post">
<table cellpadding="0" cellspacing="0" border="0" width="450" align="center" class="textmain" bgcolor="#ECF1FB">
	<tr>
		<td><b><i>Deò</i></b></td>
		<td><b><i>Miesto</i></b></td>
		<td><b><i>Èas</i></b></td>
	</tr>
	<tr>
		<td>
			<select name="den" style="width:100px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'">
				<option value="1">Pondelok</option>
				<option value="2">Utorok</option>
				<option value="3">Streda</option>
				<option value="4">Štvrtok</option>
				<option value="5">Piatok</option>
				<option value="6">Sobota</option>
				<option value="7">Nede¾a</option>
			</select>
		</td>
		<td>
			<select name="miesto" style="width:100px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'">
				<option value="1">Plechotice</option>
				<option value="2">Egreš</option>
				<option value="3">Èe¾ovce</option>
			</select>
		</td>
		<td>
			<input type="text" name="cas" style="width:100px">
		</td>
		<td>&nbsp;</td>
		<td><input type="Submit" value="Pridaj sv.Omšu"  style="width:115px" style="background:#D6E0F5;color:#003399" onmouseover="this.style.background='#6285df';this.style.color='#FFFFFF'" onmouseout="this.style.background='#D6E0F5';this.style.color='#003399'"></td>
	</tr>
</table>
<input type="Hidden" name="zapis_omsa" value="1">
</form>
<br>
<br>

