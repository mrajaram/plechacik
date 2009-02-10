<br>
<?
if ($category){
	switch ($category){
		case 1: 
			$adr = "skola"; $pocetPhotos = 31; $ignorePhotos = array("9999"); $vertikalne = array("10", "19"); break;
		
		case 2:
			$adr = "dedina"; $pocetPhotos = 16; $ignorePhotos = array("9999"); $vertikalne = array("2");	break;
		
		case 3: 
			$adr = "divadlo"; $pocetPhotos = 12; $ignorePhotos = array("9999"); $vertikalne = array("5"); break;
		
		case 4:
			$adr = "kostol"; $pocetPhotos = 27; $ignorePhotos = array("8"); $vertikalne = array("3", "5", "6", "7", "13", "19", "22", "27");	break;

		case 5: 
			$adr = "sport"; $pocetPhotos = 41; $ignorePhotos = array("9999"); $vertikalne = array("18", "23", "24", "38"); break;
		
		case 6:
			$adr = "bez_komentara"; $pocetPhotos = 11; $ignorePhotos = array("9999"); $vertikalne = array("1", "2", "5",10,11);	break;
		
		case 7:
			$adr = "rozne"; $pocetPhotos = 64; $ignorePhotos = array("9999"); $vertikalne = array("2", "3", "6", "13", "17", "19", "22", "29", "40", "41");	break;
	}
?>

<script language="JavaScript">
function show(pic, width, height,pocet,ignorePhotos)
{
window.open("./imgs/foto/foto.php?pocet=<? echo $pocetPhotos; ?>&adr=<? echo $adr; ?>&obr="+pic,"","toolbar=no,status=no,width=" + 640 + ",height=" + 680);
}
</script>
<!-- 
<script language="JavaScript">
function show(pic, width, height)
{
window.open("./imgs/foto/<? echo $adr; ?>/foto.php?obr="+pic,"","toolbar=no,status=no,width=" + width + ",height=" + height);
}
</script>
 -->
<?php

//-------------------------- nastavenia pre fotogaleriu --------------------------
if (empty($begin)) $begin = 0;

$pocetPerStrana = 20;													 // pocet fotografii na jednu stranu
$pocetFull = $pocetPhotos;

$pocetStran = ceil($pocetFull/$pocetPerStrana);
$pom = ($begin/$pocetPerStrana)+1;
$pomocneCiselko = ($pocetStran-1)*$pocetPerStrana;

if (empty($end) && ($pocetStran == 1)) $end = $pocetFull;
else if(empty($end)) $end = $pocetPerStrana;
//--------------------------------------------------------------------------------


//---------------------------------- lister - zaciatok ---------------------------
if ($pocetFull > $pocetPerStrana){

echo "
			<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\">
				<tr>
					<td align=\"center\">";
	if ($begin != 0){
		echo "<a href=\"?menu=9&begin=0&category=" . $category . "&end=" . $pocetPerStrana . "\" title=\"Na zaciatok\"><img src=\"./imgs/arrowz_l.gif\" border=\"0\"></a>&nbsp;
					<a href=\"?menu=9&begin=" . ($begin-$pocetPerStrana) . "&category=" . $category . "&end=" . $begin . "\" title=\"Predošlých " . $pocetPerStrana . " fotografií\"><img src=\"./imgs/arrows_l.gif\" border=\"0\"></a>";					
	}
				echo "<span class=\"cisla\">&nbsp;";
					for ($i=1; $i<=$pocetStran; $i++){
						$xx = $i-1;
						if ($pom == $i){
							echo "<font color=\"#FF9933\">&nbsp;$i&nbsp;</font>";
						}else{
							echo "&nbsp;<a href=\"?menu=9&begin=" . ($xx*$pocetPerStrana) . "&end=" . ($pocetPerStrana*$i) . "&category=" . $category . "\" class=\"cisla\">" . $i . "</a>&nbsp;";
						}
					}
				echo "&nbsp;</span>";

	if ($begin != $pomocneCiselko){
		echo "<a href=\"?menu=9&category=" . $category . "&begin=" . ($begin+$pocetPerStrana) . "&end=" . ($end+$pocetPerStrana) ."\" title=\"Ïalších " . $pocetPerStrana . " fotografií\"><img src=\"./imgs/arrows_r.gif\" border=\"0\"></a>&nbsp;
					<a href=\"?menu=9&category=" . $category . "&begin=" . $pomocneCiselko . "&end=" . $pocetFull . "\" title=\"Na koniec\"><img src=\"./imgs/arrowz_r.gif\" border=\"0\"></a>";
	}
echo "		</td>
				</tr>
			</table>";
}
//---------------------------------- lister - koniec -------------------------------
echo "<br>";

echo "<div class=\"galeria\">\n";
for ($i=$begin+1; $i<=$end; $i++){
	if ($i <= $pocetPhotos && !in_array($i, $ignorePhotos)){
		if (!in_array($i, $vertikalne)){
		echo "\n\t<div class=\"obrazok\">
						<div><a href=\"JavaScript:show('" . $i . "',640,480)\"><img src=\"./imgs/foto/" . $adr . "/obr" . $i . "_m.jpg\" width=\"120\" height=\"90\" border=\"0\"></a></div>	
					\n</div>";
		}else{
		echo "\n\t<div class=\"obrazok\">
						<div><a href=\"JavaScript:show('" . $i . "',480,640)\"><img src=\"./imgs/foto/" . $adr . "/obr" . $i . "_m.jpg\" width=\"90\" height=\"120\" border=\"0\"></a></div>	
					\n</div>";
		}
	}
}#for
echo "</div>";

echo "<br>";

//---------------------------------- lister - zaciatok ---------------------------
if ($pocetFull > $pocetPerStrana){

echo "
			<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\">
				<tr>
					<td align=\"center\">";
	if ($begin != 0){
		echo "<a href=\"?menu=9&begin=0&category=" . $category . "&end=" . $pocetPerStrana . "\" title=\"Na zaciatok\"><img src=\"./imgs/arrowz_l.gif\" border=\"0\"></a>&nbsp;
					<a href=\"?menu=9&begin=" . ($begin-$pocetPerStrana) . "&category=" . $category . "&end=" . $begin . "\" title=\"Predošlých " . $pocetPerStrana . " fotografií\"><img src=\"./imgs/arrows_l.gif\" border=\"0\"></a>";					
	}
				echo "<span class=\"cisla\">&nbsp;";
					for ($i=1; $i<=$pocetStran; $i++){
						$xx = $i-1;
						if ($pom == $i){
							echo "<font color=\"#FF9933\">&nbsp;$i&nbsp;</font>";
						}else{
							echo "&nbsp;<a href=\"?menu=9&begin=" . ($xx*$pocetPerStrana) . "&end=" . ($pocetPerStrana*$i) . "&category=" . $category . "\" class=\"cisla\">" . $i . "</a>&nbsp;";
						}
					}
				echo "&nbsp;</span>";

	if ($begin != $pomocneCiselko){
		echo "<a href=\"?menu=9&category=" . $category . "&begin=" . ($begin+$pocetPerStrana) . "&end=" . ($end+$pocetPerStrana) ."\" title=\"Ïalších " . $pocetPerStrana . " fotografií\"><img src=\"./imgs/arrows_r.gif\" border=\"0\"></a>&nbsp;
					<a href=\"?menu=9&category=" . $category . "&begin=" . $pomocneCiselko . "&end=" . $pocetFull . "\" title=\"Na koniec\"><img src=\"./imgs/arrowz_r.gif\" border=\"0\"></a>";
	}
echo "		</td>
				</tr>
			</table>";
}
//---------------------------------- lister - koniec -------------------------------
echo "<br>";

}else{
?>

<table cellpadding="10" cellspacing="0" border="0" width="80%">
	<tr>
		<td align="center"><a href="?menu=9&category=1" class="oznamNazov" style="font-size:11px;"><img src="./imgs/foto/skola/skola_main.jpg" border="0"><br>Školská kronika</a></td>
		<td align="center"><a href="?menu=9&category=2" class="oznamNazov" style="font-size:11px;"><img src="./imgs/foto/dedina/dedina_main.jpg" border="0"><br>Život na dedine</a></td>
		<td align="center"><a href="?menu=9&category=3" class="oznamNazov" style="font-size:11px;"><img src="./imgs/foto/divadlo/divadlo_main.jpg" border="0"><br>Divadlo</td>
	</tr>
	<tr>
		<td align="center"><a href="?menu=9&category=4" class="oznamNazov" style="font-size:11px;"><img src="./imgs/foto/kostol/kostol_main.jpg" border="0"><br>Kostol</a></td>
		<td align="center"><a href="?menu=9&category=5" class="oznamNazov" style="font-size:11px;"><img src="./imgs/foto/sport/sport_main.jpg" border="0"><br>Šport</a></td>
		<td align="center"><a href="?menu=9&category=6" class="oznamNazov" style="font-size:11px;"><img src="./imgs/foto/bez_komentara/zima_main.jpg" border="0"><br>Bez komentára</td>
	</tr>
	<tr>
		<td align="center"><a href="?menu=9&category=7" class="oznamNazov" style="font-size:11px;"><img src="./imgs/foto/rozne/rozne_main.jpg" border="0"><br>Rôzne</a></td>
		<td align="center">&nbsp;</td>
		<td align="center">&nbsp;</td>
	</tr>
</table>
<br>
<?
}
?>

