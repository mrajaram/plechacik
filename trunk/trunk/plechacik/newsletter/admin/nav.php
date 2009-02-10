<?php
include "config.inc.php";
?>

<html>
<head>
<title><?php echo $pagetitle ?> [reloader start]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style.css">

</head>
<?
echo "<body bgcolor=\"$bgcolor\" text=\"$text\" link=\"$link\" vlink=\"$vlink\" alink=\"$alink\" leftmargin=\"2\" topmargin=\"$topmargin\" marginwidth=\"$marginwidth\" marginheight=\"$marginheight\">";
?>
<table border="0" cellspacing="0" cellpadding="3">
  <tr> 
    <td><a href="create.php" target="content">send the mails</a></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td><a href="all_entries.php" target="content">show entries</a></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td><a href="input_textfile.php" target="content">import emails</a></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
</table>


</body>
</html>