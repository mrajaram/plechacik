# MySQL-Front Dump 2.5
#
# Host: localhost   Database: plechacik
# --------------------------------------------------------
# Server version 3.23.54-nt


#
# Table structure for table 'aktuality'
#

CREATE TABLE aktuality (
  id tinyint(3) unsigned NOT NULL auto_increment,
  nazov text,
  pridany date default NULL,
  text text,
  PRIMARY KEY  (id),
  KEY id (id)
) TYPE=MyISAM;



#
# Dumping data for table 'aktuality'
#

INSERT INTO aktuality VALUES("5", "toto je novy oznam", "2004-06-06", "asdf\r\nasdf\r\nsd\r\nf");
INSERT INTO aktuality VALUES("7", "dfg", "2004-06-06", "ds");
INSERT INTO aktuality VALUES("8", "lo;o", "2004-06-06", "dfe35353");
INSERT INTO aktuality VALUES("10", "45", "2004-06-06", "23");
INSERT INTO aktuality VALUES("11", "g", "2004-12-04", "<i>sdf</i> ");
INSERT INTO aktuality VALUES("12", "skuska", "2004-12-05", "Vynikaj�ca ��fka a �kolite�ka Majka, zohran� sedem�lenn� anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka Majka, zohran� sedem�lenn� anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka Majka, zohran� sedem�lenn� anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka Majka, zohran� sedem�lenn� anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka Majka, zohran� sedem�lenn� anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka Majka, zohran� sedem�lenn� anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka Majka, zohran� sedem�lenn� anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka Majka, zohran� sedem�lenn� anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka Majka, zohran� sedem�lenn� anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka Majka, zohran� sedem�lenn� anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli ");
INSERT INTO aktuality VALUES("13", "toto je test", "2004-12-05", "anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... \r\nanim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... anim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... \r\n\r\n\r\nanim�torsk� t�m a osemn�s� ��astn�kov - teda t�ch, ktor� sa rozhodli pracova� na sebe, aby sa mohli Vynikaj�ca ��fka a �kolite�ka ... ");


#
# Table structure for table 'anketa'
#

