<div align="center" class="cisla">EDITUJ/ZMAŽ PRÍSPEVKY V KNIHE NÁVŠTEV</div>
<br>
<br>

<?

//-------------------- editovanie prispevkov ----------------------------

if ($zmaz){
	$stmt = "delete from gb where id='$record'";
	if (@!mysql_query($stmt, $link)){
		echo "ta more chyba";	exit;
	}
}
//------------------------
if ($uprav){
	$stmt = "select * from gb where id='$record'";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba1";	exit;
	}
	
	$row = mysql_fetch_object($result);
	
	echo "
			<form action=\"?action=$action&begin=$begin\" method=\"post\">
				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">
					<tr>
						<td class=\"textmain\"><b>Autor:&nbsp;&nbsp;</b><input type=\"Text\" name=\"od\" style=\"width:125px\" onFocus=\"this.style.background='#FFFFFF'; this.style.color='#000000'\" onBlur=\"this.style.background='#FcFcFc'; this.style.color='#000000'\" value=\"" . $row->od . "\"></td>
					</tr>
					<tr>
						<td class=\"textmain\"><b>Príspevok:</b><br><textarea cols=\"100\" rows=\"8\" name=\"text\" onFocus=\"this.style.background='#FFFFFF'; this.style.color='#000000'\" onBlur=\"this.style.background='#FcFcFc'; this.style.color='#000000'\">" . $row->text . "</textarea></td>
					</tr>
					<tr>
						<td width=\"*\"><br><input type=\"Submit\" value=\"Uprav prispevok\"  style=\"width:120px\" style=\"background:#D6E0F5;color:#003399\" onmouseover=\"this.style.background='#6285df';this.style.color='#FFFFFF'\" onmouseout=\"this.style.background='#D6E0F5';this.style.color='#003399'\"><br><br></td>
					</tr>
					<tr>
						<td width=\"100%\" height=\"25\" background=\"../imgs/h_dot_line.gif\" align=\"right\" class=\"small\" colspan=\"2\"><a href=\"javascript:scroll(0,0)\"><img src=\"../imgs/back_top.gif\" width=\"11\" height=\"11\" border=\"0\" alt=\"Spat na vrch\" align=\"absmiddle\"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
				</table>
			<input type=\"Hidden\" name=\"id\" value=\"" . $row->id . "\">
			<input type=\"Hidden\" name=\"uprav_gb\" value=\"1\">
			</form>
	";
	
}
//---------------------------
if ($uprav_gb){
$stmt = "update gb SET text='$text', od='$od' where id='$id'";
	if (@!mysql_query($stmt, $link)){
		echo "ta more chyba1";	exit;
	}

}
//-----------------------------------------------------------------------

$stmt = "select * from gb";
if (@!($result = mysql_query($stmt, $link))){
	exit;
}
$num = mysql_num_rows($result);

if (empty($begin)) $begin = 0;

$pocetPrispevkov = 30;		// tu sa nastavi kolko prispevkov sa ma zobrazovat na jednu stranu

$listerPom = 10;

$stmt = "select * from gb order by id desc limit " . $begin . ", " . $pocetPrispevkov . "";
if (@!($result = mysql_query($stmt, $link))){
	exit;
}

$pocet = mysql_num_rows($result);
/*
echo "pocet: " . $pocet;
echo "<br>num: " . $num;
*/
//------------------------
if ($num > $pocetPrispevkov){
$pocetStran = ceil($num/$pocetPrispevkov);
$pomocneCiselko = ($pocetStran-1)*$pocetPrispevkov;
$prem = ($begin/$pocetPrispevkov)+1;

echo "
<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\">
	<tr>
		<td align=\"center\">";
		if ($begin > 0){
	echo "<a href=\"?action=$action&begin=0\" title=\"Na zaciatok\"><img src=\"../imgs/arrowz_l.gif\" border=\"0\"></a>&nbsp;
				<a href=\"?action=$action&begin=" . ($begin-$pocetPrispevkov) . "\" title=\"O " . $pocetPrispevkov . " prispevkov dopredu\"><img src=\"../imgs/arrows_l.gif\" border=\"0\"></a>";
		}
	echo "<span class=\"cisla\">&nbsp;";
		for ($i=1; $i<=$pocetStran; $i++){
			if ($i <= $listerPom){
				if ($prem == $i){
					echo "<font color=\"#003399\">[$i]</font>";
				}else {
					$xx = $i-1;
					echo "&nbsp;<a href=\"?action=$action&begin=" . ($xx*$pocetPrispevkov) . "\" class=\"cisla\">" . $i . "&nbsp;</a>";
				}
			}else{
				if ($i == $listerPom+1){
					echo "<font color=\"#000000\">&nbsp;...&nbsp;</font>";
				}else{
					if ($prem == $i){
						echo "<font color=\"#003399\">&nbsp;[$i]&nbsp;</font>";
					}
				}
			}
		}#for/i
	echo "&nbsp;</span>";
		if ($begin != $pomocneCiselko){
	echo "<a href=\"?action=$action&begin=" . ($begin+$pocetPrispevkov) . "\" title=\"O " . $pocetPrispevkov . " prispevkov dozadu\"><img src=\"../imgs/arrows_r.gif\" border=\"0\"></a>&nbsp;
				<a href=\"?action=$action&begin=" . $pomocneCiselko . "\" title=\"Na koniec\"><img src=\"../imgs/arrowz_r.gif\" border=\"0\"></a>";
		}
	echo"
		</td>
	</tr>
</table>";
}#if/num

