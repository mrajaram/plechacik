# MySQL-Front Dump 2.5
#
# Host: localhost   Database: plechacik
# --------------------------------------------------------
# Server version 3.23.54-nt


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
# Table structure for table 'gb'
#

CREATE TABLE gb (
  id int(3) unsigned NOT NULL auto_increment,
  text text NOT NULL,
  od text NOT NULL,
  datum varchar(60) NOT NULL default '',
  ip text,
  PRIMARY KEY  (id),
  UNIQUE KEY id (id)
) TYPE=MyISAM;



#
# Table structure for table 'oznamy'
#

CREATE TABLE oznamy (
  id int(3) NOT NULL auto_increment,
  nazov text NOT NULL,
  text text NOT NULL,
  platnost_od date NOT NULL default '0000-00-00',
  platnost_do date NOT NULL default '0000-00-00',
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Table structure for table 'users'
#

CREATE TABLE users (
  id int(3) unsigned NOT NULL auto_increment,
  login varchar(20) NOT NULL default '0',
  password varchar(60) NOT NULL default '0',
  privilege int(3) unsigned default '0',
  email varchar(30) NOT NULL default '',
  PRIMARY KEY  (id)
) TYPE=MyISAM;

