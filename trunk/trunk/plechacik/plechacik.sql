# HeidiSQL Dump 
#
# --------------------------------------------------------
# Host:                 127.0.0.1
# Database:             plechacik
# Server version:       5.1.30-community-log
# Server OS:            Win32
# Target-Compatibility: Standard ANSI SQL
# HeidiSQL version:     3.2 Revision: 1129
# --------------------------------------------------------

/*!40100 SET CHARACTER SET cp1250;*/
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ANSI';*/
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;*/


#
# Database structure for database 'plechacik'
#

CREATE DATABASE /*!32312 IF NOT EXISTS*/ "plechacik" /*!40100 DEFAULT CHARACTER SET latin1 */;

USE "plechacik";


#
# Table structure for table 'aktuality'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "aktuality" (
  "id" tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  "nazov" text,
  "pridany" date DEFAULT NULL,
  "text" text,
  PRIMARY KEY ("id"),
  KEY "id" ("id")
) AUTO_INCREMENT=20 /*!40100 DEFAULT CHARSET=latin1*/;



#
# Dumping data for table 'aktuality'
#

LOCK TABLES "aktuality" WRITE;
/*!40000 ALTER TABLE "aktuality" DISABLE KEYS;*/
REPLACE INTO "aktuality" ("id", "nazov", "pridany", "text") VALUES
	(5,'toto je novy oznam','2004-06-06','asdf
asdf
sd
f');
REPLACE INTO "aktuality" ("id", "nazov", "pridany", "text") VALUES
	(7,'dfg','2004-06-06','ds');
REPLACE INTO "aktuality" ("id", "nazov", "pridany", "text") VALUES
	(8,'lo;og gsdgsdg','2004-06-06','<p>dfe35353 ad ADA AASFAS F</p>
<p>&nbsp;</p>');
REPLACE INTO "aktuality" ("id", "nazov", "pridany", "text") VALUES
	(10,'45','2004-06-06','<p>23asdf</p>');
REPLACE INTO "aktuality" ("id", "nazov", "pridany", "text") VALUES
	(12,'raz dva','2004-12-05','newsText12');
REPLACE INTO "aktuality" ("id", "nazov", "pridany", "text") VALUES
	(14,'ahj','2009-02-06','<p>sfasf asdfas faAdaDAS asdfa sfasfasd</p>');
REPLACE INTO "aktuality" ("id", "nazov", "pridany", "text") VALUES
	(13,'toto je test3','2004-12-05','<p>newsText13 asdf asdf</p>');
REPLACE INTO "aktuality" ("id", "nazov", "pridany", "text") VALUES
	(15,'asdfasdf','2009-02-06','<p>tento subor si mozete stiahntu tuto:&nbsp;<a href="/plechacik/userfiles/file/files/php.zip">plechacik/userfiles/file/files/php.zip</a></p>');
REPLACE INTO "aktuality" ("id", "nazov", "pridany", "text") VALUES
	(16,'asdf','2009-02-06','<p><a href="/plechacik/userfiles/file/files/php.zip">afasdf</a> asdfasdfasdfasdfasdf&nbsp;</p>');
REPLACE INTO "aktuality" ("id", "nazov", "pridany", "text") VALUES
	(17,'vzxczxcv','2009-02-20','<p><a href="http:///tmp/file/php.zip">/tmp/file/php.zip</a></p>');
REPLACE INTO "aktuality" ("id", "nazov", "pridany", "text") VALUES
	(18,'sdfsd','2009-02-20','<p><a href="http:///plechacik/tmp/file/php.zip"><br />
</a></p>
<p>&nbsp;</p>
<p><a href="/tmp/file/platba_tatrabanka.png">asdf</a></p>');
REPLACE INTO "aktuality" ("id", "nazov", "pridany", "text") VALUES
	(19,'asf','2009-02-20','<p><a href="www.plechotice.sk/plechacik/tmp/file/zeleza.jpg">asdf</a></p>');
/*!40000 ALTER TABLE "aktuality" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'anketa'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "anketa" (
  "id" int(3) unsigned NOT NULL AUTO_INCREMENT,
  "otazka" varchar(100) DEFAULT '0',
  "odpoved_1" varchar(50) DEFAULT '0',
  "odpoved_2" varchar(50) DEFAULT '0',
  "odpoved_3" varchar(50) DEFAULT '0',
  "odpoved_4" varchar(50) DEFAULT '0',
  "platnost_od" date NOT NULL DEFAULT '0000-00-00',
  "platnost_do" date NOT NULL DEFAULT '0000-00-00',
  "pocet_1" int(3) unsigned DEFAULT '0',
  "pocet_2" int(3) unsigned DEFAULT '0',
  "pocet_3" int(3) unsigned DEFAULT '0',
  "pocet_4" int(3) unsigned DEFAULT '0',
  PRIMARY KEY ("id")
) AUTO_INCREMENT=12 /*!40100 DEFAULT CHARSET=latin1*/;



#
# Dumping data for table 'anketa'
#

LOCK TABLES "anketa" WRITE;
/*!40000 ALTER TABLE "anketa" DISABLE KEYS;*/
REPLACE INTO "anketa" ("id", "otazka", "odpoved_1", "odpoved_2", "odpoved_3", "odpoved_4", "platnost_od", "platnost_do", "pocet_1", "pocet_2", "pocet_3", "pocet_4") VALUES
	('1','Kedy sa potopil titanic?','este sa nepotopil, lebo nemal na to cas.','1912','co je titanic?','o com tocis?','2004-07-24','2006-07-24','24','3','4','38');
REPLACE INTO "anketa" ("id", "otazka", "odpoved_1", "odpoved_2", "odpoved_3", "odpoved_4", "platnost_od", "platnost_do", "pocet_1", "pocet_2", "pocet_3", "pocet_4") VALUES
	('6','Tak toto je nova anketa. Je tak?','ano','nie','mozno','neviem','2003-07-25','2003-07-25','4','5','1','2');
REPLACE INTO "anketa" ("id", "otazka", "odpoved_1", "odpoved_2", "odpoved_3", "odpoved_4", "platnost_od", "platnost_do", "pocet_1", "pocet_2", "pocet_3", "pocet_4") VALUES
	('7','Akého chatovacieho klienta používate?','IRC','PonyChat','ICQ','o com tocis?','2003-07-22','2003-07-22','2','2','2','1');
REPLACE INTO "anketa" ("id", "otazka", "odpoved_1", "odpoved_2", "odpoved_3", "odpoved_4", "platnost_od", "platnost_do", "pocet_1", "pocet_2", "pocet_3", "pocet_4") VALUES
	('8','To?í sa ?ervoto??','Áno','Nie','Iba ak žerie koloto?','O ?om to?iš?','2003-07-25','2003-08-31','6','2','21','3');
REPLACE INTO "anketa" ("id", "otazka", "odpoved_1", "odpoved_2", "odpoved_3", "odpoved_4", "platnost_od", "platnost_do", "pocet_1", "pocet_2", "pocet_3", "pocet_4") VALUES
	('11','Myslíte si, že Jan?o Micák dokon?í SŠ protek?ne?','To je predsa jané, že áno','Nie, lebo ?aba mu pomáhal','Ja chcem jolíkasdf','Nie dokon?il ju za peniaze :o)','2003-08-10','2003-08-15','2','3','0','1');
/*!40000 ALTER TABLE "anketa" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'fara_omse'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "fara_omse" (
  "id" tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  "den" tinyint(3) unsigned DEFAULT '0',
  "miesto" tinyint(3) unsigned DEFAULT '0',
  "cas" text,
  PRIMARY KEY ("id"),
  UNIQUE KEY "id" ("id"),
  KEY "id_2" ("id")
) AUTO_INCREMENT=3 /*!40100 DEFAULT CHARSET=latin1*/;



#
# Dumping data for table 'fara_omse'
#

LOCK TABLES "fara_omse" WRITE;
/*!40000 ALTER TABLE "fara_omse" DISABLE KEYS;*/
REPLACE INTO "fara_omse" ("id", "den", "miesto", "cas") VALUES
	(1,1,1,'9:00');
REPLACE INTO "fara_omse" ("id", "den", "miesto", "cas") VALUES
	(2,1,1,'09:00');
/*!40000 ALTER TABLE "fara_omse" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'fara_slavenie'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "fara_slavenie" (
  "id" tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  "datum" text,
  "slavenie" text,
  "obetovana" varchar(64) DEFAULT NULL,
  PRIMARY KEY ("id"),
  KEY "id" ("id")
) AUTO_INCREMENT=8 /*!40100 DEFAULT CHARSET=latin1*/;



#
# Dumping data for table 'fara_slavenie'
#

LOCK TABLES "fara_slavenie" WRITE;
/*!40000 ALTER TABLE "fara_slavenie" DISABLE KEYS;*/
REPLACE INTO "fara_slavenie" ("id", "datum", "slavenie", "obetovana") VALUES
	(1,'31. 41. 2004','toto je privelky oznam ktory tam bude umiestneny takze testujem ako sa to bude spravat','po');
REPLACE INTO "fara_slavenie" ("id", "datum", "slavenie", "obetovana") VALUES
	(2,'2.2.2004','slavenie utorok','-');
REPLACE INTO "fara_slavenie" ("id", "datum", "slavenie", "obetovana") VALUES
	(3,'3.3.2004','slavenie stredu','we');
REPLACE INTO "fara_slavenie" ("id", "datum", "slavenie", "obetovana") VALUES
	(4,'4.4.2004','slavenie stvrtok','rt');
REPLACE INTO "fara_slavenie" ("id", "datum", "slavenie", "obetovana") VALUES
	(5,'5.5.2004','slavenie piatok','-');
REPLACE INTO "fara_slavenie" ("id", "datum", "slavenie", "obetovana") VALUES
	(6,'6.6.2004','slavenie sobota','et');
REPLACE INTO "fara_slavenie" ("id", "datum", "slavenie", "obetovana") VALUES
	(7,'7.7..2004','slavenie nedela','23');
/*!40000 ALTER TABLE "fara_slavenie" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'futbalovy_klub'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "futbalovy_klub" (
  "id" int(3) unsigned NOT NULL AUTO_INCREMENT,
  "content" mediumtext,
  PRIMARY KEY ("id"),
  KEY "id" ("id")
) AUTO_INCREMENT=4 /*!40100 DEFAULT CHARSET=latin1*/;



#
# Dumping data for table 'futbalovy_klub'
#

LOCK TABLES "futbalovy_klub" WRITE;
/*!40000 ALTER TABLE "futbalovy_klub" DISABLE KEYS;*/
REPLACE INTO "futbalovy_klub" ("id", "content") VALUES
	('1','<p>&nbsp;</p>
<table cellspacing="1" cellpadding="1" border="0" style="width: 750px; height: 388px;">
    <tbody>
        <tr>
            <td valign="top" align="left">
            <p><span style="font-size: small;"><span style="color: rgb(51, 51, 153);"><b>Z&aacute;pasy 13. kola, nede?a - 02.11.08: </b></span></span></p>
            <table cellspacing="1" cellpadding="1" border="0" style="width: 256px; height: 143px;">
                <tbody>
                    <tr>
                        <td><span style="font-size: small;">Leles - Se?. B Dargov</span></td>
                        <td><span style="font-size: small;">&nbsp;2:1</span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;">N. Ruskov - Hra?</span></td>
                        <td><span style="font-size: small;">&nbsp;3:4</span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;">Kr&aacute;?. Chlmec - &Uacute;por</span></td>
                        <td><span style="font-size: small;">&nbsp;1:0</span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;">Z. Hradi&scaron;te - Z. Teplica</span></td>
                        <td>&nbsp;<span style="font-size: small;">3:1</span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;"><b>Plechotice - Brehov</b></span></td>
                        <td><span style="font-size: small;"><b>&nbsp;0:1 </b></span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;">Voj?ice - Streda n/ Bodrogom</span></td>
                        <td><span style="font-size: small;">&nbsp;2:5</span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;">Bo? - Parchovany</span></td>
                        <td>&nbsp;<span style="font-size: small;">2:1</span></td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <p><span style="color: rgb(51, 51, 153);"><span style="font-size: small;"><b>Z&aacute;pasy 12. kola, nede?a - 26.10.08:</b></span></span>&nbsp;</p>
            <table cellspacing="1" cellpadding="1" border="0" style="width: 256px; height: 143px;">
                <tbody>
                    <tr>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;">Hra? - Leles</span></td>
                        <td><span style="font-size: small;">&nbsp;1:2</span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;">Z. Teplica - Voj?ice</span></td>
                        <td><span style="font-size: small;">&nbsp;2:1</span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;">Brehov - Kr&aacute;?. Chlmec</span></td>
                        <td><span style="font-size: small;">&nbsp;3:0</span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;">Streda n/ Bodrogom - N. Ruskov</span></td>
                        <td>&nbsp;<span style="font-size: small;">5:0</span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;"><b>Se?. B Dargov - Plechotice</b></span></td>
                        <td><span style="font-size: small;"><b>&nbsp;1:2 </b></span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;">&Uacute;por - Bo?</span></td>
                        <td><span style="font-size: small;">&nbsp;2:1</span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: small;">Parchovany - Z. Hradi&scaron;te</span></td>
                        <td>&nbsp;<span style="font-size: small;">1:0</span></td>
                    </tr>
                </tbody>
            </table>
            </td>
            <td valign="top" align="left">
            <p><span style="color: rgb(0, 0, 128);"><span style="font-size: larger;"><strong><span class="oznamNazov">I. TRIEDA  DOSPEL&Iacute; - &uacute;?astn&iacute;ci</span></strong></span></span><span class="small"><br />
            </span></p>
            <ol>
                <li><span style="font-size: small;">TJ &Scaron;M Streda n/Bodrogom</span></li>
                <li><span style="font-size: small;">Hra?</span></li>
                <li><span style="font-size: small;">Se?ovce B Dargov</span></li>
                <li><span style="font-size: small;">Brehov</span></li>
                <li><span style="font-size: small;">FK Tatran &Uacute;por</span></li>
                <li><span style="font-size: small;">TJ Družstevn&iacute;k Parchovany</span></li>
                <li><span style="font-size: small;">TJ Družstevn&iacute;k Z. Hradi&scaron;te</span></li>
                <li><span style="font-size: small;">Bo?</span></li>
                <li><span style="font-size: small;">TJ Slavoj Kr&aacute;?. Chlmec B</span></li>
                <li><span style="font-size: small;"><b>TJ Družstevn&iacute;k Plechotice</b></span></li>
                <li><span style="font-size: small;">Leles</span></li>
                <li><span style="font-size: small;">Nov&yacute; Ruskov</span></li>
                <li><span style="font-size: small;">Družstevn&iacute;k Voj?ice</span></li>
                <li><span style="font-size: small;">FK Z. Teplica</span></li>
            </ol>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p><span style="color: rgb(51, 51, 153);"><span style="font-size: small;"><strong>Tabu?ka:</strong></span></span></p>
<table cellspacing="1" cellpadding="1" border="1" style="width: 452px; height: 297px;">
    <tbody>
        <tr>
            <td align="right"><span style="font-size: small;">1.<br />
            </span></td>
            <td><span style="font-size: small;"><b>Streda n/ Bodrogom</b></span></td>
            <td><strong><span style="font-size: small;">13<br />
            </span></strong></td>
            <td><strong><span style="font-size: small;">10</span></strong><span style="font-size: small;"><br />
            </span></td>
            <td><strong><span style="font-size: small;">0</span></strong><span style="font-size: small;"><br />
            </span></td>
            <td align="right"><strong><span style="font-size: small;">3</span></strong><span style="font-size: small;"><br />
            </span></td>
            <td><strong><span style="font-size: small;">45:17</span></strong><span style="font-size: small;"><br />
            </span></td>
            <td align="right"><strong><span style="font-size: small;">30</span></strong><span style="font-size: small;"><br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">2.<br />
            </span></td>
            <td><span style="font-size: small;">Voj?ice</span></td>
            <td><span style="font-size: small;">13<br />
            </span></td>
            <td><span style="font-size: small;">7<br />
            </span></td>
            <td><span style="font-size: small;">2<br />
            </span></td>
            <td align="right"><span style="font-size: small;">4<br />
            </span></td>
            <td><span style="font-size: small;">31:20<br />
            </span></td>
            <td align="right"><span style="font-size: small;">23<br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">3.<br />
            </span></td>
            <td><span style="font-size: small;">&Uacute;por</span></td>
            <td><span style="font-size: small;">13<br />
            </span></td>
            <td><span style="font-size: small;">7<br />
            </span></td>
            <td><span style="font-size: small;">2<br />
            </span></td>
            <td align="right"><span style="font-size: small;">4<br />
            </span></td>
            <td><span style="font-size: small;">29:19<br />
            </span></td>
            <td align="right"><span style="font-size: small;">23<br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">4.<br />
            </span></td>
            <td><span style="font-size: small;"><b>Plechotice                    	</b></span></td>
            <td><strong><span style="font-size: small;">13</span></strong><span style="font-size: small;"><br />
            </span></td>
            <td><strong><span style="font-size: small;">7</span></strong><span style="font-size: small;"><br />
            </span></td>
            <td><strong><span style="font-size: small;">1<br />
            </span></strong></td>
            <td align="right"><strong><span style="font-size: small;">5</span></strong><span style="font-size: small;"><br />
            </span></td>
            <td><strong><span style="font-size: small;">21:19</span></strong><span style="font-size: small;"><br />
            </span></td>
            <td align="right"><strong><span style="font-size: small;">22</span></strong><span style="font-size: small;"><br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">5.<br />
            </span></td>
            <td><span style="font-size: small;">Leles</span></td>
            <td><span style="font-size: small;">13<br />
            </span></td>
            <td><span style="font-size: small;">7<br />
            </span></td>
            <td><span style="font-size: small;">1<br />
            </span></td>
            <td align="right"><span style="font-size: small;">5<br />
            </span></td>
            <td><span style="font-size: small;">28:29<br />
            </span></td>
            <td align="right"><span style="font-size: small;">22<br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">6.<br />
            </span></td>
            <td><span style="font-size: small;">Bo?</span></td>
            <td><span style="font-size: small;">13<br />
            </span></td>
            <td><span style="font-size: small;">6<br />
            </span></td>
            <td><span style="font-size: small;">2<br />
            </span></td>
            <td align="right"><span style="font-size: small;">5<br />
            </span></td>
            <td><span style="font-size: small;">28:18<br />
            </span></td>
            <td align="right"><span style="font-size: small;">20<br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">7.<br />
            </span></td>
            <td><span style="font-size: small;">Parchovany</span></td>
            <td><span style="font-size: small;">13<br />
            </span></td>
            <td><span style="font-size: small;">6<br />
            </span></td>
            <td><span style="font-size: small;">2<br />
            </span></td>
            <td align="right"><span style="font-size: small;">5<br />
            </span></td>
            <td><span style="font-size: small;">24:21<br />
            </span></td>
            <td align="right"><span style="font-size: small;">20<br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">8.<br />
            </span></td>
            <td><span style="font-size: small;">Brehov</span></td>
            <td><span style="font-size: small;">13<br />
            </span></td>
            <td><span style="font-size: small;">5<br />
            </span></td>
            <td><span style="font-size: small;">4<br />
            </span></td>
            <td align="right"><span style="font-size: small;">4<br />
            </span></td>
            <td><span style="font-size: small;">21:21<br />
            </span></td>
            <td align="right"><span style="font-size: small;">19<br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">9.<br />
            </span></td>
            <td><span style="font-size: small;">Z. Teplica</span></td>
            <td><span style="font-size: small;">13<br />
            </span></td>
            <td><span style="font-size: small;">4<br />
            </span></td>
            <td><span style="font-size: small;">5<br />
            </span></td>
            <td align="right"><span style="font-size: small;">4<br />
            </span></td>
            <td><span style="font-size: small;">15:15<br />
            </span></td>
            <td align="right"><span style="font-size: small;">17<br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">10.<br />
            </span></td>
            <td><span style="font-size: small;">Hra?</span></td>
            <td><span style="font-size: small;">13<br />
            </span></td>
            <td><span style="font-size: small;">5<br />
            </span></td>
            <td><span style="font-size: small;">2<br />
            </span></td>
            <td align="right"><span style="font-size: small;">6<br />
            </span></td>
            <td><span style="font-size: small;">29:33<br />
            </span></td>
            <td align="right"><span style="font-size: small;">17<br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">11.<br />
            </span></td>
            <td><span style="font-size: small;">Z. Hradi&scaron;te</span></td>
            <td><span style="font-size: small;">13<br />
            </span></td>
            <td><span style="font-size: small;">5<br />
            </span></td>
            <td><span style="font-size: small;">1<br />
            </span></td>
            <td align="right"><span style="font-size: small;">7<br />
            </span></td>
            <td><span style="font-size: small;">22:23<br />
            </span></td>
            <td align="right"><span style="font-size: small;">16<br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">12.<br />
            </span></td>
            <td><span style="font-size: small;">N. Ruskov</span></td>
            <td><span style="font-size: small;">13<br />
            </span></td>
            <td><span style="font-size: small;">3<br />
            </span></td>
            <td><span style="font-size: small;">4<br />
            </span></td>
            <td align="right"><span style="font-size: small;">6<br />
            </span></td>
            <td><span style="font-size: small;">24:31<br />
            </span></td>
            <td align="right"><span style="font-size: small;">13<br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">13.<br />
            </span></td>
            <td><span style="font-size: small;">Kr&aacute;?. Chlmec &quot;B&quot;</span></td>
            <td><span style="font-size: small;">13<br />
            </span></td>
            <td><span style="font-size: small;">3<br />
            </span></td>
            <td><span style="font-size: small;">0<br />
            </span></td>
            <td align="right"><span style="font-size: small;">10<br />
            </span></td>
            <td><span style="font-size: small;">7:38<br />
            </span></td>
            <td align="right"><span style="font-size: small;">9<br />
            </span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">14.</span></td>
            <td><span style="font-size: small;">Se?ovce &quot;B&quot; Dargov</span></td>
            <td><span style="font-size: small;">13</span></td>
            <td><span style="font-size: small;">2</span></td>
            <td><span style="font-size: small;">2</span></td>
            <td align="right"><span style="font-size: small;">9</span></td>
            <td><span style="font-size: small;">17:37</span></td>
            <td align="right"><span style="font-size: small;">8</span></td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>');
REPLACE INTO "futbalovy_klub" ("id", "content") VALUES
	('2','<p style="margin-left: 40px;"><span style="color: rgb(51, 51, 153);"><strong><span style="font-size: small;"><span class="oznamNazov">I. trieda dorast &quot;A&quot; skupina</span></span></strong></span><span class="small"><br />
</span></p>
<p><span style="font-size: small;"><b>Z&aacute;pasy 11. kola, 01.11.2008 : </b></span></p>
<table width="200" cellspacing="1" cellpadding="1" border="0">
    <tbody>
        <tr>
            <td><span style="font-size: small;">Hra? - M. Ozorovce</span></td>
            <td><span style="font-size: small;">1:0</span></td>
        </tr>
        <tr>
            <td><span style="font-size: small;">Kuzmice - &Uacute;por</span></td>
            <td><span style="font-size: small;">2:0</span></td>
        </tr>
        <tr>
            <td><span style="font-size: small;"><b>Kysta - Plechotice</b></span></td>
            <td><span style="font-size: small;">1:1</span></td>
        </tr>
        <tr>
            <td><span style="font-size: small;">N. Žipov - Cejkov</span></td>
            <td><span style="font-size: small;">3:0</span></td>
        </tr>
        <tr>
            <td><span style="font-size: small;">Ve?aty - Dvorianky</span></td>
            <td><span style="font-size: small;">0:13</span></td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p><strong><span style="font-size: small;">Tabu?ka:</span></strong></p>
<table cellspacing="1" cellpadding="1" border="1" style="width: 404px; height: 255px;">
    <tbody>
        <tr>
            <td align="right"><span style="font-size: small;">1.<br />
            </span></td>
            <td><span style="font-size: small;">Kuzmice</span></td>
            <td><span style="font-size: small;">11</span></td>
            <td><span style="font-size: small;">10</span></td>
            <td><span style="font-size: small;">0&nbsp;&nbsp; <br />
            </span></td>
            <td><span style="font-size: small;">1&nbsp; <br />
            </span></td>
            <td><span style="font-size: small;">58:11<br />
            </span></td>
            <td><span style="font-size: small;">30</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">2.</span></td>
            <td><span style="font-size: small;">&Uacute;por</span></td>
            <td><span style="font-size: small;">11</span></td>
            <td><span style="font-size: small;">8<br />
            </span></td>
            <td><span style="font-size: small;">0</span></td>
            <td><span style="font-size: small;">3</span></td>
            <td><span style="font-size: small;">60:14</span></td>
            <td><span style="font-size: small;">24</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">3.</span></td>
            <td><span style="font-size: small;">Cejkov</span></td>
            <td><span style="font-size: small;">11</span></td>
            <td><span style="font-size: small;">7</span></td>
            <td><span style="font-size: small;">0</span></td>
            <td><span style="font-size: small;">4</span></td>
            <td><span style="font-size: small;">34:18</span></td>
            <td><span style="font-size: small;">21</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">4.</span></td>
            <td><span style="font-size: small;">Hra?</span></td>
            <td><span style="font-size: small;">11</span></td>
            <td><span style="font-size: small;">7</span></td>
            <td><span style="font-size: small;">0</span></td>
            <td><span style="font-size: small;">4</span></td>
            <td><span style="font-size: small;">32:23</span></td>
            <td><span style="font-size: small;">21</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">5.</span></td>
            <td><span style="font-size: small;">Dvorianky</span></td>
            <td><span style="font-size: small;">11</span></td>
            <td><span style="font-size: small;">6</span></td>
            <td><span style="font-size: small;">2</span></td>
            <td><span style="font-size: small;">3</span></td>
            <td><span style="font-size: small;">64:20</span></td>
            <td><span style="font-size: small;">20</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">6.</span></td>
            <td><span style="font-size: small;">M. Ozorovce</span></td>
            <td><span style="font-size: small;">11</span></td>
            <td><span style="font-size: small;">6</span></td>
            <td><span style="font-size: small;">1</span></td>
            <td><span style="font-size: small;">4</span></td>
            <td><span style="font-size: small;">53:23</span></td>
            <td><span style="font-size: small;">19</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">7.</span></td>
            <td><span style="font-size: small;">N. Žipov </span></td>
            <td><span style="font-size: small;">11</span></td>
            <td><span style="font-size: small;">6</span></td>
            <td><span style="font-size: small;">0</span></td>
            <td><span style="font-size: small;">5</span></td>
            <td><span style="font-size: small;">64:29</span></td>
            <td><span style="font-size: small;">18</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">8.</span></td>
            <td><span style="font-size: small;">Brehov                        	</span></td>
            <td><span style="font-size: small;">10<br />
            </span></td>
            <td><span style="font-size: small;">4</span></td>
            <td><span style="font-size: small;">0</span></td>
            <td><span style="font-size: small;">6</span></td>
            <td><span style="font-size: small;">10:80</span></td>
            <td><span style="font-size: small;">12</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">9.</span></td>
            <td><span style="font-size: small;">N. Ruskov</span></td>
            <td><span style="font-size: small;">10</span></td>
            <td><span style="font-size: small;">3</span></td>
            <td><span style="font-size: small;">1</span></td>
            <td><span style="font-size: small;">6</span></td>
            <td><span style="font-size: small;">20:37</span></td>
            <td><span style="font-size: small;">10</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">10.</span></td>
            <td><span style="font-size: small;"><b>Plechotice</b></span></td>
            <td><strong><span style="font-size: small;">11</span></strong><span style="font-size: small;"><br />
            </span></td>
            <td><strong><span style="font-size: small;">2</span></strong></td>
            <td><strong><span style="font-size: small;">2</span></strong></td>
            <td><strong><span style="font-size: small;">7</span></strong></td>
            <td><strong><span style="font-size: small;">11:32</span></strong></td>
            <td><strong><span style="font-size: small;">8</span></strong></td>
        </tr>
        <tr>
            <td align="right">
            <p><span style="font-size: small;">11.</span></p>
            </td>
            <td><span style="font-size: small;">Ve?aty                        	</span></td>
            <td><span style="font-size: small;">11</span></td>
            <td><span style="font-size: small;">2</span></td>
            <td><span style="font-size: small;">0</span></td>
            <td><span style="font-size: small;">9</span></td>
            <td><span style="font-size: small;">13:88</span></td>
            <td><span style="font-size: small;">6</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">12.</span></td>
            <td><span style="font-size: small;">Kysta</span></td>
            <td><span style="font-size: small;">11</span></td>
            <td><span style="font-size: small;">0</span></td>
            <td><span style="font-size: small;">2</span></td>
            <td><span style="font-size: small;">9</span></td>
            <td><span style="font-size: small;">18:62</span></td>
            <td><span style="font-size: small;">2</span></td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>');
REPLACE INTO "futbalovy_klub" ("id", "content") VALUES
	('3','<p style="margin-left: 40px;"><span style="color: rgb(51, 51, 153);"><strong><span style="font-size: small;"><span class="oznamNazov">Žiaci &quot;A&quot; skupina</span></span></strong></span><span class="small"><br />
</span></p>
<p><span style="font-size: small;"><b>Z&aacute;pasy 11. kola, 01.11.2008 : </b></span></p>
<table width="200" cellspacing="1" cellpadding="1" border="0">
    <tbody>
        <tr>
            <td><span style="font-size: small;">Kuzmice - &Uacute;por</span></td>
            <td><span style="font-size: small;">5:1</span></td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p><strong><span style="font-size: small;">Tabu?ka:</span></strong></p>
<table cellspacing="1" cellpadding="1" border="1" style="width: 404px; height: 204px;">
    <tbody>
        <tr>
            <td align="right"><span style="font-size: small;">1.<br />
            </span></td>
            <td><span style="font-size: small;">Kuzmice</span></td>
            <td><span style="font-size: small;">7</span></td>
            <td><span style="font-size: small;">6</span></td>
            <td><span style="font-size: small;">0 <br />
            </span></td>
            <td><span style="font-size: small;">1<br />
            </span></td>
            <td><span style="font-size: small;">56:7<br />
            </span></td>
            <td><span style="font-size: small;">18</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">2.</span></td>
            <td><span style="font-size: small;">&Uacute;por</span></td>
            <td><span style="font-size: small;">7</span></td>
            <td><span style="font-size: small;">5<br />
            </span></td>
            <td><span style="font-size: small;">0</span></td>
            <td>2</td>
            <td><span style="font-size: small;">50:9</span></td>
            <td><span style="font-size: small;">15</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">3.</span></td>
            <td><span style="font-size: small;">Cejkov</span></td>
            <td><span style="font-size: small;">7</span></td>
            <td><span style="font-size: small;">5</span></td>
            <td><span style="font-size: small;">0</span></td>
            <td><span style="font-size: small;">2</span></td>
            <td><span style="font-size: small;">39:8</span></td>
            <td><span style="font-size: small;">15</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">4.</span></td>
            <td><span style="font-size: small;">Hra?</span></td>
            <td><span style="font-size: small;">7</span></td>
            <td><span style="font-size: small;">5</span></td>
            <td><span style="font-size: small;">2</span></td>
            <td><span style="font-size: small;">2</span></td>
            <td><span style="font-size: small;">44:16</span></td>
            <td><span style="font-size: small;">15</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">5.</span></td>
            <td><span style="font-size: small;">Dvorianky</span></td>
            <td><span style="font-size: small;">7</span></td>
            <td><span style="font-size: small;">4</span></td>
            <td><span style="font-size: small;">0</span></td>
            <td><span style="font-size: small;">3</span></td>
            <td><span style="font-size: small;">28:17</span></td>
            <td><span style="font-size: small;">12</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">6.</span></td>
            <td><span style="font-size: small;">Brehov                        	</span></td>
            <td><span style="font-size: small;">6<br />
            </span></td>
            <td><span style="font-size: small;">1</span></td>
            <td><span style="font-size: small;">0</span></td>
            <td><span style="font-size: small;">5</span></td>
            <td><span style="font-size: small;">6:46</span></td>
            <td><span style="font-size: small;">3</span></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">7.</span></td>
            <td><span style="font-size: small;"><b>Plechotice</b></span></td>
            <td><strong><span style="font-size: small;">7</span></strong><span style="font-size: small;"><br />
            </span></td>
            <td><strong><span style="font-size: small;">1</span></strong></td>
            <td><strong><span style="font-size: small;">1</span></strong></td>
            <td><strong><span style="font-size: small;">6</span></strong></td>
            <td><strong><span style="font-size: small;">9:59</span></strong></td>
            <td><strong><span style="font-size: small;">3</span></strong></td>
        </tr>
        <tr>
            <td align="right"><span style="font-size: small;">8.</span></td>
            <td><span style="font-size: small;">N. Ruskov<b><br />
            </b></span></td>
            <td><span style="font-size: small;">6</span></td>
            <td><span style="font-size: small;">0</span></td>
            <td><span style="font-size: small;">2</span></td>
            <td><span style="font-size: small;">6</span></td>
            <td><span style="font-size: small;">2:72</span></td>
            <td><span style="font-size: small;">0</span></td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>');
/*!40000 ALTER TABLE "futbalovy_klub" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'gb'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "gb" (
  "id" int(3) NOT NULL AUTO_INCREMENT,
  "text" text NOT NULL,
  "od" text NOT NULL,
  "datum" varchar(60) NOT NULL DEFAULT '',
  "ip" text NOT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "id" ("id")
) AUTO_INCREMENT=129 /*!40100 DEFAULT CHARSET=latin1*/;



#
# Dumping data for table 'gb'
#

LOCK TABLES "gb" WRITE;
/*!40000 ALTER TABLE "gb" DISABLE KEYS;*/
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(1,'','asdfasdf','','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(2,'','ivan','','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(3,'toto je sprava ktora tam bude napisana
v novom riadku toto bude
 a toto tiez','ivan','','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(4,'toto je sprava ktora tam bude napisana
v novom riadku toto bude
 a toto tiez','ivan','','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(5,'&nbsp;<img src="./imgs/smiles/smiley.gif">&nbsp; &nbsp;<img src="./imgs/smiles/wink.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; &nbsp;<im','ivan','','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(6,'&nbsp;<img src="./imgs/smiles/smiley.gif">&nbsp; &nbsp;<img src="./imgs/smiles/wink.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/sad.gif">&nbsp; &nbsp;<img src="./imgs/smiles/undecided.gif">&nbsp; &nbsp;<img src="./imgs/smiles/cry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; ','ivan','','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(7,'tak konecne to funguje po dlhej dobe. ale bude to fungovat este aj vhodnu chvilu pretoze mam tu jeden mail. vazeny pan stefko. sme radi, ze ste oslovili nasu ersonalnu agenturu. na zaklade vasho zaujmu o nami obsadzovanu pracovnu poziciu vam oznamujeme, ze je potrebne absolvovat osobne stretnutie v nasej agenture, ktore si treba co najskor vopred telefonicky dohovorit','iuvan','','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(8,'tak konecne to funguje po dlhej dobe. ale bude to fungovat este aj vhodnu chvilu pretoze mam tu jeden mail. vazeny pan stefko. sme radi, ze ste oslovili nasu ersonalnu agenturu. na zaklade vasho zaujmu o nami obsadzovanu pracovnu poziciu vam oznamujeme, ze je potrebne absolvovat osobne stretnutie v nasej agenture, ktore si treba co najskor vopred telefonicky dohovorit&nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; ','tak tak','','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(9,'teraz idem skusat smajlikov. toto ej prvy smajlik &nbsp;<img src="./imgs/smiles/smiley.gif">&nbsp; . a teraz druhy: &nbsp;<img src="./imgs/smiles/wink.gif">&nbsp; . a este treti &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','ivan','','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(10,'&nbsp;<img src="./imgs/smiles/smiley.gif">&nbsp; 
&nbsp;<img src="./imgs/smiles/wink.gif">&nbsp; 
&nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; 
&nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; 
&nbsp;<img src="./imgs/smiles/sad.gif">&nbsp; 
&nbsp;<img src="./imgs/smiles/undecided.gif">&nbsp; 
&nbsp;<img src="./imgs/smiles/cry.gif">&nbsp; 
&nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; 
','asdf','','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(11,'teraz idem vyskusat hrube pismo. <b>Toto by malo byt napisane hrubym pismom</b>
<i>A toto kurzivou</i> ','asdf','','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(12,'teraz idem vyskusat hrube pismo. <b>Toto by malo byt napisane hrubym pismom</b>
<i>A toto kurzivou</i> ','asdf','','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(13,'asfd','afd','24. júl 2003&nbsp;&nbsp;14:29:59','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(14,'asfd','afd','24. júl 2003&nbsp;&nbsp;14:31:01','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(15,'asfd','afd','24. júl 2003&nbsp;&nbsp;14:32:02','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(16,'asfd','afd','24. júl 2003&nbsp;&nbsp;14:32:50','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(17,'asfd','afd','24. júl 2003&nbsp;&nbsp;14:34:38','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(18,'asfd','afd','24. júl 2003&nbsp;&nbsp;14:35:22','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(19,'tak konecne to funguje po dlhej dobe. ale bude to fungovat este aj vhodnu chvilu pretoze mam tu jeden mail. vazeny pan stefko. sme radi, ze ste oslovili nasu ersonalnu agenturu. na zaklade vasho zaujmu o nami obsadzovanu pracovnu poziciu vam oznamujeme, ze je potrebne absolvovat osobne stretnutie v nasej agenture, ktore si treba co najskor vopred telefonicky dohovorit   &nbsp;<img src="./imgs/smiles/cry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/sad.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','ivan stefko','24. júl 2003&nbsp;&nbsp;14:36:01','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(20,'tak konecne to funguje po dlhej dobe. ale bude to fungovat este aj vhodnu chvilu pretoze mam tu jeden mail. vazeny pan stefko. sme radi, ze ste oslovili nasu ersonalnu agenturu. na zaklade vasho zaujmu o nami obsadzovanu pracovnu poziciu vam oznamujeme, ze je potrebne absolvovat osobne stretnutie v nasej agenture, ktore si treba co najskor vopred telefonicky dohovorit   &nbsp;<img src="./imgs/smiles/cry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/sad.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','ivan stefko','24. júl 2003&nbsp;&nbsp;14:39:21','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(21,' asfdkas dfas
ta rado polak je lama &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','ivan stefko','24. júl 2003&nbsp;&nbsp;14:43:18','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(22,'&nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; &nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; ','asdf','24. júl 2003&nbsp;&nbsp;14:44:03','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(23,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:36:01','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(24,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:36:28','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(25,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:36:59','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(26,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:40:39','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(27,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:41:35','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(28,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:41:48','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(29,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:42:36','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(30,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:42:53','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(31,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:42:55','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(32,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:44:08','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(33,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:44:30','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(34,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:45:04','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(35,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:46:55','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(36,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:48:14','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(37,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:48:48','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(38,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:49:29','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(39,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:50:21','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(40,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:50:46','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(41,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:51:00','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(42,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:51:10','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(43,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:52:08','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(44,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:52:49','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(45,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:53:13','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(46,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:53:39','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(47,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:55:02','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(48,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:55:25','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(49,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:56:15','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(50,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:56:26','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(51,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:57:29','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(52,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:57:41','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(53,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:59:14','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(54,'adsf','asf','24. júl 2003&nbsp;&nbsp;15:59:39','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(55,'adsf','asf','24. júl 2003&nbsp;&nbsp;16:01:15','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(56,'adsf','asf','24. júl 2003&nbsp;&nbsp;16:04:29','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(57,'adsf','asf','24. júl 2003&nbsp;&nbsp;16:04:57','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(58,'asfsdaf&nbsp;<img src="./imgs/smiles/sad.gif">&nbsp; ','sfdds','24. júl 2003&nbsp;&nbsp;16:05:37','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(59,'asfsdaf&nbsp;<img src="./imgs/smiles/sad.gif">&nbsp; ','sfdds','24. júla 2003&nbsp;&nbsp;16:06:37','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(60,'ta more neviem ako to mam urobit!!!!!!!! &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; ','sully','24. júla 2003&nbsp;&nbsp;16:10:55','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(61,'ta more neviem ako to mam urobit!!!!!!!! &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; ','sully','24. júla 2003&nbsp;&nbsp;16:18:28','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(62,'ta more neviem ako to mam urobit!!!!!!!! &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; ','sully','24. júla 2003&nbsp;&nbsp;16:19:06','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(63,'undefined&nbsp;<img src="./imgs/smiles/smiley.gif">&nbsp; ','sd','24. júla 2003&nbsp;&nbsp;17:33:50','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(64,'toto je novy text spravy a bude tu aj usmev. ......... 

safdasdf asfda
sdfsadfa
sdfasf &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','fsdafads','24. júla 2003&nbsp;&nbsp;17:57:19','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(65,'toto je novy text spravy a bude tu aj usmev. ......... 

safdasdf asfda
sdfsadfa
sdfasf &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','fsdafads','24. júla 2003&nbsp;&nbsp;18:03:56','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(66,'toto je novy text spravy a bude tu aj usmev. ......... 

safdasdf asfda
sdfsadfa
sdfasf &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','fsdafads','24. júla 2003&nbsp;&nbsp;18:04:28','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(67,'toto je novy text spravy a bude tu aj usmev. ......... 

safdasdf asfda
sdfsadfa
sdfasf &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','fsdafads','24. júla 2003&nbsp;&nbsp;18:04:54','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(68,'toto je novy text spravy a bude tu aj usmev. ......... 

safdasdf asfda
sdfsadfa
sdfasf &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','fsdafads','24. júla 2003&nbsp;&nbsp;18:06:54','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(69,'toto je novy text spravy a bude tu aj usmev. ......... 

safdasdf asfda
sdfsadfa
sdfasf &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','fsdafads','24. júla 2003&nbsp;&nbsp;18:06:57','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(70,'no uz tu mame aj anketu len treba vymysliet ako bude fungovat a pocitat.... coz nie je take easy
&nbsp;<img src="./imgs/smiles/undecided.gif">&nbsp; ','asdf','24. júla 2003&nbsp;&nbsp;18:20:00','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(71,'toto je oznam ktory tu bude napisany &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','Ivan Stefko','24. júla 2003&nbsp;&nbsp;18:46:39','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(72,'tento text pridal autor tejto stranky &nbsp;<img src="./imgs/smiles/wink.gif">&nbsp; ','Ing. Ivan Stefko','24. júla 2003&nbsp;&nbsp;18:48:04','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(73,'cau mamko. toto pridala mamka do knihy navstev. &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','Monika Stefkova','24. júla 2003&nbsp;&nbsp;18:49:28','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(74,'cau mamko. toto pridala mamka do knihy navstev. &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','Monika Stefkova','24. júla 2003&nbsp;&nbsp;18:50:16','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(75,'tu zadas text
saf
asf
asd
fs
adfsadfsadf asdf asdf sadfsad fsadfsadfsad fsafd&nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; ','Ing. Ivan Stefko','24. júla 2003&nbsp;&nbsp;20:32:14','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(76,'ahoj. ja som ivan a dokazem toto','sdf','24. júla 2003&nbsp;&nbsp;22:32:39','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(77,'mate to tu super...  &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','david','25. júla 2003&nbsp;&nbsp;16:09:32','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(78,'no hoj, ja som Stevo A do kozem totot
&nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; ','pista','25. júla 2003&nbsp;&nbsp;17:56:41','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(79,'&nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','jg','25. júla 2003&nbsp;&nbsp;17:56:54','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(80,'ta co nove? &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','sf','26. júla 2003&nbsp;&nbsp;17:21:00','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(81,'ta nic','ss','26. júla 2003&nbsp;&nbsp;18:02:04','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(82,'sd&nbsp;<img src="./imgs/smiles/undecided.gif">&nbsp; &nbsp;<img src="./imgs/smiles/cry.gif">&nbsp; ','oll','26. júla 2003&nbsp;&nbsp;18:02:47','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(83,'asdf','adfs','26. 7 2003&nbsp;&nbsp;19:20:23','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(84,'asf','er','26. 7. 2003&nbsp;&nbsp;19:20:37','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(85,'gffgdf','ssfdf','26. 7. 2003&nbsp;&nbsp;19:21:23','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(88,'d','adf asdf asdf asdf adsf','27. 7. 2003&nbsp;&nbsp;0:39:04','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(89,'<?echo "ahoj";?>','sfd','28. 7. 2003&nbsp;&nbsp;15:45:18','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(90,'&nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; &nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; &nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; ','dfg','28. 7. 2003&nbsp;&nbsp;19:13:29','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(91,' 
 
 
 
','ds','28. 7. 2003&nbsp;&nbsp;21:42:17','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(92,'&nbsp;<img src="./imgs/smiles/undecided.gif">&nbsp; ','v','28. 7. 2003&nbsp;&nbsp;21:43:15','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(93,'&nbsp;<img src="./imgs/smiles/sad.gif">&nbsp; &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; ',' :angry: ','30. 7. 2003&nbsp;&nbsp;15:51:01','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(94,'&nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; ','p','30. 7. 2003&nbsp;&nbsp;16:08:45','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(95,'t','gf','4. 8. 2003&nbsp;&nbsp;16:24:53','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(96,'&nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; ','f','4. 8. 2003&nbsp;&nbsp;16:24:59','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(97,'&nbsp;<img src="./imgs/smiles/smiley.gif">&nbsp; &nbsp;<img src="./imgs/smiles/wink.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/sad.gif">&nbsp; &nbsp;<img src="./imgs/smiles/undecided.gif">&nbsp; &nbsp;<img src="./imgs/smiles/cry.gif">&nbsp; &nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; ','fgh','4. 8. 2003&nbsp;&nbsp;16:25:07','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(98,'slfkjsf
 sf
sd
f
s 

sdf
sssssssssssssssssssssssssssssssffffffff
e
s

f
a
f
sef &nbsp;<img src="./imgs/smiles/angry.gif">&nbsp; ','sf','5. 8. 2003&nbsp;&nbsp;11:38:57','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(99,'ssdfasdf','asdf','6. 8. 2003&nbsp;&nbsp;21:10:06','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(100,'asdf','sdf','6. 8. 2003&nbsp;&nbsp;21:10:18','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(109,'mam mensi problem. ked chcem otvorit nove okno cez javascript tak sa to robi tak ze ahrefu sa priradi akcia: JavaScript:openwindow(''./imgs/foto/nieco.jpg'', ''asdf'', ''resizable=yes, scrollbars=no,menubar=no,toolbar=no,top=5, left=5, width=698,height=446'') - to je ok. 
problem mam v tom, ze mne to nefunguje ked si zadefinujem mapu (vo fotogalerii). ked tam napisem nieco taketo: area alt="prva fotka" shape="poly" coords="47,25,47,105,175,101,175,31" href="JavaScript:openwindow(''./imgs/nieco.jpg'','''',''resizable=yes, scrollbars=no, menubar=no, toolbar=no,top=5, left=5, width=698,height=446'')"

tak vypise chybu. co stym?','sadf','7. 8. 2003&nbsp;&nbsp;20:53:56','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(108,'asfd','asdf','7. 8. 2003&nbsp;&nbsp;20:52:47','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(107,'mam mensi problem. ked chcem otvorit nove okno cez javascript tak sa to robi tak ze ahrefu sa priradi akcia: JavaScript:openwindow(''./imgs/foto/nieco.jpg'',''asdf'',''resizable=yes,scrollbars=no,menubar=no,toolbar=no,top=5,left=5,width=698,height=446'') - to je ok. 
problem mam v tom, ze mne to nefunguje ked si zadefinujem mapu (vo fotogalerii). ked tam napisem nieco taketo: area alt="prva fotka" shape="poly" coords="47,25,47,105,175,101,175,31" href="JavaScript:openwindow(''./imgs/nieco.jpg'','''',''resizable=yes,scrollbars=no, menubar=no,toolbar=no,top=5, left=5, width=698,height=446'')"

tak vypise chybu. co stym?','asf','7. 8. 2003&nbsp;&nbsp;20:52:41','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(106,'mam mensi problem. ked chcem otvorit nove okno cez javascript tak sa to robi tak ze ahrefu sa priradi akcia: JavaScript:openwindow(''./imgs/foto/nieco.jpg'',''asdf'',''resizable=yes,scrollbars=no,menubar=no,toolbar=no,top=5,left=5,width=698,height=446'') - to je ok. 
problem mam v tom, ze mne to nefunguje ked si zadefinujem mapu (vo fotogalerii). ked tam napisem nieco taketo: <area alt="prva fotka" shape="poly" coords="47,25,47,105,175,101,175,31" href="JavaScript:openwindow(''./imgs/nieco.jpg'','''', ''resizable=yes,scrollbars=no, menubar=no,toolbar=no,top=5,left=5,width=698,height=446'')">

tak vypise chybu. co stym?','asfd','7. 8. 2003&nbsp;&nbsp;20:52:20','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(110,'<B>sdgsdfg</B> ','xvf','8. 8. 2003&nbsp;&nbsp;13:08:13','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(111,'<B>sdgsdfg</B> ','xvf','8. 8. 2003&nbsp;&nbsp;13:10:29','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(112,'<B>sdgsdfg</B> ','xvf','8. 8. 2003&nbsp;&nbsp;13:11:02','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(113,'<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ','sadsa','8. 8. 2003&nbsp;&nbsp;13:12:23','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(114,'<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ','sadsa','8. 8. 2003&nbsp;&nbsp;13:13:12','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(115,'<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ','sadsa','8. 8. 2003&nbsp;&nbsp;13:13:57','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(116,'<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ','sadsa','8. 8. 2003&nbsp;&nbsp;13:15:12','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(117,'<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ','sadsa','8. 8. 2003&nbsp;&nbsp;13:16:02','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(118,'<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ','sadsa','8. 8. 2003&nbsp;&nbsp;13:16:35','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(119,'<B>asfds</B> <B>asfsdaf</B> <B>asdfdasf</B> ','sadsa','8. 8. 2003&nbsp;&nbsp;13:17:03','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(120,'<b>fafas </b> <i>asdfasdf</i> <u>asdfasdf</u> ','asdf','8. 8. 2003&nbsp;&nbsp;13:17:24','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(121,'caute bol som tu a mate to tu nanic &nbsp;<img src="./imgs/smiles/sad.gif">&nbsp; &nbsp;<img src="./imgs/smiles/undecided.gif">&nbsp; ','brano novak','10. 8. 2003&nbsp;&nbsp;14:39:32','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(122,'no nazdar &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; ','asdf','10. 8. 2003&nbsp;&nbsp;19:18:23','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(123,'

<center>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
  codebase="http://active.macromedia.com/flash4/cabs/swflash.cab#version=4,0,0,0"
  id="svadba" width="289" height="200">
  <param name="movie" value="svadba.swf">
  <param name="quality" value="high">
  <param name="bgcolor" value="#FFFFFF">
  <embed name="svadba" src="svadba.swf" quality="high" bgcolor="#FFFFFF"
    width="289" height="200"
    type="application/x-shockwave-flash"
    pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash">
  </embed>
</object>
</center>

','asfd','26. 8. 2003&nbsp;&nbsp;22:51:28','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(124,'

<center>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
  codebase="http://active.macromedia.com/flash4/cabs/swflash.cab#version=4,0,0,0"
  id="svadba" width="289" height="200">
  <param name="movie" value="svadba.swf">
  <param name="quality" value="high">
  <param name="bgcolor" value="#FFFFFF">
  <embed name="svadba" src="svadba.swf" quality="high" bgcolor="#FFFFFF"
    width="289" height="200"
    type="application/x-shockwave-flash"
    pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash">
  </embed>
</object>
</center>

','asfd','26. 8. 2003&nbsp;&nbsp;22:53:08','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(125,'fasfl asdfljasdfl jasf
as d
fasd
f
asdf
 as
dfs&nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/grin.gif">&nbsp; &nbsp;<img src="./imgs/smiles/sad.gif">&nbsp; &nbsp;<img src="./imgs/smiles/kiss.gif">&nbsp; ','jani micak','1. 9. 2003&nbsp;&nbsp;20:28:18','');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(126,'asdf','asdf','12. 4. 2004&nbsp;&nbsp;16:01:50','100.10.10.177');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(127,'asfBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CE 
BOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CE
BOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEBOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CE','sdf','14. 11. 2004&nbsp;&nbsp;10:49:12','127.0.0.1');
REPLACE INTO "gb" ("id", "text", "od", "datum", "ip") VALUES
	(128,'<b>asfasfasfd</b> ','sdf','28. 11. 2004&nbsp;&nbsp;13:07:27','127.0.0.1');
/*!40000 ALTER TABLE "gb" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'myslienka'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "myslienka" (
  "id" int(3) unsigned NOT NULL AUTO_INCREMENT,
  "text" varchar(255) DEFAULT NULL,
  "autor" varchar(255) DEFAULT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "id" ("id"),
  KEY "id_2" ("id")
) AUTO_INCREMENT=2 /*!40100 DEFAULT CHARSET=latin1*/;



#
# Dumping data for table 'myslienka'
#

LOCK TABLES "myslienka" WRITE;
/*!40000 ALTER TABLE "myslienka" DISABLE KEYS;*/
REPLACE INTO "myslienka" ("id", "text", "autor") VALUES
	('1','p[]','ja som autor');
/*!40000 ALTER TABLE "myslienka" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'oznamy'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "oznamy" (
  "id" int(3) NOT NULL AUTO_INCREMENT,
  "nazov" text NOT NULL,
  "text" text NOT NULL,
  "platnost_od" date NOT NULL DEFAULT '0000-00-00',
  "platnost_do" date NOT NULL DEFAULT '0000-00-00',
  "viditelnost" smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=4 /*!40100 DEFAULT CHARSET=latin1*/;



#
# Dumping data for table 'oznamy'
#

LOCK TABLES "oznamy" WRITE;
/*!40000 ALTER TABLE "oznamy" DISABLE KEYS;*/
REPLACE INTO "oznamy" ("id", "nazov", "text", "platnost_od", "platnost_do", "viditelnost") VALUES
	(1,'adf','animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... animátorský tím a osemnás? ú?astníkov - teda tých, ktorí sa rozhodli pracova? na sebe, aby sa mohli Vynikajúca šéfka a školite?ka ... 
','2006-01-01','2006-05-05',0);
REPLACE INTO "oznamy" ("id", "nazov", "text", "platnost_od", "platnost_do", "viditelnost") VALUES
	(2,'asdf','<p>asdf asfasdf asdfasfasdf</p>','2009-02-20','2010-02-18',0);
REPLACE INTO "oznamy" ("id", "nazov", "text", "platnost_od", "platnost_do", "viditelnost") VALUES
	(3,'asdfasdf asfda','<div>Predkladan&yacute; dokument prezentuje n&aacute;vrh aktualizovan&yacute;ch cie?ov rozvoja obce Plechotice na obdobie 2008 až 2013,ktor&yacute; bol schv&aacute;len&yacute; obecn&yacute;m zastupite?stvom d?a 12.12.2008 uznesen&iacute;m ?. 38/2008. Vych&aacute;dza z&nbsp;t&yacute;chto podkladov:</div>
<ul>
    <li>z&nbsp;rev&iacute;zie cie?ov a&nbsp;navrhovan&yacute;ch projektov, ktor&eacute; boli formulovan&eacute; v&nbsp;r&aacute;mci Programu hospod&aacute;rskeho a&nbsp;soci&aacute;lneho rozvoja obce Plechotice v septembri 2004</li>
    <li>v&nbsp;s&uacute;lade s&nbsp;N&aacute;rodn&yacute;m strategick&yacute;m referen?n&yacute;m r&aacute;mcom na roky 2007-2013 a&nbsp;jeho jednotliv&yacute;ch opera?n&yacute;ch programov</li>
    <li>na z&aacute;klade nov&yacute;ch podmienok a&nbsp;poh?adov miestnej politiky na rozvoj obce spracovan&yacute;ch v&nbsp;dotazn&iacute;ku na zistenie nov&yacute;ch požiadaviek na rozvoj.</li>
</ul>
<p>Spom&iacute;nan&yacute; dokument si m&ocirc;žete stiahnu? <a target="_blank" href="http://www.plechotice.sk/tmp/file/PHSR%20Plechotice.pdf">tu</a>.</p>','2009-02-18','2010-02-20',0);
/*!40000 ALTER TABLE "oznamy" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'oznamy_fara'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "oznamy_fara" (
  "id" int(3) NOT NULL AUTO_INCREMENT,
  "nazov" text NOT NULL,
  "text" text NOT NULL,
  "pridany" date DEFAULT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=10 /*!40100 DEFAULT CHARSET=latin1*/;



#
# Dumping data for table 'oznamy_fara'
#

LOCK TABLES "oznamy_fara" WRITE;
/*!40000 ALTER TABLE "oznamy_fara" DISABLE KEYS;*/
REPLACE INTO "oznamy_fara" ("id", "nazov", "text", "pridany") VALUES
	(7,'Upratovanie','sdfds
sd
fsd
f
ds
545','2004-12-18');
REPLACE INTO "oznamy_fara" ("id", "nazov", "text", "pridany") VALUES
	(8,'novy oznam','toto je <b>novy oznam</b> ','2004-12-04');
REPLACE INTO "oznamy_fara" ("id", "nazov", "text", "pridany") VALUES
	(9,'asd','upraveny oznam
','2004-12-18');
/*!40000 ALTER TABLE "oznamy_fara" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'titles'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "titles" (
  "id" tinyint(3) unsigned NOT NULL DEFAULT '0',
  "text" text,
  "locate" tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "id" ("id"),
  KEY "id_2" ("id")
) /*!40100 DEFAULT CHARSET=latin1*/;



#
# Dumping data for table 'titles'
#

LOCK TABLES "titles" WRITE;
/*!40000 ALTER TABLE "titles" DISABLE KEYS;*/
REPLACE INTO "titles" ("id", "text", "locate") VALUES
	(1,'BOHOSLUŽOBNÝ PORIADOK NA TÝŽDE? PO 32. NEDELI V CEZRO?NOM OBDOBÍ',1);
/*!40000 ALTER TABLE "titles" ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'users'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ "users" (
  "id" int(3) unsigned NOT NULL AUTO_INCREMENT,
  "login" varchar(20) NOT NULL DEFAULT '0',
  "password" varchar(60) NOT NULL DEFAULT '0',
  "privilege" int(3) unsigned DEFAULT '0',
  "email" varchar(30) NOT NULL DEFAULT '',
  "meno" text,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=11 /*!40100 DEFAULT CHARSET=latin1*/;



#
# Dumping data for table 'users'
#

LOCK TABLES "users" WRITE;
/*!40000 ALTER TABLE "users" DISABLE KEYS;*/
REPLACE INTO "users" ("id", "login", "password", "privilege", "email", "meno") VALUES
	('1','admin','ed878f1dc8cd0ad7a96f8d6e905c0b6a','1','stefko@seznam.cz','Ivan Stefko');
REPLACE INTO "users" ("id", "login", "password", "privilege", "email", "meno") VALUES
	('10','marek','28a34010e84b881fb087359c7e280a08','2','asdf@asd.sk','Marek Andras');
REPLACE INTO "users" ("id", "login", "password", "privilege", "email", "meno") VALUES
	('6','peto','0ff68179820a88f04344b8962fed3d2b','3','asdf@a.sk','Peto Kosco');
/*!40000 ALTER TABLE "users" ENABLE KEYS;*/
UNLOCK TABLES;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE;*/
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;*/