//------------------------

$j = 0;
if ($pocet != 0){
	while ($row = mysql_fetch_object($result)){
	$j++;
		echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"85%\" align=\"center\">";
		printf("<tr>
							<td width=\"89\" height=\"30\" background=\"../imgs/main_lista_left.gif\" align=\"right\" valign=\"top\"><img src=\"../imgs/icon_gb.gif\" width=\"23\" height=\"24\" title=\"%s\"></td>
							<td width=\"*\" height=\"30\" background=\"../imgs/main_lista_middle.gif\" class=\"textmain\" style=\"padding: 4px 0px 0px 10px;color:#000000;\"><b>Od: </b>%s%s%s</td>
							<td width=\"84\" height=\"30\" background=\"../imgs/main_lista_right.gif\" align=\"center\" class=\"textmain\" style=\"padding: 0px 0px 0px 0px;color:#000000;\" valign=\"middle\">&nbsp;</td>
						</tr>",$row->ip, $row->od . ",&nbsp;", $row->datum, edit_gb($row->id, $action, $begin));
		echo "</table>";
		
		echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"85%\" align=\"center\">";
		printf("<tr>
							<td width=\"2\" background=\"../imgs/main_body_left.gif\"><img src=\"../imgs/blank.gif\"></td>
							<td width=\"*\" bgcolor=\"#FFFFF0\" class=\"textmain\">%s</td>
							<td width=\"7\" background=\"../imgs/main_body_right.gif\"><img src=\"../imgs/blank.gif\"></td>
						</tr>", nl2br($row->text));
		echo "</table>";
		
		echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"85%\" align=\"center\">
						<tr>
							<td width=\"5\" height=\"9\" background=\"../imgs/main_bottom_left.gif\"><img src=\"../imgs/blank.gif\"></td>
							<td width=\"*\" height=\"9\" background=\"../imgs/main_bottom_middle.gif\"><img src=\"../imgs/blank.gif\"></td>
							<td width=\"10\" height=\"9\" background=\"../imgs/main_bottom_right.gif\"><img src=\"../imgs/blank.gif\"></td>
						</tr>
					</table><br>";
	}#end while
} #end if
?>
<br>
<?
if ($num > $pocetPrispevkov){
$pocetStran = ceil($num/$pocetPrispevkov);
$pomocneCiselko = ($pocetStran-1)*$pocetPrispevkov;
$prem = ($begin/$pocetPrispevkov)+1;

echo "
<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\">
	<tr>
		<td align=\"center\">";
		if ($begin > 0){
	echo "<a href=\"?action=$action&begin=0\" title=\"Na zaciatok\"><img src=\"../imgs/arrowz_l.gif\" border=\"0\"></a>&nbsp;
				<a href=\"?action=$action&begin=" . ($begin-$pocetPrispevkov) . "\" title=\"O " . $pocetPrispevkov . " prispevkov dopredu\"><img src=\"../imgs/arrows_l.gif\" border=\"0\"></a>";
		}
	echo "<span class=\"cisla\">&nbsp;";
		for ($i=1; $i<=$pocetStran; $i++){
			if ($i <= $listerPom){
				if ($prem == $i){
					echo "<font color=\"#003399\">[$i]</font>";
				}else {
					$xx = $i-1;
					echo "&nbsp;<a href=\"?action=$action&begin=" . ($xx*$pocetPrispevkov) . "\" class=\"cisla\">" . $i . "&nbsp;</a>";
				}
			}else{
				if ($i == $listerPom+1){
					echo "<font color=\"#000000\">&nbsp;...&nbsp;</font>";
				}else{
					if ($prem == $i){
						echo "<font color=\"#003399\">&nbsp;[$i]&nbsp;</font>";
					}
				}
			}
		}#for/i
	echo "&nbsp;</span>";
		if ($begin != $pomocneCiselko){
	echo "<a href=\"?action=$action&begin=" . ($begin+$pocetPrispevkov) . "\" title=\"O " . $pocetPrispevkov . " prispevkov dozadu\"><img src=\"../imgs/arrows_r.gif\" border=\"0\"></a>&nbsp;
				<a href=\"?action=$action&begin=" . $pomocneCiselko . "\" title=\"Na koniec\"><img src=\"../imgs/arrowz_r.gif\" border=\"0\"></a>";
		}
	echo"
		</td>
	</tr>
</table>
<br>
<br>";

mysql_free_result($result);

}#if/num

?>