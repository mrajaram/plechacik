<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="?" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    Send this file: <input name="userfile" type="file" />
	<input type="hidden" name="submit" value="1">
    <input type="submit" value="Send File" />
</form>

<?
  if(isset($_POST["submit"])) {
	move_uploaded_file($_FILES['userfile']['tmp_name'], "./tmp/file/" . $_FILES['userfile']['name']);
  }
?>