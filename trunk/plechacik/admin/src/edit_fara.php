<br>
<div align="center" class="cisla">EDITUJ/ZMAŽ FARSKÝ OZNAM</div>
<br>
<br>
<?	
require_once('../setup.php');

$upraveny = date("Y-n-j");

if(!(@$link=mysql_pconnect($db_host,$db_user,$db_passwd))) {
    echo "Server problems, try to log in later."; exit;
  }
  if(!@mysql_select_db($db_name,$link)){
    echo "Server problems, try to log in later."; exit;
  }
//-------------------------------------------------------
if ($delete){
	$stmt = "delete from oznamy_fara where id='$id'";
	if (@!mysql_query($stmt, $link)){
		echo "ta more chyba";	exit;
	}
}
//-------------------------------------------------------

$stmt = "select * from oznamy_fara order by id desc";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba";	exit;
	}
$pocetOznamov = mysql_num_rows($result);	

if ($pocetOznamov>0){
while ($row = mysql_fetch_object($result)){
?>
	<div class="textmain" style="width: 70%;">
		
		<div style="padding: 5px; width:100%;">
			<div style="padding: 5px; width:100%;">
				<div style="float:right;"><a href="javascript:javascript: openwindow('./src/editOznamFaraById.php?edit=1&id=<?=$row->id; ?>');"><img src="./imgs/edit.png" border="0" title="Editovat aktualitu: <?= $row->nazov; ?>"></a>&nbsp;&nbsp;<a href="?action=7&delete=1&id=<?=$row->id; ?>"><img src="../imgs/delete.gif" border="0" title="Zmazat aktualitu: <?= $row->nazov; ?>"></a></div>
			</div>
			<div style="padding: 5px; width: 100%;">
				<fieldset class="aktuality" lang="sk">
					<legend class="legenda" style="padding: 2px 5px 2px 5px; "> <? echo $row->nazov; ?> </legend>
					<div style="padding: 5px; width: 100%;">
						<? echo $row->text; ?>
					</div>
				</fieldset>
			</div>
		</div>

		<div style="background-image: url('../imgs/h_dot_line.gif'); padding: 8px 5px 0 8px; width: 100%; height: 15px;text-align: right;"><a href="javascript:scroll(0,0)"><img src="../imgs/back_top.gif" width="11" height="11" border="0" alt="Spat na vrch"></a></div>
	</div>
<?	

}#while
}else{
	echo "<div class=\"cisla\" align=\"center\"><br><br><br>V databáze nie sú žiadne oznamy.<br><br><br></div>";
}
?>
<SCRIPT language="JavaScript1.2">
function openwindow(link){
	window.open(link,"mywindow","menubar=1,resizable=1,width=800,height=500");
}
</SCRIPT>
