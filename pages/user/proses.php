<?php
include "../../koneksi.php";

$nik = $_POST['nik'];
$password	= md5($_POST['password']);
$nama	= $_POST['nama'];
$ttl = $_POST['ttl'];
$kepala_keluarga = $_POST['kepala_keluarga'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$prediksi_kelahiran = $_POST['prediksi_kelahiran'];
$id_pengurus = $_POST['id_pengurus'];

if (empty($_POST['nik'])) {
	echo '<script language="javascript">
              alert ("Isi Data Pasien Baru Dengan Benar");
              window.location="index.php";
              </script>';
} else {
	$cek_pasien=mysql_num_rows(mysql_query("SELECT * FROM app_pasien WHERE nik='$nik'"));
	if ($cek_pasien > 0) {
	        echo '<script language="javascript">
	              alert ("User Sudah Ada Yang Menggunakan");
	              window.location="index.php?hal=register";
	              </script>';
	              exit();
	} else{
		$query = mysql_query('insert into app_pasien(nik,password,nama,ttl,kepala_keluarga,alamat,telp,prediksi_kelahiran,id_pengurus,status, tanggal) 
	values 
	("'.$nik.'","'.$password.'","'.$nama.'","'.$ttl.'","'.$kepala_keluarga.'","'.$alamat.'","'.$telp.'","'.$prediksi_kelahiran.'","'.$id_pengurus.'","belum_aktif", Now())');
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