Test for  upload<br><br>
postup: <br>
- kliknut napr. na ikonku vlozit/zmenit odkaz<br>
- click na 'prechadzat server'<br>
- vybrat subor ktory chcem uploadovat - click na browse v spodnej casti dialogoveho okna <br>
- click na button 'upload' 
<br>
po uspesnom uploadnuti by sa mal subor objavit v dialogovom okne. 
<br><br>
funkcny upload suborov tomto editor mozete porovnat tuto: http://www.fckeditor.net/demo  (zvolit insert/edit link resp. insert/edit image)<br>
uploadovat sa mozu bezne pouzivane sobory ... jpg, zip, bmp,  .... 
<br><br>
!! ked do adresara htdocs/tmp priamo nakopirujem nejaky subor, tak v dialogovom okne pre upload suborov vo fckeditore sa ten subor zobrazi. Cize z toho mi vypliva, ze konfiguracia/nastavenie ciest je OK. Problem bude skorna strane servera s pristupovymi pravami alebo... ??
<br><br>



<?php
include_once("./fckeditor/fckeditor.php") ;
	$oFCKeditor = new FCKeditor('aktualityText') ;
	$oFCKeditor->Width = 800;
	$oFCKeditor->Height = 400;
	$oFCKeditor->ToolbarSet = 'MyToolbar'; 
	$oFCKeditor->BasePath = './fckeditor/' ;
	$oFCKeditor->Create() ;

?>