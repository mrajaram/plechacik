<br>
<?
	if(isset($HTTP_X_FORWARDED_FOR))
  $REMOTE_ADDR=$HTTP_X_FORWARDED_FOR;
  $ip = $REMOTE_ADDR;
if ($posielam){
  if ($to == "webmaster@plechotice.sk"){
	$date = date("d.m.Y   H:i:s");
	$body .= "\n\n-------------------------------------------------------------------\nInformácie o odosielateľovi:\nIP adresa: " . $ip . "\nDátum a čas odoslania: " . $date . "";
	}
  if(@mail($to,$subject,$body,"From: $from\r\n"."Reply-To: $from\r\n")){
	echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"75%\" align=\"center\">
					<tr>
						<td width=\"23%\" align=\"right\"><img src=\"./imgs/ok.gif\" border=\"0\"></td>
						<td class=\"nazov\" width=\"*\">Odoslanie bolo úspešné</td>
					</tr>
					<tr>
						<td class=\"textmain\" colspan=\"2\"><br><b>Ďakujeme za Váš e-mail.</b><p><b>Adresát: </b>" . $to . "<br><b>Odosielateľ:</b> " . $from . "<br><b>Predmet: </b>" . $subject . "<br><span class=\"small\">&nbsp;<br></span><b>Správa: </b>" . nl2br($body) . "</td>
					</tr>
				</table><br><br>";
  }else{
		echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"75%\" align=\"center\">
					<tr>
						<td width=\"*\" class=\"nazov\">Ľutujeme, ale odoslanie e-mailu zlyhalo.</td>
					</tr>
					<tr>
						<td width=\"*\" class=\"cisla\"><br>Pokúste sa odoslať e-mail ešte raz. V prípade neúspechu kontaktujte <a href=\"mailto:webmaster@plechotice.sk\" class=\"cisla\">webmastera</a>.</td>
					</tr>
					<tr>
						<td align=\"center\"><br><input type=\"Button\" value=\"Späť\" onclick=\"history.back()\" style=\"width:65px\" style=\"background:#D6E0F5;color:#003399\" onmouseover=\"this.style.background='#6285df';this.style.color='#FFFFFF'\" onmouseout=\"this.style.background='#D6E0F5';this.style.color='#003399'\"></td>
					</tr>
					</table><br><br>";
	}
}else {
?>
<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td class="nazov" width="23"><img src="./imgs/icon_telfax.gif" border="0"></td>
		<td class="nazov" width="*">Telefón/fax</td>
	</tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td class="textmain"><b>tel.: </b>&nbsp;056/6686260<br><b>fax.: </b>056/6686261</td>
	</tr>
</table>
<!-- <table cellpadding="0" cellspacing="0" border="0" width="75%" align="center">
	<tr>
		<td width="80" height="1" background="./imgs/ciara_left.gif"><img src="./imgs/blank.gif"></td>
		<td width="*" height="1" background="./imgs/ciara_middle.gif"><img src="./imgs/blank.gif"></td>
		<td width="80" height="1" background="./imgs/ciara_right.gif"><img src="./imgs/blank.gif"></td>
	</tr>
</table> -->
<br>
<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td class="nazov" width="23"><img src="./imgs/icon_adresa.gif" border="0"></td>
		<td class="nazov" width="*">Adresa</td>
	</tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td class="textmain"><b>Obecný úrad Plechotice</b><br>Hlavná 39/70<br>Plechotice<br>075 01</td>
	</tr>
</table>
<br>
<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td class="nazov" width="23"><img src="./imgs/icon_mail.gif" border="0" title="<? echo $ip; ?>"></td>
		<td class="nazov" width="*">E-mail</td>
	</tr>
</table>

<script type="text/javascript" language=JavaScript>
<!--
function check_from(email)
{
    var pos_zavinac = email.indexOf("@");
    if (pos_zavinac < 0)
        return false;
    var before_zavinac = email.substring(0,pos_zavinac);
    var after_zavinac = email.substring(pos_zavinac+1,email.length);
    if (after_zavinac.indexOf("@") >= 0)
        return false;
    if (before_zavinac.length <= 0)
        return false;
    if (after_zavinac.length <= 0)
        return false;
    var last_dot = after_zavinac.lastIndexOf(".");
    if (last_dot < 0)
        return false;
    if (email.indexOf(" ") >= 0)
        return false;
    if ((after_zavinac.length - last_dot - 1)< 2 || (after_zavinac.length - last_dot - 1) > 3)
        return false;
    if (email.indexOf("..") >= 0)
        return false;
    if (before_zavinac.charAt(0) == "."  ||  before_zavinac.charAt(before_zavinac.length-1) == ".")
        return false;
    if (after_zavinac.charAt(0) == "."  ||  after_zavinac.charAt(after_zavinac.length-1) == ".")
        return false;
    return true;
}

function check_form()
{
  if (self.document.forms.email_form.from.value.length<=0)
  {
    alert("Nezadali ste svoju e-mailovú adresu.");
	self.document.forms.email_form.from.focus();
    return false;
  }
  else {
    if (!check_from(self.document.forms.email_form.from.value))
    {
      alert("Zadaná e-mailová adresa je zadaná nesprávne.");
	  self.document.forms.email_form.from.focus();
      return false;
    }
  }	
  if (self.document.forms.email_form.subject.value.length<=0)
  {
    alert("Nenapísali ste žiaden predmet.");
	self.document.forms.email_form.subject.focus();
    return false;
  }
  if (self.document.forms.email_form.body.value.length<=0)
  {
    alert("Nenapísali ste žiaden text do e-mailu.");
	self.document.forms.email_form.body.focus();
    return false;
  }
  return true;  
}
// -->
</script>
<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td class="textmain">
			<b>E-mailova adresa:</b> <a href="mailto:ocu@plechotice.sk" title="Obecný úrad Plechotice" class="link">ocu@plechotice.sk</a><div class="small"><br></div>V prípade, že surfujete na počítači, kde nie je naištalovaný e-mailový program alebo nie je správne nastavený, môžete jednoducho použiť nasledovný formulár. Pripomienky týkajúce sa štruktúry stránky môžete adresovať webmasterovi.<br><br>
		</td>
	</tr>
	<tr>
		<td>
		<form action="?menu=5" method="post" name="email_form" onsubmit="return check_form();">
		<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
			<tr>
				<td class="textmain" width="90"><b>Komu:</b></td>
				<td width="*">
					<select name="to" style="width:200px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'">
						<option value="urad@plechotice.sk">Obecný úrad</option>
						<option value="webmaster@plechotice.sk">Webmaster</option>
					</select>
				</td>
			</tr>
		 	<tr>
				<td class="textmain" width="90"><b>Vaša adresa:</b></td>
				<td><input type="Text" name="from" style="width:200px" maxlength="23" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'">&nbsp;<span class="textmain">(e-mail)</span></td>
			</tr>
			<tr>
				<td class="textmain" width="90"><b>Predmet:</b></td>
				<td width="*"><input type="Text" name="subject" style="width:200px" maxlength="23" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'"></td>
			</tr>
		</table>

		<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
			<tr>
				<td class="textmain" width="410"><b>Text správy:</b><br><textarea cols="65" rows="8" name="body" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'"></textarea></td>
				<td width="*">&nbsp;</td>
			</tr>
		 	<tr>
				<td class="textmain" width="410"><div align="right"><input type="Submit" value="Odoslať"  style="width:85px" style="background:#D6E0F5;color:#003399" onmouseover="this.style.background='#6285df';this.style.color='#FFFFFF'" onmouseout="this.style.background='#D6E0F5';this.style.color='#003399'"></div></td>
				<td width="*">&nbsp;</td>
			</tr>
 		</table>
		<input type="Hidden" name="posielam" value="1">
		</form>
		</td>	
	</tr>
	<tr>
		<td><br></td>
	</tr>
	<tr>
		<td width="100%" height="25" background="./imgs/h_dot_line.gif" align="right" class="small"><a href="javascript:scroll(0,0)"><img src="./imgs/back_top.gif" width="11" height="11" border="0" alt="Späť na vrch" align="absmiddle"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
</table>
<br>
<?
}
?>
