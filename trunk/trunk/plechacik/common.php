<?php
$okej_ip = array("100.10.10.177","127.0.0.1");

if(isset($HTTP_X_FORWARDED_FOR)) $REMOTE_ADDR=$HTTP_X_FORWARDED_FOR;
	$ipaddress = $REMOTE_ADDR;

//----  osetrenie aby vracalo spravnu ip, pretoze na hostingu host2u.sk vracalo niekedy ip v tvare '100.10.10.x, unknown'	---------
	if ($pos = strpos($ipaddress, ",")){
		$ipaddress = substr($ipaddress, 0, $pos);
	}else{
		$ipaddress = $ipaddress;
	}
//--------------------------------------------------------

//	$host = GetHostByADDR($ipaddress);
//	echo $host;
//		ereg('^([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})$', $ipaddress, $policko);
//		print_r($policko);


//-------------------------    PREVOD DATUMIKU - ZACIATOK   ---------------------------
function modifyDate($date){
	ereg('^([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})$', $date, $datumik);

	switch ($datumik[2]) {
  case 1: $month = "janu·r"; break;
  case 2: $month = "febru·r"; break;
  case 3: $month = "marec"; break;
  case 4: $month = "aprÌl"; break;
  case 5: $month = "m·j"; break;
  case 6: $month = "j˙n"; break;
  case 7: $month = "j˙l"; break;
  case 8: $month = "august"; break;
  case 9: $month = "september"; break;
  case 10: $month = "oktÛber"; break;
  case 11: $month = "november"; break;
  case 12: $month = "december"; break;
	}

	$date =  "$datumik[3]. $month $datumik[1]";
	return $date;
}
//-------------------------    PREVOD DATUMIKU - KONIEC    ---------------------------

//-----------------------------
function control_ip($info){
	global $ipaddress, $okej_ip;
	if ($info == "all"){return true;}
	if ($info == "admin"){
		$count_okej = count($okej_ip);
		for($i=0; $i<=$count_okej; $i++){
			if ($okej_ip[$i] == $ipaddress)
				return true;
		}#for/i
	}#if/info/admin
	if ($info == "intranet"){
		ereg('^([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})$', $ipaddress, $policko);
		if (($policko[1] == 100) && ($policko[2] == 10) && ($policko[3] == 10) && ($policko[4] >= 1 && $policko[4] <= 255))
			return true;
	}
	return false;
}
//----------------------------------------------
function colorArrow($x){
	global $menu;
	if ($menu == $x) $arrow = "<img src=\"./imgs/arrow_menu_active.gif\">";
	else $arrow = "<img src=\"./imgs/arrow_menu.gif\">";
	return $arrow;
}
//----------------------------------------------
function colorArrowFara($x){
	global $submenu;
	if ($submenu == $x) $arrow = "<img src=\"./imgs/arrow_fara_menu_active.gif\">";
	else $arrow = "<img src=\"./imgs/arrow_fara_menu.gif\">";
	return $arrow;
}
//----------------------------------------------
function showArrow($j){
	if ($j>1){
		$vrat = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"javascript:scroll(0,0)\" title=\"Sp‰ù na vrch\"><img src=\"./imgs/back_top.gif\" border=\"0\"></a>";
	}else $vrat = "<img src=\"./imgs/blank.gif\">";
	return $vrat;
}
//----------------------------------------------
function ikony($text){
	$smiley = '&nbsp;<img src=\"./imgs/smiles/smiley.gif\">&nbsp;';
	$cry = '&nbsp;<img src=\"./imgs/smiles/cry.gif\">&nbsp;';
	$wink = "&nbsp;<img src=\"./imgs/smiles/wink.gif\">&nbsp;";
	$angry = "&nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp;";
	$grin = "&nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp;";
	$sad = '&nbsp;<img src=\"./imgs/smiles/sad.gif\">&nbsp;';
	$kiss = '&nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp;';
	$undecided = '&nbsp;<img src=\"./imgs/smiles/undecided.gif\">&nbsp;';
	$text = ereg_replace(" :undecided: ", $undecided, $text);
	$text = ereg_replace(" :kiss: ", $kiss, $text);
	$text = ereg_replace(" :smiley: ", $smiley, $text);
	$text = ereg_replace(" :cry: ", $cry, $text);
	$text = ereg_replace(" :sad: ", $sad, $text);
	$text = ereg_replace(" :grin: ", $grin, $text);
	$text = ereg_replace(" :wink: ", $wink, $text);
	$text = ereg_replace(" :angry: ", $angry, $text);
	return $text;

}
//----------------------------------------------
function datumAndTime(){
$datum = date("j. ") . date("n.") . date(" Y") . "&nbsp;&nbsp;" . date("G:i:s");
return $datum;
}
//----------------------------------------------
function datumik(){
	switch (date("w")) {
	  case 1: $den = "pondelok,&nbsp;&nbsp;<br>"; break;
	  case 2: $den = "utorok,&nbsp;&nbsp;<br>"; break;
	  case 3: $den = "streda,&nbsp;&nbsp;<br>"; break;
	  case 4: $den = "ötvrtok,&nbsp;&nbsp;<br>"; break;
	  case 5: $den = "piatok,&nbsp;&nbsp;<br>"; break;
	  case 6: $den = "sobota,&nbsp;&nbsp;<br>"; break;
	  case 0: $den = "nedeæa,&nbsp;&nbsp;<br>"; break;
	  default: $den = "<br>";
	}
	switch (date("F")) {
	  case "January": $month="janu·r"; break;
	  case "February": $month="febru·r"; break;
	  case "March": $month="marec"; break;
	  case "April": $month="aprÌl"; break;
	  case "May": $month="m·j"; break;
	  case "June": $month="j˙n"; break;
	  case "July": $month="j˙l"; break;
	  case "August": $month="august"; break;
	  case "September": $month="september"; break;
	  case "October": $month="oktÛber"; break;
	  case "November": $month="november"; break;
	  case "December": $month="december"; break;
	  default : $month=date("F");
	}
$datumik = $den . date("j. ") . $month . date(" Y") . "&nbsp;&nbsp;";
return $datumik;
}
//------------------------------------

