<table cellpadding="0" cellspacing="0" border="0" align="center" width="70%">
	<tr>
		<td width="78" width="26"><img src="./imgs/img_fara_left.jpg"></td>
		<td width="*" background="./imgs/img_fara_middle.gif" align="center">&nbsp;&nbsp;<? echo colorArrowFara(1); ?>&nbsp;<a href="?menu=<?echo $menu;?>&submenu=1" class="faraMenu">História</a>&nbsp;&nbsp;&nbsp;<? echo colorArrowFara(2); ?>&nbsp;<a href="?menu=<?echo $menu;?>&submenu=2" class="faraMenu">Kňazi</a>&nbsp;&nbsp;&nbsp;<? echo colorArrowFara(3); ?>&nbsp;<a href="?menu=<?echo $menu;?>&submenu=3" class="faraMenu">Poriadok</a>&nbsp;&nbsp;</td>
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
			<span class="oznamNazov">Myšlienka na týždeň</span><br>
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
					<td class="textmain"><b>Farský úrad Plechotice</b><br>Hlavná 145<br>Plechotice<br>075 01</td>
				</tr>
			</table><br>
			<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
				<tr>
					<td class="nazov" width="23"><img src="./imgs/icon_telfax.gif" border="0"></td>
					<td class="nazov" width="*">Telefón</td>
				</tr>
			</table>
			<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
				<tr>
					<td class="textmain"><b>tel.: </b>&nbsp;056/6799223</td>
				</tr>
			</table><br>
			<b>farár:</b>&nbsp;<b><i>JCLic. Juraj Petrík</i></b>
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
					<td align="center">Najsvätejšej Trojice</td>
					<td align="center">1333</td>
					<td align="center">790</td>
					<td align="center">611</td>
				</tr>
				<tr>
					<td align="center" bgcolor="#A4B8EC"><b>Čeľovce</b></td>
					<td align="center">sv. Anny</td>
					<td align="center">1802</td>
					<td align="center">538</td>
					<td align="center">270</td>
				</tr>
				<tr>
					<td align="center" bgcolor="#A4B8EC"><b>Egreš</b></td>
					<td align="center">Nanebovstúpenia Pána</td>
					<td align="center">1968</td>
					<td align="center">423</td>
					<td align="center">236</td>
				</tr>
				<tr>
					<td align="center" bgcolor="#A4B8EC"><b>Nový Ruskov</b></td>
					<td align="center">Panna Mária Kráľovná</td>
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
<div align="center" class="textmain" style="text-align:center;"><b>Farnosť Plechotice</b></div>
<div class="textmain">
&nbsp;&nbsp;&nbsp;&nbsp;Obec Plechtice má svoje meno od Maďarského šľachtica "Pelejtey-ho", pravdivosť údajov dokumentujú úradné listiny nachádzajúce sa na Rímskokatolíckom farskom úrade.<br>
&nbsp;&nbsp;&nbsp;&nbsp;Najstaršie údaje  farskej matriky sú z roku 1723. V tomto období tu žilo 331 rímskokatolíkov, 284 gréckokatolíkov,  32 kalvínov, 41 Židov. Hovorilo sa po slovensky a maďarsky. Farnosť tvorili filiálky: Čeľovce, Egreš, Nový Ruskov a Malý Ruskov. V obci sa nachádzala škola, ktorá patrila Rímskokatolíckej Cirkvi. Najstaršia správa je z roku 1770.<br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>Farský kostol:</b> Uprostred dediny sa nachádza kostol, ktorý existoval už v roku 1333. Farský kostol bol zasvätený sv. Jánovi Evanjelistovi. V období reformácie, v XVI. stor. kostol obsadili kalvíni a až v roku 1701 ho dostali naspäť katolíci v úplne zničenom stave. Náklady na jeho opravu poskytol František Keresteš a jeho potomkovia, ako aj dobročinné dary obyvateľov Zemplínskej župy. Úplná rekonštrukcia sa uskutočnila až v roku 1771. V roku 1834 bolo zemetrasenie po ktorom kostol bol úplne zničený. V roku 1838 urobili jeho prestavbu. V rokoch 1877 a 1894 znova robili opravy kostola. V roku 1901 postavili nový oltár, upravili kazateľnicu a orgán. Do roku 1760 tu pôsobili Paulínsky otcovia, ako duchovní pastieri. Po zrušení rehole, kostol prevzali farári z egerskej župy. Súčasný rímskokatolícky kostol je zasvätený Najsvätejšej Trojici a začali ho rekonštruovať v prvej polovici 18. storočia a vysvätili ho v roku 1771.<br>
&nbsp;&nbsp;&nbsp;&nbsp;V kostole sa nachádza obraz s námetom "Najsvätejšej Trojice", ktorý daroval košický biskup, Anton Ocskay. Obraz bol reštaurovaný v roku 1984 na podnet ThDr. Jána Bubána. Počas jeho pôsobenia bol kostol v roku 1982 vymaľovaný. V súčasnosti si interiér kostola vyžaduje liturgickú úpravu podľa smerníc II. Vatikánského koncilu.<br>
&nbsp;&nbsp;&nbsp;&nbsp;Exteriér kostola bol upravovaný hlavne z dôvodu primícií, ktoré boli v roku 1992. Taktiež sa v tomto kostole konala diakonská vysviacka, v decembri 1991. Diakonát prijal ThDr. Zdenko Andráš PhD., z rúk terajšieho otca arcibiskupa Alojza Tkáča. <br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>Farská budova:</b> Dr. Bubán  zamýšľal aj výstavbu novej farskej budovy. Jeho zámer sa mu však už nepodarilo zrealizovať, lebo odišiel do dôchodku. V septembri roku 1989 odišiel do Pezinka, kde o 3 mesiace zomrel. S výstavbou novej farskej budovy začal jeho nástupca Vdp. František Miháľ a pod vedením ďalšieho farára Vdp. Štefana Vaňa bola stavba dokončená. <br><br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>Filiálka Čeľovce:</b> Kostol v Čeľovciach z roku 1802 je zasvätený sv. Anne. V roku 1839 poskytol výdavky na jeho opravu Juraj Baňas, ktorý vtedy pôsobil ako farár v Hornom Olcsvari. V roku 1899 ho vymaľovali a v tom istom roku postavili nový bohato zdobený oltár. Postupom času sa robili bežné úpravy  v interiéri a na exteriéri kostola.<br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>Filiálka Egreš:</b> So stavbou kostola v Egreši sa začalo v období totality, v roku 1968, potom boli práce na kostole prerušené. Dokončený a posvätený bol až v roku 1990. Titul kostola: Nanebovstúpenie Pána. Užívajú ho rímskokatolíci ako aj gréckokatolíci.<br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>Filiálka Malý Ruskov:</b> Kostol v tejto malej dedinke pôvodne nebol, veriaci prichádzali na bohoslužby do farskej obce, do Plechotíc. S výstavbou kostola sa začalo až v druhej polovici 90-tych rokov. Pekné dielo sa podarilo a kostol zasvätený Panne Márii Kráľovnej bol požehnaný v roku 1998. <br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>Filiálka Nový Ruskov:</b> V tejto obci je veľmi málo rímskokatolíkov, žijú tam prevažne gréckokatolíci. Rímskokatolícky kostol sa v tejto obci nenachádza.
</div>

