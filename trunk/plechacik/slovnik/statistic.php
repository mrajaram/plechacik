<?
//statistic.php
	
	function errMessage($message){
		printf("<b>%s</b>", $message);
	}
//----------------------------------------	
	function check_request($request){
		if (!ereg('^[ ]*$', $request)){
			return true;
		}
		return false;
	}
//----------------------------------------
	
	$stmt_counter = "select counter_tran from update_stat";
	
//------------------------------------------ ZACITATOK POCITADLA PRE TRANSLATOR ---------------------------------------------------------	
	if (!($result_tran = mysql_query($stmt_counter, $spojenie))){
		errMessage(sprintf("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt_counter));
		exit();
	}
	
	if (empty($HTTP_COOKIE_VARS["koma_tran"])){
		$row_tran = mysql_fetch_object($result_tran);
		$pocet_tran = $row_tran->counter_tran;
		$pocet_tran++;
		$stmt = "update update_stat SET counter_tran='$pocet_tran'";
			if (!mysql_query($stmt, $spojenie)){
				errMessage(sprintf("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt));
				exit();
			}
	}
	mysql_free_result($result_tran);
//-------------------------------------------- KONIEC POCITADLA PRE TRANSLATOR -------------------------------------------------------------

if ($ivec == null){
	
	function stat_tables ($select){
		if ($select%2 == 1){
			$result = "slovak_other";
			return $result;
		} else {
 			switch ($select){
			   	case 0 : {$result = "english_svk"; return $result; break;}
				case 2 : {$result = "german_svk"; return $result; break;}
			 	case 4 : {$result = "french_svk"; return $result; break;}
                case 6 : {$result = "italian_svk"; return $result; break;}
				case 8 : {$result = "spanish_svk"; return $result; break;}
			}
		  }
	}
//----------------------------------------			
function language($cislo){
	if ($cislo%2 == 1){
		$cislo = 5;
		return $cislo;
		break;
	}else{ 
		switch ($cislo){
			case 0 : {$cislo = 1; return $cislo; break;}
			case 2 : {$cislo = 3; return $cislo; break;}
			case 4 : {$cislo = 2; return $cislo; break;}
			case 6 : {$cislo = 4; return $cislo; break;}
			case 8 : {$cislo = 6; return $cislo; break;} 
		}
	}
}

//----------------------------------------

	$date = date("Y-m-d");
	$time = date("H:i:s");
	
	$stmt_select = "select * from " . stat_tables($selection) . " where request='$request'";
	
	if (!($result_stat = mysql_query($stmt_select, $spojenie))){
		errMessage(sprintf("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt_select));
		exit();
	}
	
	$num_stat = mysql_num_rows($result_stat);
	
	if (!ereg('^[ ]*$', $request)){
		if (!$num_stat){
			$counter = 1;
			$stmt_insert = "insert into " . stat_tables($selection) . " SET request='$request', counter='$counter', pom='" . language($selection) . "'";
			if (!mysql_query($stmt_insert, $spojenie)){
				errMessage(sprintf("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt_insert));
				exit();
			}
		}else{
			$row = mysql_fetch_object($result_stat);
			$counter = $row->counter;
			$counter++;
			$stmt_update = "update " . stat_tables($selection) . " SET request='$request', counter='$counter', pom='" . language($selection) . "' where request='$request'";
			if (!mysql_query($stmt_update, $spojenie)){
				errMessage(sprintf("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt_update));
				exit();
			}
		
		}
		$stmt_info = "insert into info_stat SET slovicko='$request', ipecka='$ipecka', datum='$date', cas='$time', pom='" . language($selection) . "'";
		if (!mysql_query($stmt_info, $spojenie)){
			errMessage(sprintf("Nepodarilo sa vykonat nasledujuci prikaz: %s", $stmt_info));
			exit();
		}
	}
	mysql_free_result($result_stat);
}
?>
