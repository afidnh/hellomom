<?php
    include "../../koneksi.php";
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    $rumah_sakit = $_POST['rumah_sakit'];

    $query = "SELECT * FROM app_pengurus WHERE id='$id'";
    $sql = mysql_query ($query);
    $hasil = mysql_num_rows ($sql);
    if (! $hasil >= 1) {
        ?> < script language = "JavaScript" >
    alert('Silahkan ulang kembali!');
document.location = 'index.php'; < /script>
<?php
            unset($_SESSION['username']);
            unset($_SESSION['hak_akses']);
            session_destroy();
    }

    else {
    //update data
    $query = "UPDATE app_pengurus SET nama = '$nama',  alamat = '$alamat', jabatan = '$jabatan', rumah_sakit = '$rumah_sakit' WHERE id = '$id'";
    $sql = mysql_query ($query);
    //setelah berhasil update
    if ($sql) {
        ?>
        <script language = "JavaScript" >
    alert('Data berhasil di ubah');
document.location = 'index.php'; </script>

<?php 
    } else {
        ?> 
        <script language = "JavaScript" >
    alert('GAGAL MENGUBAH DATA');
document.location = 'index.php'; </script>
<?php 
    }
    }
?>