<?
$koma_tran++;											//cookies pre pocitadlo => navstevnost translatora
setcookie("koma_tran", $koma_tran);						//script k pocitadlu je v statistic.php
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<?
//index.php

//include_once("dbparams.php");

/* Databaza z na ktoru sa konektujem sa vola "slovnik". Kazda z tabuliek pozostava zo stlpcov: "slovensky" a "vybrany jazyk". */
// ©Sully

require_once("../setup.php");

$okej_ipecky = array("100.10.10.177", "127.0.0.1", "147.232.158.158");


define ("no", "<p>\n");
define ("stat_prem", "23");

if(isset($HTTP_X_FORWARDED_FOR)) $REMOTE_ADDR=$HTTP_X_FORWARDED_FOR;

$ipecka = $REMOTE_ADDR;

//                                      ******* BEGIN FUNCTIONS *********

function first ($select){
	if ($select%2 == 1){
		$result = "Slovensky";
			return $result;
	}else{	
		switch ($select){
			case 0 : {$result = "Anglicky"; return $result; break;}
			case 2 : {$result = "Nemecky"; return $result; break;}
			case 4 : {$result = "Francuzsky"; return $result; break;}
			case 6 : {$result = "Taliansky"; return $result; break;}
			case 8 : {$result = "Spanielsky"; return $result; break;}
		}
	}
}
//-------------------
function second($select){
	if ($select%2 == 0){
		$result = "Slovensky";
			return $result;
	}else{ 
		switch ($select){
			case 1 : {$result = "Anglicky"; return $result; break;}
			case 3 : {$result = "Nemecky"; return $result; break;}
			case 5 : {$result = "Francuzsky"; return $result; break;}
			case 7 : {$result = "Taliansky"; return $result; break;}
			case 9 : {$result = "Spanielsky"; return $result; break;}
		}
	}
}
//-----------------
	function tables($number){
        	switch ($number){
			case 0 :
			case 1 :{$name = "english"; return $name; break;}
			case 2 :
			case 3 :{$name = "german"; return $name; break;}
			case 4 : 
			case 5 :{$name = "french"; return $name; break;}
			case 6 : 
			case 7 :{$name = "italian"; return $name; break;}
			case 8 : 
			case 9 :{$name = "spanish"; return $name; break;}
			default : echo "";
			break;
		} 
	}
//-----------------------	

/*
	function entita($riadok){
	switch ($riadok){
             case 0 : {return $dbdata->anglicky; break;}
             case 2 : {return $dbdata->nemecky; break;}
             case 4 : {return $dbdata->francuzsky; break;}
             case 6 : {return $dbdata->taliansky; break;}
             case 8 : {return $dbdata->spanielsky; break;}
             case 1 :
             case 3 :
             case 5 :
             case 7 :
             case 9 : {return $dbdata->slovensky; break;}}
		
	}
*/
//-----------------------------
	function policko($pozicia, $cislo){
		global $ipecka;
		ereg('^([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})$', $ipecka, $policko);
		if ($policko[$pozicia] == $cislo){
				return true;
		}
		return false;
	}
//-----------------------------
	function control_ip($info){
		global $ipecka, $okej_ipecky;
		if ($info == "all"){return true;}
		if ($info == "index"){
			$count_okej = count($okej_ipecky);
			for($i=0; $i<=$count_okej; $i++){
				if ($okej_ipecky[$i] == $ipecka)
					return true;
			}
			return false;
		}
	}
//----------------------
	function quote($string){
		$old = str_replace("'","`",$string);
		$new = str_replace("\\","",$old);
		return $new;
	}
//-----------------------	
	function unquote($ehm){
		$nove = str_replace("`","'",$ehm);
		return $nove;
	}
//------------------------	
	function slash($prem){
		$vrat = str_replace("\\","",$prem);
		return $vrat;
	}
//------------------------------
	function errMsg($message){
		printf("<b>%s</b>\n", $message);
		//return $oznam;
	}
//										******* END FUNCTIONS *********

//----------------------------
$name_db = "slovnik";
//----------------------------

if (@!($spojenie = mysql_pconnect($db_host, $db_user, $db_passwd))){
	errMsg("Nepodarilo sa nadviazat spojenie s Mysql serverom");
	exit();
}

if (!mysql_select_db($db_name, $spojenie)){
	errMsg("Nepodarilo sa vybrat pozadovanu databazu");
	exit();
}

