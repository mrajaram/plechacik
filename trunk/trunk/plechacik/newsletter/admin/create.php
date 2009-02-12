<?php
include "config.inc.php";
?>

<html>
<head>
<title><?php echo $pagetitle ?> [reloader start]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style.css">

<?php



//check editor user



if ($create) {

	///////////////////
	//create the file//
	///////////////////

	$textfilename = date("dmY_is");
	$fp = fopen("../filez/$textfilename", "w");


	////////////////////////////////////////
	//read the content out of the database//
	////////////////////////////////////////

	$result = mysql_db_query ("$dbname","select * from $dbTable WHERE email LIKE '%@%' AND send = '1' ORDER BY email DESC");
	$NumberOfFields=mysql_num_rows($result);

	while ($row = mysql_fetch_array ($result)) {

		$email =$row["email"];
		$nname =$row["nname"];
		$vname =$row[vname];
		$UID =$row[UID];


		//$message = "$email"." "."$vname"." "."$nname"." "."$UID\n";
		$message = "$email\n";

	///////////////////////////////////////////////
	//write the content strings into the textfile//
	///////////////////////////////////////////////
		if($email) {
			fwrite ($fp, $message);
		}
	}
	fclose ($fp);
	chmod ("../filez/$textfilename", 0777);

	mysql_free_result($result);
}



echo "</head>";
echo "<body bgcolor=\"$bgcolor\" text=\"$text\" link=\"$link\" vlink=\"$vlink\" alink=\"$alink\" leftmargin=\"$leftmargin\" topmargin=\"$topmargin\" marginwidth=\"$marginwidth\" marginheight=\"$marginheight\">";

?>


<table border="0" cellspacing="0" cellpadding="0">

<?php

	////////////////////////
	//if everything ist ok//
	////////////////////////

	if (($create) && (file_exists("../filez/$textfilename")))
	{
		echo "<tr><td width=\"550\"><b>file crated successfully - with $NumberOfFields email-addresses</b><b><br>step two [writing and sending the emails]</b></td></tr>\n<tr><td width=\"550\">&nbsp;</td></tr>\n<tr><td width=\"550\"><a href=\"sendmail.php?textfile=$textfilename\">continue (mailform)</a><br><br></td></tr>\n<tr><td width=\"550\"><a href=\"../filez/$textfilename\" target=\"_blank\">show textfile</a></td></tr>\n";
	}

	/////////////////////////
	//if something is wrong//
	/////////////////////////

	else if (($create) && (!file_exists("../filez/$textfilename")))
	{
		echo "<tr><td width=\"550\"><b>problems to create the file</b></td></tr>\n<tr><td width=\"550\">&nbsp;</td></tr>\n<tr><td width=\"550\"><a href=\"mailto:$admin_mail\">mail to: $admin_mail</a></td></tr>\n";

	////////////////////
	//default position//
	////////////////////

	} else {
		echo "<tr><td width=\"550\"><b>step one [creating textfile out of the database]</b></td></tr>\n<tr><td width=\"550\">&nbsp;</td></tr>\n<tr><td width=\"550\"><a href=\"./create.php?create=1\">START HERE</a><br><br></td></tr>\n<tr><td width=\"550\">&nbsp;</td></tr>\n";
	}



?>




  <tr>
    <td width="550">&nbsp;</td>
  </tr>
  <tr>
    <td width="550">&nbsp;</td>
  </tr>
</table>
</body>
</html>
