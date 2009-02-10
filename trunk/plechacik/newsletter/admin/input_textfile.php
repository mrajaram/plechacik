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



	if ($submit)
	{
//-------------------------------------------------------------------------------------------------
//UPLOAD THE TEXTFILE
//-------------------------------------------------------------------------------------------------

$path = $path_to_reloader_admin.$userfile;

	//echo $path;
	system("mv $userfile $path");

//-------------------------------------------------------------------------------------------------
//READING THE TEXTFILE
//-------------------------------------------------------------------------------------------------
		$i = 0;
	
		$textfile = "$userfile";
		$fp = fopen ($textfile, "r");

			while (!feof($fp)):
	
  			$buffer = fgets($fp, 4096);
  			$buffer = trim($buffer);
  			$email_new = ""; 
  			$email_new = $buffer;
  			
//-------------------------------------------------------------------------------------------------
//CHECK IF THE MAIL IS ALLREADY IN THE DATABASE
//------------------------------------------------------------------------------------------------- 	

		$result = mysql_query ("SELECT email FROM $dbTable WHERE email = '$email_new'");
    		($row = mysql_fetch_row ($result));  
		
		$email = $row[0];	

	if ($email == "") {
		
  			/* creating a unique id (UID)*/
			$UID = crypt($email_new);
			$UID = rawurlencode($UID);
			$UID = str_replace(".","",$UID);
			$UID = str_replace("/","",$UID);
			$UID = str_replace("%","",$UID);			
			
			$fname = "from";
			$name = "textfile";
			$address = "x";
			$zip = "x";
			$city = "x";
			
			$send = 1;	
  	
  		$sql = "INSERT INTO $dbTable (fname,name,address,zip,city,email,uid,send) VALUES ('$fname','$name','$address','$zip','$city','".addslashes($email_new)."','$UID','$send')";
    			$result = mysql_query($sql);
	
		$i++;
	}
		endwhile;	
		fclose ($fp);	
		//unlink ("$userfile");
		
//-------------------------------------------------------------------------------------------------	

		echo "<br><br><span class=\"tx\">$i adresses inserted!</span>";
	
	} else {
//-------------------------------------------------------------------------------------------------	

?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>
          <form enctype="multipart/form-data" action="<?php echo $PHP_SELF ?>" method="post">
	Upload this file: <input name="userfile" type="file">
	<br><br>
	<input type="submit" name="submit" value="submit">
	</form>        
          
          
          </td>
        </tr>
        
      </table>



<?php
}
?>

</body>
</html>