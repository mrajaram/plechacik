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
	document.login.email.focus();
   	}
   	

   	
function checkFields() {	
	
	if (document.login.email.value == "") 
	{
	
	alert("fields with * are required.");	
	return false;
	
	}
	else return true;
}

</script>
<?php

if ($submit) {

			//update db
			$sql = "UPDATE $dbTable SET send='0' WHERE email='$email'";
        		$result = mysql_query($sql);
        		//echo $sql;
        		
        		$infomessage = "you're unsubscribed from the mailinglist";
 }

 ?>
</head>
<?php
echo "<body bgcolor=\"$bgcolor\" text=\"$text\" link=\"$link\" vlink=\"$vlink\" alink=\"$alink\" leftmargin=\"$leftmargin\" topmargin=\"$topmargin\" marginwidth=\"$marginwidth\" marginheight=\"$marginheight\">";
?>
<?php echo "$message\n"; ?>
<br>
<br>
<br>
<form name="login" action="unsubscribe.php" method="get" onSubmit="return checkFields();">
  <table border="0" cellpadding="0" cellspacing="0" vspace="0" hspace="0" bgcolor="#<?php echo $content_table ?>" width="300" align="center">
    <tr align="left"> 
      <td colspan="3" bgcolor="#000000" height="3"><img src="img/pixel.gif" width="1" height="3"></td>
    </tr>
    <tr> 
      <td align="left" bgcolor="#000000" width="3"><img src="img/pixel.gif" width="3" height="1"></td>
      <td align="left" valign="middle" bgcolor="#<?php echo $content_table ?>"> 
        <table border="0" cellspacing="6" cellpadding="0">
          <tr align="left" valign="middle"> 
            <td> 
              <table border="0" cellspacing="0" cellpadding="0">
              <tr> 
                  <td><b><?php echo $infomessage ?></b></td>
                </tr>
                <tr> 
                  <td class="titelrot">U N S U B S C R I B E</td>
                </tr>
                <tr> 
                  <td><img src="img/pixel.gif" width="1" height="1"></td>
                </tr>
                <tr> 
                  <td> Please enter your email address to unsubscribe from the 
                    newsletter list. </td>
                </tr>
                <tr> 
                  <td><img src="img/pixel.gif" width="1" height="1"></td>
                </tr>
                <tr > 
                  <td align="left" valign="top"> 
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr bgcolor="#<?php echo $content_table ?>"> 
                        <td height="25">*email&nbsp;</td>
                        <td> 
                          <input type="text" name="email" size="25" maxlength="100">
                        </td>
                      </tr>
                      <tr> 
                        <td colspan="2">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr align="right"> 
                  <td> 
                    <input type="submit" name="submit" value="submit">
                  </td>
                </tr>
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
</form>
</body>
</html>