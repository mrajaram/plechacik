<table cellpadding="0" cellspacing="0" border="0" align="center" width="70%">
	<tr>
		<td width="78" width="26"><img src="./imgs/img_fara_left.jpg"></td>
		<td width="*" background="./imgs/img_fara_middle.gif" align="center">&nbsp;&nbsp;<? echo colorArrowFara(1); ?>&nbsp;<a href="?menu=<?echo $menu;?>&submenu=1" class="faraMenu">Hist�ria</a>&nbsp;&nbsp;&nbsp;<? echo colorArrowFara(2); ?>&nbsp;<a href="?menu=<?echo $menu;?>&submenu=2" class="faraMenu">K�azi</a>&nbsp;&nbsp;&nbsp;<? echo colorArrowFara(3); ?>&nbsp;<a href="?menu=<?echo $menu;?>&submenu=3" class="faraMenu">Poriadok</a>&nbsp;&nbsp;</td>
		<td width="78" width="26"><img src="./imgs/img_fara_right.jpg"></td>
	</tr>
</table>
<br>

<?
if (empty($submenu)){
//--------------- nabozenska myslienka --------------------
	$stmt = "select * from myslienka";
	if (@!($result = mysql_query($stmt, $link))){
		echo "ta more chyba";	exit;
	}
	$row = mysql_fetch_object($result);
	
/*
	echo "<span class=\"small\"><br><br></span>";
	$file = "http://szm.sk/moduly/VYRCNO";
	if (@!($fp = fopen ($file, "r"))){
		$citat = "";
		$myslienka = "<br><div class=\"textmain\" style=\"text-align:center;font-size:11px;line-height:13px;\"><i>Nepodarilo sa nadviazat spojenie so serverom.</i></div><br>";
	}else{
		while ($data = fread ($fp, 4096)){
			$all .= $data;
		}
		
		$pos1 = strpos($all, "<BODY BGCOLOR=\"#FFFFFF\">") + 24;
		$pos2 = strpos($all, "<!--");
		$pos3 = strpos($all, "<br><BR>");
		$koniec1 = $pos2 - $pos3;
		$koniec2 = $pos3 - $pos1;
		
		$citat = substr($all, $pos1, $koniec2);
		$myslienka = substr($all, $pos3, $koniec1);
		fclose ($fp);
	}
	*/
	//-------------- myslienka/end ------------------
?>
<table cellpadding="0" cellspacing="0" border="0" width="97%" align="center">
	<tr>
		<td class="textmain" bgcolor="#F4F8FD" colspan="2">
			<span class="oznamNazov">My�lienka na t��de�</span><br>
			<br>
			<? echo "<b>" . $row->text . "</b>"; ?>
			<span class="small"><br></span>
			<div align="right" class="textmain" style="text-align:right"><i><? echo $row->autor; ?></i></div>
		</td>	
	</tr>
	<tr>
		<td class="textmain" valign="top"><br><br>
			<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
				<tr>
					<td class="nazov" width="23"><img src="./imgs/icon_adresa.gif" border="0"></td>
					<td class="nazov" width="*">Adresa</td>
				</tr>
			</table>
			<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
				<tr>
					<td class="textmain"><b>Farsk� �rad Plechotice</b><br>Hlavn� 145<br>Plechotice<br>075 01</td>
				</tr>
			</table><br>
			<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
				<tr>
					<td class="nazov" width="23"><img src="./imgs/icon_telfax.gif" border="0"></td>
					<td class="nazov" width="*">Telef�n</td>
				</tr>
			</table>
			<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
				<tr>
					<td class="textmain"><b>tel.: </b>&nbsp;056/6799223</td>
				</tr>
			</table><br>
			<b>far�r:</b>&nbsp;<b><i>JCLic. Juraj Petr�k</i></b>
		</td>	
		<td valign="middle" align="center"><br><br><img src="./imgs/dekanat.gif" align="middle"></td>
	</tr>
	<tr>
		<td colspan="2"><br><br>
			<table cellpadding="5" cellspacing="0" border="2" align="center" width="400" bgcolor="#DFEBF9" bordercolor="#ffffff" class="textmain" style="font-size:11px;">
				<tr bgcolor="#6285DF" style="color:white;">
					<td style="text-align:center;" width="100">&nbsp;</td>
					<td align="center" style="text-align:center;" width="150"><b><i>kostol - kaplnka</i></b></td>
					<td align="center" style="text-align:center;" width="50"><b><i>z roku</i></b></td>
					<td align="center" style="text-align:center;" width="50"><b><i>spolu</i></b></td>
					<td align="center" style="text-align:center;" width="50"><b><i>r.kat.</i></b></td>
				</tr>
				<tr>
					<td align="center" bgcolor="#A4B8EC"><b>Plechotice</b></td>
					<td align="center">Najsv�tej�ej Trojice</td>
					<td align="center">1333</td>
					<td align="center">790</td>
					<td align="center">611</td>
				</tr>
				<tr>
					<td align="center" bgcolor="#A4B8EC"><b>�e�ovce</b></td>
					<td align="center">sv. Anny</td>
					<td align="center">1802</td>
					<td align="center">538</td>
					<td align="center">270</td>
				</tr>
				<tr>
					<td align="center" bgcolor="#A4B8EC"><b>Egre�</b></td>
					<td align="center">Nanebovst�penia P�na</td>
					<td align="center">1968</td>
					<td align="center">423</td>
					<td align="center">236</td>
				</tr>
				<tr>
					<td align="center" bgcolor="#A4B8EC"><b>Nov� Ruskov</b></td>
					<td align="center">Panna M�ria Kr�ovn�</td>
					<td align="center">1998</td>
					<td align="center">643</td>
					<td align="center">171</td>
				</tr>
				<tr>
					<td align="center" bgcolor="#A4B8EC" colspan="2">&nbsp;</td>
					<td align="center" bgcolor="#A4B8EC"><b><i>spolu</i></b></td>
					<td align="center" bgcolor="#A4B8EC"><b><i>2331</i></b></td>
					<td align="center" bgcolor="#A4B8EC"><b><i>1231</i></b></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?
} else {	

	switch ($submenu){
		//-------------------------------------- historia ---------------------------------------
		case 1:
?>
<div align="center" class="textmain" style="text-align:center;"><b>Farnos� Plechotice</b></div>
<div class="textmain">
&nbsp;&nbsp;&nbsp;&nbsp;Obec Plechtice m� svoje meno od Ma�arsk�ho ��achtica "Pelejtey-ho", pravdivos� �dajov dokumentuj� �radn� listiny nach�dzaj�ce sa na R�mskokatol�ckom farskom �rade.<br>
&nbsp;&nbsp;&nbsp;&nbsp;Najstar�ie �daje  farskej matriky s� z roku 1723. V tomto obdob� tu �ilo 331 r�mskokatol�kov, 284 gr�ckokatol�kov,  32 kalv�nov, 41 �idov. Hovorilo sa po slovensky a ma�arsky. Farnos� tvorili fili�lky: �e�ovce, Egre�, Nov� Ruskov a Mal� Ruskov. V obci sa nach�dzala �kola, ktor� patrila R�mskokatol�ckej Cirkvi. Najstar�ia spr�va je z roku 1770.<br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>Farsk� kostol:</b> Uprostred dediny sa nach�dza kostol, ktor� existoval u� v roku 1333. Farsk� kostol bol zasv�ten� sv. J�novi Evanjelistovi. V obdob� reform�cie, v XVI. stor. kostol obsadili kalv�ni a a� v roku 1701 ho dostali nasp� katol�ci v �plne zni�enom stave. N�klady na jeho opravu poskytol Franti�ek Kereste� a jeho potomkovia, ako aj dobro�inn� dary obyvate�ov Zempl�nskej �upy. �pln� rekon�trukcia sa uskuto�nila a� v roku 1771. V roku 1834 bolo zemetrasenie po ktorom kostol bol �plne zni�en�. V roku 1838 urobili jeho prestavbu. V rokoch 1877 a 1894 znova robili opravy kostola. V roku 1901 postavili nov� olt�r, upravili kazate�nicu a org�n. Do roku 1760 tu p�sobili Paul�nsky otcovia, ako duchovn� pastieri. Po zru�en� rehole, kostol prevzali far�ri z egerskej �upy. S��asn� r�mskokatol�cky kostol je zasv�ten� Najsv�tej�ej Trojici a za�ali ho rekon�truova� v prvej polovici 18. storo�ia a vysv�tili ho v roku 1771.<br>
&nbsp;&nbsp;&nbsp;&nbsp;V kostole sa nach�dza obraz s n�metom "Najsv�tej�ej Trojice", ktor� daroval ko�ick� biskup, Anton Ocskay. Obraz bol re�taurovan� v roku 1984 na podnet ThDr. J�na Bub�na. Po�as jeho p�sobenia bol kostol v roku 1982 vyma�ovan�. V s��asnosti si interi�r kostola vy�aduje liturgick� �pravu pod�a smern�c II. Vatik�nsk�ho koncilu.<br>
&nbsp;&nbsp;&nbsp;&nbsp;Exteri�r kostola bol upravovan� hlavne z d�vodu prim�ci�, ktor� boli v roku 1992. Taktie� sa v tomto kostole konala diakonsk� vysviacka, v decembri 1991. Diakon�t prijal ThDr. Zdenko Andr� PhD., z r�k teraj�ieho otca arcibiskupa Alojza Tk��a. <br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>Farsk� budova:</b> Dr. Bub�n  zam���al aj v�stavbu novej farskej budovy. Jeho z�mer sa mu v�ak u� nepodarilo zrealizova�, lebo odi�iel do d�chodku. V septembri roku 1989 odi�iel do Pezinka, kde o 3 mesiace zomrel. S v�stavbou novej farskej budovy za�al jeho n�stupca Vdp. Franti�ek Mih� a pod veden�m �al�ieho far�ra Vdp. �tefana Va�a bola stavba dokon�en�. <br><br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>Fili�lka �e�ovce:</b> Kostol v �e�ovciach z roku 1802 je zasv�ten� sv. Anne. V roku 1839 poskytol v�davky na jeho opravu Juraj Ba�as, ktor� vtedy p�sobil ako far�r v Hornom Olcsvari. V roku 1899 ho vyma�ovali a v tom istom roku postavili nov� bohato zdoben� olt�r. Postupom �asu sa robili be�n� �pravy  v interi�ri a na exteri�ri kostola.<br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>Fili�lka Egre�:</b> So stavbou kostola v Egre�i sa za�alo v obdob� totality, v roku 1968, potom boli pr�ce na kostole preru�en�. Dokon�en� a posv�ten� bol a� v roku 1990. Titul kostola: Nanebovst�penie P�na. U��vaj� ho r�mskokatol�ci ako aj gr�ckokatol�ci.<br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>Fili�lka Mal� Ruskov:</b> Kostol v tejto malej dedinke p�vodne nebol, veriaci prich�dzali na bohoslu�by do farskej obce, do Plechot�c. S v�stavbou kostola sa za�alo a� v druhej polovici 90-tych rokov. Pekn� dielo sa podarilo a kostol zasv�ten� Panne M�rii Kr�ovnej bol po�ehnan� v roku 1998. <br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>Fili�lka Nov� Ruskov:</b> V tejto obci je ve�mi m�lo r�mskokatol�kov, �ij� tam preva�ne gr�ckokatol�ci. R�mskokatol�cky kostol sa v tejto obci nenach�dza.
</div>

<?
			break;	#case/1
		
		//-------------------------- knazi ------------------------------------------------------
		case 2:
		?>
			<table cellpadding="0" cellspacing="0" border="0" width="97%" align="center" class="textmain">
				<tr>
					<td><b>Teraj�� far�r:</b>&nbsp;<b><i>JCLic. Juraj Petr�k</i></b> <i>(nar. 01. 04. 1949; ord. 09. 06. 1973)</i></td>		
				</tr>
				<tr>
					<td><br><b>Rod�ci:</b><br><br>
						&nbsp;&nbsp;&nbsp;<b>&#187</b>&nbsp;<b><i>PhDr. SS.ThDr. Anton Ocskay </i></b> (05. 06. 1795 - 13. 09. 1848; ord. 02. 08. 1818)<br>
						&nbsp;&nbsp;&nbsp;<b>&#187</b>&nbsp;<b><i>Bartolomej Salka</i></b> (nar. 19. 04. 1951; ord. 11. 06. 1978)<br>
						&nbsp;&nbsp;&nbsp;<b>&#187</b>&nbsp;<b><i>ThDr. Zdenko Andr�, PhD.</i></b> (nar. 07. 07. 1969; ord. 12. 09. 1992), <b>e-mail:</b> <a href="mailto:andras.z@rimkat.sk" title="ThDr. Zdenko Andr�, PhD." class="textmain" style="padding-left:0px;">andras.z@rimkat.sk</a><br>
						&nbsp;&nbsp;&nbsp;<b>&#187</b>&nbsp;<b><i>Mgr. Peter �oltis</i></b> (fili�lka �e�ovce, nar. 12. 04. 1979 ; ord. 19. 06. 2004)
						<br>
						<br>
						<br>
						<b>K�azi ktor� p�sobili vo farnosti Plechotice:</b><br><br>
						<i>Paul�ni:</i><br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Rakovszki Andr�s (1723-1730)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Macsenga J�nos (1730-1731)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Kelemen L�rinc (1731-1734)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Papp J�nos (1734-1739)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Pasiczki M�ty�s (1739-1741)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Bors�nyi (1741-1742)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Vassalicz Gy�rgy (1742-1749)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;L�czai S�ndor (1749-1754)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Brandics Melchior (1754-1758)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Vilinyi M�ty�s (1758-1760)<br>
						<br>
						<i>K�azi Egerskej �upy: </i><br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Dom�nyi J�nos (1760-1791)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Garamay Ferenc (1791-1796)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Ivanics Andr�s (1796-1798)<br>
						<br>
						<i>K�azi Ko�ickej �upy:  (od roku 1804 Ko�ick� biskupstvo)</i><br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Kelemen Antal (1798-1811)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Skopecz Gy�rgy (1811-1813)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;J�nosy P�l (1813-1816)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Hronkovics Ferenc (1816-1856)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Zsolner L�szl� (1856-1882)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Gosztonyi P�l (1882-1887)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;G�czy Istv�n (1888- 1919)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Repcsik P�l (1920)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Michal Gergely (1921- 1948)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;J�n Madar, kapl�n (1946)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Juraj Timko, kapl�n (1947)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;J�n Kostrab (1948- 1953)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Andrej Varga (1953 - 1961)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;ThDr. J�n Bub�n (1961-1989)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Franti�ek Mih� (1989-1990)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;�tefan Va�o (1990-2002)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Juraj Petr�k  (2002 -    )<br>
						<br>
						<br>
						<b><i>PhDr. SS.Th.Dr. Anton OCSKAY (1838-1848)</i></b><br>
						<br>
						<div align="center"><img src="./imgs/anton_ocskay.jpg"></div><br>
						<table cellpadding="5" cellspacing="0" border="2" align="center" width="400" bgcolor="#DFEBF9" bordercolor="#ffffff" class="textmain" style="font-size:11px;">
							<tr>
								<td align="center" bgcolor="#A4B8EC" width="20"><b>*</b></td>
								<td align="center" width="100">5. 6. 1795</td>
								<td align="center">Plechotice</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC" width="20"><b>o.</b></td>
								<td align="center" width="100">2. 8. 1818</td>
								<td align="center">&nbsp;</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC" width="20"><b>m.</b></td>
								<td align="center" width="100">17. 5. 1838</td>
								<td align="center">&nbsp;</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC" width="20"><b>e.</b></td>
								<td align="center" width="100">18. 8. 1838</td>
								<td align="center">&nbsp;</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC" width="20"><b>k.</b></td>
								<td align="center" width="100">18. 8. 1839</td>
								<td align="center">Stoli�n� Belehrad, Ladislav Bark�czy, stoli�nobelehradsk� biskup</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC" width="20"><b>i.</b></td>
								<td align="center" width="100">1. 10. 1839</td>
								<td align="center">Ko�ice</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC" width="20"><b>�</b></td>
								<td align="center" width="100">13. 9. 1848</td>
								<td align="center">Bud�n (Ma�arsko), 9:30 </td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC" width="20"><b>p.</b></td>
								<td align="center" width="100">16. 9. 1848</td>
								<td align="center">Bud�n (Ma�arsko), franti�k�nsky kostol</td>
							</tr> 
						</table><br>
						<b>Anton Ocskay</b> [O�kai]. Potomok star�ho z�mo�n�ho zemianskeho rodu z O�kova (Nitrianska stolica), ktor� mal majetky v Above a Zempl�ne; otec sa volal Imrich, matka Ign�cia, rod. Spl�nyiov�. �tudoval v Ko�iciach, stal sa klerikom J�gerskej diec�zy, filozofiu absolvoval v J�gri a teol�giu na univerzite v Pe�ti ako p�zmanista, 13. 2. 1813 PhDr. A. Ocskay nemal kanonick� vek, preto bol vysv�ten� iba za diakona. Pokra�oval v �t�di�ch na viedenskom August�neu, 1818 ceremon�r, kapl�n a dom�ci katech�ta pri �tefanovi Fischerovi, j�gerskom arcibiskupovi, 1820 SS.Th.Dr., 1823 c. k. dvorn� kapl�n a prefekt viedensk�ho August�nea, 1826 profesor na teologickej fakulte v Pe�ti, 1827 ve�kovarad�nsky kanonik, 1832 kr�ovsk� radca a titul�rny b��sky biskup (Bacensis), miestodr�ite�sk� radca, 1838 archidiakon, 1838 ko�ick� biskup. <br><br>
						Bol u�en�m, dobr�m a z�sadov�m �lovekom. Za Ferdinanda I. (1835 - 1848) br�nil v ot�zke mie�an�ch man�elstiev cirkevn� stanovisko. Kl�dol d�raz na vzdel�vanie duchovn�ch. Vydal osobitn� nariadenie oh�adom farsk�ch kni�n�c. Podporoval hnutie spolkov striezlivosti. Aj za jeho slu�by sa stali pr�rodn� pohromy; v j�ni roku 1845 mesto postihla povode�, ktor� sp�sobila �kody aj na katedr�le; roku 1846 vypukol v Ko�iciach hroziv� po�iar, ktor� postihol zna�n� �as� mesta. Katedr�la bola zachr�nen� v�aka neboj�cnemu nasadeniu obyvate�ov. Sviatos� birmovania vo svojej diec�ze vysluhoval v rokoch 1841, 1842 a 1845. Zomrel po�as krajinskej porady v Bud�ne.<br><br>
						Po�as vakancie, ktor� kv�li nepriaznivej politickej situ�cii trvala dva roky, bol za kapituln�ho vik�ra u� tret�kr�t zvolen� J�n K�nig, kanonik a ko�ick� far�r. Spravoval diec�zu a� do 30. 5. 1850. Najm� v roku 1849 sa neraz dostal do �a�kej situ�cie, ke� raz musel vyhovie� ma�arsk�m, raz cis�rskym po�iadavk�m. Po vojne ho za to cis�rska vl�da aj ako Nemca brala na zodpovednos� a z nepr�jemnej situ�cie sa dostal len tak, �e odvolal svoje nariadenia, ktor� vydal po�as vojny v prospech ma�arskej vl�dy. <br><br>
						Popis erbu. Polten� �t�t. Vpravo stojaca postava medve�a (klokana?) dr�iaca roztvoren� knihu a stojaca na pa�iti. V�avo kr��aj�ci pes na pa�iti, v hornej �asti s� ved�a seba hviezda, slnko a kos��ik mesiaca. Dve korunovan� helmy. Z prvej vyrastaj� dve tr�by, medzi ktor�mi je �tylizovan� pas�ci sa vt�k. Z druhej helmy vyrast� vlk (medve�), dr�iaci trojit� ru�u. Nad prikr�vadlami vpravo mitra, v�avo berla s to�en�m dovn�tra. V�etko prev��en� biskupsk�m klob�kom.
					</td>
				</tr>
			</table>
		<?
			break;	#case/2
			
		//-------------------------- bohosluzobny poriadok -------------------------------------	
		case 3: 
			$stmt = "select * from titles where locate=1";
			if (@!($result = mysql_query($stmt, $link))){
				echo "Chyba pri connecte na SQL server";	exit;
			}
			$row = mysql_fetch_object($result);
			$title_fara = $row->text;
			
			$stmt = "select * from fara_slavenie";
			if (@!($result = mysql_query($stmt, $link))){
				echo "ta more chyba";	exit;
			}
			$z = 1;
			while ($row = mysql_fetch_object($result)){
				$datum_omsa[$z] = $row->datum;
				$slavenie_omsa[$z] = $row->slavenie;
				$obetovana_omsa[$z] = $row->obetovana;
				$z++;
				
			}
		
			?>
			<table cellpadding="0" cellspacing="0" border="0" width="97%" align="center">
				<tr>
					<td>
						<div class="oznamNazov" style="text-align:center;"><? echo $title_fara; ?>:</div><br>
						<table cellpadding="5" cellspacing="0" border="2" align="center" width="500" bgcolor="#DFEBF9" bordercolor="#ffffff" class="textmain" style="font-size:11px;">
							<tr bgcolor="#6285DF" style="color:white;">
								<td style="text-align:center;" width="80"><b><i>De�</i></b></td>
								<td align="center" style="text-align:center;" width="130"><b><i>Sl�venie</i></b></td>
								<td align="center" style="text-align:center;" width="80"><b><i>Obetovan� za</i></b></td>
								<td align="center" style="text-align:center;" width="80"><b><i>Miesto</i></b></td>
								<td align="center" style="text-align:center;" width="50"><b><i>�as</i></b></td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC"><b>Pondelok</b><br><? echo $datum_omsa[1]; ?></td>
								<td align="center"><? echo $slavenie_omsa[1]; ?></td>
								<td align="center"><? echo $obetovana_omsa[1]; ?></td>
								<td align="center"><? echo miesto_omsa(1); ?></td>
								<td align="center"><? echo cas_omsa(1); ?></td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC"><b>Utorok</b><br><? echo $datum_omsa[2]; ?></td>
								<td align="center"><? echo $slavenie_omsa[2]; ?></td>
								<td align="center"><? echo $obetovana_omsa[2]; ?></td>
								<td align="center"><? echo miesto_omsa(2); ?></td>
								<td align="center"><? echo cas_omsa(2); ?></td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC"><b>Streda</b><br><? echo $datum_omsa[3]; ?></td>
								<td align="center"><? echo $slavenie_omsa[3]; ?></td>
								<td align="center"><? echo $obetovana_omsa[3]; ?></td>
								<td align="center"><? echo miesto_omsa(3); ?></td>
								<td align="center"><? echo cas_omsa(3); ?></td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC"><b>�tvrtok</b><br><? echo $datum_omsa[4]; ?></td>
								<td align="center"><? echo $slavenie_omsa[4]; ?></td>
								<td align="center"><? echo $obetovana_omsa[4]; ?></td>
								<td align="center"><? echo miesto_omsa(4); ?></td>
								<td align="center"><? echo cas_omsa(4); ?></td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC"><b>Piatok</b><br><? echo $datum_omsa[5]; ?></td>
								<td align="center"><? echo $slavenie_omsa[5]; ?></td>
								<td align="center"><? echo $obetovana_omsa[5]; ?></td>
								<td align="center"><? echo miesto_omsa(5); ?></td>
								<td align="center"><? echo cas_omsa(5); ?></td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC"><b>Sobota</b><br><? echo $datum_omsa[6]; ?></td>
								<td align="center"><? echo $slavenie_omsa[6]; ?></td>
								<td align="center"><? echo $obetovana_omsa[6]; ?></td>
								<td align="center"><? echo miesto_omsa(6); ?></td>
								<td align="center"><? echo cas_omsa(6); ?></td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC"><b>Nede�a</b><br><? echo $datum_omsa[7]; ?></td>
								<td align="center"><? echo $slavenie_omsa[7]; ?></td>
								<td align="center"><? echo $obetovana_omsa[7]; ?></td>
								<td align="center"><? echo miesto_omsa(7); ?></td>
								<td align="center"><? echo cas_omsa(7); ?></td>
							</tr>
						</table>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="./src/print.php?category=1" target="_blank"><img src="./imgs/tlac.gif" border="0" title="Vytla� bohoslu�obn� poriadok (om�e)"></a>
						<br>
						<br>
						<span class="oznamNazov">FARSK� OZNAMY:</span><br><br>
						<?
						$stmt = "select * from oznamy_fara order by pridany desc";
						if (@!($result = mysql_query($stmt, $link))){
							exit;
						}
						$pocet = mysql_num_rows($result);
						
						/*
						echo "pocet: " . $pocet;
						echo "<br>num: " . $num;
						*/
						if ($pocet != 0){
							while ($row = mysql_fetch_object($result)){
								printf("<fieldset lang=\"sk\" class=\"aktuality\">
													<legend class=\"legenda\">&nbsp;%s&nbsp;</legend>%s<br><div align=\"right\" class=\"textmain\" style=\"text-align:right;font-size:11px;line-height:14px;\"><i>%s</i></div>
												</fieldset><br>",	$row->nazov, nl2br($row->text), modifyDate($row->pridany));
							} #end while
						} else {  #end if
							echo "<br><div class=\"oznamNazov\" style=\"text-align:center;\">Moment�lne nie s� �iadne oznamy.</div>";
						}
						?>
					</td>
				</tr>
			</table>
			<?
			
			break;	#case/3
	
	}
}	#if/submenu
?>
<br>

