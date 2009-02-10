---------------------------------------------------------------------------------------------------
LICENCE:
---------------------------------------------------------------------------------------------------
GNU GENERAL PUBLIC LICENSE

Copyright (C) 2001 WEBLOTION.COM
DIENERSTRASSE 15 CH-8004 ZUERICH SWITZERLAND
CONTACT@WEBLOTION.COM

Everyone is permitted to copy and distribute verbatim copies
of this license document, but changing it is not allowed.


---------------------------------------------------------------------------------------------------
TODO (IMPORTANT!)
---------------------------------------------------------------------------------------------------
- CHANGE ALL VARIABLES IN THE "/ADMIN/CONFIG.INC.PHP". (MOST IMPORTANT: DATABASE CONNECTION)
- CREATE DB "RELOADER" AND INSERT TABLE "NEWSLETTER" AS IT IS IN "/ADMIN/SQL.TXT".
- CREATE ".htaccess" AND ".htaccess" FILES TO PROTECT THE FOLDER "ADMIN" MORE ABOUT THIS AT: "http://www.he.net/~jdoe/info/htaccess/demo.html".
- TO CREATE THE TEXFILE WITH THE EMAIL ADRESSES THE FOLDER "FILEZ" SHOULD HAVE THE PERMISSIONS 0777. (CHMOD 0777 AS ADMIN)


---------------------------------------------------------------------------------------------------
ADMIN WORK ARROUND
---------------------------------------------------------------------------------------------------
SEND THE EMAILS:
- step one: "start here" will create the textfile with the email addresses out of the database to the folder "filez"
- step two: file is created and you can view it if you like or/and continue to the mailform.
- insert the password (generated in "admin/confic.inc.php") and write the newsletter

VIEW ENTRIES:
- shows up all entries in the database. you also can delte entries here.

IMPORT EMAILS:
- you can export your email addresses out of microsoft outlook (or another email client) in a textfile. return seperated like:

email1@domain1.com
email2@domain2.com
email3@domain3.com

- it will insert all emails in the database.

- all you have todo is set the "$path_to_reloader_admin" variable in the config file.


---------------------------------------------------------------------------------------------------
OPTIONS IN THE CONFIG FILE (ADMIN/CONFIC.INC.PHP)
---------------------------------------------------------------------------------------------------
database connection:
YOU HAVE TO MAKE CHANGES!!!

mailer configuration:
CHANGES ARE NOT IMPORTANT TO RUN RELOADER.
DEFAULT IT WILL SEND THE MAILS WITH A SMTP FUNCTION
YOU ALSO CAN CHOOSE THE SEND THE MAILS WITH THE PHP MAIL(); FUNCTION.

page informations:
CHANGES ARE NOT IMPORTANT TO RUN RELOADER.
but to use reloader as a newsletter tool you have to make changes.
 
site design
CHANGES ARE NOT IMPORTANT TO RUN RELOADER.


---------------------------------------------------------------------------------------------------
PLEASE REPORT BUGS TO: CONTACT@WEBLOTION.COM
---------------------------------------------------------------------------------------------------