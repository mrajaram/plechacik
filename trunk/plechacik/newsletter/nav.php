<?php
include "admin/config.inc.php";
?>

<html>
<head>
<title><?php echo $pagetitle ?> [reloader]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<?php
echo "<body bgcolor=\"$bgcolor\" text=\"$text\" link=\"$link\" vlink=\"$vlink\" alink=\"$alink\" leftmargin=\"$leftmargin\" topmargin=\"$topmargin\" marginwidth=\"$marginwidth\" marginheight=\"$marginheight\">";
?>
<table border="0" align="left">
  <form method="post" action="index.php" name="mail">
    <tr> 
      <td><b> </b><br>
      </td>
    </tr>


    <tr><td><a href="form.php" target="content">subscribe</a></td></tr>
    <tr><td><a href="unsubscribe.php" target="content" class=\"tx\">unsubscribe</a></td></tr>


    
    
    <tr> 
      <td>&nbsp;</td>
    </tr>
  </form>
</table>
</body>
</html>