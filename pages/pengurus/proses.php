<?php
include "../../koneksi.php";

$nip = $_POST['nip'];
$nama	= $_POST['nama'];
$username	= $_POST['username'];
$alamat = $_POST['alamat'];
$password= md5($_POST['password']);
$jabatan = $_POST['jabatan'];
$rumah_sakit = $_POST['rumah_sakit'];
$type = $_POST['type'];

if (empty($_POST['nip']) || empty($_POST['username']) || empty($_POST['password'])) {
	echo '<script language="javascript">
              alert ("Isi Data Pengurus Baru Dengan Benar");
              window.location="index.php";
              </script>';
} else {
	$cek_admin=mysql_num_rows(mysql_query("SELECT * FROM app_pengurus WHERE nip='$nip' || username='$username'"));
	if ($cek_admin > 0) {
	        echo '<script language="javascript">
	              alert ("User Sudah Ada Yang Menggunakan");
	              window.location="index.php?hal=register";
	              </script>';
	              exit();
	} else{
		$query = mysql_query('insert into app_pengurus(nip,nama,username,alamat,password,reset_password,jabatan,rumah_sakit,type, tanggal) values ("'.$nip.'","'.$nama.'","'.$username.'","'.$alamat.'","'.$password.'","'.$password.'","'.$jabatan.'","'.$rumah_sakit.'","'.$type.'", Now())');
			if ($query) {
			echo "<script>alert('data berhasil disimpan');
			document.location.href='index.php'</script>\n";
			} else {
			echo "<script>alert('data gagal disimpan');
			document.location.href='index.php'</script>\n";
			}
	}
}
?>