<?php
include "config.inc.php";

if($mailer!="internal") include "../inc/smtp.inc.php";

?>

<html>
<head>
<title><?php echo $pagetitle ?> [reloader send mails]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style.css">


<?php

echo "</head>";
echo "<body bgcolor=\"$bgcolor\" text=\"$text\" link=\"$link\" vlink=\"$vlink\" alink=\"$alink\" leftmargin=\"$leftmargin\" topmargin=\"$topmargin\" marginwidth=\"$marginwidth\" marginheight=\"$marginheight\">";



	if (($submit) && ($secure == $password))
	{

		$i = -1;
	
		$message = stripslashes($message);
		$subject = stripslashes($subject);
	
	///////////////////////////////
	//open the generated textfile//
	///////////////////////////////
	
		$textfile = "../filez/$textfile";
	
		$fp = fopen ($textfile, "r");
		
	///////////////////////////////////////
	//fetching content till the last line//
	///////////////////////////////////////
	
		while (!feof($fp)):
	
	///////////////////
	//reading a line//
	//////////////////
	
  		$buffer = fgets($fp, 4096);
  		$buffer = trim($buffer);
  		$emailto = ""; 
  		$emailto = $buffer; 	
  	
  	
  	//////////////////////////////
  	//encode and create the mail//
  	//////////////////////////////
  	
//-------------------------------------------------------------------------------------------------
//CHOOSE IN THE ADMIN TOOL HOW THE MAILS SHOULD BE SENT /MAIL() OR OVER SMTP/ SMTP IS SET AS DEFAULT
//------------------------------------------------------------------------------------------------- 	

		if($emailto):
		
		if($mailer=="internal") { mail("$emailto", "$subject", "$message\n\n$unsubscribe",
			"From: $sender\nReply-To: $replayer\nX-Mailer: PHP/" . phpversion()); }
		else if($mailer=="smtp") { sendSmtp($smtpHost,$sender,$emailto,false,false,$subject,"$message\n\n$unsubscribe"); }
		else { sendSmtp($smtpHost,$sender,$emailto,false,false,$subject,"$message\n\n$unsubscribe"); }
		
		endif;
		$i++;
	
		endwhile;

	//////////////////
	//close the file//
	//////////////////
	
		fclose ($fp);
	
		unlink ("$textfile");
		
	
	
	
	//////////////////////////
	//confirm the sent mails//
	//////////////////////////
		echo "<br><br><span class=\"tx\">$i mails sent!\n\n<a href=\"index.php\" target=\"_top\">go back</a></span>";
	
	} else {


?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td class="titel">write the newsletter:</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <form method="post" action="<?php echo $PHP_SELF ?>" enctype="multipart/form-data" >
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Password</td>
        </tr>
        <tr> 
          <td>
          <input type="text" name="secure" size="20" maxlength="100">
          </td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td class="titel">mail subject:</td>
        </tr>
        <tr> 
          <td> 
            <input type="text" name="subject" size="60" maxlength="200">
          </td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td class="titel">mail content:</td>
        </tr>
        <tr> 
          <td> 
            <textarea name="message" wrap="VIRTUAL" cols="60" rows="20"></textarea>
          </td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <td> 
          <table width="50%" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td align="left"> 
                <input type="reset" name="Reset" value="Reset">
              </td>
              <td align="right"> 
                <input type="submit" name="submit" value="submit">
                <input type="hidden" name="textfile" value="<?php echo $textfile ?>">
              </td>
            </tr>
          </table>
        </td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</form>

<?php
}
?>

</body>
</html>