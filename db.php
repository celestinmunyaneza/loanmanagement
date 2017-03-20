<?php 
include 'configdb.php';

class db {
	static function connect () {
	$connection=mysql_connect (HOST, USER,PASS);
	mysql_select_db (DB);
		 
	}
}
?>