//------------------------------------
function meniny($mesiac, $den){
	if ($mesiac == 1) {
	if ($den == 1) {
		$meniny = "Nov˝ rok, Vznik SR";
	} else if ($den == 2) {
		$meniny = "Alexandra";
	} else if ($den == 3) {
		$meniny = "Daniela";
	} else if ($den == 4) {
		$meniny = "Drahoslav";
	} else if ($den == 5) {
		$meniny = "Andrea";
	} else if ($den == 6) {
		$meniny = "AntÛnia";
	} else if ($den == 7) {
		$meniny = "Bohuslava";
	} else if ($den == 8) {
		$meniny = "SeverÌn";
	} else if ($den == 9) {
		$meniny = "Alexej";
	} else if ($den == 10) {
		$meniny = "D·öa";
	} else if ($den == 11) {
		$meniny = "MalvÌna";
	} else if ($den == 12) {
		$meniny = "Ernest";
	} else if ($den == 13) {
		$meniny = "Rastislav";
	} else if ($den == 14) {
		$meniny = "Radovan";
	} else if ($den == 15) {
		$meniny = "Dobroslav";
	} else if ($den == 16) {
		$meniny = "KristÌna";
	} else if ($den == 17) {
		$meniny = "Nataöa";
	} else if ($den == 18) {
		$meniny = "Bohdana";
	} else if ($den == 19) {
		$meniny = "DrahomÌra";
	} else if ($den == 20) {
		$meniny = "Dalibor";
	} else if ($den == 21) {
		$meniny = "Vincent";
	} else if ($den == 22) {
		$meniny = "Zora";
	} else if ($den == 23) {
		$meniny = "Miloö";
	} else if ($den == 24) {
		$meniny = "Timotej";
	} else if ($den == 25) {
		$meniny = "Gejza";
	} else if ($den == 26) {
		$meniny = "Tamara";
	} else if ($den == 27) {
		$meniny = "Bohuö";
	} else if ($den == 28) {
		$meniny = "Alfonz";
	} else if ($den == 29) {
		$meniny = "Gaöpar";
	} else if ($den == 30) {
		$meniny = "Ema";
	} else if ($den == 31) {
		$meniny = "Emil";
	}
}
if ($mesiac == 2) {
	if ($den == 1) {
		$meniny = "Tatiana";
	} else if ($den == 2) {
		$meniny = "Erik, Erika";
	} else if ($den == 3) {
		$meniny = "Blaûej";
	} else if ($den == 4) {
		$meniny = "Veronika";
	} else if ($den == 5) {
		$meniny = "Ag·ta";
	} else if ($den == 6) {
		$meniny = "Dorota";
	} else if ($den == 7) {
		$meniny = "Vanda";
	} else if ($den == 8) {
		$meniny = "Zoja";
	} else if ($den == 9) {
		$meniny = "Zdenko";
	} else if ($den == 10) {
		$meniny = "Gabriela";
	} else if ($den == 11) {
		$meniny = "Dezider";
	} else if ($den == 12) {
		$meniny = "Perla";
	} else if ($den == 13) {
		$meniny = "Arp·d";
	} else if ($den == 14) {
		$meniny = "ValentÌn";
	} else if ($den == 15) {
		$meniny = "Pravoslav";
	} else if ($den == 16) {
		$meniny = "Ida";
	} else if ($den == 17) {
		$meniny = "Miloslava";
	} else if ($den == 18) {
		$meniny = "JaromÌr";
	} else if ($den == 19) {
		$meniny = "Vlasta";
	} else if ($den == 20) {
		$meniny = "LÌvia";
	} else if ($den == 21) {
		$meniny = "EleonÛra";
	} else if ($den == 22) {
		$meniny = "Etela";
	} else if ($den == 23) {
		$meniny = "Roman, Romana";
	} else if ($den == 24) {
		$meniny = "Matej";
	} else if ($den == 25) {
		$meniny = "Frederik, Fredrika";
	} else if ($den == 26) {
		$meniny = "Viktor";
	} else if ($den == 27) {
		$meniny = "Alexander";
	} else if ($den == 28) {
		$meniny = "Zlatica";
	} else if ($den == 29) {
		$meniny = "RadomÌr";
	}
}
if ($mesiac == 3) {
	if ($den == 1) {
		$meniny = "AlbÌn";
	} else if ($den == 2) {
		$meniny = "Aneûka";
	} else if ($den == 3) {
		$meniny = "Bohumil, Bohumila";
	} else if ($den == 4) {
		$meniny = "KazimÌr";
	} else if ($den == 5) {
		$meniny = "Fridrich";
	} else if ($den == 6) {
		$meniny = "Radoslav, Radoslava";
	} else if ($den == 7) {
		$meniny = "Tom·ö";
	} else if ($den == 8) {
		$meniny = "Alan, Alana";
	} else if ($den == 9) {
		$meniny = "Frantiöka";
	} else if ($den == 10) {
		$meniny = "Branislav, Bruno";
	} else if ($den == 11) {
		$meniny = "Angela, Angelika";
	} else if ($den == 12) {
		$meniny = "Gregor";
	} else if ($den == 13) {
		$meniny = "Vlastimil";
	} else if ($den == 14) {
		$meniny = "Matilda";
	} else if ($den == 15) {
		$meniny = "Svetlana";
	} else if ($den == 16) {
		$meniny = "Boleslav";
	} else if ($den == 17) {
		$meniny = "ºubica";
	} else if ($den == 18) {
		$meniny = "Edurard";
	} else if ($den == 19) {
		$meniny = "Jozef";
	} else if ($den == 20) {
		$meniny = "VÌùazoslav, Klaudius";
	} else if ($den == 21) {
		$meniny = "Blahoslav";
	} else if ($den == 22) {
		$meniny = "BeÚadik";
	} else if ($den == 23) {
		$meniny = "Adri·n";
	} else if ($den == 24) {
		$meniny = "Gabriel";
	} else if ($den == 25) {
		$meniny = "Mari·n";
	} else if ($den == 26) {
		$meniny = "Emanuel";
	} else if ($den == 27) {
		$meniny = "Alena";
	} else if ($den == 28) {
		$meniny = "SoÚa";
	} else if ($den == 29) {
		$meniny = "Miroslav";
	} else if ($den == 30) {
		$meniny = "Vieroslava";
	} else if ($den == 31) {
		$meniny = "BenjamÌn";
	}
}
if ($mesiac == 4) {
	if ($den == 1) {
		$meniny = "Hugo";
	} else if ($den == 2) {
		$meniny = "Zita";
	} else if ($den == 3) {
		$meniny = "Richard";
	} else if ($den == 4) {
		$meniny = "Izidor";
	} else if ($den == 5) {
		$meniny = "Miroslava";
	} else if ($den == 6) {
		$meniny = "Irena";
	} else if ($den == 7) {
		$meniny = "Zolt·n";
	} else if ($den == 8) {
		$meniny = "Albert";
	} else if ($den == 9) {
		$meniny = "Milena";
	} else if ($den == 10) {
		$meniny = "Igor";
	} else if ($den == 11) {
		$meniny = "J˙lius";
	} else if ($den == 12) {
		$meniny = "Estera";
	} else if ($den == 13) {
		$meniny = "Aleö";
	} else if ($den == 14) {
		$meniny = "JustÌna";
	} else if ($den == 15) {
		$meniny = "Fedor";
	} else if ($den == 16) {
		$meniny = "Dana, Danica";
	} else if ($den == 17) {
		$meniny = "Rudolf";
	} else if ($den == 18) {
		$meniny = "ValÈr";
	} else if ($den == 19) {
		$meniny = "Jela";
	} else if ($den == 20) {
		$meniny = "Marcel";
	} else if ($den == 21) {
		$meniny = "ErvÌn";
	} else if ($den == 22) {
		$meniny = "SlavomÌr";
	} else if ($den == 23) {
		$meniny = "Vojtech";
	} else if ($den == 24) {
		$meniny = "Juraj";
	} else if ($den == 25) {
		$meniny = "Marek";
	} else if ($den == 26) {
		$meniny = "Jaroslava";
	} else if ($den == 27) {
		$meniny = "Jaroslav";
	} else if ($den == 28) {
		$meniny = "Jarmila";
	} else if ($den == 29) {
		$meniny = "Lea";
	} else if ($den == 30) {
		$meniny = "Anast·zia";
	}
}
if ($mesiac == 5) {
	if ($den == 1) {
		$meniny = "Sviatok pr·ce";
	} else if ($den == 2) {
		$meniny = "éigmund";
	} else if ($den == 3) {
		$meniny = "Galina";
	} else if ($den == 4) {
		$meniny = "Flori·n";
	} else if ($den == 5) {
		$meniny = "Lesana, Lesia";
	} else if ($den == 6) {
		$meniny = "HermÌna";
	} else if ($den == 7) {
		$meniny = "Monika";
	} else if ($den == 8) {
		$meniny = "Ingrida";
	} else if ($den == 9) {
		$meniny = "Roland";
	} else if ($den == 10) {
		$meniny = "ViktÛria";
	} else if ($den == 11) {
		$meniny = "Blaûena";
	} else if ($den == 12) {
		$meniny = "Pankr·c";
	} else if ($den == 13) {
		$meniny = "Serv·c";
	} else if ($den == 14) {
		$meniny = "Bonif·c";
	} else if ($den == 15) {
		$meniny = "éofia";
	} else if ($den == 16) {
		$meniny = "Svetoz·r";
	} else if ($den == 17) {
		$meniny = "Gizela";
	} else if ($den == 18) {
		$meniny = "Viola";
	} else if ($den == 19) {
		$meniny = "Gertr˙da";
	} else if ($den == 20) {
		$meniny = "Bernard";
	} else if ($den == 21) {
		$meniny = "Zina";
	} else if ($den == 22) {
		$meniny = "J˙lia";
	} else if ($den == 23) {
		$meniny = "éelmÌra";
	} else if ($den == 24) {
		$meniny = "Ela";
	} else if ($den == 25) {
		$meniny = "Urban";
	} else if ($den == 26) {
		$meniny = "Duöan";
	} else if ($den == 27) {
		$meniny = "Iveta";
	} else if ($den == 28) {
		$meniny = "Viliam";
	} else if ($den == 29) {
		$meniny = "Viliama";
	} else if ($den == 30) {
		$meniny = "Ferdinand";
	} else if ($den == 31) {
		$meniny = "Petronela, Petrana";
	}
}
if ($mesiac == 6) {
	if ($den == 1) {
		$meniny = "éaneta, DeÚ detÌ";
	} else if ($den == 2) {
		$meniny = "XÈnia, Oxana";
	} else if ($den == 3) {
		$meniny = "KarolÌna";
	} else if ($den == 4) {
		$meniny = "Lenka";
	} else if ($den == 5) {
		$meniny = "Laura";
	} else if ($den == 6) {
		$meniny = "Norbert";
	} else if ($den == 7) {
		$meniny = "RÛbert";
	} else if ($den == 8) {
		$meniny = "Medard";
	} else if ($den == 9) {
		$meniny = "Stanislava";
	} else if ($den == 10) {
		$meniny = "MargarÈta";
	} else if ($den == 11) {
		$meniny = "Dobroslava";
	} else if ($den == 12) {
		$meniny = "Zlatko";
	} else if ($den == 13) {
		$meniny = "Anton";
	} else if ($den == 14) {
		$meniny = "Vasil";
	} else if ($den == 15) {
		$meniny = "VÌt";
	} else if ($den == 16) {
		$meniny = "Blanka, Bianka";
	} else if ($den == 17) {
		$meniny = "Adolf";
	} else if ($den == 18) {
		$meniny = "Vratislav, Vratislava";
	} else if ($den == 19) {
		$meniny = "AlfrÈd";
	} else if ($den == 20) {
		$meniny = "ValÈria";
	} else if ($den == 21) {
		$meniny = "Alojz";
	} else if ($den == 22) {
		$meniny = "PaulÌna";
	} else if ($den == 23) {
		$meniny = "SidÛnia";
	} else if ($den == 24) {
		$meniny = "J·n";
	} else if ($den == 25) {
		$meniny = "Tade·ö, OlÌvia";
	} else if ($den == 26) {
		$meniny = "Adriana";
	} else if ($den == 27) {
		$meniny = "Ladislav, Ladislava";
	} else if ($den == 28) {
		$meniny = "Be·ta";
	} else if ($den == 29) {
		$meniny = "Peter a Pavol, Petra";
	} else if ($den == 30) {
		$meniny = "Mel·nia";
	}
}
if ($mesiac == 7) {
	if ($den == 1) {
		$meniny = "Diana";
	} else if ($den == 2) {
		$meniny = "Berta";
	} else if ($den == 3) {
		$meniny = "Miloslav";
	} else if ($den == 4) {
		$meniny = "Prokop";
	} else if ($den == 5) {
		$meniny = "Cyril a Metod";
	} else if ($den == 6) {
		$meniny = "PatrÌcia, Patrik";
	} else if ($den == 7) {
		$meniny = "Oliver";
	} else if ($den == 8) {
		$meniny = "Ivan";
	} else if ($den == 9) {
		$meniny = "Lujza";
	} else if ($den == 10) {
		$meniny = "Am·lia";
	} else if ($den == 11) {
		$meniny = "Milota";
	} else if ($den == 12) {
		$meniny = "Nina";
	} else if ($den == 13) {
		$meniny = "Margita";
	} else if ($den == 14) {
		$meniny = "Kamil";
	} else if ($den == 15) {
		$meniny = "Henrich";
	} else if ($den == 16) {
		$meniny = "DrahomÌr";
	} else if ($den == 17) {
		$meniny = "Bohuslav";
	} else if ($den == 18) {
		$meniny = "Kamila";
	} else if ($den == 19) {
		$meniny = "Duöana";
	} else if ($den == 20) {
		$meniny = "Iæja, Eli·ö";
	} else if ($den == 21) {
		$meniny = "Daniel";
	} else if ($den == 22) {
		$meniny = "MagdalÈna";
	} else if ($den == 23) {
		$meniny = "Oæga";
	} else if ($den == 24) {
		$meniny = "VladimÌr";
	} else if ($den == 25) {
		$meniny = "Jakub";
	} else if ($den == 26) {
		$meniny = "Anna, Hana";
	} else if ($den == 27) {
		$meniny = "Boûena";
	} else if ($den == 28) {
		$meniny = "Kriötof";
	} else if ($den == 29) {
		$meniny = "Marta";
	} else if ($den == 30) {
		$meniny = "Libuöa";
	} else if ($den == 31) {
		$meniny = "Ign·c";
	}
}
if ($mesiac == 8) {
	if ($den == 1) {
		$meniny = "Boûidara";
	} else if ($den == 2) {
		$meniny = "Gust·v";
	} else if ($den == 3) {
		$meniny = "Jerguö";
	} else if ($den == 4) {
		$meniny = "Dominik, Dominika";
	} else if ($den == 5) {
		$meniny = "Hortenzia";
	} else if ($den == 6) {
		$meniny = "JozefÌna";
	} else if ($den == 7) {
		$meniny = "ätef·nia";
	} else if ($den == 8) {
		$meniny = "Osk·r";
	} else if ($den == 9) {
		$meniny = "ºubomÌra";
	} else if ($den == 10) {
		$meniny = "Vavrinec";
	} else if ($den == 11) {
		$meniny = "Zuzana";
	} else if ($den == 12) {
		$meniny = "Darina";
	} else if ($den == 13) {
		$meniny = "ºubomÌr";
	} else if ($den == 14) {
		$meniny = "MojmÌr";
	} else if ($den == 15) {
		$meniny = "Marcela";
	} else if ($den == 16) {
		$meniny = "Leonard";
	} else if ($den == 17) {
		$meniny = "Milica";
	} else if ($den == 18) {
		$meniny = "Elena, Helena";
	} else if ($den == 19) {
		$meniny = "L˝dia";
	} else if ($den == 20) {
		$meniny = "Anabela";
	} else if ($den == 21) {
		$meniny = "Jana";
	} else if ($den == 22) {
		$meniny = "TichomÌr";
	} else if ($den == 23) {
		$meniny = "Filip";
	} else if ($den == 24) {
		$meniny = "Bartolomej";
	} else if ($den == 25) {
		$meniny = "ºudovÌt";
	} else if ($den == 26) {
		$meniny = "Samuel";
	} else if ($den == 27) {
		$meniny = "Silvia";
	} else if ($den == 28) {
		$meniny = "AugustÌn, AugustÌna";
	} else if ($den == 29) {
		$meniny = "Nikola";
	} else if ($den == 30) {
		$meniny = "Ruûena";
	} else if ($den == 31) {
		$meniny = "Nora";
	}
}
if ($mesiac == 9) {
	if ($den == 1) {
		$meniny = "Drahoslava";
	} else if ($den == 2) {
		$meniny = "Linda";
	} else if ($den == 3) {
		$meniny = "Belo";
	} else if ($den == 4) {
		$meniny = "Roz·lia";
	} else if ($den == 5) {
		$meniny = "RegÌna";
	} else if ($den == 6) {
		$meniny = "Alica";
	} else if ($den == 7) {
		$meniny = "Marianna";
	} else if ($den == 8) {
		$meniny = "Miriama";
	} else if ($den == 9) {
		$meniny = "Martina";
	} else if ($den == 10) {
		$meniny = "Oleg";
	} else if ($den == 11) {
		$meniny = "BystrÌk";
	} else if ($den == 12) {
		$meniny = "M·ria";
	} else if ($den == 13) {
		$meniny = "Ctibor";
	} else if ($den == 14) {
		$meniny = "ºudomil, ºudomila";
	} else if ($den == 15) {
		$meniny = "Jolana";
	} else if ($den == 16) {
		$meniny = "ºudmila";
	} else if ($den == 17) {
		$meniny = "Olympia";
	} else if ($den == 18) {
		$meniny = "EugÈnia";
	} else if ($den == 19) {
		$meniny = "KonötantÌn";
	} else if ($den == 20) {
		$meniny = "ºuboslav, ºuboslava";
	} else if ($den == 21) {
		$meniny = "Mat˙ö";
	} else if ($den == 22) {
		$meniny = "MÛric";
	} else if ($den == 23) {
		$meniny = "Z$denka";
	} else if ($den == 24) {
		$meniny = "ºuboö, ºubor";
	} else if ($den == 25) {
		$meniny = "Vladislav";
	} else if ($den == 26) {
		$meniny = "Edita";
	} else if ($den == 27) {
		$meniny = "Cypri·n";
	} else if ($den == 28) {
		$meniny = "V·clav";
	} else if ($den == 29) {
		$meniny = "Michal, Michaela";
	} else if ($den == 30) {
		$meniny = "JarolÌm";
	}
}
if ($mesiac == 10) {
	if ($den == 1) {
		$meniny = "Arnold";
	} else if ($den == 2) {
		$meniny = "Levoslav";
	} else if ($den == 3) {
		$meniny = "Stela";
	} else if ($den == 4) {
		$meniny = "Frantiöek";
	} else if ($den == 5) {
		$meniny = "Viera";
	} else if ($den == 6) {
		$meniny = "Nat·lia";
	} else if ($den == 7) {
		$meniny = "Eliöka";
	} else if ($den == 8) {
		$meniny = "Brigita";
	} else if ($den == 9) {
		$meniny = "Dion˝z";
	} else if ($den == 10) {
		$meniny = "SlavomÌra";
	} else if ($den == 11) {
		$meniny = "ValentÌna";
	} else if ($den == 12) {
		$meniny = "Maximili·n";
	} else if ($den == 13) {
		$meniny = "Koloman";
	} else if ($den == 14) {
		$meniny = "Boris";
	} else if ($den == 15) {
		$meniny = "TerÈzia";
	} else if ($den == 16) {
		$meniny = "VladimÌra";
	} else if ($den == 17) {
		$meniny = "Hedviga";
	} else if ($den == 18) {
		$meniny = "Luk·ö";
	} else if ($den == 19) {
		$meniny = "Kristi·n";
	} else if ($den == 20) {
		$meniny = "VendelÌn";
	} else if ($den == 21) {
		$meniny = "Uröuæa";
	} else if ($den == 22) {
		$meniny = "Sergej";
	} else if ($den == 23) {
		$meniny = "Alojzia";
	} else if ($den == 24) {
		$meniny = "Kvetoslava";
	} else if ($den == 25) {
		$meniny = "Aurel";
	} else if ($den == 26) {
		$meniny = "Demeter";
	} else if ($den == 27) {
		$meniny = "SabÌna";
	} else if ($den == 28) {
		$meniny = "Dobromila, Kevin";
	} else if ($den == 29) {
		$meniny = "Kl·ra";
	} else if ($den == 30) {
		$meniny = "äimon, Simona";
	} else if ($den == 31) {
		$meniny = "AurÈlia";
	}
}
if ($mesiac == 11) {
	if ($den == 1) {
		$meniny = "Denisa";
	} else if ($den == 2) {
		$meniny = "Pamiatka zosnul˝ch";
	} else if ($den == 3) {
		$meniny = "Hubert";
	} else if ($den == 4) {
		$meniny = "Karol";
	} else if ($den == 5) {
		$meniny = "Imrich";
	} else if ($den == 6) {
		$meniny = "Ren·ta";
	} else if ($den == 7) {
		$meniny = "RenÈ";
	} else if ($den == 8) {
		$meniny = "BohumÌr";
	} else if ($den == 9) {
		$meniny = "Teodor";
	} else if ($den == 10) {
		$meniny = "Tibor";
	} else if ($den == 11) {
		$meniny = "Martin, Maroö";
	} else if ($den == 12) {
		$meniny = "Sv‰topluk";
	} else if ($den == 13) {
		$meniny = "Stanislav";
	} else if ($den == 14) {
		$meniny = "Irma";
	} else if ($den == 15) {
		$meniny = "Leopold";
	} else if ($den == 16) {
		$meniny = "Agnesa";
	} else if ($den == 17) {
		$meniny = "Klaudia";
	} else if ($den == 18) {
		$meniny = "Eugen";
	} else if ($den == 19) {
		$meniny = "Alûbeta";
	} else if ($den == 20) {
		$meniny = "FÈlix";
	} else if ($den == 21) {
		$meniny = "ElvÌra";
	} else if ($den == 22) {
		$meniny = "CecÌlia";
	} else if ($den == 23) {
		$meniny = "Klement";
	} else if ($den == 24) {
		$meniny = "EmÌlia";
	} else if ($den == 25) {
		$meniny = "KatarÌna";
	} else if ($den == 26) {
		$meniny = "Kornel";
	} else if ($den == 27) {
		$meniny = "Milan";
	} else if ($den == 28) {
		$meniny = "Henrieta";
	} else if ($den == 29) {
		$meniny = "Vratko";
	} else if ($den == 30) {
		$meniny = "Ondrej, Andrej";
	}
}
if ($mesiac == 12) {
	if ($den == 1) {
		$meniny = "Edmund";
	} else if ($den == 2) {
		$meniny = "Bibiana";
	} else if ($den == 3) {
		$meniny = "Oldrich";
	} else if ($den == 4) {
		$meniny = "Barbora, Barbara";
	} else if ($den == 5) {
		$meniny = "Oto";
	} else if ($den == 6) {
		$meniny = "Mikul·ö";
	} else if ($den == 7) {
		$meniny = "AmbrÛz";
	} else if ($den == 8) {
		$meniny = "MarÌna";
	} else if ($den == 9) {
		$meniny = "Izabela";
	} else if ($den == 10) {
		$meniny = "Rad˙z";
	} else if ($den == 11) {
		$meniny = "Hilda";
	} else if ($den == 12) {
		$meniny = "OtÌlia";
	} else if ($den == 13) {
		$meniny = "Lucia";
	} else if ($den == 14) {
		$meniny = "Branislava, Bronislava";
	} else if ($den == 15) {
		$meniny = "Ivica";
	} else if ($den == 16) {
		$meniny = "AlbÌna";
	} else if ($den == 17) {
		$meniny = "KornÈlia";
	} else if ($den == 18) {
		$meniny = "Sl·va, Sl·vka";
	} else if ($den == 19) {
		$meniny = "Judita";
	} else if ($den == 20) {
		$meniny = "Dagmara";
	} else if ($den == 21) {
		$meniny = "Bohdan";
	} else if ($den == 22) {
		$meniny = "Adela";
	} else if ($den == 23) {
		$meniny = "Nadeûda";
	} else if ($den == 24) {
		$meniny = "Adam a Eva, ätedr˝ deÚ";
	} else if ($den == 25) {
		$meniny = "1. sviatok vianoËn˝";
	} else if ($den == 26) {
		$meniny = "ätefan, 2. sviatok vianoËn˝";
	} else if ($den == 27) {
		$meniny = "FilomÈna";
	} else if ($den == 28) {
		$meniny = "Ivana, Ivona";
	} else if ($den == 29) {
		$meniny = "Milada";
	} else if ($den == 30) {
		$meniny = "D·vid";
	} else if ($den == 31) {
		$meniny = "Silvester";
	}
}
return $meniny;
}
//-------------------------------------
function slovko($meniny){
	if (ereg(",", $meniny)){
		$slovko = "im";
	}else if ($meniny == "Gejza"){
		$slovko = "mu";
	}else {
		$last = substr(trim($meniny), -1);
		switch ($last){
			case "a": $slovko = "jej"; break;
			default : $slovko = "mu"; break;
		}
	}
	return $slovko;
}
//-------------------------------------

