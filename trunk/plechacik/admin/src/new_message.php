<?php
include_once("../fckeditor/fckeditor.php") ;
?>

<br>
<div align="center" class="cisla">VLOé NOV› OZNAM</div>
<br>
<br>
<script language="JavaScript" type="text/javascript">
<!-- 
	function checkOznam(){
		if(self.document.forms.formoznam.nazov.value.length<=0){
			alert("Nezadali ste nazov oznamu.");
			self.document.forms.formoznam.nazov.focus();
   			return false;
		}
//		if(self.document.forms.formoznam.text.value.length<=0){
//			alert("MusÌte zadaù text oznamu.");
//			self.document.forms.formoznam.text.focus();
//    		return false;
//		}
		if(self.document.forms.formoznam.platnost_od.value.length<=0){
			alert("MusÌte zadaù datum od kedy sa ma oznam zobrazit.");
			self.document.forms.formoznam.platnost_od.focus();
    		return false;
		}
		if(self.document.forms.formoznam.platnost_do.value.length<=0){
			alert("MusÌte zadaù datum do kedy sa ma oznam zobrazit.");
			self.document.forms.formoznam.platnost_do.focus();
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
  	$text = stripslashes($_POST["oznamText"]);
	$stmt = "insert into oznamy SET nazov='$nazov', text='$text', platnost_od='$platnost_od', platnost_do='$platnost_do', viditelnost='$viditelnost'";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba";	exit;
	}
	echo "<div class=\"cisla\" align=\"center\"><br><br><br>Oznam bol ˙speöne pridan˝<br><br><br></div>";
	
//	mysql_free_result($result);
	
}else {
?>
<form action="?action=1" method="post" name="formoznam" onsubmit="return checkOznam();">
<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td class="textmain"><b>N·zov oznamu:&nbsp;&nbsp;</b><input type="Text" name="nazov" style="width:170px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'"></td>
	</tr>
	<tr>
		<td class="textmain">
			<?php
				$oFCKeditor = new FCKeditor('oznamText') ;
				$oFCKeditor->Width = 800;
				$oFCKeditor->Height = 400;
				$oFCKeditor->ToolbarSet = 'MyToolbar'; 
				$oFCKeditor->BasePath = '../fckeditor/' ;
				$oFCKeditor->Create() ;
			?>
		</td>
	</tr>
	<tr>
		<td class="textmain"><b>Viditeænosù:&nbsp;&nbsp;</b>&nbsp;<select name="viditelnost"><option value="0" selected>vöade</option><option value="1">plechotice</option></select></td>
	</tr>
	<tr>
		<td class="textmain"><b>Platnosù od:&nbsp;&nbsp;</b><input type="Text" name="platnost_od" style="width:85px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'" maxlength="10">&nbsp; <img src="./imgs/cal.gif" onclick="displayDatePicker('platnost_od', false, 'ymd', '-');" /></td>
	</tr>
	<tr>
		<td class="textmain"><b>Platnosù do:&nbsp;&nbsp;</b><input type="Text" name="platnost_do" style="width:85px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'" maxlength="10">&nbsp; <img src="./imgs/cal.gif" onclick="displayDatePicker('platnost_do', false, 'ymd', '-');" /></td>
	</tr>
	<tr>
			<td width="*"><br><input type="Submit" value="Pridaj oznam"  style="width:115px" style="background:#D6E0F5;color:#003399" onmouseover="this.style.background='#6285df';this.style.color='#FFFFFF'" onmouseout="this.style.background='#D6E0F5';this.style.color='#003399'"></td>
	</tr>
</table>
<input type="Hidden" name="pridane" value="1">
</form>
<?
}
?>