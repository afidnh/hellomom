<?php
    include "../../koneksi.php";
    $id = $_POST['id'];
    $id_pasien = $_POST['id_pasien'];
    $id_pengurus = $_POST['id_pengurus'];
    $keluhan = $_POST['keluhan'];
    $tekanan_darah = $_POST['tekanan_darah'];
    $berat_badan = $_POST['berat_badan'];
    $umur_kehamilan = $_POST['umur_kehamilan'];
    $tinggi_fundus = $_POST['tinggi_fundus'];
    $letak_janin = $_POST['letak_janin'];
    $denyut_jantung = $_POST['denyut_jantung'];
    $hasil = $_POST['hasil'];
    $tindakan = $_POST['tindakan'];
    $nasihat = $_POST['nasihat'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    //insert data
    $query = "INSERT INTO app_checkup( id_pasien, id_pengurus, id_jadwal, tanggal_cek, keluhan, tekanan_darah, berat_badan, umur_kehamilan, tinggi_fundus,  denyut_jantung, hasil,  letak_janin, tindakan, nasehat, tanggal_kembali, tanggal_update) VALUES ('$id_pasien','$id_pengurus', '$id', Now(), '$keluhan', '$tekanan_darah', '$berat_badan', '$umur_kehamilan', '$tinggi_fundus',  '$denyut_jantung', '$hasil', '$letak_janin', '$tindakan', '$nasihat', '$tanggal_kembali', Now())";
    $sql = mysql_query ($query);
    // //setelah berhasil insert
        if ($sql) {
                if ($umur_kehamilan < '13') {
                     $insert = "INSERT INTO app_jadwal (id_pasien, id_pengurus, trisemester, tanggal_checkup, tanggal_dibuat, tanggal_update) value ('$id_pasien','$id_pengurus','1', '$tanggal_kembali', Now(), Now())";
                } else if ($umur_kehamilan > '13' && $umur_kehamilan < '29') {
                    $insert = "INSERT INTO app_jadwal (id_pasien, id_pengurus, trisemester, tanggal_checkup, tanggal_dibuat, tanggal_update) value ('$id_pasien','$id_pengurus','2', '$tanggal_kembali', Now(), Now())";
                } else {
                     $insert = "INSERT INTO app_jadwal (id_pasien, id_pengurus, trisemester, tanggal_checkup, tanggal_dibuat, tanggal_update) value ('$id_pasien','$id_pengurus','3', '$tanggal_kembali', Now(), Now())";
                }
                $queryinsert = mysql_query($insert);
                if($queryinsert){
                    $update_tanggal_cek = "UPDATE app_jadwal SET tanggal_checkup = Now() WHERE id = '$id'";
                    $queryupdate = mysql_query($update_tanggal_cek);
                    if($queryupdate){
                            echo "<script>alert('Hasil dan Jadwal Check Up berhasil di tambahkan');
                            document.location.href='index.php'</script>\n";
                    } else {
                        echo "<script>alert('Gagal mengubah tanggal check up');
                            document.location.href='index.php'</script>\n";
                    }
                } else {
               echo "<script>alert('gagal menambahkan hasil check up');
                document.location.href='index.php'</script>\n";
            }
        } else {
            echo "<script>alert('data gagal ditambahkan');
            document.location.href='index.php'</script>\n";
        }

?>