<?php 
function zisti_den_zvozu($akt_den, $akt_mesiac){
	$den_mesiac = "$akt_den-$akt_mesiac";

		//"den-mesiac"		!!!! den uvadzat bez nuly => 3-04 => 03-04 (nespravne)
	$papier_plus_tetra = array("21-01", "18-02", "18-03", "15-04", "13-05", "10-06", "8-07", "5-08", "2-09", "30-09", "28-10", "25-11", "23-12");
	$plasty = array("20-01", "17-02", "17-03", "14-04", "12-05", "9-06", "7-07", "4-08", "31-08", "29-09", "27-10", "24-11", "22-12");
	$sklo = array("2-01","30-01", "27-02", "27-03", "24-04", "22-05", "19-06", "17-07", "14-08", "11-09", "9-10", "6-11", "4-12");
	$nebezpecny = array("2-03", "9-07" , "11-11");
	$elektro_srot = array("22-22");
	$pneumatiky = array("22-29");

	$vrat = "";
	// if (in_array($den_mesiac, $komunalny))	$vrat .= "&nbsp;K";
	
	if (in_array($den_mesiac, $plasty)) $vrat .= "&nbsp;Pl";
	if (in_array($den_mesiac, $sklo)) $vrat .= "&nbsp;S";
	if (in_array($den_mesiac, $nebezpecny)) $vrat .= "&nbsp;N";
	if (in_array($den_mesiac, $papier_plus_tetra)) $vrat .= "&nbsp;P+T";
	// if (in_array($den_mesiac, $tetrapak)) $vrat .= "&nbsp;T";
	// if (in_array($den_mesiac, $elektro_srot)) $vrat .= "&nbsp;E";
	// if (in_array($den_mesiac, $pneumatiky)) $vrat .= "&nbsp;P";
	
	$vrat = "<b>$vrat</b>";
	return $vrat;
}

function days_in_month ( $month , $year ) 
{ 
// calculate number of days in a month 
return $month == 2 ? ( $year % 4 ? 28 : ( $year % 100 ? 29 : ( $year % 400 ? 28 : 29 ))) : (( $month - 1 ) % 7 % 2 ? 30 : 31 ); 
} 

// How many days are in the current month 
$Days_In_Month = days_in_month (date("m"), date("Y")); 

// Gets the Current day, day with 1st 2nd etc, day name, year (2004), month, 
// month name 
$Current_Day = date("d"); 
$Current_Day_S = date("dS"); 
$Current_Day_Name = date("l"); 
$Current_Year = date("Y"); 
$Current_Month = date("m"); 
$Current_Month_Name = date("F"); 

// Get the offset of the first day of the month 
$First_Day_Of_Month = date("w", mktime(0, 0, 0, $Current_Month, 1, $Current_Year)); 

// Set the day names 
$Days_Array = array(); 
$Days_Array[] = "Ne"; 
$Days_Array[] = "Po"; 
$Days_Array[] = "Ut"; 
$Days_Array[] = "St"; 
$Days_Array[] = "�t"; 
$Days_Array[] = "Pi"; 
$Days_Array[] = "So"; 

// For each of the Day Names, print em out 
$Day_Names = ""; 
foreach ($Days_Array as $x => $y) { 
    $Day_Names .= '<td align="center" bgcolor="#6285DF" width="14.28%"><font color="#ffffff"><b>' . $y . '</b></font></td>'; 
} 

// Spacers for the offset of the first day of the month 
$Cal_Weeks_Days = ""; 
$i = $First_Day_Of_Month + 1; 
if ($First_Day_Of_Month != "0") { 
    $Cal_Weeks_Days .= '<td colspan="' . $First_Day_Of_Month . '"> </td>'; 
} 

// Cal Days - The first day is 1, default with PHP is 0, so lets set it to 1 
$Day_i = "1"; 
$ii = $i; 

for ($i; $i <= ($Days_In_Month + $First_Day_Of_Month) ;$i++) { 
    // $i is our color variable - Alternate row colors: 
    if ($i % 2) { 
        $color = 'DFEBF9'; 
    } 
    else 
    { 
        $color = 'F4F9FD'; 
    } 

    // If the current day is sunday, make sure a new row gets set 
    if ($ii == 8) { 
        $Cal_Weeks_Days .= "</tr><tr>"; 
        $ii = 1; 
    } 

    // If the day is the current day, highlight it with a special color 
    if ($Current_Day == $Day_i) { 
        $Extra = 'bgcolor="#A4B8EC"'; 
    } 
    else 
    { 
        // Alternate row colors 
        $Extra = 'bgcolor="#' . $color . '"'; 
    } 

    // Show the days. 
    if ($Current_Day == $Day_i) { 
	    $Cal_Weeks_Days .= '<td height="30" valign="top" ' . $Extra . '><b>' . $Day_i . '<br>' . zisti_den_zvozu($Day_i, $Current_Month) .'</b></td>'; 
    } else {
	    $Cal_Weeks_Days .= '<td height="30" valign="top" ' . $Extra . '>' . $Day_i . '<br>' . zisti_den_zvozu($Day_i, $Current_Month) .'<br></td>'; 
		}

    // Increment the day number and the week day number (ii) 
    $Day_i++; 
    $ii++; 
} 

// Add end month spacers 
if ((8 - $ii) >= "1") { 
    $Cal_Weeks_Days .= '<td colspan="' . (8 - $ii) . '"> </td>'; 
} 

// Echo the HTML 
echo "
<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"169\" class=\"odpad\" bordercolor=\"#ffffff\"> 
    <tr> 
        $Day_Names 
    </tr> 
    <tr> 
        $Cal_Weeks_Days 
    </tr> 
</table>"; 
	
echo "<span class=\"small\"><br><br><br></span>
			<div class=\"odpovede\">
				<b>P+T</b> - Papier + Tetra<br>
				<b>Pl</b> - Plasty<br>
				<b>S</b> - Sklo<br>
				<b>N</b> - Nebezpe�n� odpad
			</div>&nbsp;<br><span class=\"odpovede\"><i>Platnos� od <b>01.01.2009</b></i></span>";
?>
