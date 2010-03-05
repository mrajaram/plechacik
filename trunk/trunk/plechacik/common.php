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
  case 1: $month = "janu�r"; break;
  case 2: $month = "febru�r"; break;
  case 3: $month = "marec"; break;
  case 4: $month = "apr�l"; break;
  case 5: $month = "m�j"; break;
  case 6: $month = "j�n"; break;
  case 7: $month = "j�l"; break;
  case 8: $month = "august"; break;
  case 9: $month = "september"; break;
  case 10: $month = "okt�ber"; break;
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
		$vrat = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"javascript:scroll(0,0)\" title=\"Sp� na vrch\"><img src=\"./imgs/back_top.gif\" border=\"0\"></a>";
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
	  case 4: $den = "�tvrtok,&nbsp;&nbsp;<br>"; break;
	  case 5: $den = "piatok,&nbsp;&nbsp;<br>"; break;
	  case 6: $den = "sobota,&nbsp;&nbsp;<br>"; break;
	  case 0: $den = "nede�a,&nbsp;&nbsp;<br>"; break;
	  default: $den = "<br>";
	}
	switch (date("F")) {
	  case "January": $month="janu�r"; break;
	  case "February": $month="febru�r"; break;
	  case "March": $month="marec"; break;
	  case "April": $month="apr�l"; break;
	  case "May": $month="m�j"; break;
	  case "June": $month="j�n"; break;
	  case "July": $month="j�l"; break;
	  case "August": $month="august"; break;
	  case "September": $month="september"; break;
	  case "October": $month="okt�ber"; break;
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
		$meniny = "Nov� rok, Vznik SR";
	} else if ($den == 2) {
		$meniny = "Alexandra";
	} else if ($den == 3) {
		$meniny = "Daniela";
	} else if ($den == 4) {
		$meniny = "Drahoslav";
	} else if ($den == 5) {
		$meniny = "Andrea";
	} else if ($den == 6) {
		$meniny = "Ant�nia";
	} else if ($den == 7) {
		$meniny = "Bohuslava";
	} else if ($den == 8) {
		$meniny = "Sever�n";
	} else if ($den == 9) {
		$meniny = "Alexej";
	} else if ($den == 10) {
		$meniny = "D�a";
	} else if ($den == 11) {
		$meniny = "Malv�na";
	} else if ($den == 12) {
		$meniny = "Ernest";
	} else if ($den == 13) {
		$meniny = "Rastislav";
	} else if ($den == 14) {
		$meniny = "Radovan";
	} else if ($den == 15) {
		$meniny = "Dobroslav";
	} else if ($den == 16) {
		$meniny = "Krist�na";
	} else if ($den == 17) {
		$meniny = "Nata�a";
	} else if ($den == 18) {
		$meniny = "Bohdana";
	} else if ($den == 19) {
		$meniny = "Drahom�ra";
	} else if ($den == 20) {
		$meniny = "Dalibor";
	} else if ($den == 21) {
		$meniny = "Vincent";
	} else if ($den == 22) {
		$meniny = "Zora";
	} else if ($den == 23) {
		$meniny = "Milo�";
	} else if ($den == 24) {
		$meniny = "Timotej";
	} else if ($den == 25) {
		$meniny = "Gejza";
	} else if ($den == 26) {
		$meniny = "Tamara";
	} else if ($den == 27) {
		$meniny = "Bohu�";
	} else if ($den == 28) {
		$meniny = "Alfonz";
	} else if ($den == 29) {
		$meniny = "Ga�par";
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
		$meniny = "Bla�ej";
	} else if ($den == 4) {
		$meniny = "Veronika";
	} else if ($den == 5) {
		$meniny = "Ag�ta";
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
		$meniny = "Arp�d";
	} else if ($den == 14) {
		$meniny = "Valent�n";
	} else if ($den == 15) {
		$meniny = "Pravoslav";
	} else if ($den == 16) {
		$meniny = "Ida";
	} else if ($den == 17) {
		$meniny = "Miloslava";
	} else if ($den == 18) {
		$meniny = "Jarom�r";
	} else if ($den == 19) {
		$meniny = "Vlasta";
	} else if ($den == 20) {
		$meniny = "L�via";
	} else if ($den == 21) {
		$meniny = "Eleon�ra";
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
		$meniny = "Radom�r";
	}
}
if ($mesiac == 3) {
	if ($den == 1) {
		$meniny = "Alb�n";
	} else if ($den == 2) {
		$meniny = "Ane�ka";
	} else if ($den == 3) {
		$meniny = "Bohumil, Bohumila";
	} else if ($den == 4) {
		$meniny = "Kazim�r";
	} else if ($den == 5) {
		$meniny = "Fridrich";
	} else if ($den == 6) {
		$meniny = "Radoslav, Radoslava";
	} else if ($den == 7) {
		$meniny = "Tom�";
	} else if ($den == 8) {
		$meniny = "Alan, Alana";
	} else if ($den == 9) {
		$meniny = "Franti�ka";
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
		$meniny = "�ubica";
	} else if ($den == 18) {
		$meniny = "Edurard";
	} else if ($den == 19) {
		$meniny = "Jozef";
	} else if ($den == 20) {
		$meniny = "V�azoslav, Klaudius";
	} else if ($den == 21) {
		$meniny = "Blahoslav";
	} else if ($den == 22) {
		$meniny = "Be�adik";
	} else if ($den == 23) {
		$meniny = "Adri�n";
	} else if ($den == 24) {
		$meniny = "Gabriel";
	} else if ($den == 25) {
		$meniny = "Mari�n";
	} else if ($den == 26) {
		$meniny = "Emanuel";
	} else if ($den == 27) {
		$meniny = "Alena";
	} else if ($den == 28) {
		$meniny = "So�a";
	} else if ($den == 29) {
		$meniny = "Miroslav";
	} else if ($den == 30) {
		$meniny = "Vieroslava";
	} else if ($den == 31) {
		$meniny = "Benjam�n";
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
		$meniny = "Zolt�n";
	} else if ($den == 8) {
		$meniny = "Albert";
	} else if ($den == 9) {
		$meniny = "Milena";
	} else if ($den == 10) {
		$meniny = "Igor";
	} else if ($den == 11) {
		$meniny = "J�lius";
	} else if ($den == 12) {
		$meniny = "Estera";
	} else if ($den == 13) {
		$meniny = "Ale�";
	} else if ($den == 14) {
		$meniny = "Just�na";
	} else if ($den == 15) {
		$meniny = "Fedor";
	} else if ($den == 16) {
		$meniny = "Dana, Danica";
	} else if ($den == 17) {
		$meniny = "Rudolf";
	} else if ($den == 18) {
		$meniny = "Val�r";
	} else if ($den == 19) {
		$meniny = "Jela";
	} else if ($den == 20) {
		$meniny = "Marcel";
	} else if ($den == 21) {
		$meniny = "Erv�n";
	} else if ($den == 22) {
		$meniny = "Slavom�r";
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
		$meniny = "Anast�zia";
	}
}
if ($mesiac == 5) {
	if ($den == 1) {
		$meniny = "Sviatok pr�ce";
	} else if ($den == 2) {
		$meniny = "�igmund";
	} else if ($den == 3) {
		$meniny = "Galina";
	} else if ($den == 4) {
		$meniny = "Flori�n";
	} else if ($den == 5) {
		$meniny = "Lesana, Lesia";
	} else if ($den == 6) {
		$meniny = "Herm�na";
	} else if ($den == 7) {
		$meniny = "Monika";
	} else if ($den == 8) {
		$meniny = "Ingrida";
	} else if ($den == 9) {
		$meniny = "Roland";
	} else if ($den == 10) {
		$meniny = "Vikt�ria";
	} else if ($den == 11) {
		$meniny = "Bla�ena";
	} else if ($den == 12) {
		$meniny = "Pankr�c";
	} else if ($den == 13) {
		$meniny = "Serv�c";
	} else if ($den == 14) {
		$meniny = "Bonif�c";
	} else if ($den == 15) {
		$meniny = "�ofia";
	} else if ($den == 16) {
		$meniny = "Svetoz�r";
	} else if ($den == 17) {
		$meniny = "Gizela";
	} else if ($den == 18) {
		$meniny = "Viola";
	} else if ($den == 19) {
		$meniny = "Gertr�da";
	} else if ($den == 20) {
		$meniny = "Bernard";
	} else if ($den == 21) {
		$meniny = "Zina";
	} else if ($den == 22) {
		$meniny = "J�lia";
	} else if ($den == 23) {
		$meniny = "�elm�ra";
	} else if ($den == 24) {
		$meniny = "Ela";
	} else if ($den == 25) {
		$meniny = "Urban";
	} else if ($den == 26) {
		$meniny = "Du�an";
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
		$meniny = "�aneta, De� det�";
	} else if ($den == 2) {
		$meniny = "X�nia, Oxana";
	} else if ($den == 3) {
		$meniny = "Karol�na";
	} else if ($den == 4) {
		$meniny = "Lenka";
	} else if ($den == 5) {
		$meniny = "Laura";
	} else if ($den == 6) {
		$meniny = "Norbert";
	} else if ($den == 7) {
		$meniny = "R�bert";
	} else if ($den == 8) {
		$meniny = "Medard";
	} else if ($den == 9) {
		$meniny = "Stanislava";
	} else if ($den == 10) {
		$meniny = "Margar�ta";
	} else if ($den == 11) {
		$meniny = "Dobroslava";
	} else if ($den == 12) {
		$meniny = "Zlatko";
	} else if ($den == 13) {
		$meniny = "Anton";
	} else if ($den == 14) {
		$meniny = "Vasil";
	} else if ($den == 15) {
		$meniny = "V�t";
	} else if ($den == 16) {
		$meniny = "Blanka, Bianka";
	} else if ($den == 17) {
		$meniny = "Adolf";
	} else if ($den == 18) {
		$meniny = "Vratislav, Vratislava";
	} else if ($den == 19) {
		$meniny = "Alfr�d";
	} else if ($den == 20) {
		$meniny = "Val�ria";
	} else if ($den == 21) {
		$meniny = "Alojz";
	} else if ($den == 22) {
		$meniny = "Paul�na";
	} else if ($den == 23) {
		$meniny = "Sid�nia";
	} else if ($den == 24) {
		$meniny = "J�n";
	} else if ($den == 25) {
		$meniny = "Tade�, Ol�via";
	} else if ($den == 26) {
		$meniny = "Adriana";
	} else if ($den == 27) {
		$meniny = "Ladislav, Ladislava";
	} else if ($den == 28) {
		$meniny = "Be�ta";
	} else if ($den == 29) {
		$meniny = "Peter a Pavol, Petra";
	} else if ($den == 30) {
		$meniny = "Mel�nia";
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
		$meniny = "Patr�cia, Patrik";
	} else if ($den == 7) {
		$meniny = "Oliver";
	} else if ($den == 8) {
		$meniny = "Ivan";
	} else if ($den == 9) {
		$meniny = "Lujza";
	} else if ($den == 10) {
		$meniny = "Am�lia";
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
		$meniny = "Drahom�r";
	} else if ($den == 17) {
		$meniny = "Bohuslav";
	} else if ($den == 18) {
		$meniny = "Kamila";
	} else if ($den == 19) {
		$meniny = "Du�ana";
	} else if ($den == 20) {
		$meniny = "I�ja, Eli�";
	} else if ($den == 21) {
		$meniny = "Daniel";
	} else if ($den == 22) {
		$meniny = "Magdal�na";
	} else if ($den == 23) {
		$meniny = "O�ga";
	} else if ($den == 24) {
		$meniny = "Vladim�r";
	} else if ($den == 25) {
		$meniny = "Jakub";
	} else if ($den == 26) {
		$meniny = "Anna, Hana";
	} else if ($den == 27) {
		$meniny = "Bo�ena";
	} else if ($den == 28) {
		$meniny = "Kri�tof";
	} else if ($den == 29) {
		$meniny = "Marta";
	} else if ($den == 30) {
		$meniny = "Libu�a";
	} else if ($den == 31) {
		$meniny = "Ign�c";
	}
}
if ($mesiac == 8) {
	if ($den == 1) {
		$meniny = "Bo�idara";
	} else if ($den == 2) {
		$meniny = "Gust�v";
	} else if ($den == 3) {
		$meniny = "Jergu�";
	} else if ($den == 4) {
		$meniny = "Dominik, Dominika";
	} else if ($den == 5) {
		$meniny = "Hortenzia";
	} else if ($den == 6) {
		$meniny = "Jozef�na";
	} else if ($den == 7) {
		$meniny = "�tef�nia";
	} else if ($den == 8) {
		$meniny = "Osk�r";
	} else if ($den == 9) {
		$meniny = "�ubom�ra";
	} else if ($den == 10) {
		$meniny = "Vavrinec";
	} else if ($den == 11) {
		$meniny = "Zuzana";
	} else if ($den == 12) {
		$meniny = "Darina";
	} else if ($den == 13) {
		$meniny = "�ubom�r";
	} else if ($den == 14) {
		$meniny = "Mojm�r";
	} else if ($den == 15) {
		$meniny = "Marcela";
	} else if ($den == 16) {
		$meniny = "Leonard";
	} else if ($den == 17) {
		$meniny = "Milica";
	} else if ($den == 18) {
		$meniny = "Elena, Helena";
	} else if ($den == 19) {
		$meniny = "L�dia";
	} else if ($den == 20) {
		$meniny = "Anabela";
	} else if ($den == 21) {
		$meniny = "Jana";
	} else if ($den == 22) {
		$meniny = "Tichom�r";
	} else if ($den == 23) {
		$meniny = "Filip";
	} else if ($den == 24) {
		$meniny = "Bartolomej";
	} else if ($den == 25) {
		$meniny = "�udov�t";
	} else if ($den == 26) {
		$meniny = "Samuel";
	} else if ($den == 27) {
		$meniny = "Silvia";
	} else if ($den == 28) {
		$meniny = "August�n, August�na";
	} else if ($den == 29) {
		$meniny = "Nikola";
	} else if ($den == 30) {
		$meniny = "Ru�ena";
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
		$meniny = "Roz�lia";
	} else if ($den == 5) {
		$meniny = "Reg�na";
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
		$meniny = "Bystr�k";
	} else if ($den == 12) {
		$meniny = "M�ria";
	} else if ($den == 13) {
		$meniny = "Ctibor";
	} else if ($den == 14) {
		$meniny = "�udomil, �udomila";
	} else if ($den == 15) {
		$meniny = "Jolana";
	} else if ($den == 16) {
		$meniny = "�udmila";
	} else if ($den == 17) {
		$meniny = "Olympia";
	} else if ($den == 18) {
		$meniny = "Eug�nia";
	} else if ($den == 19) {
		$meniny = "Kon�tant�n";
	} else if ($den == 20) {
		$meniny = "�uboslav, �uboslava";
	} else if ($den == 21) {
		$meniny = "Mat��";
	} else if ($den == 22) {
		$meniny = "M�ric";
	} else if ($den == 23) {
		$meniny = "Z$denka";
	} else if ($den == 24) {
		$meniny = "�ubo�, �ubor";
	} else if ($den == 25) {
		$meniny = "Vladislav";
	} else if ($den == 26) {
		$meniny = "Edita";
	} else if ($den == 27) {
		$meniny = "Cypri�n";
	} else if ($den == 28) {
		$meniny = "V�clav";
	} else if ($den == 29) {
		$meniny = "Michal, Michaela";
	} else if ($den == 30) {
		$meniny = "Jarol�m";
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
		$meniny = "Franti�ek";
	} else if ($den == 5) {
		$meniny = "Viera";
	} else if ($den == 6) {
		$meniny = "Nat�lia";
	} else if ($den == 7) {
		$meniny = "Eli�ka";
	} else if ($den == 8) {
		$meniny = "Brigita";
	} else if ($den == 9) {
		$meniny = "Dion�z";
	} else if ($den == 10) {
		$meniny = "Slavom�ra";
	} else if ($den == 11) {
		$meniny = "Valent�na";
	} else if ($den == 12) {
		$meniny = "Maximili�n";
	} else if ($den == 13) {
		$meniny = "Koloman";
	} else if ($den == 14) {
		$meniny = "Boris";
	} else if ($den == 15) {
		$meniny = "Ter�zia";
	} else if ($den == 16) {
		$meniny = "Vladim�ra";
	} else if ($den == 17) {
		$meniny = "Hedviga";
	} else if ($den == 18) {
		$meniny = "Luk�";
	} else if ($den == 19) {
		$meniny = "Kristi�n";
	} else if ($den == 20) {
		$meniny = "Vendel�n";
	} else if ($den == 21) {
		$meniny = "Ur�u�a";
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
		$meniny = "Sab�na";
	} else if ($den == 28) {
		$meniny = "Dobromila, Kevin";
	} else if ($den == 29) {
		$meniny = "Kl�ra";
	} else if ($den == 30) {
		$meniny = "�imon, Simona";
	} else if ($den == 31) {
		$meniny = "Aur�lia";
	}
}
if ($mesiac == 11) {
	if ($den == 1) {
		$meniny = "Denisa";
	} else if ($den == 2) {
		$meniny = "Pamiatka zosnul�ch";
	} else if ($den == 3) {
		$meniny = "Hubert";
	} else if ($den == 4) {
		$meniny = "Karol";
	} else if ($den == 5) {
		$meniny = "Imrich";
	} else if ($den == 6) {
		$meniny = "Ren�ta";
	} else if ($den == 7) {
		$meniny = "Ren�";
	} else if ($den == 8) {
		$meniny = "Bohum�r";
	} else if ($den == 9) {
		$meniny = "Teodor";
	} else if ($den == 10) {
		$meniny = "Tibor";
	} else if ($den == 11) {
		$meniny = "Martin, Maro�";
	} else if ($den == 12) {
		$meniny = "Sv�topluk";
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
		$meniny = "Al�beta";
	} else if ($den == 20) {
		$meniny = "F�lix";
	} else if ($den == 21) {
		$meniny = "Elv�ra";
	} else if ($den == 22) {
		$meniny = "Cec�lia";
	} else if ($den == 23) {
		$meniny = "Klement";
	} else if ($den == 24) {
		$meniny = "Em�lia";
	} else if ($den == 25) {
		$meniny = "Katar�na";
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
		$meniny = "Mikul�";
	} else if ($den == 7) {
		$meniny = "Ambr�z";
	} else if ($den == 8) {
		$meniny = "Mar�na";
	} else if ($den == 9) {
		$meniny = "Izabela";
	} else if ($den == 10) {
		$meniny = "Rad�z";
	} else if ($den == 11) {
		$meniny = "Hilda";
	} else if ($den == 12) {
		$meniny = "Ot�lia";
	} else if ($den == 13) {
		$meniny = "Lucia";
	} else if ($den == 14) {
		$meniny = "Branislava, Bronislava";
	} else if ($den == 15) {
		$meniny = "Ivica";
	} else if ($den == 16) {
		$meniny = "Alb�na";
	} else if ($den == 17) {
		$meniny = "Korn�lia";
	} else if ($den == 18) {
		$meniny = "Sl�va, Sl�vka";
	} else if ($den == 19) {
		$meniny = "Judita";
	} else if ($den == 20) {
		$meniny = "Dagmara";
	} else if ($den == 21) {
		$meniny = "Bohdan";
	} else if ($den == 22) {
		$meniny = "Adela";
	} else if ($den == 23) {
		$meniny = "Nade�da";
	} else if ($den == 24) {
		$meniny = "Adam a Eva, �tedr� de�";
	} else if ($den == 25) {
		$meniny = "1. sviatok viano�n�";
	} else if ($den == 26) {
		$meniny = "�tefan, 2. sviatok viano�n�";
	} else if ($den == 27) {
		$meniny = "Filom�na";
	} else if ($den == 28) {
		$meniny = "Ivana, Ivona";
	} else if ($den == 29) {
		$meniny = "Milada";
	} else if ($den == 30) {
		$meniny = "D�vid";
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
		case 4: $den = "�tvrtok"; break;
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
		case 2: $miesto = "Egre�"; break;
		case 3: $miesto = "�e�ovce"; break;
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
			case 2 : $mz_miesto = "Egre�"; break;
			case 3 : $mz_miesto = "�e�ovce"; break;
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
	$string = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"?action=$action&record=$id&zmaz=1&uprav=0&begin=$begin\" class=\"textmain\" style=\"text-align:center;color:red;\">ZMAZA�</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"?action=$action&record=$id&uprav=1&zmaz=0&begin=$begin\" class=\"textmain\" style=\"text-align:center;color:red;\">UPRAVI�</a>";
return $string;

}

function check_www($text){
	$text =	eregi_replace("^www.", "http://www.",$text);
	$text =	eregi_replace("[[:space:]]+www.", " http://www.",$text);
	$text = eregi_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\" target=\"_blank\" class=\"text_main\" title=\"\\0\">\\0</a>", $text);
	return $text;
}

?>