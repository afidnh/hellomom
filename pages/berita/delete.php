<?php 
include '../../koneksi.php';
$id = $_GET['id'];
mysql_query("DELETE FROM app_berita WHERE id='$id'")or die(mysql_error());
echo "<script>alert('Berhasil Menghapus Berita');
   	document.location.href='index.php'</script>\n";
?>