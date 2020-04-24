<?php
	include "../../koneksi.php";
	$id=$_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$jabatan = $_POST['jabatan'];
	$type = $_POST['type'];
	$modal=mysql_query("UPDATE app_pengurus SET username = '$username',password = '$password', jabatan = '$jabatan', type = '$type' WHERE id = '$id'");
if ($modal) {
echo "<script>alert('data berhasil diubah');
document.location.href='index.php'</script>\n";
} else {
echo "<script>alert('data gagal diubah');
document.location.href='index.php'</script>\n";
}
?>