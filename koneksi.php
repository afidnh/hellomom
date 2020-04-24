<?php
$host='localhost';
$user='root';
$pass='';
$db='app_';
$ok=mysql_connect($host,$user,$pass) or die ('gagal konek'.mysql_error());
mysql_select_db($db,$ok);
?>