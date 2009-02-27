
<?
if ($mazem){
	$subor=fopen("../chat/data/log","w");
	fputs($subor, "");
	echo "<div align=\"center\" class=\"nadpis\"><img src=\"../imgs/ok.gif\">&nbsp;&nbsp;&nbsp;Zmazanie bolo úspešné.</div>";
} else {
?>


<div class="nadpis" align="center">Naozaj chceš zmaza históriu v chat-e?</div>
<br>
<div align="center">
	<form method="post" action="?action=13" style="margin-top:0px;margin-bottom:0px;margin-left:0px;margin-right:0px;">
		<input type="Submit" value="Ano" style="background:#01a727;color:#FEFFE1;cursor:hand;" onmouseover="this.style.background='#FEFFE1';this.style.color='#01a727'" onmouseout="this.style.background='#01a727';this.style.color='#FEFFE1'"></div>
		<input type="Hidden" name="mazem" value="1">
	</form>
</div>

<?
}
?>
