<?php include "incl/hdr.inc";$ins=true;?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><?php print $crl[1];?>
<link rel="stylesheet" type="text/css" href="incl/nstl.css"><script type="text/javascript" src="incl/mdf.js"></script>
<?php include "incl/sty.inc";?></head><body onLoad="fc()" bgcolor="#FEFFE1">
<form action="main.php" target="a" method="post" onSubmit="tu()"><table align="center" border="0" width="450">
<tr><td colspan="3"><input type="text" name="entry" size="65" maxlength="180" class="ia"></td>
<td align="right"><input type="submit" value="<?php print "$crl[4]";?>" class="ib"></td>
</tr><tr><td colspan="4" nowrap> </td></tr><tr><td valign="top" nowrap><b>
<a href="main.php" onClick="rd('main');return false" target="a" title="<?php print $crl[26];?>"><?php print $crl[25];?></a> | 
<a href="history.php" onClick="rd('history');return false" target="a" title="<?php print $crl[28];?>"><?php print $crl[27];?></a> | 
<a href="index.php" target="_parent" title="<?php print $crl[30];?>"><?php print $crl[29];?></a>
</b></td><td nowrap>
<a href="#" onClick="sp('[m1]');return false"><img src="pics/m1.gif" width="15" height="15" alt="<?php print "$crl[8]";?>" border="0"></a>
<a href="#" onClick="sp('[m2]');return false"><img src="pics/m2.gif" width="15" height="15" alt="<?php print "$crl[9]";?>" border="0"></a>
<a href="#" onClick="sp('[m3]');return false"><img src="pics/m3.gif" width="15" height="15" alt="<?php print "$crl[10]";?>" border="0"></a>
<a href="#" onClick="sp('[m4]');return false"><img src="pics/m4.gif" width="15" height="15" alt="<?php print "$crl[11]";?>" border="0"></a>
<a href="#" onClick="sp('[m5]');return false"><img src="pics/m5.gif" width="15" height="15" alt="<?php print "$crl[12]";?>" border="0"></a>
<a href="#" onClick="sp('[m6]');return false"><img src="pics/m6.gif" width="15" height="15" alt="<?php print "$crl[13]";?>" border="0"></a>
</td><td valign="top" nowrap><b><a href="#" onClick="sp('[b][/b]');return false" title="<?php print "$crl[14]";?>">B</a></b> <b><a href="#" onClick="sp('[i][/i]');return false" title="<?php print "$crl[15]";?>">I</a></b> <b><a href="#" onClick="sp('[c][/c]');return false" title="<?php print "$crl[16]";?>">C</a></b>
</td><td align="right" valign="middle" nowrap>
<a href="#" title="<?php print "$crl[34]";?>5 sec" onClick="fg(5000);document.a.src='pics/on.gif';return false"><img name="a" src="pics/of.gif" width="10" height="9" border="0" alt="<?php print "$crl[34]";?>5 sec" hspace="1"></a><a href="#" title="<?php print "$crl[34]";?>10 sec" onClick="fg(10000);document.b.src='pics/on.gif';return false"><img name="b" src="pics/of.gif" width="10" height="9" border="0" alt="<?php print "$crl[34]";?>10 sec" hspace="0"></a><a href="#" title="<?php print "$crl[34]";?>20 sec" onClick="fg(20000);document.c.src='pics/on.gif';return false"><img name="c" src="pics/on.gif" width="10" height="9" border="0" alt="<?php print "$crl[34]";?>20 sec" hspace="1"></a><a href="#" title="<?php print "$crl[34]";?>30 sec" onClick="fg(30000);document.d.src='pics/on.gif';return false"><img name="d" src="pics/of.gif" width="10" height="9" border="0" alt="<?php print "$crl[34]";?>30 sec" hspace="0"></a><a href="#" title="<?php print "$crl[34]";?>60 sec" onClick="fg(60000);document.e.src='pics/on.gif';return false"><img name="e" src="pics/of.gif" width="10" height="9" border="0" alt="<?php print "$crl[34]";?>60 sec" hspace="1"></a>
</td></tr></table></form></body></html>