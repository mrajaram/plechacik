<?php session_start();?>
<br>
<script type="text/javascript" language="JavaScript1.2" src="./src/gb.js"></script>
<?
require_once("./setup.php");

if (@!($link = mysql_pconnect($db_host, $db_user, $db_passwd))){
	exit;
}
if (@!mysql_select_db($db_name, $link)){
	exit;
}

if(isset($HTTP_X_FORWARDED_FOR))
	$REMOTE_ADDR = $HTTP_X_FORWARDED_FOR;

$ip = $REMOTE_ADDR;
?>
<script language="JavaScript" type="text/javascript">
<!--
	function checkForm(){
		if(self.document.forms.formicka.prispevok.value.length<=0){
			alert("Nezadali ste text.");
			self.document.forms.formicka.prispevok.focus();
    return false;
		}
		if(self.document.forms.formicka.od.value.length<=0){
			alert("Musíte zada svoje meno alebo nick.");
			self.document.forms.formicka.od.focus();
    return false;
		}
		if(self.document.forms.formicka.captcha.value.length != 3){
			alert("Zadaný kód musí obsahova 3 znaky.");
			self.document.forms.formicka.captcha.focus();
			return false;
		}
		return true;
	}
// -->
</script>
<form action="?menu=4" method="post" name="formicka" onsubmit="return checkForm();">
<table cellpadding="0" cellspacing="0" border="0" width="450" align="center">
	<tr>
		<td class="textmain" colspan="2"><b>Text správy:</b></td>
	</tr>
	<tr>
		<td colspan="2"><textarea cols="75" rows="8" name="prispevok" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'"></textarea></td>
	</tr>
	<tr>
		<td width="280" class="textmain"><a href="javascript:smiley()"><img src="./imgs/smiles/smiley.gif" align="bottom" alt="úsmev" border="0"></a>&nbsp;<a href="javascript:wink()"><img src="./imgs/smiles/wink.gif" align="bottom" alt="žmurk" border="0"></a>&nbsp;<a href="javascript:grin()"><img src="./imgs/smiles/grin.gif" align="bottom" alt="grimasa" border="0"></a>&nbsp;<a href="javascript:angry()"><img src="./imgs/smiles/angry.gif" align="bottom" alt="nahnevaný" border="0"></a>&nbsp;<a href="javascript:sad()"><img src="./imgs/smiles/sad.gif" align="bottom" alt="smutný" border="0"></a>&nbsp;<a href="javascript:undecided()"><img src="./imgs/smiles/undecided.gif" align="bottom" alt="váhavý" border="0"></a>&nbsp;<a href="javascript:cry()"><img src="./imgs/smiles/cry.gif" align="bottom" alt="plaè" border="0"></a>&nbsp;<a href="javascript:kiss()"><img src="./imgs/smiles/kiss.gif" align=bottom alt="bozk" border="0"></a></td>
		<td width="120" class="textmain" align="right"><a href="javascript:simpletag('b');"><img src="./imgs/bold.gif" align="bottom" alt="hrubé" border="0"></a>&nbsp;<a href="javascript:simpletag('i');"><img src="./imgs/italic.gif" align="bottom" alt="kurzíva" border="0"></a>&nbsp;<a href="javascript:simpletag('u');"><img src="./imgs/underline.gif" align="bottom" alt="podškrtnuté" border="0"></a>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td class="textmain" width="200" style="padding:0;"><b>Od:&nbsp;&nbsp;</b><input type="Text" name="od" style="width:80px" maxlength="23" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'">&nbsp;<span class="textmain">(meno)</span></td>
					<td><img src="./src/captcha.php" alt="captcha image"></td>
					<td class="textmain"><input type="text" name="captcha" size="3" maxlength="3">&nbsp;<span class="textmain" style="font-size:9px;">(odpíš iba èierne znaky)</span></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td width="120" align="middle"><input type="Submit" value="Odosla"  style="width:85px" style="background:#D6E0F5;color:#003399" onmouseover="this.style.background='#6285df';this.style.color='#FFFFFF'" onmouseout="this.style.background='#D6E0F5';this.style.color='#003399'"></td>
	</tr>
</table>
<input type="Hidden" name="posielam" value="1">
</form>
<br>

<?php

if(isset($_POST["captcha"]))
if($_SESSION["captcha"]==$_POST["captcha"]){
	if ($posielam && $od && $prispevok){
		$stmt = "insert into gb SET od='". $od . "', text='" . check_www(ikony($prispevok)) . "', datum='" . datumAndTime() . "', ip='" . $ip . "'";
		if (@!mysql_query($stmt, $link)){
		exit;
		}
	unset($posielam);
	unset($od);
	unset($prispevok);
	unset($datum);
	}
} else {
?>

  <table cellspacing="0" cellpading="0" border="0" width="90%">
    <tr>
      <td align="center" style='color:red;'>Nesprávny kód.</td>
    </tr>
  </table>
<br>
<br>

<?
}
/*
echo "posielam: " . $posielam . "<br>";
echo "od: " . $od . "<br>";
echo "text: " . $text . "<br>";
*/
$stmt = "select * from gb";
if (@!($result = mysql_query($stmt, $link))){
	exit;
}
$num = mysql_num_rows($result);

