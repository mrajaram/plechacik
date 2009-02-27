<br>
<div align="center" class="cisla">EDITUJ/ZMAé ANKETU</div>
<br>
<br>
<?	
require_once('../setup.php');

if(!(@$link=mysql_pconnect($db_host,$db_user,$db_passwd))) {
    echo "Server problems, try to log in later."; exit;
  }
  if(!@mysql_select_db($db_name,$link)){
    echo "Server problems, try to log in later."; exit;
  }
//-------------------------------------------------------

if ($delete){
	$stmt = "delete from anketa where id='$id'";
	if (@!mysql_query($stmt, $link)){
		echo "ta more chyba";	exit;
	}
}
//-------------------------------------------------------
if ($uprav){
	$stmt = "update anketa SET otazka='$otazka', odpoved_1='$odpoved_1', odpoved_2='$odpoved_2', odpoved_3='$odpoved_3', odpoved_4='$odpoved_4', platnost_od='$platnost_od', platnost_do='$platnost_do' where id='$id'";
	if (@!mysql_query($stmt, $link)){
		echo "ta more chyba";	exit;
	}
}
//-------------------------------------------------------
$stmt = "select * from anketa order by id desc";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba";	exit;
	}
$pocetAnkiet = mysql_num_rows($result);	

if ($pocetAnkiet>0){
	while ($row = mysql_fetch_object($result)){
		echo "
			<form action=\"?action=4\" method=\"post\" name=\"formanketa\">
				<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">
					<tr>
						<td class=\"textmain\" width=\"130\"><div align=\"right\"><b>Ot·zka:&nbsp;&nbsp;</b></div></td><td width=\"*\"><input type=\"Text\" value=\"" . $row->otazka . "\" name=\"otazka\" style=\"width:300px\" onFocus=\"this.style.background='#FFFFFF'; this.style.color='#000000'\" onBlur=\"this.style.background='#FcFcFc'; this.style.color='#000000'\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"?action=4&delete=1&id=" . $row->id . "\"><img src=\"../imgs/delete.gif\" border=\"0\" title=\"Zmazat tuto anketu\"></a></td>
					</tr>
					<tr>
						<td class=\"textmain\" width=\"130\"><div align=\"right\"><b>OdpoveÔ Ë. 1:&nbsp;&nbsp;</b></div></td><td width=\"*\"><input type=\"Text\" value=\"" . $row->odpoved_1 . "\" name=\"odpoved_1\" style=\"width:170px\" onFocus=\"this.style.background='#FFFFFF'; this.style.color='#000000'\" onBlur=\"this.style.background='#FcFcFc'; this.style.color='#000000'\"></td>
					</tr>
					<tr>
						<td class=\"textmain\" width=\"130\"><div align=\"right\"><b>OdpoveÔ Ë. 2:&nbsp;&nbsp;</b></div></td><td width=\"*\"><input type=\"Text\" value=\"" . $row->odpoved_2 . "\" name=\"odpoved_2\" style=\"width:170px\" onFocus=\"this.style.background='#FFFFFF'; this.style.color='#000000'\" onBlur=\"this.style.background='#FcFcFc'; this.style.color='#000000'\"></td>
					</tr>
					<tr>
						<td class=\"textmain\" width=\"130\"><div align=\"right\"><b>OdpoveÔ Ë. 3:&nbsp;&nbsp;</b></div></td><td width=\"*\"><input type=\"Text\" value=\"" . $row->odpoved_3 . "\" name=\"odpoved_3\" style=\"width:170px\" onFocus=\"this.style.background='#FFFFFF'; this.style.color='#000000'\" onBlur=\"this.style.background='#FcFcFc'; this.style.color='#000000'\"></td>
					</tr>
					<tr>
						<td class=\"textmain\" width=\"130\"><div align=\"right\"><b>OdpoveÔ Ë. 4:&nbsp;&nbsp;</b></div></td><td width=\"*\"><input type=\"Text\" value=\"" . $row->odpoved_4 . "\" name=\"odpoved_4\" style=\"width:170px\" onFocus=\"this.style.background='#FFFFFF'; this.style.color='#000000'\" onBlur=\"this.style.background='#FcFcFc'; this.style.color='#000000'\"></td>
					</tr>
					<tr>
						<td class=\"textmain\" width=\"130\"><div align=\"right\"><b>Platnosù od:&nbsp;&nbsp;</b></div></td><td width=\"*\"><input type=\"Text\" value=\"" . $row->platnost_od . "\" name=\"platnost_od\" style=\"width:85px\" maxlength=\"10\" onFocus=\"this.style.background='#FFFFFF'; this.style.color='#000000'\" onBlur=\"this.style.background='#FcFcFc'; this.style.color='#000000'\">&nbsp; <img src=\"./imgs/cal.gif\" onclick=\"displayDatePicker('platnost_od', false, 'ymd', '-');\" /></td>
					</tr>
					<tr>
						<td class=\"textmain\" width=\"130\"><div align=\"right\"><b>Platnosù do:&nbsp;&nbsp;</b></div></td><td width=\"*\"><input type=\"Text\" value=\"" . $row->platnost_do . "\" name=\"platnost_do\" style=\"width:85px\" maxlength=\"10\" onFocus=\"this.style.background='#FFFFFF'; this.style.color='#000000'\" onBlur=\"this.style.background='#FcFcFc'; this.style.color='#000000'\">&nbsp; <img src=\"./imgs/cal.gif\" onclick=\"displayDatePicker('platnost_do', false, 'ymd', '-');\" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td><td width=\"*\"><br><input type=\"Submit\" value=\"Uprav anketu\"  style=\"width:115px\" style=\"background:#D6E0F5;color:#003399\" onmouseover=\"this.style.background='#6285df';this.style.color='#FFFFFF'\" onmouseout=\"this.style.background='#D6E0F5';this.style.color='#003399'\"><br><br></td>
					</tr>
					<tr>
						<td width=\"100%\" height=\"25\" background=\"../imgs/h_dot_line.gif\" align=\"right\" class=\"small\" colspan=\"2\"><a href=\"javascript:scroll(0,0)\"><img src=\"../imgs/back_top.gif\" width=\"11\" height=\"11\" border=\"0\" alt=\"Spat na vrch\" align=\"absmiddle\"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
			</table>
		<input type=\"Hidden\" name=\"id\" value=\"" . $row->id . "\">
		<input type=\"Hidden\" name=\"uprav\" value=\"1\">
		</form>
		";#echo
	}#while 
}else{
		echo "<div class=\"cisla\" align=\"center\"><br><br><br>V datab·ze nie s˙ ûiadne ankety.<br><br><br></div>";
}

















?>