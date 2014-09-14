<?
$host = "localhost";
$user = "username";
$pass = "password";
$db   = "database";

mysql_connect($host,$user,$pass) or die(mysql_error());
mysql_select_db($db);
?>
