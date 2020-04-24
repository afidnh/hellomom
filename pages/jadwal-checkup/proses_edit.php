<?php
    include "../../koneksi.php";
    $id = $_POST['id'];
    $keluhan = $_POST['keluhan'];
    $tekanan_darah = $_POST['tekanan_darah'];
    $berat_badan = $_POST['berat_badan'];
    $umur_kehamilan = $_POST['umur_kehamilan'];
    $tinggi_fundus = $_POST['tinggi_fundus'];
    $letak_janin = $_POST['letak_janin'];
    $denyut_jantung = $_POST['denyut_jantung'];
    $hasil = $_POST['hasil'];
    $tindakan = $_POST['tindakan'];
    $nasehat = $_POST['nasehat'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    //update data
    $query = "UPDATE app_checkup SET keluhan = '$keluhan', tekanan_darah = '$tekanan_darah', berat_badan = '$berat_badan', umur_kehamilan = '$umur_kehamilan', hasil = '$hasil', tinggi_fundus = '$tinggi_fundus', letak_janin = '$letak_janin', denyut_jantung = '$denyut_jantung', tindakan = '$tindakan', nasehat = '$nasehat', tanggal_kembali = '$tanggal_kembali', tanggal_update = Now() WHERE id_jadwal = '$id'";
    $sql = mysql_query ($query);
    //setelah berhasil update
    if ($sql) {
                    echo "<script>alert('Data Berhasil Di Ubah');
                    document.location.href='detail-checkup.php?id=$id'</script>\n";
             } 
     else {
         echo "<script>alert('DATA GAGAL');
                    document.location.href='detail-checkup.php?id=$id'</script>\n";
    }
?>