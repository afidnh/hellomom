<?php
    include "../../koneksi.php";
    $id=$_GET['id'];

    //update data
    $query = "UPDATE app_pengurus SET password = reset_password WHERE id = '$id'";
    $sql = mysql_query ($query);
    //setelah berhasil update
    if ($sql) {
        ?>
    <script language="JavaScript">
        alert('Berhasil Mereset Password ');
        document.location = 'index.php';
    </script>
    <?php 
    } else {
        echo "<script>alert('Gagal Mereset Password');
            document.location.href='index.php'</script>\n";
    }
?>