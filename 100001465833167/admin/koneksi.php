<?php
  // jika penulisannya rapi maka akan semakin mudah di mengerti ^.^v
	$server		= "localhost";
	$user		= "root";
	$password	= "";
	$database	= "ta_mahasiswa";
	mysql_connect ($server, $user, $password)
		or die ("Connection error");
	mysql_select_db($database)
		or die ("Unknown database");
?>
