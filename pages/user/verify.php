<?php 
include '../../koneksi.php';
$id = $_GET['id'];
mysql_query("UPDATE app_pasien SET status = '1' WHERE id='$id'")or die(mysql_error());

echo "<script>alert('Status Pasien Berhasil Di Aktifkan');
            document.location.href='index.php'</script>\n";
?>