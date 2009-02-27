<script language="JavaScript" type="text/javascript">
	function action(service){
		window.open("http://images.google.com/" + service + "?q=" + google.q.value + "&ie=ISO-8859-1&newwindow=1");
	}
	function checkGoogle(){
		if(self.document.forms.google.q.value.length<=0){
			alert("Nezadali ste vyh¾adávacie kritérium");
			self.document.forms.google.q.focus();
    return false;
		}
		return true;
	}
</script>
<br>

<?php

//$file = "http://export.funny.sk/jokes_new_5.php";

/*
if (!($fp = fopen ($file, "r"))){
	exit;
}

while ($data = fread ($fp, 4096)){
	$all .= $data;
	$vtip1 = substr ($data, 22, strpos($data, "</JOKE>")-22);
	$pom = substr ($data, strpos($data, "</JOKE>")+15);
	$vtip2 = substr ($pom, 0, strpos($pom, "</JOKE>"));
}

$kontrola = substr ($all, 0, 14);
if ($kontrola != "<EXPORT_JOKES>"){
	$vtip1 = "";
	$vtip2 = "";
}
*/


$file = "http://szm.sk/moduly/VYRVNO";			//vtip

if (@!($fp = fopen ($file, "r"))){
	$vtip1 = "<br><div class=\"textmain\" style=\"text-align:center;font-size:11px;line-height:13px;\"><i>Nepodarilo sa nadviazat spojenie so serverom.</i></div><br>";
}else{
	while ($data = fread ($fp, 4096)){
		$all .= $data;
	}
	$vtip1 = substr ($all, strpos($all, "</table>")+9);
}

$all = "";
$data = "";

$file = "http://szm.sk/moduly/VYRGUI";			//guiness rekord
if (@!($fp = fopen ($file, "r"))){
	$rekord = "<br><div class=\"textmain\" style=\"text-align:center;font-size:11px;line-height:13px;\"><i>Nepodarilo sa nadviazat spojenie so serverom.</i></div><br>";
}else{
	while ($data = fread ($fp, 4096)){
		$all .= $data;
	}
	$rekord = substr ($all, strpos($all, "</table>")+9);
}

$all = "";
$data = "";

$file = "http://szm.sk/moduly/VYRVYS";			//vyrok
if (@!($fp = fopen ($file, "r"))){
	$vyrok = "<br><div class=\"textmain\" style=\"text-align:center;font-size:11px;line-height:14px;\"><i>Nepodarilo sa nadviazat spojenie so serverom.</i></div><br>";
	$autor = "";
}else{
	while ($data = fread ($fp, 4096)){
		$all .= $data;
	}
	$pos2 = strpos($all, "<BR>");
	$pos = strpos($all, "</table>")+9;
	$koniec = $pos2 - $pos; 
	$vyrok = substr ($all, strpos($all, "</table>")+9, $koniec);
	$autor = substr ($all, strpos($all, "<BR>"));
}

 
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td width="*" valign="top"><? require_once("./src/aktuality.php"); ?></td>	
		<td width="200" valign="top">
<!-- ----------------------- zaciatok vyhladavac google ----------------------------------------- -->
 <!-- 		<table cellpadding="0" cellspacing="0" border="0" width="185" align="center">
				<tr>
					<td width="*" height="30"><img src="./imgs/lista_hladaj.gif" border="0"></td>
				</tr>
		</table>
		<table cellpadding="0" cellspacing="0" border="0" width="185" align="center">
				<tr>
					<td width="2" background="./imgs/main_body_left.gif"><img src="./imgs/blank.gif"></td>
					<td width="*" bgcolor="#fcfcfc">
						<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
							<tr>
								<td align="center" valign="bottom"><span class="small"><br><br><br><br></span>
									<form action="http://www.google.com/search" method="get" target="_blank" style="margin-top:0px; margin-bottom:0px;margin-right:0px; margin-left:0px;" name="google" onsubmit="return checkGoogle();">
										<input type="Text" name="q" style="width:150px; font-weight:normal" onFocus="this.style.background='#FFFFFF'; this.style.color='#000000'" onBlur="this.style.background='#FcFcFc'; this.style.color='#000000'"><span class="small"><br><br><br><br></span>
										<a href="javascript:action('images')"><img src="./imgs/button_google_image_i.gif" onclick="return checkGoogle();" border="0" style="border:0px" alt="H¾adaj v obrázkoch"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:action('search')"><img src="./imgs/button_google_web_i.gif" border="0" style="border:0px" alt="H¾adaj na webe" onclick="return checkGoogle();"></a>
									</form>
								</td>	
							</tr>
							<tr><td align="center"><span class="small"><br><br></span><a href="http://www.google.com" title="www.google.com" target="_blank"><img src="./imgs/google.gif" border="0"></a><span class="small"><br><br></span></td></tr>
						</table>
					</td>
					<td width="7" background="./imgs/main_body_right.gif"><img src="./imgs/blank.gif"></td>
				</tr>
		</table>
		<table cellpadding="0" cellspacing="0" border="0" width="185" align="center">
				<tr>
					<td width="5" height="10" background="./imgs/main_bottom_left.gif"><img src="./imgs/blank.gif"></td>
					<td width="*" height="10" background="./imgs/main_bottom_middle.gif"><img src="./imgs/blank.gif"></td>
					<td width="10" height="10" background="./imgs/main_bottom_right.gif"><img src="./imgs/blank.gif"></td>
				</tr>
		</table> -->
 <!-- ----------------------- koniec vyhladavac google ----------------------------------------- -->


