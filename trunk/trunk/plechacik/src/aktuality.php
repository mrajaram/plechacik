<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td width="89" height="30" background="./imgs/main_lista_left.gif" align="center" valign="middle"><img src="./imgs/icon_aktuality.gif" width="23" height="26"></td>
		<td width="*" height="30" background="./imgs/main_lista_middle.gif" class="oznamNazov">Aktuality</td>
		<td width="84" height="30" background="./imgs/main_lista_right.gif" align="center" valign="middle">&nbsp;</td>
	</tr>
</table>

<?
if (!empty($record)){
	$stmt = "select * from aktuality where id=$record";
	if (@!($result = mysql_query($stmt, $link))){
		exit;
	}
	
	$row = mysql_fetch_object($result)
	
	?>
	
	<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td width="2" background="./imgs/main_body_left.gif"><img src="./imgs/blank.gif"></td>
		<td width="*" bgcolor="#fcfcfc" class="textmain">
			<div class="oznamNazov"><? echo $row->nazov; ?></div><br>&nbsp;&nbsp;&nbsp;&nbsp;<? echo $row->text; ?><br><br>
		</td>
		<td width="7" background="./imgs/main_body_right.gif"><img src="./imgs/blank.gif"></td>
	</tr>
</table>
	
<?
} else {
?>

<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td width="2" background="./imgs/main_body_left.gif"><img src="./imgs/blank.gif"></td>
		<td width="*" bgcolor="#fcfcfc" class="textmain"><br>
<?

$stmt = "select * from aktuality";
if (@!($result = mysql_query($stmt, $link))){
	exit;
}
$num_akt = mysql_num_rows($result);

if (empty($begin)) $begin = 0;

$pocetAkt = 5;								// tu sa nastavi kolko aktualit sa ma zobrazovat na jednu stranu

$stmt = "select * from aktuality order by id desc limit " . $begin . ", " . $pocetAkt . "";
if (@!($result = mysql_query($stmt, $link))){
	exit;
}
$pocet = mysql_num_rows($result);

/*
echo "pocet: " . $pocet;
echo "<br>num: " . $num;
*/



if ($pocet != 0){
	while ($row = mysql_fetch_object($result)){
		printf("<fieldset lang=\"sk\" class=\"aktuality\">
							<legend class=\"legenda\">&nbsp;%s&nbsp;</legend>%s<br><div align=\"right\" class=\"textmain\" style=\"text-align:right;font-size:11px;line-height:14px;\"><i>%s</i></div>
						</fieldset><br>",	$row->nazov, otvor_aktualitu(nl2br($row->text),$row->id), modifyDate($row->pridany));
	} #end while
} #end if


//---------------------------- lister zaciatok -----------------------------------------
if ($num_akt > $pocetAkt){
$pocetStran = ceil($num_akt/$pocetAkt);
$pomocneCiselko = ($pocetStran-1)*$pocetAkt;
$prem = ($begin/$pocetAkt)+1;

echo "
<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\">
	<tr>
		<td align=\"center\">";
		if ($begin > 0){
	echo "<a href=\"?menu=0&begin=0\" title=\"Na zaciatok\"><img src=\"./imgs/arrowz_la.gif\" border=\"0\" style=\"vertical-align:middle;\"></a>
				<a href=\"?menu=0&begin=" . ($begin-$pocetAkt) . "\" title=\"O " . $pocetAkt . " prispevkov dopredu\"><img src=\"./imgs/arrows_la.gif\" border=\"0\" style=\"vertical-align:middle;\"></a>";
		}
	echo "<span class=\"link\" style=\"font-size:11px\">&nbsp;";
		for ($i=1; $i<=$pocetStran; $i++){
			if ($prem == $i){
				echo "<font color=\"#FF9933\">$i</font>";
			}else {
				$xx = $i-1;
				echo "&nbsp;<a href=\"?menu=0&begin=" . ($xx*$pocetAkt) . "\" class=\"link\" style=\"font-size:11px\">" . $i . "&nbsp;</a>";
			}
		}#for/i
	echo "&nbsp;</span>";
		if ($begin != $pomocneCiselko){
	echo "<a href=\"?menu=0&begin=" . ($begin+$pocetAkt) . "\" title=\"O " . $pocetAkt . " prispevkov dozadu\"><img src=\"./imgs/arrows_ra.gif\" border=\"0\" style=\"vertical-align:middle;\"></a>
				<a href=\"?menu=0&begin=" . $pomocneCiselko . "\" title=\"Na koniec\"><img src=\"./imgs/arrowz_ra.gif\" border=\"0\" style=\"vertical-align:middle;\"></a>";
		}
	echo"
		</td>
	</tr>
</table>";
}#if/num
//---------------------------- lister koniec -----------------------------------------

?>		
			<br>
		</td>
		<td width="7" background="./imgs/main_body_right.gif"><img src="./imgs/blank.gif"></td>
	</tr>
</table>

<?
} #if/$record - ci je otvorena aktualita
?>

<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td width="5" height="10" background="./imgs/main_bottom_left.gif"><img src="./imgs/blank.gif"></td>
		<td width="*" height="10" background="./imgs/main_bottom_middle.gif"><img src="./imgs/blank.gif"></td>
		<td width="10" height="10" background="./imgs/main_bottom_right.gif"><img src="./imgs/blank.gif"></td>
	</tr>
</table>
