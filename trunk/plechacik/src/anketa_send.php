<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Otázka do ankety</title>
<META HTTP-Equiv="Content-Type" Content="text/html; charset=windows-1250">
<META HTTP-EQUIV='author' CONTENT='projected by Ivan Stefko'>
<META HTTP-EQUIV='Keywords' CONTENT='plechotice, trebisov, obec, novy ruskov, internet, sully'>
<META HTTP-EQUIV='copyright' CONTENT='© 2003, Plechotice'>
<META HTTP-EQUIV='Reply-to' CONTENT='webmaster@plechotice.sk'> 
<LINK REL="stylesheet" TYPE="text/css" HREF="../plechacik.css">
</head>
<body bottommargin="0" leftmargin="0" topmargin="5" rightmargin="0" marginheight="0" marginwidth="0" bgcolor="#ffffff">
<div align="center">
<script language="JavaScript" type="text/javascript">
<!-- 
	function checkAnketa(){
		if(self.document.forms.vote.otazka.value.length<=0){
			alert("Nezadali ste otázku pre anketu.");
			self.document.forms.vote.otazka.focus();
    return false;
		}
		if(self.document.forms.vote.odpoved_1.value.length<=0){
			alert("Musíte zadať odpoved č. 1.");
			self.document.forms.vote.odpoved_1.focus();
    return false;
		}
		if(self.document.forms.vote.odpoved_2.value.length<=0){
			alert("Musíte zadať odpoved č. 2.");
			self.document.forms.vote.odpoved_2.focus();
    return false;
		}
		if(self.document.forms.vote.odpoved_3.value.length<=0){
			alert("Musíte zadať odpoved č. 3.");
			self.document.forms.vote.odpoved_3.focus();
    return false;
		}
		if(self.document.forms.vote.odpoved_4.value.length<=0){
			alert("Musíte zadať odpoved č. 4.");
			self.document.forms.vote.odpoved_4.focus();
    return false;
		}
		return true;
	}
// -->
</script>
<table cellpadding="0" cellspacing="0" border="0" width="98%" align="center">
	<tr>
		<td width="89" height="30" background="../imgs/main_lista_left.gif" align="center" valign="top"><img src="../imgs/icon_kontakt.gif"></td>
		<td width="*" height="30" background="../imgs/main_lista_middle.gif" class="oznamNazov">Otázka do ankety</td>
		<td width="84" height="30" background="../imgs/main_lista_right.gif"><img src="../imgs/blank.gif"></td>
	</tr>
