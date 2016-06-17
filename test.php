<?php
//This is the connection to database, its included in every file.
$dbhost = "dmysql01.westbahr.com";
$dbuser = "system_dev";
$dbpassword = '98dSSCX9ryYLUwv8';
$db= 'system_dev';
	
$a=mysql_connect($dbhost,$dbuser,$dbpassword);
mysql_select_db($db);


?>
