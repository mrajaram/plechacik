<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Obec Plechotice - Administratorska sekcia</title>
	<META HTTP-Equiv="Content-Type" Content="text/html; charset=windows-1250">
	<META HTTP-EQUIV='author' CONTENT='projected by Ivan Stefko'>
	<META HTTP-EQUIV='Keywords' CONTENT='plechotice, trebisov, obec, novy ruskov, internet, sully'>
	<META HTTP-EQUIV='copyright' CONTENT='� 2003, Plechotice'>
	<META HTTP-EQUIV='Reply-to' CONTENT='webmaster@plechotice.sk'> 
	<LINK REL="stylesheet" TYPE="text/css" HREF="../../plechacik.css">
	<script type="text/javascript" language="JavaScript1.2" src="../datapicker.js"></script>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" marginheight="0" marginwidth="0">
<br>
<div align="center" class="cisla">EDIT�CIA OZNAMU</div>
<?php
include_once("../../fckeditor/fckeditor.php") ;

require_once('../../setup.php');

if(!(@$link=mysql_pconnect($db_host,$db_user,$db_passwd))) {
	echo "Server problems, try to log in later."; exit;
}
if(!@mysql_select_db($db_name,$link)){
	echo "Server problems, try to log in later."; exit;
}

if ($edit) {
	$id = $_GET[id]; 
} else {
	$id = $_POST[id]; 
}

//echo "id: " . $id; 

if ($uprav){
	$nazov = $_POST[nazov];
	$text = trim(stripslashes( $_POST[oznam] )) ;
	$stmt = "update oznamy SET nazov='$nazov', text='$text', platnost_od='$platnost_od', platnost_do='$platnost_do', viditelnost='$viditelnost' where id='$id'";
	if (@!mysql_query($stmt, $link)){
		echo "Error during updating... \n stmt: " . $stmt;	exit;
	}
	
	echo "<div class=\"cisla\" align=\"center\"><br><br><br>Oznam bol aktualizovan�.<br><br><br></div></body></html>";
	echo "<div class=\"cisla\" align=\"center\"><br><br><br><input type=\"button\" value=\"Zavri okno\" onClick=\"window.opener.location.reload();window.close()\"><br><br><br></div></body></html>";
	exit; 
}

$stmt = "select * from oznamy where id=" . $id;
//echo $stmt;

if (@!($result = mysql_query($stmt, $link))){
	echo "ta more chyba";	exit;
}

$resultCount = mysql_num_rows($result);

if ($resultCount == 1) { 
	$row = mysql_fetch_object($result);
?>
	
<form action="?" method="post">
	<div class="textmain" style="width: 100%;">
		<div style="padding: 5px; width:70%;">
			<div style="float:left;"><b>N�zov: </b><input type="Text" name="nazov" style="width:200px; font-weight: normal;" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'" value="<?= $row->nazov; ?>"></div>
			<br clear="all">
		</div>
		<div style="padding: 5px; width: 70%;">
			<?php
				$oFCKeditor = new FCKeditor('oznam') ;
				$oFCKeditor->Width = 750;
				$oFCKeditor->Height = 350;
				$oFCKeditor->ToolbarSet = 'MyToolbar'; 
				$oFCKeditor->Value = $row->text; 
				$oFCKeditor->BasePath = '../../fckeditor/' ;
				$oFCKeditor->Create() ;
			?>
		</div>
	</div>
	<div class="textmain">
		<b>Vidite�nos�:</b>&nbsp;&nbsp;<select name="viditelnost"><option value="0" <? if ($row->viditelnost==0) echo "selected"; ?>>v�ade</option><option value="1" <? if ($row->viditelnost==1) echo "selected"; ?>>plechotice</option></select>
	</div>
	<div class="textmain">
		<b>Platnos� od:&nbsp;&nbsp;</b><input type="Text" value="<?= $row->platnost_od; ?>" name="platnost_od" style="width:85px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'" maxlength="10">&nbsp; <img src="../imgs/cal.gif" onclick="displayDatePicker('platnost_od', false, 'ymd', '-');" />
	</div>
	<div class="textmain">
		<b>Platnos� do:&nbsp;&nbsp;</b><input type="Text" value="<?= $row->platnost_do; ?>" name="platnost_do" style="width:85px" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'" maxlength="10">&nbsp; <img src="../imgs/cal.gif" onclick="displayDatePicker('platnost_do', false, 'ymd', '-');" />
	</div>
	<div style="padding-left: 20px; width: 70%;">
		<br><input type="Submit" value="Uprav oznam"  style="width:115px" style="background:#D6E0F5;color:#003399" onmouseover="this.style.background='#6285df';this.style.color='#FFFFFF'" onmouseout="this.style.background='#D6E0F5';this.style.color='#003399'"><br><br>
	</div>
	<input type="Hidden" name="id" value="<?= $row->id ?>">
	<input type="Hidden" name="uprav" value="1">
</form>
	
<?
}
?>
</body>
</html>