function return_privilege($privilege){
	switch ($privilege){
		case 1: $prava = "admin"; break;
		case 2: $prava = "fara-oznamy"; break;
		case 3: $prava = "obec-oznamy/aktuality"; break;
	}
	return $prava;
}

//-------------------------------------------------
function del_user($login, $id, $meno){
	if ($login != "admin")
		$prikaz = "<a href=\"?action=5&delete=1&id=" . $id . "\"><img src=\"../imgs/delete.gif\" border=\"0\" title=\"Zmazat uzivatela: " . $meno . "\"></a>";
	else
		$prikaz = "&nbsp;&nbsp;";
	return $prikaz;
}

//------------------------------------------------

function style_color($akcia){
	global $action;
	if ($action == $akcia){
	 $style = "style='background:#6285df;border:1px solid #003399;color:white;'";
	}
	return $style;
}

//-----------------------------------------------
function vrat_den($cislo){
	switch ($cislo){
		case 1: $den = "Pondelok"; break;
		case 2: $den = "Utorok"; break;
		case 3: $den = "Streda"; break;
		case 4: $den = "ätvrtok"; break;
		case 5: $den = "Piatok"; break;
		case 6: $den = "Sobota"; break;
		case 7: $den = "Nedela"; break;
	}
	return $den;
}
//-----------------------------------------------
function vrat_miesto($cislo){
	switch ($cislo){
		case 1: $miesto = "Plechotice"; break;
		case 2: $miesto = "Egreö"; break;
		case 3: $miesto = "»eæovce"; break;
	}
	return $miesto;
}

