<?php
	$server		= "localhost";
	$user		= "root";
	$password	= "";
	$database	= "ta_ifah";
	mysql_connect ($server, $user, $password)
		or die ("Connection error");
	mysql_select_db($database)
		or die ("Unknown database");
?>
