<?php
    include "../../koneksi.php";
    $id = $_POST['id'];
    $kepala_keluarga = $_POST['kepala_keluarga'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $prediksi_kelahiran = $_POST['prediksi_kelahiran'];

    $query = "SELECT * FROM app_pasien WHERE id='$id'";
    $sql = mysql_query ($query);
    $hasil = mysql_num_rows ($sql);
    if (! $hasil >= 1) {
        ?>
    <script language="JavaScript">
        alert('Silahkan ulang kembali!');
        document.location = 'index.php';
    </script>
    <?php
    }

    else {
    //update data
    $query = "UPDATE app_pasien SET kepala_keluarga = '$kepala_keluarga', telp = '$telp', alamat = '$alamat', prediksi_kelahiran = '$prediksi_kelahiran' WHERE id = '$id'";
    $sql = mysql_query ($query);
    //setelah berhasil update
    if ($sql) {
        ?>
        <script language="JavaScript">
            alert('Data berhasil di ubah');
            document.location = 'index.php';
        </script>
        <?php 
    } else {
         ?>
            <script language="JavaScript">
                alert('GAGAL MENGUBAH DATA');
                document.location = 'index.php';
            </script>
            <?php  
    }
    }
?>