//-----------------------------------------------
function miesto_omsa($den){
	global $link;
	$stmt = "select * from fara_omse where den = " . $den . " order by miesto asc ";
	if (@!($result = mysql_query($stmt, $link))){
		echo "Chyba pri connecte na SQL server";	exit;
	}

	$pocet = mysql_num_rows($result);
	if ($pocet == 0) {
		$miesto = "-";
		return $miesto;
	}

	$i = 1;
	while ($row = mysql_fetch_object($result)){
		switch ($row->miesto) {
			case 1 : $mz_miesto = "<b>Plechotice</b>"; break;
			case 2 : $mz_miesto = "Egreö"; break;
			case 3 : $mz_miesto = "»eæovce"; break;
		}
		if ($i == 1) {
			$miesto = $mz_miesto;
		} else {
			$miesto = $miesto . "<br>" . $mz_miesto;
		}
		$i++;
	}
	return $miesto;
}

//-----------------------------------------------
function cas_omsa($den){
	global $link;
	$stmt = "select * from fara_omse where den = " . $den . " order by miesto asc ";
	if (@!($result = mysql_query($stmt, $link))){
		echo "Chyba pri connecte na SQL server";	exit;
	}

	$pocet = mysql_num_rows($result);
	if ($pocet == 0) {
		$cas = "-";
		return $cas;
	}

	$i = 1;
	while ($row = mysql_fetch_object($result)){
		switch ($row->miesto) {
			case 1 : $mz_cas = "<b>" . $row->cas . "</b>"; break;
			default : $mz_cas = $row->cas;
		}

		if ($i == 1) {
			$cas = $mz_cas;
		} else {
			$cas = $cas . "<br>" . $mz_cas;
		}
		$i++;
	}
	return $cas;
}