if (empty($begin)) $begin = 0;

$pocetPrispevkov = 15;								// tu sa nastavi kolko prispevkov sa ma zobrazovat na jednu stranu

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
/*if ($num > $pocetPrispevkov){
$pocetStran = ceil($num/$pocetPrispevkov);
$pomocneCiselko = ($pocetStran-1)*$pocetPrispevkov;
$prem = ($begin/$pocetPrispevkov)+1;

echo "
<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\">
	<tr>
		<td align=\"center\">";
		if ($begin > 0){
	echo "<a href=\"?menu=4&begin=0\" title=\"Na zaciatok\"><img src=\"./imgs/arrowz_l.gif\" border=\"0\"></a>&nbsp;
				<a href=\"?menu=4&begin=" . ($begin-$pocetPrispevkov) . "\" title=\"O " . $pocetPrispevkov . " prispevkov dopredu\"><img src=\"./imgs/arrows_l.gif\" border=\"0\"></a>";
		}
	echo "<span class=\"cisla\">&nbsp;";
		for ($i=1; $i<=$pocetStran; $i++){
			if ($prem == $i){
				echo "<font color=\"#FF9933\">$i</font>";
			}else {
				$xx = $i-1;
				echo "&nbsp;<a href=\"?menu=4&begin=" . ($xx*$pocetPrispevkov) . "\" class=\"cisla\">" . $i . "&nbsp;</a>";
			}
		}#for/i
	echo "&nbsp;</span>";
		if ($begin != $pomocneCiselko){
	echo "<a href=\"?menu=4&begin=" . ($begin+$pocetPrispevkov) . "\" title=\"O " . $pocetPrispevkov . " prispevkov dozadu\"><img src=\"./imgs/arrows_r.gif\" border=\"0\"></a>&nbsp;
				<a href=\"?menu=4&begin=" . $pomocneCiselko . "\" title=\"Na koniec\"><img src=\"./imgs/arrowz_r.gif\" border=\"0\"></a>";
		}
	echo"
		</td>
	</tr>
</table>";
}#if/num
*/

