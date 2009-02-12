<?
//common.php
	$okej_ipecky = array("195.28.64.119","147.232.154.36", "147.232.154.193");
	$okej_ipecky_del = array("");

	if(isset($HTTP_X_FORWARDED_FOR)) $REMOTE_ADDR=$HTTP_X_FORWARDED_FOR;

	$ipaddress = $REMOTE_ADDR;
//	$host = GetHostByADDR($ipaddress);
//-----------------------------
	function policko($pozicia, $cislo_d, $cislo_u){					//sluzi na kontrolu IP adresy pomocou jednotlivych casti z ktorych pozostava (4 casti po 3 cisla). pri volani funkcie sa zadava najprv CAST($pozicia) a potom CISLO($cislo) s ktorym to ma byt porovnane. 
		global $ipaddress;
		ereg('^([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})$', $ipaddress, $policko);
		if (($policko[$pozicia] >= $cislo_d) && ($policko[$pozicia] <= $cislo_u)){
				return true;
		}
		return false;
	}
//-----------------------------
	function control_ip($info){							//sluzi na kontrolu IP adresy - vyuziva sa na povolenie/zakazanie pristupu k statistike alebo na zobrazenie nejakych casti dokumentu (button na zmazanie statistiky). 
		global $ipaddress, $okej_ipecky, $okej_ipecky_del;
		if ($info == "disable"){return false;}
		if ($info == "all"){return true;}
		if ($info == "delete"){
			$ipecky = $okej_ipecky_del;
		}else { 
			$ipecky = $okej_ipecky;
		}
		$count_okej = count($ipecky);
		for($i=0; $i<=$count_okej; $i++){
			if ($ipecky[$i] == $ipaddress)
				return true;
		}
		return false;
	}
//-----------------------------
	function preklad($select){					//funkcia na zobrazenie z ktoreho jazyka sa prekladalo - pouzitie v stlpci Translation (with)
		switch ($select){
				case 1 : {$result = "English"; return $result; break;}
				case 5 : {$result = "Slovak"; return $result; break;}
				case 3 : {$result = "German"; return $result; break;}
				case 2 : {$result = "French"; return $result; break;}
				case 4 : {$result = "Italian"; return $result; break;}
				case 6 : {$result = "Spanish"; return $result; break;}
		}
	}
	
//----------------------------
	function preklad_info($select){				//to iste ako f-cia preklad() ibaze preklad_info sa pouziva iba v info.php
		switch ($select){
				case 1 : {$result = "English &#187; Slovak"; return $result; break;}
				case 5 : {$result = "Slovak &#187; others..."; return $result; break;}
				case 3 : {$result = "German &#187; Slovak"; return $result; break;}	
				case 2 : {$result = "French &#187; Slovak"; return $result; break;}
				case 4 : {$result = "Italian &#187; Slovak"; return $result; break;}
				case 6 : {$result = "Spanish &#187; Slovak"; return $result; break;}
		}
	}
//--------------------------------
	function errMessage($message){				//funkcia na vypisovanie Errorov
		printf("<br><b>%s</b><br>\n", $message);
	}
//------------------------------

	function check_ip($ip){						//funkcia na kontrolu vstupu ip adresy. Kontroluje spravnost zadania IP adresy
	global $sql_ip;
		if ($sql_ip){
			$ereg_pom = "^([0-9\_\%]{1,3})\.([0-9\_\%]{1,3})\.([0-9\_\%]{1,3})\.([0-9\_\%]{1,3})";
		}else{
			$ereg_pom = "^([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})";
		}
		if (is_string($ip) && ereg($ereg_pom, $ip, $part)){
			if ($sql_ip){
				return true;
			}
			if ($part[1] <= 255 && $part[1] != 0 && $part[2] <= 255 && $part[3] <= 255 && $part[4] <= 255){
				return true;
			}
		}
		return false;
	}
//------------------------------
	function check_word($request){						//funkcia na kontrolu vstupu $request. Kontroluje iba ci nebol zadany nejaky pocet medzier
		if (!ereg('^[ ]*$', $request)){
			return true;
		}
		return false;
	}
//-------------------------------
	function sort_datum($sort){							//f-cia na triedenie podla datumu (zabezpecuje vzostupnost/zostupnost)
		if (!$sort){$sort=3;}
		if ($sort == 3){
			$sort = 4;
		}else{
			$sort = 3;
		}
		return $sort;
	}
//-----------------------------
	function sort_cas($sort){							//f-cia na triedenie podla casu (zabezpecuje vzostupnost/zostupnost)
		if (!$sort){$sort=5;}
		if ($sort == 5){
			$sort = 6;
		}else{
			$sort = 5;
		}
		return $sort;
	}
//----------------------------
	function sort_preklad($sort){						//f-cia na triedenie podla prekladu (zabezpecuje vzostupnost/zostupnost) - v SQL sa to triedi pomocou premennej $pom ktora obsahuje cisla, ktore boli pridelovane na zaklade vybraneho prekladu
		if (!$sort){$sort=7;}
		if ($sort == 7){
			$sort = 8;
		}else{
			$sort = 7;
		}
		return $sort;
	}
//----------------------------
	function arrow_show($one, $two){					//sluzi na zobrazovanie sipiek v hlavicke. 
		global $sort, $num;
		if ($num > 1){									//zobrazia sa iba ak je pocet riadkov vacsi ako 1 => je co triedit. 
		if ($sort == $one){
			$obr = "<img src=\"obr/arrow_up.gif\">&nbsp;&nbsp;";
			return $obr;
		}else if ($sort == $two){
			$obr = "<img src=\"obr/arrow_down.gif\">&nbsp;&nbsp;";
			return $obr;
		}
		}
	}
	
//----------------------------
	function sql($prem){								//na zaklade ci bol checkbox aktivny alebo nie f-cia vracia like alebo =
		if ($prem){
			$sql = "like";
		}else{
			$sql = "=";
		}
			return $sql;
	}
//----------------------------
	function href_sql_word($prem){							//ak bol checkbox aktivny tak k odkzu pre jednotlive triedenia pridava premennu $sql_word=1 => checkbox je aktivny
		if ($prem)
			$href_sql = "&sql_word=1";
			return $href_sql;
	}
//----------------------------
	function href_sql_ip($prem){							//ak bol checkbox aktivny tak k odkzu pre jednotlive triedenia pridava premennu $sql_word=1 => checkbox je aktivny
		if ($prem)
			$href_sql = "&sql_ip=1";
			return $href_sql;
	}
//----------------------------
	function convert($cislo){
		switch ($cislo){
			case 1 : {$result = 0; return $result; break;}
			case 3 : {$result = 2; return $result; break;}
			case 2 : {$result = 4; return $result; break;}
			case 4 : {$result = 6; return $result; break;}
			case 6 : {$result = 8; return $result; break;} 
			default : {$result = 5; return $result;}
		}
	}
//---------------------------
        function check($request, $selection){
       	global $i;
		if ($i != 5 && $selection != 5){
                $vrat = "&nbsp;&nbsp;&nbsp<a href=\"http://www.intrak.sk/translator/index.php?request=$request&selection=$selection\" target=\"_blank\" title=\"Check expression: $request\"><img src=\"obr/check.gif\" border=\"0\"></a>";
                return $vrat;
                }

        }



?>
