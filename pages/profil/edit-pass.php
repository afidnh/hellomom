<?php
    include "../../koneksi.php";
    $id = $_POST['id'];
    $password_lama = md5($_POST['password_lama']);
    $password_baru = md5($_POST['password_baru']);
    $konfirm_password = md5($_POST['konfirm_password']);

    $query = "SELECT * FROM app_pengurus WHERE id='$id' AND password='$password_lama'";
    $sql = mysql_query ($query);
    $hasil = mysql_num_rows ($sql);
    if (! $hasil >= 1) {
        ?> <script language = "JavaScript" >
    alert('Password lama tidak sesuai!, silahkan ulang kembali!');
document.location = 'gantipassword.php'; </script>
<?php
            unset($_SESSION['username']);
            session_destroy();
    }
    //validasi data data kosong
    else if (empty($_POST['password_baru']) || empty($_POST['konfirm_password'])) {
            echo "<script language='JavaScript'>
            alert('Data Tidak Boleh Kosong, silahkan ulang kembali!');
            document.location='gantipassword.php';
            </script>";    
    }
    //validasi input konfirm password
    else if (($_POST['password_baru']) != ($_POST['konfirm_password'])) {
            echo "<script language='JavaScript'>
            alert('Konfirmasi Password Tidak Sesuai, silahkan ulang kembali!');
            document.location='gantipassword.php';
            </script>";    
    }
    else {
    //update data
    $query = "UPDATE app_pengurus SET password = '$password_baru' WHERE id = '$id'";
    $sql = mysql_query ($query);
    //setelah berhasil update
    if ($sql) {
        ?> <script language = "JavaScript" >
    alert('Password berhasil di ubah');
document.location = 'gantipassword.php'; </script>
<?php 
    } else {
       ?> <script language = "JavaScript" >
    alert('GAGAL MENGUBAH PASSWORD');
document.location = 'gantipassword.php'; </script>
<?php   
    }
    }
?>