$request = trim($request);				//odstranuje neziaduce medzery v pravo a vlavo v slovicko - ked ich napr. niekto zadal omylom
$ivec = $res;							//premenna $ivec sa vyuziva pri statistike - ak je null iba vtedy sa zapusuju slovicka do statistiky
if (!$res){$res = 0;}

$stmt_vysledok = "select * from " . tables($selection) . " where " . StrToLower(first($selection)) . " like '" . quote($request) . " %' or " . StrToLower(first($selection)) . "='" . quote($request) . "'";
$stmt_limit = "select * from " . tables($selection) . "  where " . StrToLower(first($selection)) . " like '" . quote($request) . " %' or " . StrToLower(first($selection)) . "='" . quote($request) . "' limit $res,10";

if (!($vysledok = mysql_query($stmt_vysledok, $spojenie))){
	errMsg("&#62;&#62;&#62;   Doslo k chybe v databaze  &#60;&#60;&#60; <br> ");
			if ($selection > 9){echo "<br>&#62;&#62; Charakteristika chyby: Nespravny vyber jazyka &#60;&#60;" . no . "Tvoja IP adresa: $ipecka";}
	exit();
}

if (!($limit = mysql_query($stmt_limit, $spojenie))){
	errMsg("&#62;&#62;&#62;   Doslo k chybe v databaze  &#60;&#60;&#60; <br> ");
	exit();
}

@$num = mysql_num_rows($vysledok);							//vrati pocet najdenych poloziek
@$num2 = mysql_num_rows($limit);
@$pom = ceil($num/10);

if (!$request) {$num = 0;}									//$num je nula (kvoli vypisaniu poctu slovicok), lebo keby bol $request == "" (pri SVK<->ENG) tak by DB vratilo 88 slovicok - nejake halusky ktore sa dostali do DB chybou zapisu do DB lebo slovicka obsahovali bodkociarku

require ("statistic.php");								//zapis do statistiky.... 
?>
<html>
<head>
<title>Translator<?if (!empty($request) && ($pom != 0)){echo " - page " . (($res/10)+1) . "/$pom";}else{print " - Welcome ";}?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<META HTTP-EQUIV='author' CONTENT='projected by Ivan Stefko'>
<META HTTP-EQUIV='Keywords' CONTENT='plechotice, trebisov, obec, novy ruskov, internet, sully'>
<META HTTP-EQUIV='copyright' CONTENT='© 2003, Plechotice'>
<META HTTP-EQUIV='Reply-to' CONTENT='webmaster@plechotice.sk'> 
<link rel="stylesheet" type="text/css" href="translator.css">
<script language="JavaScript">
<!--
bName = navigator.appName;
bVer = parseInt(navigator.appVersion);
ver="bad";
IE="4";
if(bName=="Microsoft Internet Explorer" && bVer >= 5)
  IE="5";
if((bName == "Netscape" && bVer >= 3)||(bName == "Microsoft Internet Explorer" && bVer >= 3))
  ver = "ok";


//							******  BEGIN JavaScript FUNCTIONS   ******
function active(txt, file, doc) {
	if (ver == "ok") {
	document[doc].src=file;
	window.status = txt;
	}
}
//-------------------
function inactive(file, doc) {
	if (ver == "ok") {
	document[doc].src=file;
	window.status = ""; 
 	}
}
//-------------------
function select(){
	document.formular.request.focus();
	document.formular.request.select();
	return;
}
//-------------------
function change(theForm){
	if (theForm.value%2 == 0){
		theForm.value++;
	}else{
		theForm.value--;
	}
	theForm.options[theForm.value].selected = true;
	select();
}
//-------------------
function preload(){
	var a = new Image();
	var b = new Image();
	var c = new Image();
	a.src = "obr/joja.gif";
	b.src = "obr/posta_zav.gif";
	c.src = "obr/stat_a.gif";
}
//-------------------
function start_up(){
	preload();
	select();
}
//									******  END JavaScript FUNCTIONS   ******
//-->
</script>
</head>
<center>
<body bgcolor="#CEE3FF" onload="start_up()">

