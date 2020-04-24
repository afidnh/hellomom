<?php
   session_start();
   require_once("koneksi.php");
   $username = $_POST['username'];
   $pass = md5($_POST['password']);
   $cekuser = mysql_query("SELECT * FROM app_pengurus WHERE username = '$username'");
   $hasil = mysql_fetch_array($cekuser);
   if(mysql_num_rows($cekuser) == 0) {
   echo "<script language='JavaScript'>
          alert('Username tidak terdaftar');
          document.location='login.php';
          </script>";
   } else {
     if($pass <> $hasil['password']) {
    echo "<script language='JavaScript'>
          alert('Password Salah. Silahkan Ulangi Kembali!');
          document.location='login.php';
          </script>";
     } else {
       $_SESSION['username'] = $hasil['username'];
       $_SESSION['id'] = $hasil['id'];
       $_SESSION['type'] = $hasil['type'];
       $_SESSION['nama'] = $hasil['nama'];
       echo "<script language='JavaScript'>
          alert('Anda Berhasil Login.');
          document.location='pages/dashboard/index.php';
          </script>";
     }
   }
?>