</table>
<!-- koniec hornej listy -->
<!-- zaciatok pre body -->
<table cellpadding="0" cellspacing="0" border="0" width="98%" align="center">
	<tr>
		<td width="2" background="../imgs/main_body_left.gif"><img src="../imgs/blank.gif"></td>
		<td width="*" bgcolor="#fcfcfc"><br>
		<?
		if ($odoslat){
		$to = "webmaster@plechotice.sk";
		$subject = "Otazka do ankety";
			if(isset($HTTP_X_FORWARDED_FOR))
	    $REMOTE_ADDR=$HTTP_X_FORWARDED_FOR;
		  $ip = $REMOTE_ADDR;
			$date = date("d.m.Y; H:i:s");
			$body .= "Otazka: " . $otazka . "\nOdpoved1: " . $odpoved_1 . "\nOdpoved2: " . $odpoved_2 . "\nOdpoved3: " . $odpoved_3 . "\nOdpoved4: " . $odpoved_4 . "\n\n-------------------------------------------------------------------\nInformácie o odosielateľovi:\nIP adresa: " . $ip . "\nDátum a čas odoslania: " . $date . "";

		  if(@mail($to,$subject,$body,"From: Stranka - plechotice\r\n"."Reply-To: $from\r\n") && @mail("marek.andras@seznam.cz",$subject,$body,"From: Stranka - plechotice\r\n"."Reply-To: $from\r\n")){
				echo "<br>";
				echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"75%\" align=\"center\">
								<tr>
									<td width=\"23%\" align=\"right\"><img src=\"../imgs/ok.gif\" border=\"0\"></td>
									<td class=\"nazov\" width=\"*\">Odoslanie bolo úspešné</td>
								</tr>
								<tr>
									<td class=\"textmain\" colspan=\"2\"><br><br><div align=\"center\"><b>Ďakujeme za Vašu otázku.</b></div></td>
								</tr>
								<tr>
										<td align=\"center\" colspan=\"2\"><br><br><input type=\"Button\" value=\"Zatvoriť\" onclick=\"window.close()\" style=\"width:70px\" style=\"background:#D6E0F5;color:#003399\" onmouseover=\"this.style.background='#6285df';this.style.color='#FFFFFF'\" onmouseout=\"this.style.background='#D6E0F5';this.style.color='#003399'\"></td>
								</tr>
							</table><br><br>";
			}else{
					echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"85%\" align=\"center\">
									<tr>
										<td width=\"*\" class=\"nazov\"><br><br>Ľutujeme, odoslanie anketovej otázky zlyhalo.<br><br></td>
									</tr>
									<tr>
											<td width=\"*\" class=\"cisla\"><br>Pokúste sa odoslať anketovú otázku ešte raz. V prípade neúspechu kontaktujte <a href=\"mailto:webmaster@plechotice.sk\" class=\"cisla\">webmastera</a>.<br><br><br></td>
									</tr>
									<tr>
										<td align=\"center\"><br><input type=\"Button\" value=\"Späť\" onclick=\"history.back()\" style=\"width:65px\" style=\"background:#D6E0F5;color:#003399\" onmouseover=\"this.style.background='#6285df';this.style.color='#FFFFFF'\" onmouseout=\"this.style.background='#D6E0F5';this.style.color='#003399'\"></td>
									</tr>
									</table><br><br>";
			}

		}else{
		?>
<!-- ---------------------------------------------------------------------------------------------------------------		 -->
		<form action="" method="post" name="vote" onsubmit="return checkAnketa();">
			<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
				<tr>
					<td class="textmain" width="130"><div align="right"><b>Otázka:&nbsp;&nbsp;</b></div></td><td width="*"><input type="Text" name="otazka" style="width:300px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'"></td>
				</tr>
				<tr>
					<td class="textmain" width="130"><div align="right"><b>Odpoveď č. 1:&nbsp;&nbsp;</b></div></td><td width="*"><input type="Text" name="odpoved_1" style="width:170px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'"></td>
				</tr>
				<tr>
					<td class="textmain" width="130"><div align="right"><b>Odpoveď č. 2:&nbsp;&nbsp;</b></div></td><td width="*"><input type="Text" name="odpoved_2" style="width:170px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'"></td>
				</tr>
				<tr>
					<td class="textmain" width="130"><div align="right"><b>Odpoveď č. 3:&nbsp;&nbsp;</b></div></td><td width="*"><input type="Text" name="odpoved_3" style="width:170px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'"></td>
				</tr>
				<tr>
					<td class="textmain" width="130"><div align="right"><b>Odpoveď č. 4:&nbsp;&nbsp;</b></div></td><td width="*"><input type="Text" name="odpoved_4" style="width:170px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'"></td>
				</tr>
				<tr>
					<td>&nbsp;</td><td width="*"><br><input type="Submit" value="Odoslať"  style="width:95px" style="background:#D6E0F5;color:#003399" onmouseover="this.style.background='#6285df';this.style.color='#FFFFFF'" onmouseout="this.style.background='#D6E0F5';this.style.color='#003399'"></td>
				</tr>
			</table>
			<input type="Hidden" name="odoslat" value="1">
			</form><br>
<!-- ---------------------------------------------------------------------------------------------------------------		 -->
		<?
		} #if/odoslat
		?>
		</td>
		<td width="7" background="../imgs/main_body_right.gif"><img src="../imgs/blank.gif"></td>
	</tr>
</table>
<!-- koniec pre body -->
<!-- zaciatok dolnej listy -->
<table cellpadding="0" cellspacing="0" border="0" width="98%" align="center">
	<tr>
		<td width="5" height="10" background="../imgs/main_bottom_left.gif"><img src="../imgs/blank.gif"></td>
		<td width="*" height="10" background="../imgs/main_bottom_middle.gif"><img src="../imgs/blank.gif"></td>
		<td width="10" height="10" background="../imgs/main_bottom_right.gif"><img src="../imgs/blank.gif"></td>
	</tr>
</table>
<!-- koniec dolnej listy -->
</div>
</body>
</html>
