<?php
include "config.inc.php";
?>

<html>
<head>
<title><?php echo $pagetitle ?> [reloader]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style.css" type="text/css">

<?php

echo "</head>";
echo "<body bgcolor=\"$bgcolor\" text=\"$text\" link=\"$link\" vlink=\"$vlink\" alink=\"$alink\" leftmargin=\"$leftmargin\" topmargin=\"$topmargin\" marginwidth=\"$marginwidth\" marginheight=\"$marginheight\">";

?>

<form name="form1" method="get" action="<?php echo $PHP_SELF ?>">
  <table border="1" cellspacing="2" cellpadding="2" bordercolor="#000000">
    <tr> 
      <td class="titel"><b>nr</b></td>
    <td width="155" class="titel"><b>first name</b></td>
    <td width="155" class="titel"><b>name</b></td>
    <td width="210" class="titel"><b>email</b></td>
      <td class="titel"><b>delete</b></td>
  </tr>
   
 <?php

///////////////////////////////
//delete the selected entries//
///////////////////////////////
 
 if ($submit) {
	
		$i = 0;		
		$anz_array = count($delbox); //all arrays
	
			while ($i < $anz_array) {
	
				$delete = mysql_db_query ("$dbname","delete from $dbTable where id=$delbox[$i]");
				$result = mysql_query($delete);
				
	
				$i++;
				
	
			}
	
	}
 
 
 
 
////////////////////////////// 
//select all correct entries//
//////////////////////////////
 
 		$j = 1; 		
 		 		
 		$result = mysql_db_query ("$dbname","select * from $dbTable WHERE email LIKE '%@%' AND email LIKE '%.%' AND send='1' ORDER BY ID");
		while ($row = mysql_fetch_array ($result)) 
		{
		
				
 		
 			$email_orig =$row["email"];
   			$name =$row["name"];
    		$fname =$row[fname];
   			$UID =$row[UID];
   			$id_orig =$row[id];
   			
   			  	
  				echo"<tr>\n";
    				echo"<td class=\"tx\">$j</td>\n";
    				echo"<td class=\"tx\" width=\"155\">$fname</td>\n";
    				echo"<td class=\"tx\" width=\"155\">$name</td>\n";
    				echo"<td class=\"tx\" width=\"210\"><a href=\"mailto:$email_orig\">$email_orig</a></td>\n";
    				echo"<td class=\"tx\"><input type=\"checkbox\" name=\"delbox[]\" value=\"$id_orig\"></td>\n";
  				echo"</tr>\n";
  				
  			$j++;
  				

 		}
 		
 		
 		
 
 
 
 
 ?> 
  
 
  <tr> 
      <td>&nbsp;</td>
    <td width="155">&nbsp;</td>
    <td width="155">&nbsp;</td>
    <td width="210">&nbsp;</td>
      <td>&nbsp;</td>
  </tr>
  
  
<?php

////////////////////////////////
//select all incorrect entries//
////////////////////////////////

		$c = 1;
 	
 		$result2 = mysql_db_query ("$dbname","select * from $dbTable WHERE email NOT LIKE '%@%' OR email NOT LIKE '%.%' ORDER BY email");
		while ($row = mysql_fetch_array ($result2)) 
		{
		
				
 		
 			$email_orig =$row["email"];
   			$name =$row["name"];
    		$fname =$row[fname];
   			$UID =$row[uid];
   			$id_orig =$row[id];
   			
   			
   				echo"<tr>\n"; 
    			 	echo"<td>&nbsp;</td>\n";
    				echo"<td width=\"155\">&nbsp;</td>\n";
    			 	echo"<td width=\"155\">&nbsp;</td>\n";
   			 	echo"<td width=\"210\" class=\"titel\">you can delete theme:</td>\n";
    			 	echo"<td>&nbsp;</td>\n";
  				echo"</tr>\n";
   			
   			  	
  				echo"<tr>\n";
    				echo"<td class=\"tx\">$c</td>\n";
    				echo"<td class=\"tx\" width=\"155\">$fname</td>\n";
    				echo"<td class=\"tx\" width=\"155\">$name</td>\n";
    				echo"<td class=\"tx\" width=\"210\">$email_orig</td>\n";
    				echo"<td class=\"tx\"><input type=\"checkbox\" name=\"delbox[]\" value=\"$id_orig\"></td>\n";
  				echo"</tr>\n";
  				
  			$c++;
  				

 		}



?>

  <tr> 
      <td>&nbsp;</td>
    <td width="155">&nbsp;</td>
    <td width="155">&nbsp;</td>
    <td width="210">&nbsp;</td>
      <td>
<input type="submit" name="submit" value="submit"></td>
  </tr>

  </table>
  </form>
</body>
</html>