if ($num > $pocetPrispevkov){
$pocetStran = ceil($num/$pocetPrispevkov);
$pomocneCiselko = ($pocetStran-1)*$pocetPrispevkov;
$prem = ($begin/$pocetPrispevkov)+1;

echo "
<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\">
	<tr>
		<td align=\"center\">";
		if ($begin > 0){
	echo "<a href=\"?menu=4&begin=0\" title=\"Na zaciatok\"><img src=\"./imgs/arrowz_l.gif\" border=\"0\"></a>&nbsp;
				<a href=\"?menu=4&begin=" . ($begin-$pocetPrispevkov) . "\" title=\"O " . $pocetPrispevkov . " prispevkov dopredu\"><img src=\"./imgs/arrows_l.gif\" border=\"0\"></a>";
		}
	echo "<span class=\"cisla\">&nbsp;";
		for ($i=1; $i<=$pocetStran; $i++){
			if ($i <= $listerPom){
				if ($prem == $i){
					echo "<font color=\"#FF9933\">[$i]</font>";
				}else {
					$xx = $i-1;
					echo "&nbsp;<a href=\"?menu=4&begin=" . ($xx*$pocetPrispevkov) . "\" class=\"cisla\">" . $i . "&nbsp;</a>";
				}
			}else{
				if ($i == $listerPom+1){
					echo "<font color=\"#000000\">&nbsp;...&nbsp;</font>";
				}else{
					if ($prem == $i){
						echo "<font color=\"#FF9933\">&nbsp;[$i]&nbsp;</font>";
					}
				}
			}
		}#for/i
	echo "&nbsp;</span>";
		if ($begin != $pomocneCiselko){
	echo "<a href=\"?menu=4&begin=" . ($begin+$pocetPrispevkov) . "\" title=\"O " . $pocetPrispevkov . " prispevkov dozadu\"><img src=\"./imgs/arrows_r.gif\" border=\"0\"></a>&nbsp;
				<a href=\"?menu=4&begin=" . $pomocneCiselko . "\" title=\"Na koniec\"><img src=\"./imgs/arrowz_r.gif\" border=\"0\"></a>";
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
		echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">";
		printf("<tr>
							<td width=\"89\" height=\"30\" background=\"./imgs/main_lista_left.gif\" align=\"right\" valign=\"top\"><img src=\"./imgs/icon_gb.gif\" width=\"23\" height=\"24\" title=\"%s\"></td>
							<td width=\"*\" height=\"30\" background=\"./imgs/main_lista_middle.gif\" class=\"textmain\"><b>Od: </b>%s,&nbsp;%s</td>
							<td width=\"84\" height=\"30\" background=\"./imgs/main_lista_right.gif\" align=\"center\">%s</td>
						</tr>",$row->ip, $row->od, $row->datum, showArrow($j));
		echo "</table>";

		echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">";
		printf("<tr>
							<td width=\"2\" background=\"./imgs/main_body_left.gif\"><img src=\"./imgs/blank.gif\"></td>
							<td width=\"*\" bgcolor=\"#fcfcfc\" class=\"textmain\">%s</td>
							<td width=\"7\" background=\"./imgs/main_body_right.gif\"><img src=\"./imgs/blank.gif\"></td>
						</tr>", nl2br($row->text));
		echo "</table>";

		echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">
						<tr>
							<td width=\"5\" height=\"10\" background=\"./imgs/main_bottom_left.gif\"><img src=\"./imgs/blank.gif\"></td>
							<td width=\"*\" height=\"10\" background=\"./imgs/main_bottom_middle.gif\"><img src=\"./imgs/blank.gif\"></td>
							<td width=\"10\" height=\"10\" background=\"./imgs/main_bottom_right.gif\"><img src=\"./imgs/blank.gif\"></td>
						</tr>
					</table><br>";
	}#end while
} #end if
?>
<br>
<?/*
if ($num > $pocetPrispevkov){
$pocetStran = ceil($num/$pocetPrispevkov);
$pomocneCiselko = ($pocetStran-1)*$pocetPrispevkov;
$prem = ($begin/$pocetPrispevkov)+1;

echo "
<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\">
	<tr>
		<td align=\"center\">";
		if ($begin > 0){
	echo "<a href=\"?menu=4&begin=0\" title=\"Na zaciatok\"><img src=\"./imgs/arrowz_l.gif\" border=\"0\"></a>&nbsp;
				<a href=\"?menu=4&begin=" . ($begin-$pocetPrispevkov) . "\" title=\"O " . $pocetPrispevkov . " prispevkov dopredu\"><img src=\"./imgs/arrows_l.gif\" border=\"0\"></a>";
		}
	echo "<span class=\"cisla\">&nbsp;";
		for ($i=1; $i<=$pocetStran; $i++){
			if ($prem == $i){
				echo "<font color=\"#FF9933\">$i</font>";
			}else {
				$xx = $i-1;
				echo "&nbsp;<a href=\"?menu=4&begin=" . ($xx*$pocetPrispevkov) . "\" class=\"cisla\">" . $i . "&nbsp;</a>";
			}
		}#for/i
	echo "&nbsp;</span>";
		if ($begin != $pomocneCiselko){
	echo "<a href=\"?menu=4&begin=" . ($begin+$pocetPrispevkov) . "\" title=\"O " . $pocetPrispevkov . " prispevkov dozadu\"><img src=\"./imgs/arrows_r.gif\" border=\"0\"></a>&nbsp;
				<a href=\"?menu=4&begin=" . $pomocneCiselko . "\" title=\"Na koniec\"><img src=\"./imgs/arrowz_r.gif\" border=\"0\"></a>";
		}
	echo"
		</td>
	</tr>
</table>
<br>
<br>";

mysql_free_result($result);

}#if/num
*/

if ($num > $pocetPrispevkov){
$pocetStran = ceil($num/$pocetPrispevkov);
$pomocneCiselko = ($pocetStran-1)*$pocetPrispevkov;
$prem = ($begin/$pocetPrispevkov)+1;

echo "
<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\">
	<tr>
		<td align=\"center\">";
		if ($begin > 0){
	echo "<a href=\"?menu=4&begin=0\" title=\"Na zaciatok\"><img src=\"./imgs/arrowz_l.gif\" border=\"0\"></a>&nbsp;
				<a href=\"?menu=4&begin=" . ($begin-$pocetPrispevkov) . "\" title=\"O " . $pocetPrispevkov . " prispevkov dopredu\"><img src=\"./imgs/arrows_l.gif\" border=\"0\"></a>";
		}
	echo "<span class=\"cisla\">&nbsp;";
		for ($i=1; $i<=$pocetStran; $i++){
			if ($i <= $listerPom){
				if ($prem == $i){
					echo "<font color=\"#FF9933\">[$i]</font>";
				}else {
					$xx = $i-1;
					echo "&nbsp;<a href=\"?menu=4&begin=" . ($xx*$pocetPrispevkov) . "\" class=\"cisla\">" . $i . "&nbsp;</a>";
				}
			}else{
				if ($i == $listerPom+1){
					echo "<font color=\"#000000\">&nbsp;...&nbsp;</font>";
				}else{
					if ($prem == $i){
						echo "<font color=\"#FF9933\">&nbsp;[$i]&nbsp;</font>";
					}
				}
			}
		}#for/i
	echo "&nbsp;</span>";
		if ($begin != $pomocneCiselko){
	echo "<a href=\"?menu=4&begin=" . ($begin+$pocetPrispevkov) . "\" title=\"O " . $pocetPrispevkov . " prispevkov dozadu\"><img src=\"./imgs/arrows_r.gif\" border=\"0\"></a>&nbsp;
				<a href=\"?menu=4&begin=" . $pomocneCiselko . "\" title=\"Na koniec\"><img src=\"./imgs/arrowz_r.gif\" border=\"0\"></a>";
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

