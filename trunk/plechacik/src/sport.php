<table cellpadding="0" cellspacing="0" border="0" align="center" width="70%">
	<tr>
		<td width="78" width="26"><img src="./imgs/img_fara_left.jpg"></td>
		<td width="*" background="./imgs/img_fara_middle.gif" align="center">&nbsp;&nbsp;<? echo colorArrowFara(1); ?>&nbsp;<a href="?menu=<?echo $menu;?>&submenu=1" class="faraMenu">"A"</a>&nbsp;&nbsp;&nbsp;<? echo colorArrowFara(2); ?>&nbsp;<a href="?menu=<?echo $menu;?>&submenu=2" class="faraMenu">Dorast</a>&nbsp;&nbsp;&nbsp;<? echo colorArrowFara(3); ?>&nbsp;<a href="?menu=<?echo $menu;?>&submenu=3" class="faraMenu">�iaci</a>&nbsp;&nbsp;</td>
		<td width="78" width="26"><img src="./imgs/img_fara_right.jpg"></td>
	</tr>
</table>
<br>
<? if (empty($submenu)){ ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="oznamNazov">TJ DRU�STEVN�K PLECHOTICE</span><span class="small"><br><br></span>
<br>
<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td class="nazov" width="23"><img src="./imgs/icon_adresa.gif" border="0"></td>
		<td class="nazov" width="*">Adresa</td>
	</tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" width="95%" align="center">
	<tr>
		<td class="textmain">Hlavn� 39/70, 075 01, Plechotice</td>
	</tr>
</table>
<br>
<table cellpadding="5" cellspacing="0" border="2" align="center" width="320" bgcolor="#DFEBF9" bordercolor="#ffffff" class="textmain" style="font-size:11px;">
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>Rok zalo�enia</b></td>
		<td align="center">1949</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>Klubov� farby</b></td>
		<td align="center">zelen�, biela, �lt�</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>Rozmery hracej plochy</b></td>
		<td align="center">102 x 60 m</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>Kapacita h�adiska</b></td>
		<td align="center">1 000, z toho 150 na sedenie</td>
	</tr>

</table>
<br>
<table cellpadding="5" cellspacing="0" border="2" align="center" width="320" bgcolor="#DFEBF9" bordercolor="#ffffff" class="textmain" style="font-size:11px;">
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>Prezident</b></td>
		<td align="center"><b>Mari�n Manasil</b></td>
	</tr>
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>Tajomn�k</b></td>
		<td align="center">Gabriel Dand�r</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>Hospod�r</b></td>
		<td align="center">�tefan Hrubovsk�</td>
	</tr>
        <tr>
		<td align="center" bgcolor="#A4B8EC"><b>�len predstavenstva</b></td>
		<td align="center">Du�an Hrubovsk�</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>�len predstavenstva</b></td>
		<td align="center">Jozef Nov�k</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>�len predstavenstva</b></td>
		<td align="center">Milan P�lfi</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>�len predstavenstva</b></td>
		<td align="center">Jozef Sokol</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>�len predstavenstva</b></td>
		<td align="center">�tefan Vojtek</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>Ved�ci "A"</b></td>
		<td align="center">Jaroslav Le�ko, J�lius Kandr��</td>
	</tr>
	<tr>
		<td align="center" bgcolor="#A4B8EC"><b>Ved�ci ml�de�e</b></td>
		<td align="center">�tefan Gereg, Miroslav Andrej��k, Vladim�r Bere�</td>
	</tr>
</table>
<br>

<? } else {

	//------------- db connection ---------------------
	$stmt = "select * from futbalovy_klub where id =" . $submenu;
	if (@!($result = mysql_query($stmt, $link))){
		echo "error during selectio from futbalovy_klub \n stmt: " . $stmt;
		exit;
	}
	$row = mysql_fetch_object($result);
	//-------------------------------------------------

	echo "<div id=\"idSportDiv\" class=\"textmain\">$row->content</div>";

} ?>