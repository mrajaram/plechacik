<?php
	$oFCKeditor = new FCKeditor($_GET["var"]) ;
	$oFCKeditor->Width = $width;
	$oFCKeditor->Height = $height;
	$oFCKeditor->ToolbarSet = 'MyToolbar'; 
	$oFCKeditor->BasePath = '../fckeditor/' ;
	$oFCKeditor->Create() ;
?>
