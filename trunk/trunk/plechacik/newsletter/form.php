<?php
include "admin/config.inc.php";
?>

<html>
<head>
<title> 
<?php echo $pagetitle ?>
[reloader]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style.css" type="text/css">
<script language="JavaScript">
	
function placeFocus() 
	{
	document.subform.fname.focus();
   	}
   	

   	
function checkFields() {	
	
	if (document.subform.fname.value == "") 
	{
	
	alert("fields with * are required.");	
	return false;
	
	} else if (document.subform.name.value == "") 
	{
	
	alert("fields with * are required.");	
	return false;
	
	} else if (document.subform.email.value == "") 
	{
	
	alert("fields with * are required.");	
	return false;
	
	}
	else return true;
}

</script>
<?php

echo "</head>";
echo "<body bgcolor=\"$bgcolor\" text=\"$text\" link=\"$link\" vlink=\"$vlink\" alink=\"$alink\" leftmargin=\"$leftmargin\" topmargin=\"$topmargin\" marginwidth=\"$marginwidth\" marginheight=\"$marginheight\">";


	if ($submit) {

		if ($name && $email && $fname) {
		
		$email = strtolower($email);
		
		//check if data is avilable		
		$query = "SELECT * FROM $dbTable where email='$email' and send='1'"; 
		$query_result_handle = mysql_query ($query) 
		or die ('warning may not the right db_Table');
	
		if ($num_of_rows = mysql_num_rows ($query_result_handle)) {
		$infomessage = "you're allready subscribed";
	
	
	} else {

	/* creating a unique id (UID)*/

			$UID = crypt(time().$email);
			$UID = rawurlencode($UID);
			$UID = str_replace(".","",$UID);
			$UID = str_replace("/","",$UID);
			$UID = str_replace("%","",$UID);


			$sql = "INSERT INTO $dbTable (fname,name,address,zip,city,email,uid) VALUES ('".addslashes($fname)."','".addslashes($name)."','".addslashes($address)."','".addslashes($zip)."','".addslashes($city)."','".addslashes($email)."','$UID')";
    			$result = mysql_query($sql);


	$infomessage = "Thank you $fname for subscribing.";



	
	}
	
}
}

 


?>
<br>
<br>
<br>
<table border="0" cellpadding="0" cellspacing="0" vspace="0" hspace="0" bgcolor="#<?php echo $content_table ?>" width="300" align="center">
  <tr align="left"> 
    <td colspan="3" bgcolor="#000000" height="3"><img src="img/pixel.gif" width="1" height="1"></td>
  </tr>
  <tr> 
    <td align="left" bgcolor="#000000" width="3"><img src="img/pixel.gif" width="3" height="1"></td>
    <td align="left" valign="middle" bgcolor="#<?php echo $content_table ?>"> 
      <table border="0" cellspacing="6" cellpadding="0">
        <tr align="left" valign="middle"> 
          <td> 
            <table border="0" align="left" cellpadding="0" cellspacing="0">
              <form method="post" action="form.php" name="subform" onSubmit="return checkFields();">
                <tr> 
                  <td><b> 
                    <?php echo $infomessage ?>
                    </b></td>
                </tr>
                <tr> 
                  <td class="titelrot"><span class="titelrot">S U B S C R I B 
                    E </span></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                </tr>
                <tr> 
                  <td>*first name</td>
                </tr>
                <tr> 
                  <td> 
                    <input type="text" name="fname" size="30" maxlength="100">
                  </td>
                </tr>
                <tr> 
                  <td>*name</td>
                </tr>
                <tr> 
                  <td> 
                    <input type="text" name="name" size="30" maxlength="100">
                  </td>
                </tr>
                <tr> 
                  <td>&nbsp;address</td>
                </tr>
                <tr> 
                  <td> 
                    <input type="text" name="address" size="30" maxlength="100">
                  </td>
                </tr>
                <tr> 
                  <td>&nbsp;zip</td>
                </tr>
                <tr> 
                  <td> 
                    <input type="text" name="zip" size="10" maxlength="100">
                  </td>
                </tr>
                <tr> 
                  <td>&nbsp;city</td>
                </tr>
                <tr> 
                  <td> 
                    <input type="text" name="city" size="30" maxlength="100">
                  </td>
                </tr>
                <tr> 
                  <td>*email</td>
                </tr>
                <tr> 
                  <td> 
                    <input type="text" name="email" size="30" maxlength="100">
                  </td>
                </tr>
                <tr align="right"> 
                  <td> 
                    <input type="submit" value="&gt;&gt;send&lt;&lt;" name="submit">
                  </td>
                </tr>
                <tr> 
                  <td><br>
                  </td>
                </tr>
              </form>
            </table>
          </td>
        </tr>
      </table>
    </td>
    <td align="right" width="3" bgcolor="#000000"><img src="img/pixel.gif" width="3" height="1"></td>
  </tr>
  <tr> 
    <td colspan="3" align="left" bgcolor="#000000" height="3"><img src="img/pixel.gif" width="1" height="3"></td>
  </tr>
</table>
</body>
</html>