<table width="610" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td width="610" valign="middle" height="40" align="right" colspan="2" background="obr/vrch2.gif">
			<span class="text">
			<form action="index.php" method="post" name="formular">
			<input type="Text" size="36" name="request" value="<?print slash($request);?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="Submit" style="background:#C0C0C0;color:#FFFFFF;cursor:hand" onmouseover="this.style.color='#808080';this.style.background='#FFFFFF'" onmouseout="this.style.color='#FFFFFF';this.style.background='#C0C0C0'" value="Search">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
		</td>
	</tr>
	<tr>
		<td width="570" height="20"><img src="obr/vrch.gif" width="570" height="20" border="0"></td>
		<td width="40" valign="top" rowspan="3" align="left" background="obr/vpravo.gif">
			<img src="obr/tab.gif" width="40" height="17" border="0"><br><a href="javascript:change(document.formular.selection)" onmouseover="active('Vymeni poradie vybraneho prekladu', 'obr/joja.gif', 'reverse');return true;" onmouseout="inactive('obr/jojo.gif', 'reverse')"><img src="obr/jojo.gif" name="reverse" width="30" height="30" border="0" alt="Reverse language selection"></a>
			<?
			$mail_tab = 81;
			if (control_ip("all")){
				echo "<img src=\"obr/tab.gif\" width=\"40\" height=\"1\" border=\"0\"><br><a href=\"./stat\" target=\"_blank\" onmouseover=\"active('Statistika na www.intrak.sk/translator/stat', 'obr/stat_a.gif', 'info');return true;\" onmouseout=\"inactive('obr/stat_i.gif', 'info')\"><img src=\"obr/stat_i.gif\" name=\"info\" width=\"30\" height=\"30\" border=\"0\" alt=\"Statistics\"></a>\n";
				$mail_tab = 50;
			}
			?>
			<img src="obr/tab.gif" width="40" height="<?echo $mail_tab;?>" border="0"><br><a href="mailto:webmaster@plechotice.sk?subject=Translator" onmouseover="active('Piste mi vase pripomienky a navrhy - webmaster@plechotice.sk', 'obr/posta_otv.gif', 'posta');return true" onmouseout="inactive('obr/posta_zav.gif', 'posta')"><img src="obr/posta_zav.gif" name="posta" width="30" height="30" border="0" alt="M@il - send your comments"></a>
		</td>
	</tr>
	<tr> 
		<td width="570" align="center" valign="top" background="obr/stred.gif">
		
			<table width="530" height="253" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td width="265" height="25" valign="top" align="left">
						<span class="result"><?echo "Poèet nájdených slovíèok: " . number_format($num,0,""," ");?></span>
					</td>
					<td width="265" height="25" valign="top" align="right">
						<span class="text">
						<select name="selection">
							<option value="0" <?if($selection=="0") {echo "selected";}?>>Anglicko &#187; Slovensky</option>
							<option value="1" <?if($selection=="1") {echo "selected";}?>>Slovensko &#187; Anglicky</option>
							<option value="2" <?if($selection=="2") {echo "selected";}?>>Nemecko &#187; Slovensky</option>
							<option value="3" <?if($selection=="3") {echo "selected";}?>>Slovensko &#187; Nemecky</option>
							<option value="4" <?if($selection=="4") {echo "selected";}?>>Francúzsko &#187; Slovensky</option>
							<option value="5" <?if($selection=="5") {echo "selected";}?>>Slovensko &#187; Francúzsky</option>
							<option value="6" <?if($selection=="6") {echo "selected";}?>>Taliansko &#187; Slovensky</option>
							<option value="7" <?if($selection=="7") {echo "selected";}?>>Slovensko &#187; Taliansky</option>
							<option value="8" <?if($selection=="8") {echo "selected";}?>>&#138panielsko &#187; Slovensky</option>
							<option value="9" <?if($selection=="9") {echo "selected";}?>>Slovensko &#187; &#138panielsky</option>
						</select>
			</form>
						</span>
					</td>
				</tr>
				<tr>
					<td width="530" align="center" colspan="2" valign="top">
					<span class="text">
						<table width="530" cellpadding="0" cellspacing="<?if ((!$num2) || (!$request)){echo "0";}else{echo "1";}?>" border="0" bgcolor="white">
<?
$color = "#c0c0c0";
if (ereg('^[ ]*$', $request)){			//($request == "")
   	print "Nezadal si ziadne slovo <br>";
}
 
if(($num2 != "") && ($request != "")){	//halvicka tabulky sa nebude zobrazovat ak nie je result z DB alebo nebolo zadane ziadne slovicko
?>
							<tr bgcolor="#808080">
								<td width="265" align="center" height="20"><span class="hlavicka"><?echo first($selection);?></span></td>
								<td width="265" align="center" height="20"><span class="hlavicka"><?echo second($selection);?></span></td>
							</tr>
<?}?>

