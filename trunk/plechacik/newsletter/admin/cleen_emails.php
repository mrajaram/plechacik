<?php
include "config.inc.php";
?>

<html>
<head>
<title><?php echo $pagetitle ?> [reloader send mails]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style.css">


<?php

echo "</head>";
echo "<body bgcolor=\"$bgcolor\" text=\"$text\" link=\"$link\" vlink=\"$vlink\" alink=\"$alink\" leftmargin=\"$leftmargin\" topmargin=\"$topmargin\" marginwidth=\"$marginwidth\" marginheight=\"$marginheight\">";



	if ($go)
	{

	//auslesen aus table emails
		$result = mysql_query ("SELECT * FROM $dbTable_dirty");
		while ($row = mysql_fetch_array ($result)) 
		{
		$email_to_check =$row["email"];
		$uid =$row["uid"];
		$send =$row["send"];
		
	//abchecken, ob der eintrag schon im cleen table drin ist	
		
		
		$result2 = mysql_query ("SELECT email FROM $dbTable_cleen WHERE email = '$email_to_check'");
    		($row = mysql_fetch_row ($result2));  
		
		$cleen_email = $row[0];	
		
		if ($cleen_email == "") {
		
	//wenn nicht - ins cleen table reinschreiben
  		
  		$sql = "INSERT INTO $dbTable_cleen (email,uid,send) VALUES ('".addslashes($email_to_check)."','$uid','$send')";
    		$result1 = mysql_query($sql);
		

		
		} else if ($cleen_email !== "") {
		echo "kommen mehr als einmal vor:"."$cleen_email"."<br>";
		}
	
}	
	


	

		
	
	
	
	//////////////////////////
	//confirm the inputs   //
	//////////////////////////
		echo "<br><br><span class=\"tx\">emails cleened!!!</span>";
	
	} else {


?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td class="titel"><a href="cleen_emails.php?go=1">click and cleen the emails</a></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        
      </table>



<?php
}
?>

</body>
</html>