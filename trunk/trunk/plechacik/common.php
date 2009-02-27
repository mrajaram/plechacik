<?php
//common.php

/*
$dnes = getdate();  
$mesiac = $dnes['month'];  
$mday = $dnes['mday'];  
$rok = $dnes['year'];  
echo "$mesiac $mday, $rok"; 

*/

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
  case 1: $month = "január"; break;
  case 2: $month = "február"; break;
  case 3: $month = "marec"; break;
  case 4: $month = "apríl"; break;
  case 5: $month = "máj"; break;
  case 6: $month = "jún"; break;
  case 7: $month = "júl"; break;
  case 8: $month = "august"; break;
  case 9: $month = "september"; break;
  case 10: $month = "október"; break;
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
		$vrat = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"javascript:scroll(0,0)\" title=\"Späť na vrch\"><img src=\"./imgs/back_top.gif\" border=\"0\"></a>";
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
	  case 4: $den = "štvrtok,&nbsp;&nbsp;<br>"; break;
	  case 5: $den = "piatok,&nbsp;&nbsp;<br>"; break;
	  case 6: $den = "sobota,&nbsp;&nbsp;<br>"; break;
	  case 0: $den = "nedeľa,&nbsp;&nbsp;<br>"; break;
	  default: $den = "<br>";
	}
	switch (date("F")) {
	  case "January": $month="január"; break;
	  case "February": $month="február"; break;
	  case "March": $month="marec"; break;
	  case "April": $month="apríl"; break;
	  case "May": $month="máj"; break;
	  case "June": $month="jún"; break;
	  case "July": $month="júl"; break;
	  case "August": $month="august"; break;
	  case "September": $month="september"; break;
	  case "October": $month="október"; break;
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
		$meniny = "Nový rok, Vznik SR";
	} else if ($den == 2) {
		$meniny = "Alexandra";
	} else if ($den == 3) {
		$meniny = "Daniela";
	} else if ($den == 4) {
		$meniny = "Drahoslav";
	} else if ($den == 5) {
		$meniny = "Andrea";
	} else if ($den == 6) {
		$meniny = "Antónia";
	} else if ($den == 7) {
		$meniny = "Bohuslava";
	} else if ($den == 8) {
		$meniny = "Severín";
	} else if ($den == 9) {
		$meniny = "Alexej";
	} else if ($den == 10) {
		$meniny = "Dáša";
	} else if ($den == 11) {
		$meniny = "Malvína";
	} else if ($den == 12) {
		$meniny = "Ernest";
	} else if ($den == 13) {
		$meniny = "Rastislav";
	} else if ($den == 14) {
		$meniny = "Radovan";
	} else if ($den == 15) {
		$meniny = "Dobroslav";
	} else if ($den == 16) {
		$meniny = "Kristína";
	} else if ($den == 17) {
		$meniny = "Nataša";
	} else if ($den == 18) {
		$meniny = "Bohdana";
	} else if ($den == 19) {
		$meniny = "Drahomíra";
	} else if ($den == 20) {
		$meniny = "Dalibor";
	} else if ($den == 21) {
		$meniny = "Vincent";
	} else if ($den == 22) {
		$meniny = "Zora";
	} else if ($den == 23) {
		$meniny = "Miloš";
	} else if ($den == 24) {
		$meniny = "Timotej";
	} else if ($den == 25) {
		$meniny = "Gejza";
	} else if ($den == 26) {
		$meniny = "Tamara";
	} else if ($den == 27) {
		$meniny = "Bohuš";
	} else if ($den == 28) {
		$meniny = "Alfonz";
	} else if ($den == 29) {
		$meniny = "Gašpar";
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
		$meniny = "Blažej";
	} else if ($den == 4) {
		$meniny = "Veronika";
	} else if ($den == 5) {
		$meniny = "Agáta";
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
		$meniny = "Arpád";
	} else if ($den == 14) {
		$meniny = "Valentín";
	} else if ($den == 15) {
		$meniny = "Pravoslav";
	} else if ($den == 16) {
		$meniny = "Ida";
	} else if ($den == 17) {
		$meniny = "Miloslava";
	} else if ($den == 18) {
		$meniny = "Jaromír";
	} else if ($den == 19) {
		$meniny = "Vlasta";
	} else if ($den == 20) {
		$meniny = "Lívia";
	} else if ($den == 21) {
		$meniny = "Eleonóra";
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
		$meniny = "Radomír";
	}
}
if ($mesiac == 3) {
	if ($den == 1) {
		$meniny = "Albín";
	} else if ($den == 2) {
		$meniny = "Anežka";
	} else if ($den == 3) {
		$meniny = "Bohumil, Bohumila";
	} else if ($den == 4) {
		$meniny = "Kazimír";
	} else if ($den == 5) {
		$meniny = "Fridrich";
	} else if ($den == 6) {
		$meniny = "Radoslav, Radoslava";
	} else if ($den == 7) {
		$meniny = "Tomáš";
	} else if ($den == 8) {
		$meniny = "Alan, Alana";
	} else if ($den == 9) {
		$meniny = "Františka";
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
		$meniny = "Ľubica";
	} else if ($den == 18) {
		$meniny = "Edurard";
	} else if ($den == 19) {
		$meniny = "Jozef";
	} else if ($den == 20) {
		$meniny = "Víťazoslav, Klaudius";
	} else if ($den == 21) {
		$meniny = "Blahoslav";
	} else if ($den == 22) {
		$meniny = "Beňadik";
	} else if ($den == 23) {
		$meniny = "Adrián";
	} else if ($den == 24) {
		$meniny = "Gabriel";
	} else if ($den == 25) {
		$meniny = "Marián";
	} else if ($den == 26) {
		$meniny = "Emanuel";
	} else if ($den == 27) {
		$meniny = "Alena";
	} else if ($den == 28) {
		$meniny = "Soňa";
	} else if ($den == 29) {
		$meniny = "Miroslav";
	} else if ($den == 30) {
		$meniny = "Vieroslava";
	} else if ($den == 31) {
		$meniny = "Benjamín";
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
		$meniny = "Zoltán";
	} else if ($den == 8) {
		$meniny = "Albert";
	} else if ($den == 9) {
		$meniny = "Milena";
	} else if ($den == 10) {
		$meniny = "Igor";
	} else if ($den == 11) {
		$meniny = "Július";
	} else if ($den == 12) {
		$meniny = "Estera";
	} else if ($den == 13) {
		$meniny = "Aleš";
	} else if ($den == 14) {
		$meniny = "Justína";
	} else if ($den == 15) {
		$meniny = "Fedor";
	} else if ($den == 16) {
		$meniny = "Dana, Danica";
	} else if ($den == 17) {
		$meniny = "Rudolf";
	} else if ($den == 18) {
		$meniny = "Valér";
	} else if ($den == 19) {
		$meniny = "Jela";
	} else if ($den == 20) {
		$meniny = "Marcel";
	} else if ($den == 21) {
		$meniny = "Ervín";
	} else if ($den == 22) {
		$meniny = "Slavomír";
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
		$meniny = "Anastázia";
	}
}
if ($mesiac == 5) {
	if ($den == 1) {
		$meniny = "Sviatok práce";
	} else if ($den == 2) {
		$meniny = "Žigmund";
	} else if ($den == 3) {
		$meniny = "Galina";
	} else if ($den == 4) {
		$meniny = "Florián";
	} else if ($den == 5) {
		$meniny = "Lesana, Lesia";
	} else if ($den == 6) {
		$meniny = "Hermína";
	} else if ($den == 7) {
		$meniny = "Monika";
	} else if ($den == 8) {
		$meniny = "Ingrida";
	} else if ($den == 9) {
		$meniny = "Roland";
	} else if ($den == 10) {
		$meniny = "Viktória";
	} else if ($den == 11) {
		$meniny = "Blažena";
	} else if ($den == 12) {
		$meniny = "Pankrác";
	} else if ($den == 13) {
		$meniny = "Servác";
	} else if ($den == 14) {
		$meniny = "Bonifác";
	} else if ($den == 15) {
		$meniny = "Žofia";
	} else if ($den == 16) {
		$meniny = "Svetozár";
	} else if ($den == 17) {
		$meniny = "Gizela";
	} else if ($den == 18) {
		$meniny = "Viola";
	} else if ($den == 19) {
		$meniny = "Gertrúda";
	} else if ($den == 20) {
		$meniny = "Bernard";
	} else if ($den == 21) {
		$meniny = "Zina";
	} else if ($den == 22) {
		$meniny = "Júlia";
	} else if ($den == 23) {
		$meniny = "Želmíra";
	} else if ($den == 24) {
		$meniny = "Ela";
	} else if ($den == 25) {
		$meniny = "Urban";
	} else if ($den == 26) {
		$meniny = "Dušan";
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
		$meniny = "Žaneta, Deň detí";
	} else if ($den == 2) {
		$meniny = "Xénia, Oxana";
	} else if ($den == 3) {
		$meniny = "Karolína";
	} else if ($den == 4) {
		$meniny = "Lenka";
	} else if ($den == 5) {
		$meniny = "Laura";
	} else if ($den == 6) {
		$meniny = "Norbert";
	} else if ($den == 7) {
		$meniny = "Róbert";
	} else if ($den == 8) {
		$meniny = "Medard";
	} else if ($den == 9) {
		$meniny = "Stanislava";
	} else if ($den == 10) {
		$meniny = "Margaréta";
	} else if ($den == 11) {
		$meniny = "Dobroslava";
	} else if ($den == 12) {
		$meniny = "Zlatko";
	} else if ($den == 13) {
		$meniny = "Anton";
	} else if ($den == 14) {
		$meniny = "Vasil";
	} else if ($den == 15) {
		$meniny = "Vít";
	} else if ($den == 16) {
		$meniny = "Blanka, Bianka";
	} else if ($den == 17) {
		$meniny = "Adolf";
	} else if ($den == 18) {
		$meniny = "Vratislav, Vratislava";
	} else if ($den == 19) {
		$meniny = "Alfréd";
	} else if ($den == 20) {
		$meniny = "Valéria";
	} else if ($den == 21) {
		$meniny = "Alojz";
	} else if ($den == 22) {
		$meniny = "Paulína";
	} else if ($den == 23) {
		$meniny = "Sidónia";
	} else if ($den == 24) {
		$meniny = "Ján";
	} else if ($den == 25) {
		$meniny = "Tadeáš, Olívia";
	} else if ($den == 26) {
		$meniny = "Adriana";
	} else if ($den == 27) {
		$meniny = "Ladislav, Ladislava";
	} else if ($den == 28) {
		$meniny = "Beáta";
	} else if ($den == 29) {
		$meniny = "Peter a Pavol, Petra";
	} else if ($den == 30) {
		$meniny = "Melánia";
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
		$meniny = "Patrícia, Patrik";
	} else if ($den == 7) {
		$meniny = "Oliver";
	} else if ($den == 8) {
		$meniny = "Ivan";
	} else if ($den == 9) {
		$meniny = "Lujza";
	} else if ($den == 10) {
		$meniny = "Amália";
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
		$meniny = "Drahomír";
	} else if ($den == 17) {
		$meniny = "Bohuslav";
	} else if ($den == 18) {
		$meniny = "Kamila";
	} else if ($den == 19) {
		$meniny = "Dušana";
	} else if ($den == 20) {
		$meniny = "Iľja, Eliáš";
	} else if ($den == 21) {
		$meniny = "Daniel";
	} else if ($den == 22) {
		$meniny = "Magdaléna";
	} else if ($den == 23) {
		$meniny = "Oľga";
	} else if ($den == 24) {
		$meniny = "Vladimír";
	} else if ($den == 25) {
		$meniny = "Jakub";
	} else if ($den == 26) {
		$meniny = "Anna, Hana";
	} else if ($den == 27) {
		$meniny = "Božena";
	} else if ($den == 28) {
		$meniny = "Krištof";
	} else if ($den == 29) {
		$meniny = "Marta";
	} else if ($den == 30) {
		$meniny = "Libuša";
	} else if ($den == 31) {
		$meniny = "Ignác";
	}
}
if ($mesiac == 8) {
	if ($den == 1) {
		$meniny = "Božidara";
	} else if ($den == 2) {
		$meniny = "Gustáv";
	} else if ($den == 3) {
		$meniny = "Jerguš";
	} else if ($den == 4) {
		$meniny = "Dominik, Dominika";
	} else if ($den == 5) {
		$meniny = "Hortenzia";
	} else if ($den == 6) {
		$meniny = "Jozefína";
	} else if ($den == 7) {
		$meniny = "Štefánia";
	} else if ($den == 8) {
		$meniny = "Oskár";
	} else if ($den == 9) {
		$meniny = "Ľubomíra";
	} else if ($den == 10) {
		$meniny = "Vavrinec";
	} else if ($den == 11) {
		$meniny = "Zuzana";
	} else if ($den == 12) {
		$meniny = "Darina";
	} else if ($den == 13) {
		$meniny = "Ľubomír";
	} else if ($den == 14) {
		$meniny = "Mojmír";
	} else if ($den == 15) {
		$meniny = "Marcela";
	} else if ($den == 16) {
		$meniny = "Leonard";
	} else if ($den == 17) {
		$meniny = "Milica";
	} else if ($den == 18) {
		$meniny = "Elena, Helena";
	} else if ($den == 19) {
		$meniny = "Lýdia";
	} else if ($den == 20) {
		$meniny = "Anabela";
	} else if ($den == 21) {
		$meniny = "Jana";
	} else if ($den == 22) {
		$meniny = "Tichomír";
	} else if ($den == 23) {
		$meniny = "Filip";
	} else if ($den == 24) {
		$meniny = "Bartolomej";
	} else if ($den == 25) {
		$meniny = "Ľudovít";
	} else if ($den == 26) {
		$meniny = "Samuel";
	} else if ($den == 27) {
		$meniny = "Silvia";
	} else if ($den == 28) {
		$meniny = "Augustín, Augustína";
	} else if ($den == 29) {
		$meniny = "Nikola";
	} else if ($den == 30) {
		$meniny = "Ružena";
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
		$meniny = "Rozália";
	} else if ($den == 5) {
		$meniny = "Regína";
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
		$meniny = "Bystrík";
	} else if ($den == 12) {
		$meniny = "Mária";
	} else if ($den == 13) {
		$meniny = "Ctibor";
	} else if ($den == 14) {
		$meniny = "Ľudomil, Ľudomila";
	} else if ($den == 15) {
		$meniny = "Jolana";
	} else if ($den == 16) {
		$meniny = "Ľudmila";
	} else if ($den == 17) {
		$meniny = "Olympia";
	} else if ($den == 18) {
		$meniny = "Eugénia";
	} else if ($den == 19) {
		$meniny = "Konštantín";
	} else if ($den == 20) {
		$meniny = "Ľuboslav, Ľuboslava";
	} else if ($den == 21) {
		$meniny = "Matúš";
	} else if ($den == 22) {
		$meniny = "Móric";
	} else if ($den == 23) {
		$meniny = "Z$denka";
	} else if ($den == 24) {
		$meniny = "Ľuboš, Ľubor";
	} else if ($den == 25) {
		$meniny = "Vladislav";
	} else if ($den == 26) {
		$meniny = "Edita";
	} else if ($den == 27) {
		$meniny = "Cyprián";
	} else if ($den == 28) {
		$meniny = "Václav";
	} else if ($den == 29) {
		$meniny = "Michal, Michaela";
	} else if ($den == 30) {
		$meniny = "Jarolím";
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
		$meniny = "František";
	} else if ($den == 5) {
		$meniny = "Viera";
	} else if ($den == 6) {
		$meniny = "Natália";
	} else if ($den == 7) {
		$meniny = "Eliška";
	} else if ($den == 8) {
		$meniny = "Brigita";
	} else if ($den == 9) {
		$meniny = "Dionýz";
	} else if ($den == 10) {
		$meniny = "Slavomíra";
	} else if ($den == 11) {
		$meniny = "Valentína";
	} else if ($den == 12) {
		$meniny = "Maximilián";
	} else if ($den == 13) {
		$meniny = "Koloman";
	} else if ($den == 14) {
		$meniny = "Boris";
	} else if ($den == 15) {
		$meniny = "Terézia";
	} else if ($den == 16) {
		$meniny = "Vladimíra";
	} else if ($den == 17) {
		$meniny = "Hedviga";
	} else if ($den == 18) {
		$meniny = "Lukáš";
	} else if ($den == 19) {
		$meniny = "Kristián";
	} else if ($den == 20) {
		$meniny = "Vendelín";
	} else if ($den == 21) {
		$meniny = "Uršuľa";
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
		$meniny = "Sabína";
	} else if ($den == 28) {
		$meniny = "Dobromila, Kevin";
	} else if ($den == 29) {
		$meniny = "Klára";
	} else if ($den == 30) {
		$meniny = "Šimon, Simona";
	} else if ($den == 31) {
		$meniny = "Aurélia";
	}
}
if ($mesiac == 11) {
	if ($den == 1) {
		$meniny = "Denisa";
	} else if ($den == 2) {
		$meniny = "Pamiatka zosnulých";
	} else if ($den == 3) {
		$meniny = "Hubert";
	} else if ($den == 4) {
		$meniny = "Karol";
	} else if ($den == 5) {
		$meniny = "Imrich";
	} else if ($den == 6) {
		$meniny = "Renáta";
	} else if ($den == 7) {
		$meniny = "René";
	} else if ($den == 8) {
		$meniny = "Bohumír";
	} else if ($den == 9) {
		$meniny = "Teodor";
	} else if ($den == 10) {
		$meniny = "Tibor";
	} else if ($den == 11) {
		$meniny = "Martin, Maroš";
	} else if ($den == 12) {
		$meniny = "Svätopluk";
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
		$meniny = "Alžbeta";
	} else if ($den == 20) {
		$meniny = "Félix";
	} else if ($den == 21) {
		$meniny = "Elvíra";
	} else if ($den == 22) {
		$meniny = "Cecília";
	} else if ($den == 23) {
		$meniny = "Klement";
	} else if ($den == 24) {
		$meniny = "Emília";
	} else if ($den == 25) {
		$meniny = "Katarína";
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
		$meniny = "Mikuláš";
	} else if ($den == 7) {
		$meniny = "Ambróz";
	} else if ($den == 8) {
		$meniny = "Marína";
	} else if ($den == 9) {
		$meniny = "Izabela";
	} else if ($den == 10) {
		$meniny = "Radúz";
	} else if ($den == 11) {
		$meniny = "Hilda";
	} else if ($den == 12) {
		$meniny = "Otília";
	} else if ($den == 13) {
		$meniny = "Lucia";
	} else if ($den == 14) {
		$meniny = "Branislava, Bronislava";
	} else if ($den == 15) {
		$meniny = "Ivica";
	} else if ($den == 16) {
		$meniny = "Albína";
	} else if ($den == 17) {
		$meniny = "Kornélia";
	} else if ($den == 18) {
		$meniny = "Sláva, Slávka";
	} else if ($den == 19) {
		$meniny = "Judita";
	} else if ($den == 20) {
		$meniny = "Dagmara";
	} else if ($den == 21) {
		$meniny = "Bohdan";
	} else if ($den == 22) {
		$meniny = "Adela";
	} else if ($den == 23) {
		$meniny = "Nadežda";
	} else if ($den == 24) {
		$meniny = "Adam a Eva, Štedrý deň";
	} else if ($den == 25) {
		$meniny = "1. sviatok vianočný";
	} else if ($den == 26) {
		$meniny = "Štefan, 2. sviatok vianočný";
	} else if ($den == 27) {
		$meniny = "Filoména";
	} else if ($den == 28) {
		$meniny = "Ivana, Ivona";
	} else if ($den == 29) {
		$meniny = "Milada";
	} else if ($den == 30) {
		$meniny = "Dávid";
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
		case 4: $den = "Štvrtok"; break;
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
		case 2: $miesto = "Egreš"; break;
		case 3: $miesto = "Čeľovce"; break;
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
			case 2 : $mz_miesto = "Egreš"; break;
			case 3 : $mz_miesto = "Čeľovce"; break;
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
	$string = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"?action=$action&record=$id&zmaz=1&uprav=0&begin=$begin\" class=\"textmain\" style=\"text-align:center;color:red;\">ZMAZAŤ</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"?action=$action&record=$id&uprav=1&zmaz=0&begin=$begin\" class=\"textmain\" style=\"text-align:center;color:red;\">UPRAVIŤ</a>";
return $string;

}

function check_www($text){
	$text =	eregi_replace("^www.", "http://www.",$text);
	$text =	eregi_replace("[[:space:]]+www.", " http://www.",$text);
	$text = eregi_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\" target=\"_blank\" class=\"text_main\" title=\"\\0\">\\0</a>", $text);
	return $text; 
}

?>