//-------------------------------------------------------

function otvor_oznam($text,$id){
	global $menu;
	if (strlen($text) < 500) {
		$mz_text = substr($text,0,500);
		return $mz_text;
	}else {
		$mz_text = substr($text,0,500). " ... ";
	}
	$mz_text = "<a href=\"?menu=$menu&record=$id\" class=\"textmain\">$mz_text</a>";
	return $mz_text;
}

//--------------------------------------------------------
function otvor_aktualitu($text,$id){
	global $menu;
	if (strlen($text) < 500) {
		$mz_text = substr($text,0,500);
		return $mz_text;
	}else {
		$mz_text = substr($text,0,500). " ... ";
	}
	$mz_text = "<a href=\"?menu=$menu&record=$id\" class=\"aktuality\">$mz_text</a>";
	return $mz_text;
}

//--------------------------------------------------------
function edit_gb($id, $action, $begin){
	$string = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"?action=$action&record=$id&zmaz=1&uprav=0&begin=$begin\" class=\"textmain\" style=\"text-align:center;color:red;\">ZMAZAç</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"?action=$action&record=$id&uprav=1&zmaz=0&begin=$begin\" class=\"textmain\" style=\"text-align:center;color:red;\">UPRAVIç</a>";
return $string;

}

function check_www($text){
	$text =	eregi_replace("^www.", "http://www.",$text);
	$text =	eregi_replace("[[:space:]]+www.", " http://www.",$text);
	$text = eregi_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\" target=\"_blank\" class=\"text_main\" title=\"\\0\">\\0</a>", $text);
	return $text;
}

?>