<!-- ----------------------- guiness rekord zaciatok ----------------------------------------- -->		

 			<table cellpadding="0" cellspacing="0" border="0" width="185" align="center">
				<tr>
					<td width="185" height="30"><img src="./imgs/lista_rekord.jpg" border="0"></td>
				</tr>
			</table>
			<table cellpadding="0" cellspacing="0" border="0" width="185" align="center">
				<tr>
					<td width="2" background="./imgs/main_body_left.gif"><img src="./imgs/blank.gif"></td>
					<td width="*" class="textmain" style="text-align:left;font-size:11px;line-height:14px;" bgcolor="#fcfcfc"><? echo $rekord; ?></td>
					<td width="7" background="./imgs/main_body_right.gif"><img src="./imgs/blank.gif"></td>
				</tr>
			</table>
			<table cellpadding="0" cellspacing="0" border="0" width="185" align="center">
				<tr>
					<td width="5" height="10" background="./imgs/main_bottom_left.gif"><img src="./imgs/blank.gif"></td>
					<td width="*" height="10" background="./imgs/main_bottom_middle.gif"><img src="./imgs/blank.gif"></td>
					<td width="10" height="10" background="./imgs/main_bottom_right.gif"><img src="./imgs/blank.gif"></td>
				</tr>
			</table>
<!-- ----------------------- guiness rekord koniec ----------------------------------------- -->
<br>
<!-- ----------------------- zaciatok vtip ----------------------------------------- -->		

 			<table cellpadding="0" cellspacing="0" border="0" width="185" align="center">
				<tr>
					<td width="185" height="30"><img src="./imgs/lista_vtip.gif" border="0"></td>
				</tr>
			</table>
			<table cellpadding="0" cellspacing="0" border="0" width="185" align="center">
				<tr>
					<td width="2" background="./imgs/main_body_left.gif"><img src="./imgs/blank.gif"></td>
					<td width="*" class="textmain" style="text-align:left;font-size:11px;line-height:14px;" bgcolor="#fcfcfc"><? echo $vtip1; ?></td>
					<td width="7" background="./imgs/main_body_right.gif"><img src="./imgs/blank.gif"></td>
				</tr>
			</table>
			<table cellpadding="0" cellspacing="0" border="0" width="185" align="center">
				<tr>
					<td width="5" height="10" background="./imgs/main_bottom_left.gif"><img src="./imgs/blank.gif"></td>
					<td width="*" height="10" background="./imgs/main_bottom_middle.gif"><img src="./imgs/blank.gif"></td>
					<td width="10" height="10" background="./imgs/main_bottom_right.gif"><img src="./imgs/blank.gif"></td>
				</tr>
			</table>
<!-- ----------------------- koniec vtip ----------------------------------------- -->		
<br>
<!-- ----------------------- vyrok zaciatok ----------------------------------------- -->		

 			<table cellpadding="0" cellspacing="0" border="0" width="185" align="center">
				<tr>
					<td width="185" height="30"><img src="./imgs/lista_vyrok.gif" border="0"></td>
				</tr>
			</table>
			<table cellpadding="0" cellspacing="0" border="0" width="185" align="center">
				<tr>
					<td width="2" background="./imgs/main_body_left.gif"><img src="./imgs/blank.gif"></td>
					<td width="*" class="textmain" style="text-align:left;font-size:11px;line-height:14px;" bgcolor="#fcfcfc"><? echo $vyrok . "<i>" . $autor . "</i>"; ?></td>
					<td width="7" background="./imgs/main_body_right.gif"><img src="./imgs/blank.gif"></td>
				</tr>
			</table>
			<table cellpadding="0" cellspacing="0" border="0" width="185" align="center">
				<tr>
					<td width="5" height="10" background="./imgs/main_bottom_left.gif"><img src="./imgs/blank.gif"></td>
					<td width="*" height="10" background="./imgs/main_bottom_middle.gif"><img src="./imgs/blank.gif"></td>
					<td width="10" height="10" background="./imgs/main_bottom_right.gif"><img src="./imgs/blank.gif"></td>
				</tr>
			</table>
<!-- ----------------------- vyrok koniec ----------------------------------------- -->
		</td>
	</tr>
</table>
<br>