CREATE TABLE anketa (
  id int(3) unsigned NOT NULL auto_increment,
  otazka varchar(100) default '0',
  odpoved_1 varchar(50) default '0',
  odpoved_2 varchar(50) default '0',
  odpoved_3 varchar(50) default '0',
  odpoved_4 varchar(50) default '0',
  platnost_od date NOT NULL default '0000-00-00',
  platnost_do date NOT NULL default '0000-00-00',
  pocet_1 int(3) unsigned default '0',
  pocet_2 int(3) unsigned default '0',
  pocet_3 int(3) unsigned default '0',
  pocet_4 int(3) unsigned default '0',
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Dumping data for table 'anketa'
#

INSERT INTO anketa VALUES("1", "Kedy sa potopil titanic?", "este sa nepotopil, lebo nemal na to cas.", "1912", "co je titanic?", "o com tocis?", "2003-07-24", "2003-07-24", "21", "2", "4", "38");
INSERT INTO anketa VALUES("6", "Tak toto je nova anketa. Je tak?", "ano", "nie", "mozno", "neviem", "2003-07-25", "2003-07-25", "4", "5", "1", "2");
INSERT INTO anketa VALUES("7", "Ak�ho chatovacieho klienta pou��vate?", "IRC", "PonyChat", "ICQ", "o com tocis?", "2003-07-22", "2003-07-22", "2", "2", "2", "1");
INSERT INTO anketa VALUES("8", "To�� sa �ervoto�?", "�no", "Nie", "Iba ak �erie koloto�", "O �om to�i�?", "2003-07-25", "2003-08-31", "6", "2", "21", "3");
INSERT INTO anketa VALUES("11", "Mysl�te si, �e Jan�o Mic�k dokon�� S� protek�ne?", "To je predsa jan�, �e �no", "Nie, lebo �aba mu pom�hal", "Ja chcem jol�kasdf", "Nie dokon�il ju za peniaze :o)", "2003-08-10", "2003-08-15", "2", "3", "0", "1");


#
# Table structure for table 'fara_omse'
#

CREATE TABLE fara_omse (
  id tinyint(3) unsigned NOT NULL auto_increment,
  den tinyint(3) unsigned default '0',
  miesto tinyint(3) unsigned default '0',
  cas text,
  PRIMARY KEY  (id),
  UNIQUE KEY id (id),
  KEY id_2 (id)
) TYPE=MyISAM;



#
# Dumping data for table 'fara_omse'
#



#
# Table structure for table 'fara_slavenie'
#

CREATE TABLE fara_slavenie (
  id tinyint(3) unsigned NOT NULL auto_increment,
  datum text,
  slavenie text,
  PRIMARY KEY  (id),
  KEY id (id)
) TYPE=MyISAM;



#
# Dumping data for table 'fara_slavenie'
#

INSERT INTO fara_slavenie VALUES("1", "31. 41. 2004", "toto je privelky oznam ktory tam bude umiestneny takze testujem ako sa to bude spravat");
INSERT INTO fara_slavenie VALUES("2", "2.2.2004", "slavenie utorok");
INSERT INTO fara_slavenie VALUES("3", "3.3.2004", "slavenie stredu");
INSERT INTO fara_slavenie VALUES("4", "4.4.2004", "slavenie stvrtok");
INSERT INTO fara_slavenie VALUES("5", "5.5.2004", "slavenie piatok");
INSERT INTO fara_slavenie VALUES("6", "6.6.2004", "slavenie sobota");
INSERT INTO fara_slavenie VALUES("7", "7.7..2004", "slavenie nedela");


#
# Table structure for table 'gb'
#

CREATE TABLE gb (
  id int(3) NOT NULL auto_increment,
  text text NOT NULL,
  od text NOT NULL,
  datum varchar(60) NOT NULL default '',
  ip text NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY id (id)
) TYPE=MyISAM;



#
# Dumping data for table 'gb'
#

INSERT INTO gb VALUES("1", "", "asdfasdf", "", "");
INSERT INTO gb VALUES("2", "", "ivan", "", "");
INSERT INTO gb VALUES("3", "toto je sprava ktora tam bude napisana\r\nv novom riadku toto bude\r\n a toto tiez", "ivan", "", "");
INSERT INTO gb VALUES("4", "toto je sprava ktora tam bude napisana\r\nv novom riadku toto bude\r\n a toto tiez", "ivan", "", "");
INSERT INTO gb VALUES("5", "&nbsp;<img src=\"./imgs/smiles/smiley.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/wink.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; &nbsp;<im", "ivan", "", "");
INSERT INTO gb VALUES("6", "&nbsp;<img src=\"./imgs/smiles/smiley.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/wink.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/sad.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/undecided.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/cry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; ", "ivan", "", "");
INSERT INTO gb VALUES("7", "tak konecne to funguje po dlhej dobe. ale bude to fungovat este aj vhodnu chvilu pretoze mam tu jeden mail. vazeny pan stefko. sme radi, ze ste oslovili nasu ersonalnu agenturu. na zaklade vasho zaujmu o nami obsadzovanu pracovnu poziciu vam oznamujeme, ze je potrebne absolvovat osobne stretnutie v nasej agenture, ktore si treba co najskor vopred telefonicky dohovorit", "iuvan", "", "");
INSERT INTO gb VALUES("8", "tak konecne to funguje po dlhej dobe. ale bude to fungovat este aj vhodnu chvilu pretoze mam tu jeden mail. vazeny pan stefko. sme radi, ze ste oslovili nasu ersonalnu agenturu. na zaklade vasho zaujmu o nami obsadzovanu pracovnu poziciu vam oznamujeme, ze je potrebne absolvovat osobne stretnutie v nasej agenture, ktore si treba co najskor vopred telefonicky dohovorit&nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; ", "tak tak", "", "");
INSERT INTO gb VALUES("9", "teraz idem skusat smajlikov. toto ej prvy smajlik &nbsp;<img src=\"./imgs/smiles/smiley.gif\">&nbsp; . a teraz druhy: &nbsp;<img src=\"./imgs/smiles/wink.gif\">&nbsp; . a este treti &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "ivan", "", "");
INSERT INTO gb VALUES("10", "&nbsp;<img src=\"./imgs/smiles/smiley.gif\">&nbsp; \r\n&nbsp;<img src=\"./imgs/smiles/wink.gif\">&nbsp; \r\n&nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; \r\n&nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; \r\n&nbsp;<img src=\"./imgs/smiles/sad.gif\">&nbsp; \r\n&nbsp;<img src=\"./imgs/smiles/undecided.gif\">&nbsp; \r\n&nbsp;<img src=\"./imgs/smiles/cry.gif\">&nbsp; \r\n&nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; \r\n", "asdf", "", "");
INSERT INTO gb VALUES("11", "teraz idem vyskusat hrube pismo. <b>Toto by malo byt napisane hrubym pismom</b>\r\n<i>A toto kurzivou</i> ", "asdf", "", "");
INSERT INTO gb VALUES("12", "teraz idem vyskusat hrube pismo. <b>Toto by malo byt napisane hrubym pismom</b>\r\n<i>A toto kurzivou</i> ", "asdf", "", "");
INSERT INTO gb VALUES("13", "asfd", "afd", "24. j�l 2003&nbsp;&nbsp;14:29:59", "");
INSERT INTO gb VALUES("14", "asfd", "afd", "24. j�l 2003&nbsp;&nbsp;14:31:01", "");
INSERT INTO gb VALUES("15", "asfd", "afd", "24. j�l 2003&nbsp;&nbsp;14:32:02", "");
INSERT INTO gb VALUES("16", "asfd", "afd", "24. j�l 2003&nbsp;&nbsp;14:32:50", "");
INSERT INTO gb VALUES("17", "asfd", "afd", "24. j�l 2003&nbsp;&nbsp;14:34:38", "");
INSERT INTO gb VALUES("18", "asfd", "afd", "24. j�l 2003&nbsp;&nbsp;14:35:22", "");
INSERT INTO gb VALUES("19", "tak konecne to funguje po dlhej dobe. ale bude to fungovat este aj vhodnu chvilu pretoze mam tu jeden mail. vazeny pan stefko. sme radi, ze ste oslovili nasu ersonalnu agenturu. na zaklade vasho zaujmu o nami obsadzovanu pracovnu poziciu vam oznamujeme, ze je potrebne absolvovat osobne stretnutie v nasej agenture, ktore si treba co najskor vopred telefonicky dohovorit   &nbsp;<img src=\"./imgs/smiles/cry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/sad.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "ivan stefko", "24. j�l 2003&nbsp;&nbsp;14:36:01", "");
INSERT INTO gb VALUES("20", "tak konecne to funguje po dlhej dobe. ale bude to fungovat este aj vhodnu chvilu pretoze mam tu jeden mail. vazeny pan stefko. sme radi, ze ste oslovili nasu ersonalnu agenturu. na zaklade vasho zaujmu o nami obsadzovanu pracovnu poziciu vam oznamujeme, ze je potrebne absolvovat osobne stretnutie v nasej agenture, ktore si treba co najskor vopred telefonicky dohovorit   &nbsp;<img src=\"./imgs/smiles/cry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/sad.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "ivan stefko", "24. j�l 2003&nbsp;&nbsp;14:39:21", "");
INSERT INTO gb VALUES("21", " asfdkas dfas\r\nta rado polak je lama &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "ivan stefko", "24. j�l 2003&nbsp;&nbsp;14:43:18", "");
INSERT INTO gb VALUES("22", "&nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; ", "asdf", "24. j�l 2003&nbsp;&nbsp;14:44:03", "");
INSERT INTO gb VALUES("23", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:36:01", "");
INSERT INTO gb VALUES("24", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:36:28", "");
INSERT INTO gb VALUES("25", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:36:59", "");
INSERT INTO gb VALUES("26", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:40:39", "");
INSERT INTO gb VALUES("27", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:41:35", "");
INSERT INTO gb VALUES("28", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:41:48", "");
INSERT INTO gb VALUES("29", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:42:36", "");
INSERT INTO gb VALUES("30", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:42:53", "");
INSERT INTO gb VALUES("31", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:42:55", "");
INSERT INTO gb VALUES("32", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:44:08", "");
INSERT INTO gb VALUES("33", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:44:30", "");
INSERT INTO gb VALUES("34", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:45:04", "");
INSERT INTO gb VALUES("35", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:46:55", "");
INSERT INTO gb VALUES("36", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:48:14", "");
INSERT INTO gb VALUES("37", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:48:48", "");
INSERT INTO gb VALUES("38", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:49:29", "");
INSERT INTO gb VALUES("39", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:50:21", "");
INSERT INTO gb VALUES("40", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:50:46", "");
INSERT INTO gb VALUES("41", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:51:00", "");
INSERT INTO gb VALUES("42", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:51:10", "");
INSERT INTO gb VALUES("43", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:52:08", "");
INSERT INTO gb VALUES("44", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:52:49", "");
INSERT INTO gb VALUES("45", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:53:13", "");
INSERT INTO gb VALUES("46", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:53:39", "");
INSERT INTO gb VALUES("47", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:55:02", "");
INSERT INTO gb VALUES("48", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:55:25", "");
INSERT INTO gb VALUES("49", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:56:15", "");
INSERT INTO gb VALUES("50", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:56:26", "");
INSERT INTO gb VALUES("51", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:57:29", "");
INSERT INTO gb VALUES("52", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:57:41", "");
INSERT INTO gb VALUES("53", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:59:14", "");
INSERT INTO gb VALUES("54", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;15:59:39", "");
INSERT INTO gb VALUES("55", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;16:01:15", "");
INSERT INTO gb VALUES("56", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;16:04:29", "");
INSERT INTO gb VALUES("57", "adsf", "asf", "24. j�l 2003&nbsp;&nbsp;16:04:57", "");
INSERT INTO gb VALUES("58", "asfsdaf&nbsp;<img src=\"./imgs/smiles/sad.gif\">&nbsp; ", "sfdds", "24. j�l 2003&nbsp;&nbsp;16:05:37", "");
INSERT INTO gb VALUES("59", "asfsdaf&nbsp;<img src=\"./imgs/smiles/sad.gif\">&nbsp; ", "sfdds", "24. j�la 2003&nbsp;&nbsp;16:06:37", "");
INSERT INTO gb VALUES("60", "ta more neviem ako to mam urobit!!!!!!!! &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; ", "sully", "24. j�la 2003&nbsp;&nbsp;16:10:55", "");
INSERT INTO gb VALUES("61", "ta more neviem ako to mam urobit!!!!!!!! &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; ", "sully", "24. j�la 2003&nbsp;&nbsp;16:18:28", "");
INSERT INTO gb VALUES("62", "ta more neviem ako to mam urobit!!!!!!!! &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; ", "sully", "24. j�la 2003&nbsp;&nbsp;16:19:06", "");
INSERT INTO gb VALUES("63", "undefined&nbsp;<img src=\"./imgs/smiles/smiley.gif\">&nbsp; ", "sd", "24. j�la 2003&nbsp;&nbsp;17:33:50", "");
INSERT INTO gb VALUES("64", "toto je novy text spravy a bude tu aj usmev. ......... \r\n\r\nsafdasdf asfda\r\nsdfsadfa\r\nsdfasf &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "fsdafads", "24. j�la 2003&nbsp;&nbsp;17:57:19", "");
INSERT INTO gb VALUES("65", "toto je novy text spravy a bude tu aj usmev. ......... \r\n\r\nsafdasdf asfda\r\nsdfsadfa\r\nsdfasf &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "fsdafads", "24. j�la 2003&nbsp;&nbsp;18:03:56", "");
INSERT INTO gb VALUES("66", "toto je novy text spravy a bude tu aj usmev. ......... \r\n\r\nsafdasdf asfda\r\nsdfsadfa\r\nsdfasf &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "fsdafads", "24. j�la 2003&nbsp;&nbsp;18:04:28", "");
INSERT INTO gb VALUES("67", "toto je novy text spravy a bude tu aj usmev. ......... \r\n\r\nsafdasdf asfda\r\nsdfsadfa\r\nsdfasf &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "fsdafads", "24. j�la 2003&nbsp;&nbsp;18:04:54", "");
INSERT INTO gb VALUES("68", "toto je novy text spravy a bude tu aj usmev. ......... \r\n\r\nsafdasdf asfda\r\nsdfsadfa\r\nsdfasf &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "fsdafads", "24. j�la 2003&nbsp;&nbsp;18:06:54", "");
INSERT INTO gb VALUES("69", "toto je novy text spravy a bude tu aj usmev. ......... \r\n\r\nsafdasdf asfda\r\nsdfsadfa\r\nsdfasf &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "fsdafads", "24. j�la 2003&nbsp;&nbsp;18:06:57", "");
INSERT INTO gb VALUES("70", "no uz tu mame aj anketu len treba vymysliet ako bude fungovat a pocitat.... coz nie je take easy\r\n&nbsp;<img src=\"./imgs/smiles/undecided.gif\">&nbsp; ", "asdf", "24. j�la 2003&nbsp;&nbsp;18:20:00", "");
INSERT INTO gb VALUES("71", "toto je oznam ktory tu bude napisany &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "Ivan Stefko", "24. j�la 2003&nbsp;&nbsp;18:46:39", "");
INSERT INTO gb VALUES("72", "tento text pridal autor tejto stranky &nbsp;<img src=\"./imgs/smiles/wink.gif\">&nbsp; ", "Ing. Ivan Stefko", "24. j�la 2003&nbsp;&nbsp;18:48:04", "");
INSERT INTO gb VALUES("73", "cau mamko. toto pridala mamka do knihy navstev. &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "Monika Stefkova", "24. j�la 2003&nbsp;&nbsp;18:49:28", "");
INSERT INTO gb VALUES("74", "cau mamko. toto pridala mamka do knihy navstev. &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "Monika Stefkova", "24. j�la 2003&nbsp;&nbsp;18:50:16", "");
INSERT INTO gb VALUES("75", "tu zadas text\r\nsaf\r\nasf\r\nasd\r\nfs\r\nadfsadfsadf asdf asdf sadfsad fsadfsadfsad fsafd&nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; ", "Ing. Ivan Stefko", "24. j�la 2003&nbsp;&nbsp;20:32:14", "");
INSERT INTO gb VALUES("76", "ahoj. ja som ivan a dokazem toto", "sdf", "24. j�la 2003&nbsp;&nbsp;22:32:39", "");
INSERT INTO gb VALUES("77", "mate to tu super...  &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "david", "25. j�la 2003&nbsp;&nbsp;16:09:32", "");
INSERT INTO gb VALUES("78", "no hoj, ja som Stevo A do kozem totot\r\n&nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; ", "pista", "25. j�la 2003&nbsp;&nbsp;17:56:41", "");
INSERT INTO gb VALUES("79", "&nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "jg", "25. j�la 2003&nbsp;&nbsp;17:56:54", "");
INSERT INTO gb VALUES("80", "ta co nove? &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "sf", "26. j�la 2003&nbsp;&nbsp;17:21:00", "");
INSERT INTO gb VALUES("81", "ta nic", "ss", "26. j�la 2003&nbsp;&nbsp;18:02:04", "");
INSERT INTO gb VALUES("82", "sd&nbsp;<img src=\"./imgs/smiles/undecided.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/cry.gif\">&nbsp; ", "oll", "26. j�la 2003&nbsp;&nbsp;18:02:47", "");
INSERT INTO gb VALUES("83", "asdf", "adfs", "26. 7 2003&nbsp;&nbsp;19:20:23", "");
INSERT INTO gb VALUES("84", "asf", "er", "26. 7. 2003&nbsp;&nbsp;19:20:37", "");
INSERT INTO gb VALUES("85", "gffgdf", "ssfdf", "26. 7. 2003&nbsp;&nbsp;19:21:23", "");
INSERT INTO gb VALUES("88", "d", "adf asdf asdf asdf adsf", "27. 7. 2003&nbsp;&nbsp;0:39:04", "");
INSERT INTO gb VALUES("89", "<?echo \"ahoj\";?>", "sfd", "28. 7. 2003&nbsp;&nbsp;15:45:18", "");
INSERT INTO gb VALUES("90", "&nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; ", "dfg", "28. 7. 2003&nbsp;&nbsp;19:13:29", "");
INSERT INTO gb VALUES("91", " \r\n \r\n \r\n \r\n", "ds", "28. 7. 2003&nbsp;&nbsp;21:42:17", "");
INSERT INTO gb VALUES("92", "&nbsp;<img src=\"./imgs/smiles/undecided.gif\">&nbsp; ", "v", "28. 7. 2003&nbsp;&nbsp;21:43:15", "");
INSERT INTO gb VALUES("93", "&nbsp;<img src=\"./imgs/smiles/sad.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; ", " :angry: ", "30. 7. 2003&nbsp;&nbsp;15:51:01", "");
INSERT INTO gb VALUES("94", "&nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; ", "p", "30. 7. 2003&nbsp;&nbsp;16:08:45", "");
INSERT INTO gb VALUES("95", "t", "gf", "4. 8. 2003&nbsp;&nbsp;16:24:53", "");
INSERT INTO gb VALUES("96", "&nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; ", "f", "4. 8. 2003&nbsp;&nbsp;16:24:59", "");
INSERT INTO gb VALUES("97", "&nbsp;<img src=\"./imgs/smiles/smiley.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/wink.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/sad.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/undecided.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/cry.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; ", "fgh", "4. 8. 2003&nbsp;&nbsp;16:25:07", "");
INSERT INTO gb VALUES("98", "slfkjsf\r\n sf\r\nsd\r\nf\r\ns \r\n\r\nsdf\r\nsssssssssssssssssssssssssssssssffffffff\r\ne\r\ns\r\n\r\nf\r\na\r\nf\r\nsef &nbsp;<img src=\"./imgs/smiles/angry.gif\">&nbsp; ", "sf", "5. 8. 2003&nbsp;&nbsp;11:38:57", "");
INSERT INTO gb VALUES("99", "ssdfasdf", "asdf", "6. 8. 2003&nbsp;&nbsp;21:10:06", "");
INSERT INTO gb VALUES("100", "asdf", "sdf", "6. 8. 2003&nbsp;&nbsp;21:10:18", "");
INSERT INTO gb VALUES("109", "mam mensi problem. ked chcem otvorit nove okno cez javascript tak sa to robi tak ze ahrefu sa priradi akcia: JavaScript:openwindow(\'./imgs/foto/nieco.jpg\', \'asdf\', \'resizable=yes, scrollbars=no,menubar=no,toolbar=no,top=5, left=5, width=698,height=446\') - to je ok. \r\nproblem mam v tom, ze mne to nefunguje ked si zadefinujem mapu (vo fotogalerii). ked tam napisem nieco taketo: area alt=\"prva fotka\" shape=\"poly\" coords=\"47,25,47,105,175,101,175,31\" href=\"JavaScript:openwindow(\'./imgs/nieco.jpg\',\'\',\'resizable=yes, scrollbars=no, menubar=no, toolbar=no,top=5, left=5, width=698,height=446\')\"\r\n\r\ntak vypise chybu. co stym?", "sadf", "7. 8. 2003&nbsp;&nbsp;20:53:56", "");
INSERT INTO gb VALUES("108", "asfd", "asdf", "7. 8. 2003&nbsp;&nbsp;20:52:47", "");
INSERT INTO gb VALUES("107", "mam mensi problem. ked chcem otvorit nove okno cez javascript tak sa to robi tak ze ahrefu sa priradi akcia: JavaScript:openwindow(\'./imgs/foto/nieco.jpg\',\'asdf\',\'resizable=yes,scrollbars=no,menubar=no,toolbar=no,top=5,left=5,width=698,height=446\') - to je ok. \r\nproblem mam v tom, ze mne to nefunguje ked si zadefinujem mapu (vo fotogalerii). ked tam napisem nieco taketo: area alt=\"prva fotka\" shape=\"poly\" coords=\"47,25,47,105,175,101,175,31\" href=\"JavaScript:openwindow(\'./imgs/nieco.jpg\',\'\',\'resizable=yes,scrollbars=no, menubar=no,toolbar=no,top=5, left=5, width=698,height=446\')\"\r\n\r\ntak vypise chybu. co stym?", "asf", "7. 8. 2003&nbsp;&nbsp;20:52:41", "");
INSERT INTO gb VALUES("106", "mam mensi problem. ked chcem otvorit nove okno cez javascript tak sa to robi tak ze ahrefu sa priradi akcia: JavaScript:openwindow(\'./imgs/foto/nieco.jpg\',\'asdf\',\'resizable=yes,scrollbars=no,menubar=no,toolbar=no,top=5,left=5,width=698,height=446\') - to je ok. \r\nproblem mam v tom, ze mne to nefunguje ked si zadefinujem mapu (vo fotogalerii). ked tam napisem nieco taketo: <area alt=\"prva fotka\" shape=\"poly\" coords=\"47,25,47,105,175,101,175,31\" href=\"JavaScript:openwindow(\'./imgs/nieco.jpg\',\'\', \'resizable=yes,scrollbars=no, menubar=no,toolbar=no,top=5,left=5,width=698,height=446\')\">\r\n\r\ntak vypise chybu. co stym?", "asfd", "7. 8. 2003&nbsp;&nbsp;20:52:20", "");
INSERT INTO gb VALUES("110", "<B>sdgsdfg</B> ", "xvf", "8. 8. 2003&nbsp;&nbsp;13:08:13", "");
INSERT INTO gb VALUES("111", "<B>sdgsdfg</B> ", "xvf", "8. 8. 2003&nbsp;&nbsp;13:10:29", "");
INSERT INTO gb VALUES("112", "<B>sdgsdfg</B> ", "xvf", "8. 8. 2003&nbsp;&nbsp;13:11:02", "");
INSERT INTO gb VALUES("113", "<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ", "sadsa", "8. 8. 2003&nbsp;&nbsp;13:12:23", "");
INSERT INTO gb VALUES("114", "<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ", "sadsa", "8. 8. 2003&nbsp;&nbsp;13:13:12", "");
INSERT INTO gb VALUES("115", "<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ", "sadsa", "8. 8. 2003&nbsp;&nbsp;13:13:57", "");
INSERT INTO gb VALUES("116", "<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ", "sadsa", "8. 8. 2003&nbsp;&nbsp;13:15:12", "");
INSERT INTO gb VALUES("117", "<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ", "sadsa", "8. 8. 2003&nbsp;&nbsp;13:16:02", "");
INSERT INTO gb VALUES("118", "<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ", "sadsa", "8. 8. 2003&nbsp;&nbsp;13:16:35", "");
INSERT INTO gb VALUES("119", "<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ", "sadsa", "8. 8. 2003&nbsp;&nbsp;13:17:03", "");
INSERT INTO gb VALUES("120", "<b>fafas </b> <i>asdfasdf</i> <u>asdfasdf</u> ", "asdf", "8. 8. 2003&nbsp;&nbsp;13:17:24", "");
INSERT INTO gb VALUES("121", "caute bol som tu a mate to tu nanic &nbsp;<img src=\"./imgs/smiles/sad.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/undecided.gif\">&nbsp; ", "brano novak", "10. 8. 2003&nbsp;&nbsp;14:39:32", "");
INSERT INTO gb VALUES("122", "no nazdar &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; ", "asdf", "10. 8. 2003&nbsp;&nbsp;19:18:23", "");
INSERT INTO gb VALUES("123", "\r\n\r\n<center>\r\n<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"\r\n  codebase=\"http://active.macromedia.com/flash4/cabs/swflash.cab#version=4,0,0,0\"\r\n  id=\"svadba\" width=\"289\" height=\"200\">\r\n  <param name=\"movie\" value=\"svadba.swf\">\r\n  <param name=\"quality\" value=\"high\">\r\n  <param name=\"bgcolor\" value=\"#FFFFFF\">\r\n  <embed name=\"svadba\" src=\"svadba.swf\" quality=\"high\" bgcolor=\"#FFFFFF\"\r\n    width=\"289\" height=\"200\"\r\n    type=\"application/x-shockwave-flash\"\r\n    pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\">\r\n  </embed>\r\n</object>\r\n</center>\r\n\r\n", "asfd", "26. 8. 2003&nbsp;&nbsp;22:51:28", "");
INSERT INTO gb VALUES("124", "\r\n\r\n<center>\r\n<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"\r\n  codebase=\"http://active.macromedia.com/flash4/cabs/swflash.cab#version=4,0,0,0\"\r\n  id=\"svadba\" width=\"289\" height=\"200\">\r\n  <param name=\"movie\" value=\"svadba.swf\">\r\n  <param name=\"quality\" value=\"high\">\r\n  <param name=\"bgcolor\" value=\"#FFFFFF\">\r\n  <embed name=\"svadba\" src=\"svadba.swf\" quality=\"high\" bgcolor=\"#FFFFFF\"\r\n    width=\"289\" height=\"200\"\r\n    type=\"application/x-shockwave-flash\"\r\n    pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\">\r\n  </embed>\r\n</object>\r\n</center>\r\n\r\n", "asfd", "26. 8. 2003&nbsp;&nbsp;22:53:08", "");
INSERT INTO gb VALUES("125", "fasfl asdfljasdfl jasf\r\nas d\r\nfasd\r\nf\r\nasdf\r\n as\r\ndfs&nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/grin.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/sad.gif\">&nbsp; &nbsp;<img src=\"./imgs/smiles/kiss.gif\">&nbsp; ", "jani micak", "1. 9. 2003&nbsp;&nbsp;20:28:18", "");
INSERT INTO gb VALUES("126", "asdf", "asdf", "12. 4. 2004&nbsp;&nbsp;16:01:50", "100.10.10.177");
INSERT INTO gb VALUES("127", "asfBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CE \r\nBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CE\r\nBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEBOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CE", "sdf", "14. 11. 2004&nbsp;&nbsp;10:49:12", "127.0.0.1");
INSERT INTO gb VALUES("128", "<b>asfasfasfd</b> ", "sdf", "28. 11. 2004&nbsp;&nbsp;13:07:27", "127.0.0.1");


#
# Table structure for table 'oznamy'
#

CREATE TABLE oznamy (
  id int(3) NOT NULL auto_increment,
  nazov text NOT NULL,
  text text NOT NULL,
  platnost_od date NOT NULL default '0000-00-00',
  platnost_do date NOT NULL default '0000-00-00',
  viditelnost smallint(5) unsigned default NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Dumping data for table 'oznamy'
#



#
# Table structure for table 'oznamy_fara'
#

CREATE TABLE oznamy_fara (
  id int(3) NOT NULL auto_increment,
  nazov text NOT NULL,
  text text NOT NULL,
  pridany date default NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Dumping data for table 'oznamy_fara'
#

INSERT INTO oznamy_fara VALUES("7", "Upratovanie", "sdfds\r\nsd\r\nfsd\r\nf\r\nds\r\n\r\ncvc\r\n", "2004-11-28");
INSERT INTO oznamy_fara VALUES("8", "novy oznam", "toto je <b>novy oznam</b> ", "2004-12-04");
INSERT INTO oznamy_fara VALUES("9", "asd", "asdf", "2004-12-05");


#
# Table structure for table 'titles'
#

CREATE TABLE titles (
  id tinyint(3) unsigned NOT NULL default '0',
  text text,
  locate tinyint(3) unsigned default NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY id (id),
  KEY id_2 (id)
) TYPE=MyISAM;



#
# Dumping data for table 'titles'
#

INSERT INTO titles VALUES("1", "BOHOSLU�OBN� PORIADOK NA TݎDE� PO 32. NEDELI V CEZRO�NOM OBDOB�", "1");


#
# Table structure for table 'users'
#

CREATE TABLE users (
  id int(3) unsigned NOT NULL auto_increment,
  login varchar(20) NOT NULL default '0',
  password varchar(60) NOT NULL default '0',
  privilege int(3) unsigned default '0',
  email varchar(30) NOT NULL default '',
  meno text,
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Dumping data for table 'users'
#

INSERT INTO users VALUES("1", "admin", "ed878f1dc8cd0ad7a96f8d6e905c0b6a", "1", "stefko@seznam.cz", "Ivan Stefko");
INSERT INTO users VALUES("10", "marek", "28a34010e84b881fb087359c7e280a08", "2", "asdf@asd.sk", "Marek Andras");
INSERT INTO users VALUES("6", "peto", "0ff68179820a88f04344b8962fed3d2b", "3", "asdf@a.sk", "Peto Kosco");
