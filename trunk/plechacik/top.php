<script language="JavaScript" type="text/javascript">

function active(meno) {
	document[meno].src = "./imgs/button_" + meno + "_a.gif";
}
function inactive(meno) {
	document[meno].src = "./imgs/button_" + meno + "_i.gif";
}
function preload(){
	var a = new Image();
	var b = new Image();
	var c = new Image();
	var d = new Image();
	var e = new Image();
	var f = new Image();
	var g = new Image();
	a.src="./imgs/button_kontakt_a.gif";
	b.src="./imgs/button_gb_a.gif";
	c.src="./imgs/button_oznamy_a.gif";
	d.src="./imgs/button_fara_a.gif";
	e.src="./imgs/button_historia_a.gif";
	f.src="./imgs/button_google_web_a.gif";
	g.src="./imgs/button_google_image_a.gif";
}	

</script>

<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100" background="./imgs/bg_top.gif">
	<tr><td height="100" width="100%" align="right"><img src="./imgs/top.jpg" height="100" border="0" width="500"></td></tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td width="89" height="35" background="./imgs/top_left.gif"><img src="./imgs/blank.gif"></td>
		<td width="89" height="35" background="./imgs/top_back.gif"><img src="./imgs/blank.gif"></td>
		<td height="35" width="*" background="./imgs/top_back.gif">
			<table cellpadding="0" cellspacing="0" border="0" align="center">
				<tr>
					<td><a href="?menu=1" onmouseover="active('historia')" onmouseout="inactive('historia')"><img src="./imgs/button_historia_i.gif" border="0" name="historia"></a><span class="small"><br><br></span></td>
					<td><img src="./imgs/tab.gif" border="0"></td>
					<td><a href="?menu=2" onmouseover="active('oznamy')" onmouseout="inactive('oznamy')"><img src="./imgs/button_oznamy_i.gif" border="0" name="oznamy"></a><span class="small"><br><br></span></td>
					<td><img src="./imgs/tab.gif" border="0"></td>
					<td><a href="?menu=3" onmouseover="active('fara')" onmouseout="inactive('fara')"><img src="./imgs/button_fara_i.gif" border="0" name="fara"></a><span class="small"><br><br></span>
					<td><img src="./imgs/tab.gif" border="0"></td>
					<td><a href="?menu=4" onmouseover="active('gb')" onmouseout="inactive('gb')"><img src="./imgs/button_gb_i.gif" border="0" name="gb"></a><span class="small"><br><br></span></td>
					<td><img src="./imgs/tab.gif" border="0"></td>
					<td><a href="?menu=5" onmouseover="active('kontakt')" onmouseout="inactive('kontakt')"><img src="./imgs/button_kontakt_i.gif" border="0" name="kontakt"></a><span class="small"><br><br></span></td>
				</tr>			
			</table>
		<!-- <span class="small"><br></span> --></td>
		<td width="89" height="35" background="./imgs/top_right.gif"><img src="./imgs/blank.gif"></td>
	</tr>
</table>
<div id="layer_logo" style="position:absolute; left:40px; top:15px; width:92px; height:110px; z-index:1; visibility: visible">
	<img src="./imgs/erb.gif" alt="http://www.plechotice.sk" width="92" height="110" border="0">
</div>