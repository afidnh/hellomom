<?php 
include '../../koneksi.php';
$id = $_GET['id'];
mysql_query("DELETE FROM app_jadwal WHERE id='$id'")or die(mysql_error());
 echo "<script>alert('Berhasil Menghapus Jadwal Check Up');
            document.location.href='index.php'</script>\n";
?>