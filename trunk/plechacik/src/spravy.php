<?php

$file = "http://szm.sk/moduly/SPMRDO";
if (@!($fp = fopen ($file, "r"))){
	echo "<div align=\"center\" class=\"oznamNazov\"><br><br><br><br>Spravodajstvo momentálne nie je prístupne.<br><br><br><br></div>";
}else{
	//--------------- domov/zaciatok --------------------
	echo "<span class=\"small\"><br><br></span>";
	$file = "http://szm.sk/moduly/SPMRDO";
	if (@!($fp = fopen ($file, "r"))){
		exit;
	}
	while ($data = fread ($fp, 4096)){
		$domov .= $data;
	}
	fclose ($fp);
	echo $domov;
	//-------------- domov/end ------------------
	
	//--------------- politika/zaciatok --------------------
	echo "<span class=\"small\"><br><br></span>";
	$file = "http://szm.sk/moduly/SPMRPO";
	if (@!($fp = fopen ($file, "r"))){
		exit;
	}
	while ($data = fread ($fp, 4096)){
		$politika .= $data;
	}
	fclose ($fp);
	echo $politika;
	//-------------- politika/end ------------------
	
	//--------------- skolstvo/zaciatok --------------------
	echo "<span class=\"small\"><br><br></span>";
	$file = "http://szm.sk/moduly/SPMRVZ";
	if (@!($fp = fopen ($file, "r"))){
		exit;
	}
	while ($data = fread ($fp, 4096)){
		$skolstvo .= $data;
	}
	fclose ($fp);
	echo $skolstvo;
	//-------------- skolstvo/end ------------------
	
	//--------------- zahranicie/zaciatok --------------------
	echo "<span class=\"small\"><br><br></span>";
	$file = "http://szm.sk/moduly/SPMRZA";
	if (@!($fp = fopen ($file, "r"))){
		exit;
	}
	while ($data = fread ($fp, 4096)){
		$zahranicie .= $data;
	}
	fclose ($fp);
	echo $zahranicie;
	//-------------- zahranicie/end ------------------
	
	//--------------- sport/zaciatok --------------------
	echo "<span class=\"small\"><br><br></span>";
	$file = "http://szm.sk/moduly/SPPRSP";
	if (@!($fp = fopen ($file, "r"))){
		exit;
	}
	while ($data = fread ($fp, 4096)){
		$sport .= $data;
	}
	fclose ($fp);
	echo $sport;
	//-------------- sport/end ------------------
	
	//--------------- pocitace/zaciatok --------------------
	echo "<span class=\"small\"><br><br></span>";
	$file = "http://szm.sk/moduly/SPMRCO";
	if (@!($fp = fopen ($file, "r"))){
		exit;
	}
	while ($data = fread ($fp, 4096)){
		$pocitace .= $data;
	}
	fclose ($fp);
	echo $pocitace;
	//-------------- pocitace/end ------------------
	
	//--------------- cestovanie/zaciatok --------------------
	echo "<span class=\"small\"><br><br></span>";
	$file = "http://szm.sk/moduly/SPMRCE";
	if (@!($fp = fopen ($file, "r"))){
		exit;
	}
	while ($data = fread ($fp, 4096)){
		$cestovanie .= $data;
	}
	fclose ($fp);
	echo $cestovanie;
	//-------------- cestovanie/end ------------------
	
	//--------------- nabozenstvo/zaciatok --------------------
	echo "<span class=\"small\"><br><br></span>";
	$file = "http://szm.sk/moduly/SPMRNA";
	if (@!($fp = fopen ($file, "r"))){
		exit;
	}
	while ($data = fread ($fp, 4096)){
		$nabozenstvo .= $data;
	}
	fclose ($fp);
	echo $nabozenstvo;
	//-------------- nabozenstvo/end ------------------
echo "<span class=\"small\"><br><br></span>";
}

?>