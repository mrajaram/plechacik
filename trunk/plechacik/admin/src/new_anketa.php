<br>
<div align="center" class="cisla">VLOŽIŤ NOVÚ ANKETU</div>
<br>
<div class="textmain">Anketa <b>musí</b> mať zadané všetky štyri odpovede. Dátum <b>platnosti od</b> a dátum <b>platnosti do</b> treba voliť tak, aby sa neprekrýval s iným dátumom v inej ankete. V jeden deň môže byť aktívna <b>iba</b> jedna anketa. Neošetroval som to z toho dôvodu, že predpokladam trošku inteligencie u toho kto to bude spravovať :o). Takže najprv si treba pozrieť aké ankety už sú v databáze (sekcia Edituj/zmaž anketu) a v ktorý deň sú aktívne a až potom na základe toho pridávať novú anketu. Ankety sa akutalizujú samé na základe premenných v položkách <b>platnost_od</b> a <b>platnost_do</b><br><br><div align="right">Good luck, sully</div></div>
<br>
<script language="JavaScript" type="text/javascript">
<!-- 
	function checkAnketa(){
		if(self.document.forms.formanketa.otazka.value.length<=0){
			alert("Nezadali ste otázku pre anketu.");
			self.document.forms.formanketa.otazka.focus();
    return false;
		}
		if(self.document.forms.formanketa.odpoved_1.value.length<=0){
			alert("Musíte zadať odpoved č. 1.");
			self.document.forms.formanketa.odpoved_1.focus();
    return false;
		}
		if(self.document.forms.formanketa.odpoved_2.value.length<=0){
			alert("Musíte zadať odpoved č. 2.");
			self.document.forms.formanketa.odpoved_2.focus();
    return false;
		}
		if(self.document.forms.formanketa.odpoved_3.value.length<=0){
			alert("Musíte zadať odpoved č. 3.");
			self.document.forms.formanketa.odpoved_3.focus();
    return false;
		}
		if(self.document.forms.formanketa.odpoved_4.value.length<=0){
			alert("Musíte zadať odpoved č. 4.");
			self.document.forms.formanketa.odpoved_4.focus();
    return false;
		}
		if(self.document.forms.formanketa.platnost_od.value.length<=0){
			alert("Musíte zadať datum od kedy sa ma anketa zobrazit.");
			self.document.forms.formanketa.platnost_od.focus();
    return false;
		}
		if(self.document.forms.formanketa.platnost_do.value.length<=0){
			alert("Musíte zadať datum do kedy sa ma anketa zobrazit.");
			self.document.forms.formanketa.platnost_do.focus();
    return false;
		}
		return true;
	}
// -->
</script>
<?
if ($pridane){
require_once("../setup.php");

  if(!(@$link=mysql_pconnect($db_host,$db_user,$db_passwd))) {
    echo "Server problems, try to log in later."; exit;
  }
  if(!@mysql_select_db($db_name,$link)){
    echo "Server problems, try to log in later."; exit;
  }
	$stmt = "insert into anketa SET otazka='$otazka', odpoved_1='$odpoved_1', odpoved_2='$odpoved_2', odpoved_3='$odpoved_3', odpoved_4='$odpoved_4', platnost_od='$platnost_od', platnost_do='$platnost_do'";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba";	exit;
	}
	echo "<div class=\"cisla\" align=\"center\"><br><br><br>Anketa bola úspešne pridaná<br><br><br></div>";
	
	@mysql_free_result($result);
	
}else {
?>
<form action="?action=3" method="post" name="formanketa" onsubmit="return checkAnketa();">
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
		<td class="textmain" width="130"><div align="right"><b>Platnosť od:&nbsp;&nbsp;</b></div></td><td width="*"><input type="Text" name="platnost_od" style="width:85px" maxlength="10" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'">&nbsp; <img src="./imgs/cal.gif" onclick="displayDatePicker('platnost_od', false, 'ymd', '-');" /></td>
	</tr>
	<tr>
		<td class="textmain" width="130"><div align="right"><b>Platnosť do:&nbsp;&nbsp;</b></div></td><td width="*"><input type="Text" name="platnost_do" style="width:85px" maxlength="10" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'">&nbsp; <img src="./imgs/cal.gif" onclick="displayDatePicker('platnost_do', false, 'ymd', '-');" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td><td width="*"><br><input type="Submit" value="Pridaj anketu"  style="width:115px" style="background:#D6E0F5;color:#003399" onmouseover="this.style.background='#6285df';this.style.color='#FFFFFF'" onmouseout="this.style.background='#D6E0F5';this.style.color='#003399'"></td>
	</tr>
</table>
<input type="Hidden" name="pridane" value="1">
</form>
<?
}
?>