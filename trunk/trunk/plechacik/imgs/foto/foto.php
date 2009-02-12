<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Foto - detail</title>
	<LINK REL="stylesheet" TYPE="text/css" HREF="../../plechacik.css">
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<center>
<span class="small"><br></span>
<table cellpadding="0" cellspacing="0" border="0" width="640">
	<tr>
		<td class="text_main" width="20">&nbsp;</td>
		<td width="*" align="center">
<?
$obr_dalej = $obr + 1;
$obr_spat = $obr - 1;
if ($obr > 1){
	echo "<a href=\"./foto.php?adr=" . $adr . "&obr=" . $obr_spat . "&pocet=" . $pocet . "\" class=\"gallery\" title=\"o 1 snímok dozadu\"><<</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}
if ($obr < $pocet) {
	echo "<a href=\"./foto.php?adr=" . $adr . "&obr=" . $obr_dalej . "&pocet=" . $pocet . "\" class=\"gallery\" title=\"o 1 snímok dopredu\">>></a>";
}
?>
		</td>
		<td class="textmain" width="20"><? echo $obr . "/" . $pocet;?></td>
	</tr>
</table>
<?
echo "<span class=\"small\"><br><br></span>";
echo "<img src=\"./" . $adr . "/obr" . $obr . ".jpg\" border=\"0\" alt=\"Kliknutím zatvor obrázok\" onclick=\"window.close()\">";
?>

</center>
</body>
</html>
