<style>
	a.faraMenu:hover {
		color: red; 
	}
</style>
<?
if (empty($submenu)) {
	$submenu = 1;
}

?>

<div align="center" class="cisla">FUTBALOV� KLUB</div>
<br>
<div style="padding-left: 150px;"><? echo colorArrowFara(1); ?>&nbsp;<a href="?action=<?echo $action;?>&submenu=1" class="faraMenu">"A"</a>&nbsp;&nbsp;&nbsp;<? echo colorArrowFara(2); ?>&nbsp;<a href="?action=<?echo $action;?>&submenu=2" class="faraMenu">Dorast</a>&nbsp;&nbsp;&nbsp;<? echo colorArrowFara(3); ?>&nbsp;<a href="?action=<?echo $action;?>&submenu=3" class="faraMenu">�iaci</a>&nbsp;&nbsp;</div>
<br>
<?php
include_once("../fckeditor/fckeditor.php") ;

require_once('../setup.php');

if(!(@$link=mysql_pconnect($db_host,$db_user,$db_passwd))) {
	echo "Server problems, try to log in later."; exit;
}
if(!@mysql_select_db($db_name,$link)){
	echo "Server problems, try to log in later."; exit;
}

$id = $submenu; 

if ($uprav){
	$content = trim(stripslashes( $_POST[futbalovyKlubContent] )) ;
	
	$stmt = "update futbalovy_klub SET content='$content' where id=" . $id;
//	echo $stmt; 

	if (@!mysql_query($stmt, $link)){
		echo "Error during updating... \n stmt: " . $stmt;	exit;
	}
	
	echo "<div class=\"cisla\" align=\"center\"><br><br><br>Sekcia 'futbalovy klub' bola zmenen�.<br><br><br></div></body></html>";
	exit; 
}

$stmt = "select * from futbalovy_klub where id=" . $id;
//echo $stmt; 

if (@!($result = mysql_query($stmt, $link))){
	echo "ta more chyba";	exit;
}

$resultCount = mysql_num_rows($result);

if ($resultCount == 1) { 
	$row = mysql_fetch_object($result);

?>

<form action="?action=14&submenu=<?= $submenu; ?>" method="post">
	<div class="textmain" style="width: 100%;">
		<div style="padding: 5px; width: 70%;">
			<?php
				$oFCKeditor = new FCKeditor('futbalovyKlubContent') ;
				$oFCKeditor->Width = 800;
				$oFCKeditor->Height = 600;
				$oFCKeditor->ToolbarSet = 'MyToolbar'; 
				$oFCKeditor->Value = $row->content; 
				$oFCKeditor->BasePath = '../fckeditor/' ;
				$oFCKeditor->Create() ;
			?>
		</div>
	</div>
	<div style="padding-left: 20px; width: 70%;">
		<input type="Submit" value="Ulo�"  style="width:115px" style="background:#D6E0F5;color:#003399" onmouseover="this.style.background='#6285df';this.style.color='#FFFFFF'" onmouseout="this.style.background='#D6E0F5';this.style.color='#003399'"><br><br>
	</div>
	<input type="Hidden" name="id" value="<?= $row->id ?>">
	<input type="Hidden" name="uprav" value="1">
</form>
	
<?
}
?>