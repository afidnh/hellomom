	
<?php
include "../../koneksi.php";
?>
<?php
$lastCount = $_GET['last'];
$query = mysql_query("select count(*) from app_laporan WHERE status = '0'");
$rs = mysql_fetch_array($query);
$newData = $rs[0] > $lastCount;
echo json_encode(array('newData' => $newData));
?>