<?
			break;	#case/1
		
		//-------------------------- knazi ------------------------------------------------------
		case 2:
		?>
			<table cellpadding="0" cellspacing="0" border="0" width="97%" align="center" class="textmain">
				<tr>
					<td><b>Terajší farár:</b>&nbsp;<b><i>JCLic. Juraj Petrík</i></b> <i>(nar. 01. 04. 1949; ord. 09. 06. 1973)</i></td>		
				</tr>
				<tr>
					<td><br><b>Rodáci:</b><br><br>
						&nbsp;&nbsp;&nbsp;<b>&#187</b>&nbsp;<b><i>PhDr. SS.ThDr. Anton Ocskay </i></b> (05. 06. 1795 - 13. 09. 1848; ord. 02. 08. 1818)<br>
						&nbsp;&nbsp;&nbsp;<b>&#187</b>&nbsp;<b><i>Bartolomej Salka</i></b> (nar. 19. 04. 1951; ord. 11. 06. 1978)<br>
						&nbsp;&nbsp;&nbsp;<b>&#187</b>&nbsp;<b><i>ThDr. Zdenko Andráš, PhD.</i></b> (nar. 07. 07. 1969; ord. 12. 09. 1992), <b>e-mail:</b> <a href="mailto:andras.z@rimkat.sk" title="ThDr. Zdenko Andráš, PhD." class="textmain" style="padding-left:0px;">andras.z@rimkat.sk</a><br>
						&nbsp;&nbsp;&nbsp;<b>&#187</b>&nbsp;<b><i>Mgr. Peter Šoltis</i></b> (filiálka Čeľovce, nar. 12. 04. 1979 ; ord. 19. 06. 2004)
						<br>
						<br>
						<br>
						<b>Kňazi ktorí pôsobili vo farnosti Plechotice:</b><br><br>
						<i>Paulíni:</i><br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Rakovszki András (1723-1730)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Macsenga János (1730-1731)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Kelemen Lőrinc (1731-1734)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Papp János (1734-1739)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Pasiczki Mátyás (1739-1741)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Borsányi (1741-1742)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Vassalicz György (1742-1749)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Láczai Sándor (1749-1754)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Brandics Melchior (1754-1758)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Vilinyi Mátyás (1758-1760)<br>
						<br>
						<i>Kňazi Egerskej župy: </i><br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Doményi János (1760-1791)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Garamay Ferenc (1791-1796)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Ivanics András (1796-1798)<br>
						<br>
						<i>Kňazi Košickej župy:  (od roku 1804 Košické biskupstvo)</i><br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Kelemen Antal (1798-1811)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Skopecz György (1811-1813)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Jánosy Pál (1813-1816)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Hronkovics Ferenc (1816-1856)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Zsolner László (1856-1882)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Gosztonyi Pál (1882-1887)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Géczy István (1888- 1919)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Repcsik Pál (1920)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Michal Gergely (1921- 1948)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Ján Madar, kaplán (1946)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Juraj Timko, kaplán (1947)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Ján Kostrab (1948- 1953)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Andrej Varga (1953 - 1961)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;ThDr. Ján Bubán (1961-1989)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;František Miháľ (1989-1990)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Štefan Vaňo (1990-2002)<br>
						&nbsp;&nbsp;&nbsp;&#187&nbsp;Juraj Petrík  (2002 -    )<br>
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
								<td align="center">Stoličný Belehrad, Ladislav Barkóczy, stoličnobelehradský biskup</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC" width="20"><b>i.</b></td>
								<td align="center" width="100">1. 10. 1839</td>
								<td align="center">Košice</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC" width="20"><b>†</b></td>
								<td align="center" width="100">13. 9. 1848</td>
								<td align="center">Budín (Maďarsko), 9:30 </td>
							</tr>
							<tr>
								<td align="center" bgcolor="#A4B8EC" width="20"><b>p.</b></td>
								<td align="center" width="100">16. 9. 1848</td>
								<td align="center">Budín (Maďarsko), františkánsky kostol</td>
							</tr> 
						</table><br>
						<b>Anton Ocskay</b> [Očkai]. Potomok starého zámožného zemianskeho rodu z Očkova (Nitrianska stolica), ktorý mal majetky v Above a Zemplíne; otec sa volal Imrich, matka Ignácia, rod. Splényiová. Študoval v Košiciach, stal sa klerikom Jágerskej diecézy, filozofiu absolvoval v Jágri a teológiu na univerzite v Pešti ako pázmanista, 13. 2. 1813 PhDr. A. Ocskay nemal kanonický vek, preto bol vysvätený iba za diakona. Pokračoval v štúdiách na viedenskom Augustíneu, 1818 ceremonár, kaplán a domáci katechéta pri Štefanovi Fischerovi, jágerskom arcibiskupovi, 1820 SS.Th.Dr., 1823 c. k. dvorný kaplán a prefekt viedenského Augustínea, 1826 profesor na teologickej fakulte v Pešti, 1827 veľkovaradínsky kanonik, 1832 kráľovský radca a titulárny báčsky biskup (Bacensis), miestodržiteľský radca, 1838 archidiakon, 1838 košický biskup. <br><br>
						Bol učeným, dobrým a zásadovým človekom. Za Ferdinanda I. (1835 - 1848) bránil v otázke miešaných manželstiev cirkevné stanovisko. Kládol dôraz na vzdelávanie duchovných. Vydal osobitné nariadenie ohľadom farských knižníc. Podporoval hnutie spolkov striezlivosti. Aj za jeho služby sa stali prírodné pohromy; v júni roku 1845 mesto postihla povodeň, ktorá spôsobila škody aj na katedrále; roku 1846 vypukol v Košiciach hrozivý požiar, ktorý postihol značnú časť mesta. Katedrála bola zachránená vďaka nebojácnemu nasadeniu obyvateľov. Sviatosť birmovania vo svojej diecéze vysluhoval v rokoch 1841, 1842 a 1845. Zomrel počas krajinskej porady v Budíne.<br><br>
						Počas vakancie, ktorá kvôli nepriaznivej politickej situácii trvala dva roky, bol za kapitulného vikára už tretíkrát zvolený Ján König, kanonik a košický farár. Spravoval diecézu až do 30. 5. 1850. Najmä v roku 1849 sa neraz dostal do ťažkej situácie, keď raz musel vyhovieť maďarským, raz cisárskym požiadavkám. Po vojne ho za to cisárska vláda aj ako Nemca brala na zodpovednosť a z nepríjemnej situácie sa dostal len tak, že odvolal svoje nariadenia, ktoré vydal počas vojny v prospech maďarskej vlády. <br><br>
						Popis erbu. Poltený štít. Vpravo stojaca postava medveďa (klokana?) držiaca roztvorenú knihu a stojaca na pažiti. Vľavo kráčajúci pes na pažiti, v hornej časti sú vedľa seba hviezda, slnko a kosáčik mesiaca. Dve korunované helmy. Z prvej vyrastajú dve trúby, medzi ktorými je štylizovaný pasúci sa vták. Z druhej helmy vyrastá vlk (medveď), držiaci trojitú ružu. Nad prikrývadlami vpravo mitra, vľavo berla s točením dovnútra. Všetko prevýšené biskupským klobúkom.
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
								<td style="text-align:center;" width="80"><b><i>Deň</i></b></td>
								<td align="center" style="text-align:center;" width="130"><b><i>Slávenie</i></b></td>
								<td align="center" style="text-align:center;" width="80"><b><i>Obetovaná za</i></b></td>
								<td align="center" style="text-align:center;" width="80"><b><i>Miesto</i></b></td>
								<td align="center" style="text-align:center;" width="50"><b><i>Čas</i></b></td>
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
								<td align="center" bgcolor="#A4B8EC"><b>Štvrtok</b><br><? echo $datum_omsa[4]; ?></td>
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
								<td align="center" bgcolor="#A4B8EC"><b>Nedeľa</b><br><? echo $datum_omsa[7]; ?></td>
								<td align="center"><? echo $slavenie_omsa[7]; ?></td>
								<td align="center"><? echo $obetovana_omsa[7]; ?></td>
								<td align="center"><? echo miesto_omsa(7); ?></td>
								<td align="center"><? echo cas_omsa(7); ?></td>
							</tr>
						</table>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="./src/print.php?category=1" target="_blank"><img src="./imgs/tlac.gif" border="0" title="Vytlač bohoslužobný poriadok (omše)"></a>
						<br>
						<br>
						<span class="oznamNazov">FARSKÉ OZNAMY:</span><br><br>
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
							echo "<br><div class=\"oznamNazov\" style=\"text-align:center;\">Momentálne nie sú žiadne oznamy.</div>";
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