<?
$j = 1;
if (($num2 != "") && ($request != "")){
	while ($dbdata = mysql_fetch_object($limit)){
	$j++;
	print "<tr bgcolor=\"$color\">
				<td align=\"right\" width=\"265\" style=\"padding-right:8px;padding-left:5px\"><span class=\"slovicka\">";
//				print entita($selection);
//				print $dbdata->anglicky;
			switch ($selection){
				case 0 : {echo unquote($dbdata->anglicky); break;}
				case 2 : {echo unquote($dbdata->nemecky); break;}
				case 4 : {echo unquote($dbdata->francuzsky); break;}
				case 6 : {echo unquote($dbdata->taliansky); break;}
				case 8 : {echo unquote($dbdata->spanielsky); break;}
				case 1 : 
				case 3 : 
				case 5 : 
				case 7 : 
				case 9 : {echo unquote($dbdata->slovensky); break;}}

			echo "</span></td>
				<td align=\"left\" width=\"265\" style=\"padding-left:8px;padding-right:5px\"><span class=\"slovicka\">";
			switch ($selection){
				case 1 : {echo unquote($dbdata->anglicky); break;}
				case 3 : {echo unquote($dbdata->nemecky); break;}
				case 5 : {echo unquote($dbdata->francuzsky); break;}
				case 7 : {echo unquote($dbdata->taliansky); break;}
				case 9 : {echo unquote($dbdata->spanielsky); break;}
				case 0 : 
				case 2 : 
				case 4 :
				case 6 :
				case 8 : {echo unquote($dbdata->slovensky); break;}}
			echo"</span></td></tr>";
			
			if(($j % 2) == 0){ 
				$color = "#e0e0e0"; //delenie modulo 2 => kazdy druhy riadok bude mat taku farbu
			} else { $color = "#c0c0c0"; }
		
		}
}
echo "\n";?>
						</table>
						<table width="530" height="22" cellspacing="0" cellpadding="0" border="0">
							<tr>
								<td width="530" height="22" align="left" valign="bottom">
								<span class="text">
<?

//										********  BEGIN LISTER  ********


if (($num2 != "") && ($request != "")){				//lister sa zacne zobrazovat len vtedy ked $request nie je prazdny a je vysledok z DB
	
		for ($i=1;$i<$pom+1;$i++){
			$pocet = ($i-1)*10;
			
			if ($i == 1){				//sipku << zobrazi pred tym ako sa zacnu zobrazovat cisla... 
				echo "&nbsp;&nbsp;&nbsp;";
				if ($res != 0){			//sipka sa nebude zobrazovat ak bude aktivna jednotka
				echo "<a href=\"index.php?res=".($res-10)."&request=" . urlencode($request) . "&selection=$selection\">&#171;</a>&nbsp";
				}
			}
			
			if ($num > 10){    //cisla sa budu zobrazovat iba vtedy ked je to na viac stran=>nezobrazi sa sama 1
				if ($i == ($res+10)/10){	
					if ($i == 26){print "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
						if ($i == 46){echo "<b><font color=\"#ffffff\">...&nbsp;&nbsp;</font></b>";}
						echo "<b><i><font color=\"#606060\">$i</font></i></b>&nbsp;&nbsp;";
						
				}else{
				if ($i == 26){print "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
					if ($i <= 45){
					echo "<a href=\"index.php?res=$pocet&request=" . urlencode($request) . "&selection=$selection\">$i</a>&nbsp;&nbsp;";
					}else{
						if ($i == 46){echo "<b><font color=\"#ffffff\">...&nbsp;&nbsp;</font></b>";}
					 }
				}
			}
			
			if ($i == $pom){					//sipku ma zobrazit AZ vtedy ked $i==$pom
				if (($res+$num2) != $num){	//podmienka kedy sa ma zobrazovat resp. kedy ma zmiznut
				echo "<a href=\"index.php?res=".($res+10)."&request=" . urlencode($request) . "&selection=$selection\">&#187;</a>";
				}
			}
		
		}
}
//	  											********  END LISTER  ********


@mysql_free_result($vysledok);
@mysql_free_result($limit);
?>
								</span></td>
							</tr>
						</table>
					</span>
					</td>
				</tr>
			</table>
		</td>
	</tr>
<tr>
<td width="570" height="20"><img src="obr/spodok.gif" width="570" height="20" border="0"></td>
</tr>
</table>
</body>
</center>
</html>


