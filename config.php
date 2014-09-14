<?
$host = "internal-db.s399.gridserver.com";
$user = "db399_burkie";
$pass = "Thebig30!";
$db   = "db399_rota";

mysql_connect($host,$user,$pass) or die(mysql_error());
mysql_select_db($db);
?>