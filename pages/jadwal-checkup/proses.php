<?php
include "../../koneksi.php";

$id_pasien = $_POST['id_pasien'];
$id_pengurus = $_POST['id_pengurus'];
$tanggal_periksa = $_POST['tanggal_periksa'];
$trisemester = $_POST['trisemester'];

$query = mysql_query('insert into app_jadwal(id_pasien,id_pengurus,trisemester,tanggal_checkup, tanggal_dibuat, tanggal_update) values ("'.$id_pasien.'","'.$id_pengurus.'","'.$trisemester.'","'.$tanggal_periksa.'", Now(), Now())');

if (empty($id_pasien) || empty($id_pengurus) || empty($tanggal_periksa) || empty($trisemester)) {
	echo "<script>alert('lengkapi data!');
document.location.href='index.php'</script>\n";
} else {
	if ($query) {
		echo "<script>alert('data berhasil disimpan');
		document.location.href='index.php'</script>\n";
		} else {
		echo "<script>alert('data gagal disimpan');
		document.location.href='index.php'</script>\n";
		}
}

?>