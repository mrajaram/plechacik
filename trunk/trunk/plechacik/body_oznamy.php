<br>
<?
require_once('./setup.php');
require_once('./common.php');

if (@!($link = mysql_pconnect($db_host, $db_user, $db_passwd))){
	exit;
}
if (@!mysql_select_db($db_name, $link)){
	exit;
}

if (!empty($record)){
	$stmt = "select * from oznamy where id = $record";
	if (@!($result = mysql_query($stmt, $link))){
		exit;
	}
	$row = mysql_fetch_object($result);

	ereg("^(.+)-(.+)-(.+)$", $row->platnost_od, $platnostOd);
	$platnostOd = $platnostOd[3] . ". " . $platnostOd[2] . ". " . $platnostOd[1];
	echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">";
	printf("<tr>
						<td width=\"89\" height=\"30\" background=\"./imgs/main_lista_left.gif\" align=\"center\" valign=\"middle\"><img src=\"./imgs/icon_ziarovka.gif\" width=\"23\" height=\"26\"></td>
						<td width=\"*\" height=\"30\" background=\"./imgs/main_lista_middle.gif\" class=\"oznamNazov\">%s&nbsp;<span class=\"textmain\">(oznam platný od: %s)</span></td>
						<td width=\"84\" height=\"30\" background=\"./imgs/main_lista_right.gif\" align=\"center\" valign=\"middle\">%s</td>
					</tr>", $row->nazov, $platnostOd, showArrow($j));
	echo "</table>";
	
	echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">";
	printf("<tr>
						<td width=\"2\" background=\"./imgs/main_body_left.gif\"><img src=\"./imgs/blank.gif\"></td>
						<td width=\"*\" bgcolor=\"#fcfcfc\" class=\"textmain\">%s</td>
						<td width=\"7\" background=\"./imgs/main_body_right.gif\"><img src=\"./imgs/blank.gif\"></td>
					</tr>", nl2br($row->text));
	echo "</table>";
	
	echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">
					<tr>
						<td width=\"5\" height=\"10\" background=\"./imgs/main_bottom_left.gif\"><img src=\"./imgs/blank.gif\"></td>
						<td width=\"*\" height=\"10\" background=\"./imgs/main_bottom_middle.gif\"><img src=\"./imgs/blank.gif\"></td>
						<td width=\"10\" height=\"10\" background=\"./imgs/main_bottom_right.gif\"><img src=\"./imgs/blank.gif\"></td>
					</tr>
				</table><br>";

} else {
	$currentDate = date("Y-m-d");
	$stmt = "select * from oznamy order by id desc";
	if (@!($result = mysql_query($stmt, $link))){
		exit;
	}
	$pocet = mysql_num_rows($result);
	$j = 0;
	$c = 0;
	if ($pocet != 0){
		while ($row = mysql_fetch_object($result)){
		if ($row->viditelnost){																		//1-intranet; 0-vsade
		 if(control_ip("intranet")) $zobrazit = 1;
		}else {$zobrazit = 1;}
		if ($currentDate>=$row->platnost_od && $currentDate<=$row->platnost_do && $zobrazit==1){
			$j++;
			ereg("^(.+)-(.+)-(.+)$", $row->platnost_od, $platnostOd);
			$platnostOd = $platnostOd[3] . ". " . $platnostOd[2] . ". " . $platnostOd[1];
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">";
			printf("<tr>
								<td width=\"89\" height=\"30\" background=\"./imgs/main_lista_left.gif\" align=\"center\" valign=\"middle\"><img src=\"./imgs/icon_ziarovka.gif\" width=\"23\" height=\"26\"></td>
								<td width=\"*\" height=\"30\" background=\"./imgs/main_lista_middle.gif\" class=\"oznamNazov\">%s&nbsp;<span class=\"textmain\">(oznam platný od: %s)</span></td>
								<td width=\"84\" height=\"30\" background=\"./imgs/main_lista_right.gif\" align=\"center\" valign=\"middle\">%s</td>
							</tr>", $row->nazov, $platnostOd, showArrow($j));
			echo "</table>";
			
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">";
			printf("<tr>
								<td width=\"2\" background=\"./imgs/main_body_left.gif\"><img src=\"./imgs/blank.gif\"></td>
								<td width=\"*\" bgcolor=\"#fcfcfc\" class=\"textmain\">%s</td>
								<td width=\"7\" background=\"./imgs/main_body_right.gif\"><img src=\"./imgs/blank.gif\"></td>
							</tr>", otvor_oznam(nl2br($row->text),$row->id));
			echo "</table>";
			
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">
							<tr>
								<td width=\"5\" height=\"10\" background=\"./imgs/main_bottom_left.gif\"><img src=\"./imgs/blank.gif\"></td>
								<td width=\"*\" height=\"10\" background=\"./imgs/main_bottom_middle.gif\"><img src=\"./imgs/blank.gif\"></td>
								<td width=\"10\" height=\"10\" background=\"./imgs/main_bottom_right.gif\"><img src=\"./imgs/blank.gif\"></td>
							</tr>
						</table><br>";
		} else { #if/currentDate
			$c++;
		}#else if/currentDate
		}#end while
		if ($c>0 && $j==0){
			$x = "Oznam o oznamoch :o)";
				$text = "<br><br><br><br><br>Momentálne nie sú žiadne oznamy<br><br><br><br><br><br>";
				echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">";
				printf("<tr>
									<td width=\"89\" height=\"30\" background=\"./imgs/main_lista_left.gif\" align=\"center\" valign=\"middle\"><img src=\"./imgs/icon_ziarovka.gif\" width=\"23\" height=\"26\"></td>
									<td width=\"*\" height=\"30\" background=\"./imgs/main_lista_middle.gif\" class=\"oznamNazov\">%s&nbsp;</td>
									<td width=\"84\" height=\"30\" background=\"./imgs/main_lista_right.gif\" align=\"center\" valign=\"middle\"><img src=\"./imgs/blank.gif\"></td>
								</tr>", $x);
				echo "</table>";
				
				echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">";
				printf("<tr>
									<td width=\"2\" background=\"./imgs/main_body_left.gif\"><img src=\"./imgs/blank.gif\"></td>
									<td width=\"*\" bgcolor=\"#fcfcfc\" class=\"oznamNazov\"><div align=\"center\">%s</div></td>
									<td width=\"7\" background=\"./imgs/main_body_right.gif\"><img src=\"./imgs/blank.gif\"></td>
								</tr>", $text);
				echo "</table>";
				
				echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">
								<tr>
									<td width=\"5\" height=\"10\" background=\"./imgs/main_bottom_left.gif\"><img src=\"./imgs/blank.gif\"></td>
									<td width=\"*\" height=\"10\" background=\"./imgs/main_bottom_middle.gif\"><img src=\"./imgs/blank.gif\"></td>
									<td width=\"10\" height=\"10\" background=\"./imgs/main_bottom_right.gif\"><img src=\"./imgs/blank.gif\"></td>
								</tr>
							</table><br><br>";
		}
	} else {
		$x = "Oznam o oznamoch :o)";
		$text = "<br><br><br><br><br>Momentálne nie sú žiadne oznamy<br><br><br><br><br><br>";
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">";
			printf("<tr>
								<td width=\"89\" height=\"30\" background=\"./imgs/main_lista_left.gif\" align=\"center\" valign=\"middle\"><img src=\"./imgs/icon_ziarovka.gif\" width=\"23\" height=\"26\"></td>
								<td width=\"*\" height=\"30\" background=\"./imgs/main_lista_middle.gif\" class=\"oznamNazov\">%s&nbsp;</td>
								<td width=\"84\" height=\"30\" background=\"./imgs/main_lista_right.gif\" align=\"center\" valign=\"middle\"><img src=\"./imgs/blank.gif\"></td>
							</tr>", $x);
			echo "</table>";
			
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">";
			printf("<tr>
								<td width=\"2\" background=\"./imgs/main_body_left.gif\"><img src=\"./imgs/blank.gif\"></td>
								<td width=\"*\" bgcolor=\"#fcfcfc\" class=\"oznamNazov\"><div align=\"center\">%s</div></td>
								<td width=\"7\" background=\"./imgs/main_body_right.gif\"><img src=\"./imgs/blank.gif\"></td>
							</tr>", $text);
			echo "</table>";
			
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" align=\"center\">
							<tr>
								<td width=\"5\" height=\"10\" background=\"./imgs/main_bottom_left.gif\"><img src=\"./imgs/blank.gif\"></td>
								<td width=\"*\" height=\"10\" background=\"./imgs/main_bottom_middle.gif\"><img src=\"./imgs/blank.gif\"></td>
								<td width=\"10\" height=\"10\" background=\"./imgs/main_bottom_right.gif\"><img src=\"./imgs/blank.gif\"></td>
							</tr>
						</table><br><br>";
	}
	
} # if/id - ci je oznam rozbaleny... 
?>
