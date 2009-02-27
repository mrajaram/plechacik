<br>
<div align="center" class="cisla">EDITUJ MYŠLIENKU NA TÝŽDEÒ</div>
<br>
<br>
<?	
require_once('../setup.php');

	$stmt = "select * from myslienka";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba";	exit;
	}
	$row = mysql_fetch_object($result);

if(!(@$link=mysql_pconnect($db_host,$db_user,$db_passwd))) {
    echo "Server problems, try to log in later."; exit;
  }
  if(!@mysql_select_db($db_name,$link)){
    echo "Server problems, try to log in later."; exit;
  }
//-------------------------------------------------------
if ($uprav){
	$stmt = "update myslienka SET text='$text', autor='$autor' where id=1";
	if (@!mysql_query($stmt, $link)){
		echo "ta more chyba1";	exit;
	}
	
	$stmt = "select * from myslienka";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba";	exit;
	}
	$row = mysql_fetch_object($result);

}
//-------------------------------------------------------

	echo "
		<form action=\"?action=11\" method=\"post\">
			<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">
				<tr>
					<td class=\"textmain\"><b>Myšlienka:</b><br><textarea cols=\"65\" rows=\"8\" name=\"text\" onFocus=\"this.style.background='#FFFFFF'; this.style.color='#000000'\" onBlur=\"this.style.background='#FcFcFc'; this.style.color='#000000'\">" . $row->text . "</textarea></td>
				</tr>
				<tr>
					<td class=\"textmain\"><b>Autor myšlienky:&nbsp;&nbsp;</b><input type=\"Text\" name=\"autor\" style=\"width:250px\" onFocus=\"this.style.background='#FFFFFF'; this.style.color='#000000'\" onBlur=\"this.style.background='#FcFcFc'; this.style.color='#000000'\" value=\"" . $row->autor . "\"></td>
				</tr>
				<tr>
					<td width=\"*\"><br><input type=\"Submit\" value=\"Uprav myšlienku\"  style=\"width:125px\" style=\"background:#D6E0F5;color:#003399\" onmouseover=\"this.style.background='#6285df';this.style.color='#FFFFFF'\" onmouseout=\"this.style.background='#D6E0F5';this.style.color='#003399'\"><br><br></td>
				</tr>
			</table>
		<input type=\"Hidden\" name=\"uprav\" value=\"1\">
		</form>
";#echo
?>
