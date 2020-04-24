<?php 
include '../../koneksi.php';
$id = $_GET['id'];
mysql_query("DELETE FROM app_pasien WHERE id = '$id'")
or die(mysql_error());

echo "<script>alert('Berhasil Menghapus Data Pasien');
            document.location.href='index.php'</script>\n";
?>